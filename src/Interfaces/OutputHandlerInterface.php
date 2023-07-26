<?php

namespace App\Interfaces;

interface OutputHandlerInterface
{
    public function displayCount(int $count): void;
    public function displayJson(array $data): void;
}
