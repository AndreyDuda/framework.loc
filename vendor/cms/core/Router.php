<?php

namespace cms;

class Router
{
	/** @var array */
	protected static $routes = [];
	/** @var array */
	protected static $route = [];
	
	CONST PATH_CONTROLLER = 'app\http\controllers\\';
	
	public static function add(string $regexp, array $route = []): void
	{
		self::$routes[$regexp] = $route;
	}
	
	/**
	 * @return array
	 */
	public static function getRoutes(): array
	{
		return self::$routes;
	}
	
	/**
	 * @return array
	 */
	public static function getRoute(): array
	{
		return self::$route;
	}
	
	/**
	 * @param string $url
	 */
	public static function dispatch(string $url)
	{
		if (self::matchRoute($url)) {
			$controller = self::PATH_CONTROLLER . self::$route['prefix'] . self::$route['controller'] . 'Controller';
			if (class_exists($controller)) {
				$controller = new $controller(self::$route);
				$action = self::lowerCamelCase(self::$route['action']) . 'Action';
				if (method_exists($controller, $action)) {
					return $controller->$action();
				} else {
					return $controller->$action();
				}
			} else {
				throw new \Exception('Контроллер' . $controller . ' не найден', 404);
			}
		} else {
			throw new \Exception('Страница не найдено', 404);
		}
	}
	
	/**
	 * @param string $url
	 * @return bool
	 */
	public static function matchRoute(string $url): bool
	{
		foreach (self::$routes as $pattern => $route) {
			if (preg_match("~{$pattern}~", $url, $matches)) {
				foreach ($matches as $k => $v) {
					if (is_string($k)) {
						$route[$k] = $v;
					}
				}
				if (empty($route['action'])) {
					$route['action'] = 'index';
				}
				if (!isset($route['prefix'])) {
					$route['prefix'] = '';
				} else {
					$route['prefix'] .= '\\';
				}
				$route['controller'] = self::upperCamelCase($route['controller']);
				self::$route = $route;
				return true;
			}
		}
		return false;
	}
	
	/**
	 * @param string $name
	 * @return string
	 */
	protected static function upperCamelCase(string $name): string
	{
		$name = ucwords(str_replace('-', ' ', $name));
		return str_replace(' ', '', $name);
	}
	
	protected static function lowerCamelCase($name)
	{
		return lcfirst(self::upperCamelCase($name));
	}
	
}