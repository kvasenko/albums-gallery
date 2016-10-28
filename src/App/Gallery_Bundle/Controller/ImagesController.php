<?php

namespace App\Gallery_Bundle\Controller;


class ImagesController extends BaseController
{
    protected $collectionName = 'images';
    protected $entityName = 'image';
    protected $handlerName = 'app_gallery.image.handler';

    public function indexAction()
    {
        return $this->render('AppGallery_Bundle:Default:index.html.twig');
    }
}
