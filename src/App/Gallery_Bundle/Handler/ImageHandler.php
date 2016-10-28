<?php

namespace App\Gallery_Bundle\Handler;

use App\Gallery_Bundle\Entity\Image;
use Doctrine\Common\Persistence\ObjectManager;


class ImageHandler extends BaseHandler
{
    protected $tableAlias = 'i.';

    public function getImagesByAlbum(int $albumId)
    {
        return $this->getRepository()->getQueryImagesByAlbum($albumId);
    }
}
