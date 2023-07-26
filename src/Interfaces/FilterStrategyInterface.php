<?php

namespace App\Interfaces;

interface FilterStrategyInterface
{
    public function filter(OfferCollectionInterface $offers, ...$args): OfferCollectionInterface;

}
