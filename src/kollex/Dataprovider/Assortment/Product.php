<?php


namespace kollex\Dataprovider\Assortment;


interface Product
{
    public function setId(string $id);
    public function setGtin(string $gtin);
    public function setManufacturer(string $manufacturer);
    public function setName(string $name);
    public function setPackaging(string $packaging);
    public function setBaseProductUnit(string $baseProductUnit);
    public function setBaseProductAmount(float $baseProductAmount);
    public function setBaseProductQuantity(int $baseProductQuantity);
}
