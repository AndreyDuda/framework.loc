<?php

define('DEBUG', 1);
define('ROOT', dirname(__DIR__, 2));
define('WWW', ROOT . '/public' );
define('APP', ROOT . '/app');
define('CORE', ROOT . '/vendor/cms/core');
define('LIBS', ROOT . '/vendor/cms/core/libs');
define('CONFIG', APP . '/config');
define('LAYOUT', 'default');
define('ADMIN', ROOT . '/admin');

require_once ROOT . '/vendor/autoload.php';