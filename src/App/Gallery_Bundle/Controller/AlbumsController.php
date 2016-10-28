<?php

namespace App\Gallery_Bundle\Controller;

use Symfony\Component\HttpFoundation\Request;


class AlbumsController extends BaseController
{
    protected $collectionName = 'albums';
    protected $entityName = 'album';
    protected $handlerName = 'app_gallery.album.handler';

    public function listAction(Request $request)
    {
        var_dump($this->getHandler()->all());

        return $this->render('AppGallery_Bundle:Albums:index.html.twig');
    }

    public function detailsAction(Request $request)
    {
        $this->handlerName = 'app_gallery.image.handler';

        $query = $this->getHandler()->getImagesByAlbum($request->get('id'));

        $paginator  = $this->get('knp_paginator');

        $pagination = $paginator->paginate(
            $query,
            $request->get('page', 1),
            5
        );

        return $this->render('AppGallery_Bundle:Albums:details.html.twig', array('pagination' => $pagination));
    }

}
