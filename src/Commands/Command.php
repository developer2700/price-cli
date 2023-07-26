<?php

namespace App\Commands;

use App\Interfaces\CommandInterface;
use App\Interfaces\ReaderInterface;
use App\Utility\OutputHandler;

abstract class Command implements CommandInterface
{
    public function __construct(public ReaderInterface $reader, public OutputHandler $outputHandler)
    {
    }
}
