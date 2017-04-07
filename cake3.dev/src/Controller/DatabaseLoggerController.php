<?php

namespace App\Controller;

use Cake\Event\Event;
use Cake\Log\Log;

/*
 * In order to use the database logger, you need to modify config/app.php first.
 * Replace Cake\Log\Engine\FileLog with \App\Log\Engine\DatabaseLog
 */

class DatabaseLoggerController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Logger');
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
    }

    public function index()
    {
        $this->set('pageHeader', 'CakePHP 3 Database Logger Tutorial');
    }

    public function write()
    {
        Log::write($this->request->getData()['scope'], $this->request->getData()['message']);

        return $this->redirect('/databaseLogger/');
    }


}
