<?php

namespace cms\base;

class View
{
	/**
	 * @var string
	 */
	public $route;
	
	/**
	 * @var string
	 */
	public $controller;
	
	/**
	 * @var string
	 */
	public $model;
	
	/**
	 * @var string
	 */
	public $view;
	
	/**
	 * @var string
	 */
	public $prefix;
	
	/**
	 * @var string
	 */
	public $layout;
	
	/**
	 * @var array
	 */
	public $data = [];
	
	/**
	 * @var array
	 */
	public $meta = [];
	
	/**
	 * View constructor.
	 * @param array $route
	 * @param string $layout
	 * @param string $view
	 * @param array $meta
	 */
	public function __construct(array $route, string $layout = '', string $view = '', array $meta)
	{
		$this->route = $route;
		$this->controller = $route['controller'];
		$this->model = $route['controller'];
		$this->view = $view;
		$this->prefix = $route['prefix'];
		$this->meta = $meta;
		if ($layout === false) {
			$this->layout = false;
		} else {
			$this->layout = $layout ?: LAYOUT;
		}
	}
}