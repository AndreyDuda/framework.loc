<?php

namespace app\entities\query;

use cms\App;
use Doctrine\DBAL\Query\QueryBuilder;
use Doctrine\ORM\EntityManager;

class QueryBulder
{
    /** @var QueryBuilder */
    protected $connection;

    final public function __construct()
    {
        $this->connection = App::$em->createQueryBuilder();
    }
}