<?php

namespace App\Commands;

use App\Filters\VendorIdFilter;
use App\Interfaces\ReaderInterface;
use App\Utility\OutputHandler;

class CountByVendorIdCommand extends Command
{
    public function __construct(
        private VendorIdFilter $filter,
        public ReaderInterface $reader,
        public OutputHandler $outputHandler
    ) {
    }

    public function execute(array $args): void
    {
        $vendorId = (int) $args[0];
        $offers = $this->reader->read();
        $filteredOffers = $this->filter->filter($offers, $vendorId);

        $this->outputHandler->displayCount($filteredOffers->count());
    }
}
