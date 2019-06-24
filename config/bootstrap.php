<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Dotenv\Dotenv;

define('PATH_ROOT', dirname(__DIR__, 1));
$isDevMode = true;

$params = [];

$config = Setup::createAnnotationMetadataConfiguration([PATH_ROOT ."/app/entities/models"], $isDevMode);
$dotenv = Dotenv::create(PATH_ROOT);
$dotenv->load();
$connection = [
	'dbname' => getenv('DB_DATABASE'),
	'user' => getenv('DB_USERNAME'),
	'password' => getenv('DB_PASSWORD'),
	'host' => getenv('DB_HOST'),
	'driver' => getenv('DB_DRIVER'),
	'charset' => 'utf8',
	'collate' => 'utf8_general_ci'
	
];

$entityManager = EntityManager::create($connection, $config);