<?php

namespace App\Controller;

use App\Controller\Component\CaptchaComponent;
use Cake\Event\Event;

/**
 * Class CaptchaController
 * @package App\Controller
 *
 * @property CaptchaComponent Captcha
 */
class CaptchaController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Captcha');
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
    }

    public function index()
    {
        $this->set('pageHeader', 'CakePHP 3 Captcha Tutorial');

        if ($this->request->is('post')) {

            $realCaptcha = $this->request->session()->read('captcha');

            if ($realCaptcha == $this->request->getData()['captcha']) {
                $this->Flash->success(__('Data saved'));
            } else {
                $this->Flash->error(__('Wrong captcha'));
            }
        }
    }

    public function captcha()
    {
        $this->Captcha->getCaptchaImage();
        exit;
    }

}
