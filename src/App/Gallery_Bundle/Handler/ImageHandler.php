<?php

namespace App\Gallery_Bundle\Handler;

use Doctrine\ORM\QueryBuilder;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Knp\Component\Pager\Paginator;

class ImageHandler extends BaseHandler
{
    protected $paginator;

    /**
     * @param ObjectManager $om
     * @param $entityClass
     * @param Paginator $paginator
     */
    public function __construct(
        ObjectManager $om,
        $entityClass,
        Paginator $paginator
    ) {
        $this->paginator = $paginator;

        parent::__construct($om, $entityClass);
    }

    /**
     * @param int $albumId
     * @return QueryBuilder
     */
    public function getImagesByAlbumId($albumId)
    {
        return $this->getRepository()->getQueryImagesByAlbumId($albumId);
    }

    /**
     * @param Request $request
     * @return Paginator
     */
    public function setUpPaginator(Request $request)
    {
        $query = $this->getImagesByAlbumId($request->get('id'));

        return  $this->paginator->paginate(
            $query,
            $request->get('page', 1),
            10
        );


    }
}
