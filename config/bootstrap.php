<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Dotenv\Dotenv;

define('ROOT', dirname(__DIR__, 1));
$isDevMode = true;

$params = [];

$config = Setup::createAnnotationMetadataConfiguration([ROOT ."/app/entities/models"], $isDevMode);
$dotenv = Dotenv::create(ROOT);
$dotenv->load();
$connection = [
	'dbname' => getenv('DB_DATABASE'),
	'user' => getenv('DB_USERNAME'),
	'password' => getenv('DB_PASSWORD'),
	'host' => getenv('DB_HOST'),
	'driver' => getenv('DB_DRIVER'),
	'defaultDatabaseOptions' => [
		'charset' => 'utf8',
		'collate' => 'utf8_general_ci'
		]
];

$entityManager = EntityManager::create($connection, $config);