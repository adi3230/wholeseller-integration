<?php


namespace kollex\Service;

class ProductExportService implements ProductExportServiceInterface
{
    private $source;
    private $mapper;

    /**
     * ProductExportService constructor.
     */
    public function __construct($source, $mapper)
    {
        $this->source = $source;
        $this->mapper = $mapper;
    }

    public function export(): array
    {
       return $this->mapper->setData($this->source->convert())->map();
    }
}
