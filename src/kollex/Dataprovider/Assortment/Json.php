<?php


namespace kollex\Dataprovider\Assortment;


class Json
{
    private $file;

    /**
     * Json constructor.
     */
    public function __construct($path) {
        $this->file = $path;
    }

    public function convert()
    {
        $fileContent = file_get_contents($this->file);

        return json_decode($fileContent, true);
    }
}
