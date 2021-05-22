<?php

namespace App\DataFixtures;

use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Articles;
use Faker;

class AppFixtures extends Fixture
{
    public const ARTICLE_REFERENCE = 'article';

    public function load(ObjectManager $manager)
    {

        $faker = Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $art = new Articles();
            $art->setTitle($faker->catchPhrase());
            $art->setSubtitle($faker->catchPhrase());
            $art->setCreatedAt(new DateTime());
            $art->setAuthor($faker->name());
            $art->setBody($faker->realText());
            $art->setImage($faker->imageUrl(640, 480, 'animals', true));
            $manager->persist($art);

        }
        $this->addReference(self::ARTICLE_REFERENCE, $art);


        $manager->flush();
    }
}
