<?php

namespace app\http\controllers;

class MainController extends AppController
{
	public function indexAction()
	{
		var_dump($this->route);
		echo 'MainController -> indexAction';
	}
}