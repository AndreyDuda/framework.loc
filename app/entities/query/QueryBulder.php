<?php

namespace app\entities\query;

use cms\App;

use Doctrine\DBAL\Driver\Connection;
use Doctrine\DBAL\Query\QueryBuilder;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class QueryBulder extends EntityRepository
{
    /** @var QueryBuilder */
    protected $connection;

    final public function __construct()
    {
        $this->connection = Connection::class;
    }
}