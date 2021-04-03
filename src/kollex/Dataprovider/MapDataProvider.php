<?php


namespace kollex\Dataprovider;


class MapDataProvider implements MapDataInterface
{
    private $parsedData;

    public function __construct($parsedData)
    {
        $this->parsedData = $parsedData;
    }

    public function display(): array
    {
        return $this->parsedData->map();
    }
}
