<?php

namespace App\Utility;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class LoggerFactory
{
    public static function createLogger(string $logFilePath): Logger
    {
        $logger = new Logger('app');
        $logger->pushHandler(new StreamHandler($logFilePath, Logger::INFO));

        return $logger;
    }
}
