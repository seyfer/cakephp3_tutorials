<?php
declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: seyfer
 * Date: 3/27/17
 */

namespace App\Controller;


class MathController extends AppController
{
    public function operation1()
    {
        $sum = $this->Math->add(5, 3);
        echo $sum;
        exit;
    }

    public function operation2()
    {
        $sum = 15 + 10;
        echo $sum;
        exit;
    }
}