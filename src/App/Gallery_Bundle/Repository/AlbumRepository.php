<?php

namespace App\Gallery_Bundle\Repositories;

use App\Gallery_Bundle\Entity\Album;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;


class AlbumRepository extends EntityRepository
{
    /**
     * @param QueryBuilder $builder
     * @return QueryBuilder
     */
    protected function getSelect(QueryBuilder $builder)
    {
        return $builder->select('a')
            ->from('AppGallery_Bundle:Album', 'a');
    }
}
