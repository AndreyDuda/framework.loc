<?php

namespace cms\base;

class Controller
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
	 * Controller constructor.
	 * @param array $route
	 */
	public function __construct(array $route)
	{
		$this->route = $route;
		$this->controller = $route['controller'];
		$this->model = $route['controller'];
		$this->view = $route['action'];
		$this->prefix = $route['prefix'];
		
	}
	
	/**
	 * @param $name
	 * @param $action
	 * @return \Exception
	 * @throws \Exception
	 */
	public function __call($name, $action): \Exception
	{
		throw new \Exception('Метод ' . $this->controller . '::' . $this->view .' не найден');
		die;
	}
	
	public function getView()
	{
		/** @var View $view */
		$view = new View($this->route, $this->layout, $this->view, $this->meta);
		$view->render($this->data);
	}
	
	/**
	 * @param array $data
	 */
	public function setData(array $data): void
	{
		$this->data = $data;
	}
	
	/**
	 * @param string $title
	 * @param string $desc
	 * @param string $keywords
	 */
	public function setMeta(string $title = '', string $desc = '', string $keywords = ''): void
	{
		$this->meta = [
			'title'    => $title,
			'desc'     => $desc,
			'keywords' => $keywords
		];
	}
}