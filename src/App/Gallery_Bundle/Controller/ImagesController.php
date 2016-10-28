<?php

namespace App\Gallery_Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ImagesController extends Controller
{
    public function indexAction()
    {
        return $this->render('AppGallery_Bundle:Default:index.html.twig');
    }
}
