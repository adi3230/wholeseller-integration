<?php


namespace kollex\Converter;

use kollex\Dataprovider\Assortment\DataProvider;

class Json implements DataProvider
{
    private string $file;

    /**
     * Json constructor.
     */
    public function __construct($path)
    {
        $this->file = $path;
    }

    public function getProducts(): array
    {
        $fileContent = file_get_contents($this->file);

        return json_decode($fileContent, true);
    }
}
