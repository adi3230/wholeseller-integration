<?php


namespace kollex\Converter;


class Json implements ConverterInterface
{
    private $file;

    /**
     * Json constructor.
     */
    public function __construct($path) {
        $this->file = $path;
    }

    public function convert(): array
    {
        $fileContent = file_get_contents($this->file);

        return json_decode($fileContent, true);
    }
}
