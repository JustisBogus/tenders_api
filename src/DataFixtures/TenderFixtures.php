<?php

namespace App\DataFixtures;

use App\Entity\Tender;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class TenderFixtures extends Fixture
{

    /**
     * @var Faker\Factory
     */
    private $faker;

    public function __construct()
    {
        $this->faker = \Faker\Factory::create();
    }

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 4000; $i++) {
            $tender = new Tender();
            $tender->setTitle($this->faker->realText(30));
            $tender->setDescription($this->faker->realText());

            $manager->persist($tender);
        }

        $manager->flush();
    }
}