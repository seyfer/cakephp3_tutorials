<?php

namespace App\Controller;

class TimeController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Logs');
    }

    public function index()
    {
        $this->set('pageHeader', 'CakePHP 3 Time Helper');
        $logs = $this->Logs->find();
        $this->set(compact('logs'));
    }
}
