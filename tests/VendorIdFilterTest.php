<?php

use App\Utility\LoggerFactory;
use PHPUnit\Framework\TestCase;
use App\Filters\VendorIdFilter;
use App\Offers\OfferCollection;
use App\Offers\Offer;

class VendorIdFilterTest extends TestCase
{
    public function testFilterOffersByVendorId()
    {
        $logFilePath = '../logs/app.log';
        $logger = LoggerFactory::createLogger($logFilePath);

        $filter = new VendorIdFilter($logger);
        $offers = new OfferCollection();

        $offer1 = new Offer(1, 'Product A', 1, 100.0);
        $offer2 = new Offer(2, 'Product B', 2, 150.0);
        $offer3 = new Offer(3, 'Product C', 1, 200.0);

        $offers->add($offer1);
        $offers->add($offer2);
        $offers->add($offer3);

        $filteredOffers = $filter->filter($offers, 1);

        $this->assertCount(2, $filteredOffers);
        $this->assertEquals(100.0, $filteredOffers->get(0)->getPrice());
        $this->assertEquals(200.0, $filteredOffers->get(1)->getPrice());
    }
}
