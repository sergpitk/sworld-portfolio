<?php

namespace App\DataFixtures;

use App\Entity\Document;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Cocur\Slugify\SlugifyInterface;

class AppFixtures extends Fixture
{
    private $faker;

    private $slug;

    public function __construct(SlugifyInterface $slugify)
    {
        $this->faker = Factory::create();
        $this->slug = $slugify;
    }

    public function loadDocuments(ObjectManager $manager)
    {
        for ($i = 0; $i < 40; $i++) {
            $document = new Document();
            $document->setTitle($this->faker->text(20));
            $document->setFile($this->faker->text(20));
            $document->setCreated((new \DateTime('now')));
            $document->setPdfLink($this->slug->slugify($document->getTitle()));
            $document->setThumbnailFileName($this->faker->text(20));
            $document->setUserId($this->faker->randomNumber(2, true));
            $manager->persist($document);
        }
        $manager->flush();
    }

    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $this->loadDocuments($manager);
    }
}
