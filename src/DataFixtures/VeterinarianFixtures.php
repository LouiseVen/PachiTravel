<?php

namespace App\DataFixtures;

use App\Entity\Veterinarian;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class VeterinarianFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 10; $i++) {
            $veterinarian = new Veterinarian();
            $veterinarian->setName('John Doe ' . $i);
            $veterinarian->setCity('New York ');
            $veterinarian->setHoraires(new \DateTime('09:00:00'));

            $manager->persist($veterinarian);
            $manager->flush();
        }
    }
}
