<?php

namespace App\Gallery_Bundle\Controller;

use Symfony\Component\HttpFoundation\Request;

class AlbumsController extends BaseController
{
    protected $entityName = 'album';
    protected $handlerName = 'app_gallery.album.handler';

    public function listAction(Request $request)
    {
        $albums = $this->getHandler()->getListAlbumsWithImages();

        return $this->render('AppGallery_Bundle:Albums:index.html.twig', ['albums' => $albums]);
    }

    public function detailsAction(Request $request)
    {
        $this->handlerName = 'app_gallery.image.handler';

        $pagination = $this->getHandler()->setUpPaginator($request);

        return $this->render('AppGallery_Bundle:Albums:details.html.twig', ['pagination' => $pagination]);
    }
}
