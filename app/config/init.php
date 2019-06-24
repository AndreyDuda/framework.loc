<?php
$app_path = preg_replace('#[^/]+$#', '', 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']);
$app_path = str_replace('/public/', '', $app_path);

define('LAYOUT', 'default');
define('DEBUG', 1);
define('ROOT', dirname(__DIR__, 2));
define('HOME',   $app_path);
define('ADMIN',  HOME .'/admin');
define('WWW',    ROOT . '/public' );
define('SRC',    ROOT . '/resource' );
define('APP',    ROOT . '/app');
define('CORE',   ROOT . '/vendor/cms/core');
define('LIBS',   ROOT . '/vendor/cms/core/libs');
define('CONFIG', APP . '/config');