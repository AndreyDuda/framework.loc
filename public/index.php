<?php


require_once dirname(__DIR__) . '/app/config/init.php';
require_once ROOT . "/vendor/autoload.php";
require_once ROOT . '/config/bootstrap.php';
require_once CONFIG . '/routes.php';

use cms\App;

$test = new App();