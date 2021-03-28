<?php


namespace kollex\Mapper;


use Exception;
use kollex\Dataprovider\Assortment\BaseProduct;

class CsvMapper
{
    private $csvArray;

    private $baseProductPackaging = array(
        'bottle' => 'BO',
        'can' => 'CN'
    );

    private $productPackaging = array(
        'bottle' => 'BO',
        'box' => 'BX',
        'case' => 'CA',
        'single' => 'BO'
    );

    private $productUnits = array(
        'l' => 'LT',
        'g' => 'GR'
    );

    /**
     * CsvMapper constructor.
     * @param $csvArray
     */
    public function __construct($csvArray)
    {
        $this->csvArray = $csvArray;
    }

    public function map(): array
    {
        $mappedProduct = [];
        // Remove first object
        array_shift($this->csvArray);
        if(empty($this->csvArray))
        {
            throw new Exception('Please provide an array!');
        }
        foreach($this->csvArray as $wholesellerProduct)
        {
            $product = new BaseProduct();
            $product->setId($wholesellerProduct[0]);
            $product->setGtin($wholesellerProduct[1]);
            $product->setManufacturer($wholesellerProduct[2]);
            $product->setName($wholesellerProduct[3]);
            $product->setPackaging($this->productPackaging[strtolower(explode(' ', $wholesellerProduct[5])[0])]);
            $product->setBaseProductPackaging($this->baseProductPackaging[strtolower($wholesellerProduct[7])]);
            $product->setBaseProductUnit($this->productUnits[substr($wholesellerProduct[8], -1)]);
            $product->setBaseProductAmount(substr($wholesellerProduct[8], 0 , -1));
            if ($wholesellerProduct[5] == 'single') {
                $product->setBaseProductQuantity(1);
            }
            else {
                $product->setBaseProductQuantity(explode(' ', $wholesellerProduct[5])[1]);
            }

            $mappedProduct[] = $product;
        }

        return $mappedProduct;
    }
}
