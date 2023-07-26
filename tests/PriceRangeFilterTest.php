<?php

use App\Utility\LoggerFactory;
use PHPUnit\Framework\TestCase;
use App\Filters\PriceRangeFilter;
use App\Offers\OfferCollection;
use App\Offers\Offer;

class PriceRangeFilterTest extends TestCase
{
    public function testFilterOffersByPriceRange()
    {
        $logFilePath = '../logs/app.log';
        $logger = LoggerFactory::createLogger($logFilePath);

        $filter = new PriceRangeFilter($logger);
        $offers = new OfferCollection();

        $offer1 = new Offer(1, 'Product A', 1, 100.0);
        $offer2 = new Offer(2, 'Product B', 2, 150.0);
        $offer3 = new Offer(3, 'Product C', 3, 200.0);

        $offers->add($offer1);
        $offers->add($offer2);
        $offers->add($offer3);

        $filteredOffers = $filter->filter($offers, 120.0, 180.0);

        $this->assertCount(1, $filteredOffers);
        $this->assertEquals(150.0, $filteredOffers->get(0)->getPrice());
    }
}
