<?php

namespace app\entities\query\brandQuery;

use app\entities\query\QueryBulder;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper;

class BrandQuery extends QueryBulder
{
    public function fetch($id)
    {
        $query = Ent;
        return EntityManager::CreateQueryBuilder()
            ->from('brands')
            ->getDQL();
    }
}