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
	public $meta = [
		'title'    => '',
		'desc'     => '',
		'keywords' => ''
	];
	
	const PATH_VIEWS = SRC . '/views/';
	
	const PATH_LAYOUT = SRC . '/views/layout/';
	
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
		$this->meta = array_merge($this->meta, $meta);
		if ($layout === false) {
			$this->layout = false;
		} else {
			$this->layout = $layout ?: LAYOUT;
		}
	}
	
	public function render($data)
	{
		if(is_array($data)) {
			extract($data);
		}
		
		$viewFile = self::PATH_VIEWS . $this->prefix . $this->controller . '/' . $this->view . '.php';
		
		if (file_exists($viewFile)) {
			ob_start();
			require_once $viewFile;
			$content = ob_get_clean();
		} else {
			throw new \Exception("не найден вид " . $viewFile);
		}
		
		$layoutFile = ($this->layout === false)?: self::PATH_LAYOUT . $this->layout . '.php';
		if (file_exists($layoutFile)) {
			require_once $layoutFile;
		} else {
			throw new \Exception("не найден шаблон " . $layoutFile);
		}
	}
	
	public function getMeta()
	{
		$output  = '<title>' . $this->meta['title'] . '</title>' . PHP_EOL;
		$output .= '<meta name="description" content="' . $this->meta['desc'] .'">' . PHP_EOL;
		$output .= '<meta name="keywords" content="' . $this->meta['keywords'] .'">' . PHP_EOL;
		
		return $output;
	}
}