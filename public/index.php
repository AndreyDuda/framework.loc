<?php

require_once dirname(__DIR__) . '/app/config/init.php';

use cms\App;

$test = new App();
throw new Exception('Страница не найдена', 404);