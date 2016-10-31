<?php

namespace App\Gallery_Bundle\Tests\Repository;

class ImagesRepositoryTest extends DoctrineTestCase
{
    const COUNT_IMAGES = 45;

    /**
     * Set up repository test
     */
    public function setUp()
    {
        parent::setUp();

        $this->em->beginTransaction();
        $this->loadFixturesFromDirectory(__DIR__ . '/../../DataFixtures/ORM');
    }

    /**
     * @return null
     */
    public function tearDown()
    {
        $this->em->rollback();
    }

    public function testGetQueryImagesByAlbumId()
    {
        $image = $this->getRepository()
            ->findOneBy([]);

        $albumId = $image->getAlbum()->getId();

        $results = $this->getRepository()->getQueryImagesByAlbumId($albumId)->execute();

        $this->assertEquals(count($results), 20);
    }

    /**
     * Returns repository
     *
     * @return \App\Gallery_Bundle\Repository\AlbumRepository
     */
    protected function getRepository()
    {
        return $this->em->getRepository('App\Gallery_Bundle\Entity\Image');
    }
}
