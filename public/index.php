<?php

require_once dirname(__DIR__) . '/app/config/init.php';

use cms\App;

$test = new App();
var_dump($test::$app->getProperties());