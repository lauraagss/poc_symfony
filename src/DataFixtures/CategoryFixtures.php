<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public const CATEG_LIST = [
        "Horror",
        "Love",
        "Junior",
        "Adulte"
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::CATEG_LIST as $id => $categ) {
            $uneCateg = new Category();
            $uneCateg->setName($categ);

            $manager->persist($uneCateg);
            $this->addReference('categ' . $id, $uneCateg);
        }
        $manager->flush();
    }
}
