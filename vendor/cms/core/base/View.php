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
	public function __construct(array $route, $layout = '', string $view = '', array $meta)
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
	
	public function render($data)
	{
		$viewFile = APP . '/views/' . $this->prefix . $this->controller . '/' . $this->view . 'php';
		
		if (is_file($viewFile)) {
			ob_start();
			require_once $viewFile;
			$content = ob_get_clean();
		} else {
			throw new \Exception("не найден вид " . $viewFile);
		}
		
		if ($this->layout !== $this->layout)
		{
			echo $layoutFile = APP . '/view/layouts/' . $this->layout . '.php';
			if (is_file($layoutFile)) {
				require_once $layoutFile;
			} else {
				throw new \Exception("не найден вид " . $this->layout);
			}
		}
	}
}