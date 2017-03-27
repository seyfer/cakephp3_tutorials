<?php
declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: seyfer
 * Date: 3/27/17
 */

namespace App\Controller;


use Cake\Database\Connection;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\Query;
use Cake\ORM\TableRegistry;

class DatabaseController extends AppController
{
    public function index()
    {
        /** @var Connection $conn */
        $conn = ConnectionManager::get('default');

//        $results = $conn->execute('SELECT * FROM orders')->fetchAll('assoc');

//        $results = $conn->execute('SELECT * FROM orders WHERE id = :id', ['id' => 2])->fetchAll('assoc');

//        $conn->insert('orders', [
//            'title'   => 'third',
//            'user_id' => 1,
//        ]);

//        $conn->update('orders', ['title' => 'thirddd'], ['id' => 3]);

//        $conn->delete('orders', ['id' => 3]);

        $results = $conn->newQuery()
                        ->select('*')
                        ->from('orders')
                        ->order(['id' => 'DESC'])
                        ->execute()
                        ->fetchAll('assoc');

        debug($results);
        exit;
    }

    public function qb()
    {

        $orders  = TableRegistry::get('Orders');
        $results = $orders->find()->all();

//        /** @var User $result */
//        foreach ($results as $result) {
//            debug($result->title);
//        }

//        $results = $orders->find()->first();
//        $results = $orders->find()->last();
//        $results = $orders->find()->all()->count();
//        $results = $orders->find()->all()->toArray();

        /** @var Query $query */
        $query = $orders->query();

//        $query->insert(['title', 'user_id'])
//              ->values([
//                           'title'   => 'Fourth',
//                           'user_id' => 1,
//                       ])
//              ->execute();

//        $query->update('orders')->set(['title' => 'Fifth'])->where(['id' => 5])
//              ->execute();

//        $query->delete('orders')->where(['id' => 5])->execute();

        $results = $orders->find()->all();

        debug($results);
        die();
    }

    public function virtualProperty()
    {
        $users = TableRegistry::get('Users');

        $results = $users->find()->first()->as_string;

        debug($results);
        die();
    }
}