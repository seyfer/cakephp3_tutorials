<?php

namespace App\Controller;

use App\Controller\Component\LoggerComponent;
use Cake\Event\Event;
use Cake\Log\Log;

/**
 * Class LoggerController
 * @package App\Controller
 *
 * @property LoggerComponent Logger
 */
class LoggerController extends AppController
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
        $this->set('pageHeader', 'CakePHP 3 Logging Tutorial');

        $debugLogs = $this->Logger->readLogsFromFile('debug');
        $errorLogs = $this->Logger->readLogsFromFile('error');

        $this->set(compact('debugLogs', 'errorLogs'));
    }

    public function write()
    {
        Log::write($this->request->getData()['scope'], $this->request->getData()['message']);

        return $this->redirect('/logger/');
    }


}
