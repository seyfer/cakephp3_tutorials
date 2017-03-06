<?php
namespace App\Model\Behavior;

use Cake\Database\Query;
use Cake\ORM\Behavior;

/**
 * UsersFind behavior
 */
class UsersFindBehavior extends Behavior
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
    public function findForUser(Query $query, array $options)
    {
        return $query->where(['user_id' => $options['user_id']]);
    }
}
