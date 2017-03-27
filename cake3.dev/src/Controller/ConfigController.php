<?php
declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: seyfer
 * Date: 3/27/17
 */

namespace App\Controller;


use Cake\Core\Configure;

class ConfigController extends AppController
{
    public function index()
    {
//        Configure::dump('iolearn_dump', 'default');

        $config = Configure::read('siteName');
        debug($config);

        $config = Configure::read('Company');
        debug($config);
        exit;
    }
}