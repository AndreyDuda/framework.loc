<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Dotenv\Dotenv;

require ROOT . "/vendor/autoload.php";
$isDevMode = true;

$params = [];

$config = Setup::createAnnotationMetadataConfiguration([ROOT . "/app/entities/models"], $isDevMode);
$dotenv = Dotenv::create(ROOT);
$dotenv->load();
$connection = [
	'dbname' => getenv('DB_DATABASE'),
	'user' => getenv('DB_USERNAME'),
	'password' => getenv('DB_PASSWORD'),
	'host' => getenv('DB_HOST'),
	'driver' => getenv('DB_DRIVER')
];

$entityManager = EntityManager::create($connection, $config);