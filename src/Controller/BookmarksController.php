<?php
namespace App\Controller;

use Cake\Database\Query;

/**
 * Bookmarks Controller
 *
 * @property \App\Model\Table\BookmarksTable $Bookmarks
 */
class BookmarksController extends AppController
{

    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Validate');
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Tags']
        ];
        $bookmarks      = $this->paginate($this->Bookmarks);

        $this->set(compact('bookmarks'));
        $this->set('_serialize', ['bookmarks']);
    }

    /**
     * @param int $limit
     */
    public function export($limit = 100)
    {
        $limit = $this->Validate->validLimit($limit, 100);

        $bookmarks = $this->Bookmarks->find('forUser', ['user_id' => 1]);

        $bookmarks->enableAutoFields(true);

        $bookmarks->limit($limit);
//                  ->where(['user_id' => 1]);

//        $bookmarks->contain(['Tags']);

        $bookmarks->contain(['Tags' => function (Query $q) {
            return $q->where(['Tags.name LIKE' => '%t%']);
        }]);

//        debug($bookmarks);
//        exit;
        $this->response->withDownload('export.csv');

        $this->set('_serialize', 'bookmarks');
        $this->set('_header', ['Title', 'Url']);
        $this->set('_extract', ['title', 'url']);
        $this->viewBuilder()->setClassName('CsvView.Csv');
        $this->set('bookmarks', $bookmarks);

        //json
//        $this->viewBuilder()->setLayout('ajax');

    }

    public function collectionTest()
    {
        $this->autoRender = false;

        $bookmarks = $this->Bookmarks
            ->find('list');

        debug("Each");
        $bookmarks->each(function ($value, $key) {
            echo "Element $key: $value" . PHP_EOL;
        });

        $bookmarks = $this->Bookmarks
            ->find('all')
            ->contain([
                          'Users', 'Tags',
                      ]);

        $collection = $bookmarks->extract('title');
        debug("Extract:title");
        debug($collection);
        debug($collection->toArray());

        $collection = $bookmarks->extract(function ($bookmark) {
            return $bookmark->user->id . ', ' . $bookmark->user->name;
        });
        debug("Extract:callback");
        debug($collection);
        debug($collection->toArray());

        $collection = $bookmarks->filter(function ($bookmark, $key) {
            return $bookmark->user->id === 1;
        });
        debug("Filter:callback");
        debug($collection);
        debug($collection->toArray());

        $collection = $bookmarks->reject(function ($bookmark, $key) {
            return $bookmark->user->id === 1;
        });
        debug("Reject:callback");
        debug($collection);
        debug($collection->toArray());

        $boolResult = $bookmarks->every(function ($bookmark, $key) {
            return $bookmark->user->id === 1;
        });
        debug("Every:callback");
        debug($boolResult);

        $boolResult = $bookmarks->some(function ($bookmark, $key) {
            return $bookmark->user->id === 1;
        });
        debug("Some:callback");
        debug($boolResult);

        $minResult = $bookmarks->min(function ($bookmark) {
            return count($bookmark->tags);
        });
        debug("Min:callback");
        debug($minResult);

        $maxResult = $bookmarks->max(function ($bookmark) {
            return count($bookmark->tags);
        });
        debug("Max:callback");
        debug($maxResult);

        $countByResult = $bookmarks->countBy(function ($bookmark) {
            return (count($bookmark->tags) == 1) ? 'One Tag' : 'More Than One Tag';
        });
        debug("CountBy:callback");
        debug($countByResult);
        debug($countByResult->toArray());

        die();
    }

    /**
     * View method
     *
     * @param string|null $id Bookmark id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $bookmark = $this->Bookmarks->get($id, [
            'contain' => ['Users', 'Tags']
        ]);

        $this->set('bookmark', $bookmark);
        $this->set('_serialize', ['bookmark']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $bookmark = $this->Bookmarks->newEntity();

        if ($this->request->is('post')) {
            $bookmark = $this->Bookmarks->patchEntity($bookmark, $this->request->getData());
            if ($this->Bookmarks->save($bookmark)) {
                $this->Flash->success(__('The bookmark has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bookmark could not be saved. Please, try again.'));
        }

        $users = $this->Bookmarks->Users->find('list', ['limit' => 200]);
        $tags  = $this->Bookmarks->Tags->find('list', ['limit' => 200]);

        $this->set(compact('bookmark', 'users', 'tags'));
        $this->set('_serialize', ['bookmark']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Bookmark id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $bookmark = $this->Bookmarks->get($id, [
            'contain' => ['Tags']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bookmark = $this->Bookmarks->patchEntity($bookmark, $this->request->getData());
            if ($this->Bookmarks->save($bookmark)) {
                $this->Flash->success(__('The bookmark has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bookmark could not be saved. Please, try again.'));
        }
        $users = $this->Bookmarks->Users->find('list', ['limit' => 200]);
        $tags  = $this->Bookmarks->Tags->find('list', ['limit' => 200]);
        $this->set(compact('bookmark', 'users', 'tags'));
        $this->set('_serialize', ['bookmark']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Bookmark id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bookmark = $this->Bookmarks->get($id);
        if ($this->Bookmarks->delete($bookmark)) {
            $this->Flash->success(__('The bookmark has been deleted.'));
        } else {
            $this->Flash->error(__('The bookmark could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
