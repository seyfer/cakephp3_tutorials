<?php
declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: seyfer
 * Date: 3/27/17
 */

namespace App\Controller;


use Cake\ORM\TableRegistry;

class UsersController extends AppController
{
    public function login()
    {
        if ($this->request->isPost()) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                $this->Flash->success('Logined!');

                return $this->redirect('/users/login');
            } else {
                $this->Flash->error('Failed!');
            }
        }

        debug($this->Auth->user());
    }

    public function add()
    {
        $users = TableRegistry::get('Users');

        $this->set('users', $users);

        if ($this->request->isPost()) {
            $user = $users->newEntity($this->request->getData());

            if ($users->save($user)) {
                $this->Flash->success('Registered!');
            }
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
}