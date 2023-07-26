<?php

namespace App\Filters;

use App\Interfaces\FilterStrategyInterface;
use App\Interfaces\OfferCollectionInterface;
use App\Offers\OfferCollection;
use Psr\Log\LoggerInterface;

class PriceRangeFilter implements FilterStrategyInterface
{
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function filter(OfferCollectionInterface $offers, ...$args): OfferCollectionInterface
    {
        $priceFrom = (float) $args[0];
        $priceTo = (float) $args[1];

        $filteredOffers = new OfferCollection();
        foreach ($offers as $offer) {
            if ($offer->getPrice() >= $priceFrom && $offer->getPrice() <= $priceTo) {
                $filteredOffers->add($offer);
            }
        }

        $log = sprintf('Filtering offers by priceFrom %f and priceTo %f', $priceFrom, $priceTo);
        $this->logger->info($log);

        return $filteredOffers;
    }
}
