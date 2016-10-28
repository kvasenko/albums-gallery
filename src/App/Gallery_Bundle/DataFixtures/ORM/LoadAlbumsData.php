<?php
namespace App\Gallery_Bundle\DataFixtures\ORM;

use App\Gallery_Bundle\Entity\Album;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;


class LoadAlbumsData implements FixtureInterface, OrderedFixtureInterface
{
    public static $albums = [
        [
            'title' => 'Album 1',
            'description' => 'desc 1'
        ],
        [
            'title' => 'Album 2',
            'description' => 'desc 2'
        ],
        [
            'title' => 'Album 3',
            'description' => 'desc 3'
        ],
        [
            'title' => 'Album 4',
            'description' => 'desc 4'
        ],
        [
            'title' => 'Album 5',
            'description' => 'desc 5'
        ],
    ];

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        foreach (self::$albums as $item) {
            $album = new Album();
            $album->setTitle($item['title']);
            $album->setDescription($item['description']);
            $manager->persist($album);
        }

        $manager->flush();
    }


    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }

}
