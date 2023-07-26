<?php

namespace App\Utility;

use App\Interfaces\OutputHandlerInterface;

class OutputHandler implements OutputHandlerInterface
{
    public function displayCount(int $count): void
    {
        echo "Count of filtered offers: {$count}" . PHP_EOL;
    }

    public function displayJson(array $data): void
    {
        echo json_encode($data, JSON_PRETTY_PRINT) . PHP_EOL;
    }

}
