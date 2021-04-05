<?php


namespace kollex\Dataprovider;

class FileDataProvider implements FileDataInterface
{
    private $filePath;

    public function __construct($filePath)
    {
        $this->filePath = $filePath;
    }

    public function export(): array
    {
        return $this->filePath->convert();
    }
}
