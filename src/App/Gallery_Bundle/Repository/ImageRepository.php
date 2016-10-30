<?php

namespace App\Gallery_Bundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

class ImageRepository extends EntityRepository
{
    /**
     * @param int $albumId
     * @return QueryBuilder
     */
    public function getQueryImagesByAlbumId($albumId)
    {
        return $this->getEntityManager()
            ->createQueryBuilder()
            ->select('i')
            ->from('AppGallery_Bundle:Image', 'i')
            ->where('i.album = :id')
            ->addOrderBy('i.id')
            ->setParameter('id', $albumId)
            ->getQuery();
    }
}
