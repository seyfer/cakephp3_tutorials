<?php

namespace App\Controller;

class IssuesController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadModel('BigData');
    }

    public function index()
    {
        $this->set('pageHeader', 'MySQL BigInt Issue Tutorial');
        $data = $this->BigData->get(1);
        $this->set(compact('data'));
    }

}
