<?php

namespace App\Gallery_Bundle\Handler;

use Doctrine\ORM\QueryBuilder;

class ImageHandler extends BaseHandler
{
    /**
     * @param int $albumId
     * @return QueryBuilder
     */
    public function getImagesByAlbumId($albumId)
    {
        return $this->getRepository()->getQueryImagesByAlbumId($albumId);
    }
}
