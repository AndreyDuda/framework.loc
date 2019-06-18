<?php

require_once dirname(__DIR__) . '/app/config/init.php';
require_once CONFIG . '/routes.php';

use cms\App;

$test = new App();
var_dump(\cms\Router::getRoutes());
