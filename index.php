<?php

require 'vendor/autoload.php';

use kollex\Dataprovider\Assortment\Csv;
use kollex\Mapper\CsvMapper;

$csv = new Csv('data/wholesaler_a.csv');
$csvMap = new CsvMapper($csv->convert());

print_r($csvMap->map());
