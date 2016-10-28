<?php

namespace App\Gallery_Bundle\Repository;

use Doctrine\ORM\QueryBuilder;

use App\Gallery_Bundle\Entity\Image;
use Doctrine\ORM\EntityRepository;

class ImageRepository extends EntityRepository
{
    public function getQueryImagesByAlbum($albumId)
    {
        $query = 'SELECT i FROM AppGallery_Bundle:Image i WHERE i.album = :id ORDER BY i.id ASC';

        return $this->getEntityManager()
            ->createQuery($query)
            ->setParameter('id', $albumId);
    }
}
