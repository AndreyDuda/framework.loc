<?php

namespace app\http\controllers;

use app\entities\query\brandQuery\BrandQuery;

class MainController extends AppController
{
	public function indexAction()
	{
	    $brands = new BrandQuery();
	    var_dump($brands);
		$this->setMeta('Главна страница', 'Описание...', 'Ключевые слова');
	}
}