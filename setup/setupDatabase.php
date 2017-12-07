<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Itb\ProductRepository;

$productRepository = new ProductRepository();

$productRepository->dropTable();
$productRepository->createTable();

//$productRepository->deleteAll();

$productRepository->insert('hammer', 9.99);
$productRepository->insert('nail', 0.1);
$productRepository->insert('socket', 0.99);
$productRepository->insert('ladder', 17);

