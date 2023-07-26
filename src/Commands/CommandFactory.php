<?php

namespace App\Commands;

use App\Filters\PriceRangeFilter;
use App\Filters\VendorIdFilter;
use App\Interfaces\ReaderInterface;
use App\Interfaces\OutputHandlerInterface;
use App\Interfaces\CommandInterface;
use Psr\Log\LoggerInterface;

class CommandFactory
{
    public function __construct(
        private ReaderInterface $reader,
        private OutputHandlerInterface $outputHandler,
        private LoggerInterface $logger
    ) {
    }

    public function createCommand(string $commandName): CommandInterface
    {
        return match ($commandName) {
            'count_by_price_range' => new CountByPriceRangeCommand(new PriceRangeFilter($this->logger), $this->reader, $this->outputHandler),
            'count_by_vendor_id' => new CountByVendorIdCommand(new VendorIdFilter($this->logger), $this->reader, $this->outputHandler),
            'get_offers_as_json' => new GetOffersAsJsonCommand($this->reader, $this->outputHandler),
            default => new InvalidCommand($this->reader, $this->outputHandler),
        };
    }
}
