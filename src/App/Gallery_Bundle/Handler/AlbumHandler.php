<?php

namespace App\Gallery_Bundle\Handler;

class AlbumHandler extends BaseHandler
{
    const FIRST_INDEX = 0;

    public function getListAlbumsWithImages()
    {
        $result = $this->getRepository()->selectAlbumsWithImages();
        $array = [];

        foreach ($result as $item) {
            $array[$item['albumId']]['id'] = $item['albumId'];
            $array[$item['albumId']]['title'] = $item['albumTitle'];
            $array[$item['albumId']]['images'][] =
                [
                    'path'=> $item[self::FIRST_INDEX]->getPath(),
                    'title'=> $item[self::FIRST_INDEX]->getTitle()
                ];
        }

        return $array;
    }
}
