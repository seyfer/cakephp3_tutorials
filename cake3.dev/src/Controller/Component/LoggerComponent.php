<?php

namespace App\Controller\Component;

use Cake\Controller\Component;

class LoggerComponent extends Component
{
    public function readLogsFromFile($fileName)
    {
        $file = ROOT . DS . 'logs' . DS . $fileName . '.log';
        if (file_exists($file)) {
            $logs = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

            return $logs;
        }

        return [];
    }

}
