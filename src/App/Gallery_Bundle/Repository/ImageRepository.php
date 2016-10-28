<?php

namespace App\Gallery_Bundle\Repository;

use Doctrine\ORM\EntityRepository;


class ImageRepository extends EntityRepository
{
    public function getQueryImagesByAlbum($albumId)
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
