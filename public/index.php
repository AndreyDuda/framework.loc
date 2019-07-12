<?php

require_once dirname(__DIR__) . '/app/config/init.php';
require_once ROOT . "/vendor/autoload.php";
require_once ROOT . '/config/bootstrap.php';
require_once CONFIG . '/routes.php';

use cms\App;

$test = new App($entityManager);

/*$test = new \app\entities\models\User();
$test->setName('Андрей');
$test->setEmail('qwe@qwe.we');
$test->setPassword('1111');
$entityManager->persist($test);

$entityManager->flush();
var_dump($test);*/

/*$productRepository = $entityManager->getRepository(\app\entities\models\User::class);
$products = $productRepository->find(3);
var_dump($products);
echo $products->getName();
foreach ($products as $product) {
	echo $product->getName();

}*/