<?php

namespace App\Log\Engine;

use Cake\Log\Engine\BaseLog;
use Cake\ORM\TableRegistry;

class DatabaseLog extends BaseLog
{

    public function __construct($options = [])
    {
        parent::__construct($options);
    }

    public function log($level, $message, array $context = [])
    {
        // Save error to DB
        $logsTable = TableRegistry::get('Logs');

        $logsEntryData = [
            'type'    => $level,
            'message' => $message
        ];
        // save to DB
        $logEntry = $logsTable->newEntity($logsEntryData);
        $logsTable->save($logEntry);
    }

}