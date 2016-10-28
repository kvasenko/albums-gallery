<?php

namespace App\Gallery_Bundle\Repository;

use App\Gallery_Bundle\Entity\Album;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Query\ResultSetMapping;


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

    public function selectAlbumsWithImages()
    {
        $rsm = new ResultSetMapping();

        $query = 'SELECT a.*, (SELECT GROUP_CONCAT(CONCAT(\'{"path": "\', i.path, \'", "imageTitle": "\', i.title,\'"}\')) FROM (SELECT im.* FROM images im LIMIT 10) i) arrayImages FROM albums a;';

        $rsm->addEntityResult('AppGallery_Bundle:Album', 'a');
        $rsm->addFieldResult('a','id','id');
        $rsm->addFieldResult('a','title','title');
        $rsm->addScalarResult('arrayImages','arrayImages');

        return $this->getEntityManager()
            ->createNativeQuery($query, $rsm)
            ->getResult();
    }
}
