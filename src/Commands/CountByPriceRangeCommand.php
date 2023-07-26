<?php

namespace App\Commands;

use App\Filters\PriceRangeFilter;
use App\Interfaces\ReaderInterface;
use App\Utility\OutputHandler;

class CountByPriceRangeCommand extends Command
{
    public function __construct(
        private PriceRangeFilter $filter,
        public ReaderInterface $reader,
        public OutputHandler $outputHandler
    ) {
    }

    public function execute(array $args): void
    {
        $priceFrom = (float) $args[0];
        $priceTo = (float) $args[1];
        $offers = $this->reader->read();
        $filteredOffers = $this->filter->filter($offers, $priceFrom, $priceTo);

        $this->outputHandler->displayCount($filteredOffers->count());
    }
}
