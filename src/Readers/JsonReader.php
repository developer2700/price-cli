<?php

namespace App\Readers;

use App\Interfaces\ReaderInterface;
use App\Interfaces\OfferCollectionInterface;
use App\Offers\Offer;
use App\Offers\OfferCollection;

class JsonReader implements ReaderInterface
{
    private string $jsonFilePath;

    public function __construct(string $jsonFilePath)
    {
        $this->jsonFilePath = $jsonFilePath;
    }

    public function read(): OfferCollectionInterface
    {
        $jsonContent = file_get_contents($this->jsonFilePath);

        if ($jsonContent === false) {
            throw new \RuntimeException("Failed to read JSON data from '{$this->jsonFilePath}'");
        }

        $data = json_decode($jsonContent, true);

        if ($data === null) {
            throw new \RuntimeException("Failed to parse JSON data from '{$this->jsonFilePath}'");
        }

        $offers = new OfferCollection();
        foreach ($data as $item) {
            $offer = new Offer($item['offerId'], $item['productTitle'], $item['vendorId'], $item['price']);
            $offers->add($offer);
        }

        return $offers;
    }
}
