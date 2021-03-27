<?php


namespace kollex\Mapper;


use Exception;

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
            $product = [];

            $product['id'] = $wholesellerProduct[0];
            $product['gtin'] = $wholesellerProduct[1];
            $product['manufacturer'] = $wholesellerProduct[2];
            $product['name'] = $wholesellerProduct[3];
            $product['packaging'] = $this->productPackaging[strtolower(explode(' ', $wholesellerProduct[5])[0])];
            $product['baseProductPackaging'] = $this->baseProductPackaging[strtolower($wholesellerProduct[7])];
            $product['baseProductUnit'] = $this->productUnits[substr($wholesellerProduct[8], -1)];
            $product['baseProductAmount'] = substr($wholesellerProduct[8], 0 , -1);
            $product['baseProductQuantity'] = explode(' ', $wholesellerProduct[5])[1];

            $mappedProduct[] = $product;

        }

        return $mappedProduct;
    }
}
