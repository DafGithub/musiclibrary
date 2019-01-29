<?php

namespace App\DataFixtures;

use App\Entity\Artist;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class ArtistFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 25; $i++) {
            $artist = new Artist();
            $artist
                ->setFirstname($faker->words(1, true))
                ->setLastname($faker->words(1, true))
                ->setAlias($faker->words(1, true));
            $manager->persist($artist);
        }
        $manager->flush();
    }

}
