<?php

namespace App\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\ORM\Query;

/**
 * CustomersFind behavior
 */
class CustomersFindBehavior extends Behavior
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    /**
     * @param Query $query
     * @param array $options
     * @return $this
     */
    public function findReachCustomers(Query $query, array $options)
    {
        return $query->where(['creditLimit >' => $options['creditLimit']]);
    }

}
