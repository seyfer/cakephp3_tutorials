<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class CountriesTable extends Table
{

    public function initialize(array $config)
    {
        $this->hasMany('Cities', [
            'className' => 'Cities'
        ]);
    }

}
