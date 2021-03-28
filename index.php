<?php

require 'vendor/autoload.php';

use kollex\Dataprovider\Assortment\Csv;
use kollex\Dataprovider\Assortment\Json;
use kollex\Mapper\CsvMapper;
use kollex\Mapper\JsonMapper;

$csv = new Csv('data/wholesaler_a.csv');
$csvMap = new CsvMapper($csv->convert());

$json = new Json('data/wholesaler_b.json');
$jsonMap = new JsonMapper($json->convert());


echo "<pre>";
echo "JSON Mapper";
print_r($jsonMap->map());
echo "==============================";
echo "</pre>";

echo "<pre>";
echo "CSV Mapper";
print_r($csvMap->map());
echo "==============================";
echo "</pre>";
