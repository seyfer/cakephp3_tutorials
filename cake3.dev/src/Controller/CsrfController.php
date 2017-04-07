<?php

namespace App\Controller;

use Cake\Event\Event;

class CsrfController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Csrf');
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
    }

    public function index()
    {
        $this->set('pageHeader', 'CSRF Tutorial');
    }

    public function submit()
    {
        if ($this->request->is('post')) {
            debug($this->request->getData());
        }
        exit;
    }

}
