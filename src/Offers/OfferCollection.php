<?php

namespace App\Offers;

use App\Interfaces\OfferCollectionInterface;
use App\Interfaces\OfferInterface;
use ArrayIterator;

class OfferCollection implements OfferCollectionInterface
{
    private array $offers = [];

    public function add(OfferInterface $offer): void
    {
        $this->offers[] = $offer;
    }

    public function get(int $index): OfferInterface
    {
        return $this->offers[$index];
    }

    public function count(): int
    {
        return count($this->offers);
    }

    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->offers);
    }
}
