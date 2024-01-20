<?php

namespace app\Services;

use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class LogService
{
    public static function log(string $message, Level $level = Level::Warning): void
    {
        $log = new Logger('app');
        $log->pushHandler(new StreamHandler('app.log', $level));
        $log->log($level, $message);
    }
}