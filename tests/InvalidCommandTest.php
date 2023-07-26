<?php

use App\Readers\JsonReader;
use App\Utility\LoggerFactory;
use App\Utility\OutputHandler;
use PHPUnit\Framework\TestCase;
use App\Commands\InvalidCommand;

class InvalidCommandTest extends TestCase
{
    public function testExecuteShouldReturnJsonErrorResponse()
    {
        $expectedResponse = [
            'error' => 'Invalid command or parameter',
        ];

        ob_start();

        $invalidCommand = new InvalidCommand( new JsonReader('data.json') , new OutputHandler() );
        $invalidCommand->execute([]);
        $actualOutput = ob_get_clean();

        $this->assertJsonStringEqualsJsonString(json_encode($expectedResponse), $actualOutput);
    }
}
