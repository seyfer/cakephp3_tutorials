<?php
declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: seyfer
 * Date: 3/27/17
 */

namespace App\Controller;


class RequestController extends AppController
{
    public function index()
    {
//        echo $this->request->getQuery('page');
//
//        echo $this->request->getParam('controller');
//
//        die();

        print $this->request->getData('MyModel.title');

        echo $this->request->env('HTTP_HOST');

        echo $this->request->getAttribute('webroot');

        echo $this->request->is('get');

        echo $this->request->session()->read('name');

        echo $this->request->domain();

        echo $this->request->referer();

        echo $this->request->clientIp();

        echo $this->request->scheme();

        var_export($this->request->accepts());

//        $this->set('data', []);
//
//        $this->render('test');
//
//        $this->redirect(['controller' => 'Request', 'action' => 'redir']);
    }

    public function redir()
    {

    }
}