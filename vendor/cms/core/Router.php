<?php

namespace cms;

class Router
{
	/** @var array */
	protected static $routes = [];
	/** @var array */
	protected static $route = [];
	
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
	 * @return mixed|string
	 */
	public static function dispatch(string $url)
	{
		return self::matchRoute($url) ? 'success' : 'error';
	}
	
	/**
	 * @param string $url
	 * @return bool
	 */
	public static function matchRoute(string $url): bool
	{
		return true;
	}
}