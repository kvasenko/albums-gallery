<?php

namespace App\Gallery_Bundle\Repository;

use App\Gallery_Bundle\Entity\Album;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Query\ResultSetMapping;


class AlbumRepository extends EntityRepository
{
    const LIMIT = 10;

    public function selectAlbumsWithImages()
    {
        $rsm = new ResultSetMapping();

        $query = 'SELECT i.id, i.title, i.path, a.id as albumId, a.title as albumTitle
                  FROM albums a
                    JOIN images i
                      ON a.id = i.album_id
                  WHERE
                    (
                      SELECT COUNT(*)
                      FROM images i2
                      WHERE i2.id <= i.id
                      AND i2.album_id = i.album_id
                    ) <= :limit
                  ORDER BY a.id DESC;';

        $rsm->addEntityResult('AppGallery_Bundle:Image', 'i');
        $rsm->addFieldResult('i','id', 'id');
        $rsm->addFieldResult('i','title', 'title');
        $rsm->addFieldResult('i','path', 'path');
        $rsm->addScalarResult('albumId', 'albumId');
        $rsm->addScalarResult('albumTitle', 'albumTitle');


        return $this->getEntityManager()
            ->createNativeQuery($query, $rsm)
            ->setParameter('limit', self::LIMIT)
            ->getResult();
    }
}
