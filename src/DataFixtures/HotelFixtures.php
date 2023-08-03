<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Hotel;

class HotelFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        
        for ($i = 0; $i <10; $i++) {
            $hotel = new Hotel();
            $hotel->setName('Hotel'.$i);
            $hotel->setPrice($i);
            $hotel->setCategorised(true);
            $hotel->setCity('City'.$i);
            $hotel->setDescription('Proident ea est nostrud duis anim consequat laborum. Ipsum sint eu ipsum minim occaecat ex sit labore ipsum et. Cillum dolore proident nisi in pariatur excepteur incididunt esse mollit irure labore. Et duis mollit ex adipisicing ex. Sint consectetur labore aliqua nisi commodo.');
            $manager->persist($hotel);
            
        }
        
        $manager->flush();
    }
}
