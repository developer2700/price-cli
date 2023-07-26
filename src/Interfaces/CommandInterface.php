<?php

namespace App\Interfaces;

interface CommandInterface
{
    public function execute(array $args): void;
}
