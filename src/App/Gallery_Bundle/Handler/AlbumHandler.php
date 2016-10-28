<?php

namespace App\Gallery_Bundle\Handler;


class AlbumHandler extends BaseHandler
{
    protected $tableAlias = 'a.';

    public function listAlbums()
    {
        $albums = $this->getRepository()->selectAlbumsWithImages();

        foreach ($albums as &$album) {
            $album['arrayImages'] = json_decode('[' . $album['arrayImages'] . ']');
        }
        return $albums;
    }
}
