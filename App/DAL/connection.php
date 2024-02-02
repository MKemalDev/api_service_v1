<?php
require_once __DIR__ . "/../../vendor/autoload.php";

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration(
    [__DIR__ . "/Models"],
    $isDevMode,
    null,
    null,
    false
);

$conn = [
    'driver' => 'pdo_mysql',
    'host' => 'localhost',
    'user' => 'root',
    'password' => '',
    'dbname' => 'default_db',
];

$entityManager = EntityManager::create($conn, $config);