<?php

namespace App\Filters;

use App\Interfaces\FilterStrategyInterface;
use App\Interfaces\OfferCollectionInterface;
use App\Offers\OfferCollection;
use Psr\Log\LoggerInterface;

class VendorIdFilter implements FilterStrategyInterface
{
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function filter(OfferCollectionInterface $offers, ...$args): OfferCollectionInterface
    {
        $vendorId = (int) $args[0];

        $filteredOffers = new OfferCollection();
        foreach ($offers as $offer) {
            if ($offer->getVendorId() === $vendorId) {
                $filteredOffers->add($offer);
            }
        }
        $log = sprintf('Filtering offers by VendorId %d', $vendorId);
        $this->logger->info($log);

        return $filteredOffers;
    }
}
