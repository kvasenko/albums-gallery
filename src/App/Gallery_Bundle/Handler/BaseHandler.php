<?php

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
