<?php
declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: seyfer
 * Date: 3/27/17
 */

namespace App\Controller\Component;


use Cake\Controller\Component;

class MathComponent extends Component
{
    public function add($v1, $v2)
    {
        return $v1 + $v2;
    }
}