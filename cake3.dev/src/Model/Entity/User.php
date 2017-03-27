<?php
declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: seyfer
 * Date: 3/27/17
 */

namespace App\Model\Entity;


use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

class User extends Entity
{
    /**
     * @var array
     */
    protected $_accessible = [
        '*'  => true,
        'id' => false
    ];

    /**
     * @param $password
     * @return bool|string
     */
    protected function _setPassword($password)
    {
        return (new DefaultPasswordHasher())->hash($password);
    }

    /**
     * @return string
     */
    protected function _getAsString()
    {
        return $this->_properties['id'] . ' ' . $this->_properties['username'];
    }
}