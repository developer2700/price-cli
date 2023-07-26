<?php

namespace App\Interfaces;

interface OfferInterface
{
    public function getOfferId(): int;
    public function getProductTitle(): string;
    public function getVendorId(): int;
    public function getPrice(): float;
}
