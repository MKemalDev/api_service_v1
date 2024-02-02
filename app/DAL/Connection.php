<?php


// Connection.php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration(
    [__DIR__ . "/Model"],
    $isDevMode
);

$conn = [
    'driver' => 'pdo_mysql',
    'user' => 'root',
    'password' => '',
    'dbname' => 'default_db',
];

$entityManager = EntityManager::create($conn, $config);
