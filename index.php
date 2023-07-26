<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Utility\LoggerFactory;
use App\Utility\OutputHandler;
use App\Readers\JsonReader;
use App\Filters\PriceRangeFilter;
use App\Filters\VendorIdFilter;
use App\Commands\CommandFactory;

$logger = LoggerFactory::createLogger('logs/app.log');
$outputHandler = new OutputHandler();

$jsonEndpoint = 'data.json';
$reader = new JsonReader($jsonEndpoint);
$priceRangeFilter = new PriceRangeFilter($logger);
$vendorIdFilter = new VendorIdFilter($logger);

$commandFactory = new CommandFactory($reader, $outputHandler, $logger);

$commandName = $argv[1] ?? '';
$args = array_slice($argv, 2);

$command = $commandFactory->createCommand($commandName);
$command->execute($args);
