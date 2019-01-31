<?php

namespace App\DataFixtures;

use App\Entity\Song;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
class SongFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 100; $i++) {
            $song = new Song();
            $song
                ->setName($faker->words(1, true))
                ->setLenght($faker->numberBetween(1, 7));

            $manager->persist($song);
        }
        $manager->flush();
    }

}
