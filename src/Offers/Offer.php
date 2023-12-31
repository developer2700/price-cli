<?php

namespace App\Offers;

use App\Interfaces\OfferInterface;

class Offer implements OfferInterface
{
    public function __construct(
        private int $offerId,
        private string $productTitle,
        private int $vendorId,
        private float $price
    ) {
    }

    public function getOfferId(): int
    {
        return $this->offerId;
    }

    public function getProductTitle(): string
    {
        return $this->productTitle;
    }

    public function getVendorId(): int
    {
        return $this->vendorId;
    }

    public function getPrice(): float
    {
        return $this->price;
    }
}
