<?php

require 'vendor/autoload.php';

use kollex\Converter\Csv;
use kollex\Converter\Json;
use kollex\Mapper\CsvMapper;
use kollex\Mapper\JsonMapper;
use kollex\Service\ProductExportService;

$serviceA = new ProductExportService(new Csv('data/wholesaler_a.csv'), new CsvMapper());
$serviceB = new ProductExportService(new Json('data/wholesaler_b.json'), new JsonMapper());

echo "==============================";
echo "<pre>";
echo "CSV Display <br>";
print_r($serviceA->export());
echo "==============================";
echo "</pre>";

echo "==============================";
echo "<pre>";
echo "JSON Display <br>";
print_r($serviceB->export());
echo "==============================";
echo "</pre>";

/*
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
*/

// $test = new FileDataProvider(new Csv('data/wholesaler_a.csv'));
/*
$jsonData = new FileDataProvider(new Json('data/wholesaler_b.json'));
$mapJson = new MapDataProvider(new JsonMapper($jsonData->export()));

$csvData = new FileDataProvider(new Csv('data/wholesaler_a.csv'));
$mapCsv = new MapDataProvider(new CsvMapper($csvData->export()));

echo "<pre>";
echo "JSON Mapper";
print_r($mapJson->display());
echo "==============================";
echo "</pre>";

echo "<pre>";
echo "Csv Mapper";
print_r($mapCsv->display());
echo "==============================";
echo "</pre>";
*/
