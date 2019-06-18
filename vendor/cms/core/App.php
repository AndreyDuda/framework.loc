<?php

namespace cms;

class App
{
	/**
	 * @var Registry
	 */
	public static $app;
	
	public function __construct()
	{
		$query = trim($_SERVER['REQUEST_URI'], '/');
		session_start();
		self::$app = Registry::instance();
		$this->getParams();
		new ErrorHandler();
		Router::dispatch($query);
	}
	
	protected function getParams(): void
	{
		$params = require_once CONFIG . '/params.php';
		if(!empty($params)) {
			foreach ($params as $key => $value) {
				self::$app->setProperty($key, $value);
			}
		}
	}
}