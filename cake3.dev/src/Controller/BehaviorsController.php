<?php

namespace App\Controller;

class BehaviorsController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Customers');
    }

    public function index()
    {
        $this->set('pageHeader', 'CakePHP 3 Behaviors Tutorial');
        $customers = $this->Customers->find('reachCustomers', ['creditLimit' => 200000]);
        $this->set(compact('customers'));
    }


}
