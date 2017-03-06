<?php
namespace App\Controller\Component;

use Cake\Controller\Component;

/**
 * Validate component
 */
class ValidateComponent extends Component
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    /**
     * @param $limit
     * @param $default
     * @return mixed
     */
    public function validLimit($limit, $default)
    {
        if (is_numeric($limit)) {
            return $limit;
        }

        return $default;
    }
}
