<?php

namespace App\Commands;

class GetOffersAsJsonCommand extends Command
{
    public function execute(array $args): void
    {
        $offers = $this->reader->read();

        $offersData = [];
        foreach ($offers as $offer) {
            $offersData[] = [
                'offerId' => $offer->getOfferId(),
                'productTitle' => $offer->getProductTitle(),
                'vendorId' => $offer->getVendorId(),
                'price' => $offer->getPrice(),
            ];
        }

        $this->outputHandler->displayJson($offersData);
    }
}
