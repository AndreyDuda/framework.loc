<?php

namespace app\http\controllers;

class MainController extends AppController
{
	public function indexAction()
	{
		$this->setMeta('Главна страница', 'Описание...', 'Ключевые слова');
		$this->setData(['name' => 'Andrey', 'age' => 30]);
	}
}