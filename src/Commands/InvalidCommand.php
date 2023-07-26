<?php

namespace App\Commands;

class InvalidCommand extends Command
{
    public function execute(array $args): void
    {
        $response = [
            'error' => 'Invalid command or parameter',
        ];

        $this->outputHandler->displayJson($response);
    }
}
