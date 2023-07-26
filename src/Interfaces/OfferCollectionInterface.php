<?php

namespace App\Interfaces;

use IteratorAggregate;

interface OfferCollectionInterface extends IteratorAggregate
{
    public function add(OfferInterface $offer): void;
    public function get(int $index): OfferInterface;
    public function count(): int;
}
