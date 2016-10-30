<?php

namespace App\Gallery_Bundle\Handler;

class ImageHandler extends BaseHandler
{
    public function getImagesByAlbumId($albumId)
    {
        return $this->getRepository()->getQueryImagesByAlbumId($albumId);
    }
}
