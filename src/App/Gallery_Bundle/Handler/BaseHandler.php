<?php
/**
 * Created by PhpStorm.
 * User: kvasenko
 * Date: 28.10.16
 * Time: 10:27
 */

namespace App\Gallery_Bundle\Handler;

use Doctrine\Common\Persistence\ObjectManager;


class BaseHandler
{
    protected $om;

    protected $entityClass;

    protected $repository;

    public function __construct(
        ObjectManager $om,
        $entityClass
    ) {
        $this->om = $om;
        $this->entityClass = $entityClass;
        $this->repository = $this->om->getRepository($this->entityClass);
    }

    public function getRepository()
    {
        return $this->repository;
    }
}
