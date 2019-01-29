<?php

namespace App\DataFixtures;

use App\Entity\MusicStyle;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class MusicStyleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 25; $i++) {
            $musicstyle = new MusicStyle();
            $musicstyle
                ->setTitle($faker->words(1, true));
            $manager->persist($musicstyle);
        }

        $manager->flush();
    }
}
