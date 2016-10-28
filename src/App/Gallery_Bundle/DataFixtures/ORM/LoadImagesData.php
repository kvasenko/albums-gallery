<?php
namespace App\Gallery_Bundle\DataFixtures\ORM;

use App\Gallery_Bundle\Entity\Image;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;


class LoadAImagesData implements FixtureInterface, ContainerAwareInterface, OrderedFixtureInterface
{
    const COUNT_IMAGES = 85;
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $albumRepo = $manager->getRepository('AppGallery_Bundle:Album');

        $albums = $albumRepo->findAll();

        $iterator = 1;

        while ($iterator < self::COUNT_IMAGES) {
            $image = new Image();
            $image->setTitle('title_' . uniqid());
            $image->setDescription('desc_' . uniqid());
            $image->setPath('/uploaded/test.jpg');

            if ($iterator % 20 === 0) {
                next($albums);
            }

            $current = current($albums);
            if (!$current) {
                break;
            }
            var_dump($current->getTitle());

            $image->setAlbum($current);
            $manager->persist($image);
            $iterator++;
        }

        $manager->flush();
    }


    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 2; // the order in which fixtures will be loaded
    }
}
