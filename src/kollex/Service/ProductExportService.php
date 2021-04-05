<?php


namespace kollex\Service;

class ProductExportService implements ProductExportServiceInterface
{
    private $source;
    private $mapper;

    /**
     * ProductExportService constructor.
     * @param $source
     * @param $mapper
     */
    public function __construct($source, $mapper)
    {
        $this->source = $source;
        $this->mapper = $mapper;
    }

    public function export(): string
    {
        return json_encode($this->mapper->setData($this->source->getProducts())->map(), JSON_PRETTY_PRINT);
    }
}
