<?php

namespace App\Controller;

class DatatablesController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Customers');
    }

    public function index()
    {
        $this->set('pageHeader', 'CakePHP 3 DataTables Tutorial');
        $customers = $this->Customers->find();
        $this->set(compact('customers'));
    }

}
