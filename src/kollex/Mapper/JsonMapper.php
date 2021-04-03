<?php


namespace kollex\Mapper;

use Exception;
use kollex\Dataprovider\Assortment\BaseProduct;

class JsonMapper implements MapperInterface
{
    private $jsonArray;

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
     * JsonMapper constructor.
     * @param $jsonArray
     */
    public function __construct($jsonArray)
    {
        $this->jsonArray = $jsonArray;
    }

    public function map(): array
    {
        $mappedProduct = [];

        if(empty($this->jsonArray))
        {
            throw new Exception('Please provide an array');
        }

        foreach ($this->jsonArray['data'] as $wholesellerProduct)
        {
            $product = new BaseProduct();
            $product->setId($wholesellerProduct['PRODUCT_IDENTIFIER']);
            $product->setGtin($wholesellerProduct['EAN_CODE_GTIN']);
            $product->setManufacturer($wholesellerProduct['BRAND']);
            $product->setName($wholesellerProduct['NAME']);
            $product->setPackaging($this->productPackaging[strtolower(explode(' ', $wholesellerProduct['PACKAGE'])[0])]);
            $product->setBaseProductPackaging($this->baseProductPackaging[strtolower($wholesellerProduct['VESSEL'])]);
            $product->setBaseProductUnit($this->productUnits['l']);
            $product->setBaseProductAmount(str_replace(',', '.', $wholesellerProduct['LITERS_PER_BOTTLE']));
            $product->setBaseProductQuantity($wholesellerProduct['BOTTLE_AMOUNT']);

            $mappedProduct[] = $product;
        }

        return $mappedProduct;
    }

}
