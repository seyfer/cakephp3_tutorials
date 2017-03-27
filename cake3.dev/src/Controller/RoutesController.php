<?php
declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: seyfer
 * Date: 3/27/17
 */

namespace App\Controller;


class RoutesController extends AppController
{
    public function index()
    {
        die('routes/index');
    }

    public function about()
    {
        die('routes/about');
    }

    public function view($id = 1)
    {
        die('view' . $id);
    }
}