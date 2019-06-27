<?php

namespace cms;

class Registry
{
	use TSingletone;
	
	/**
	 * @var array
	 */
	protected static $properties = [];
	
	/**
	 * @param $name
	 * @param $value
	 */
	public function setProperty($name, $value): void
	{
		self::$properties[$name] = $value;
	}
	
	/**
	 * @param $name
	 * @return mixed|null
	 */
	public function getProperty($name)
	{
		return isset(self::$properties[$name]) ? self::$properties[$name] : null;
	}
	
	/**
	 * @return array
	 */
	public function getProperties(): array
	{
		return self::$properties;
	}
}