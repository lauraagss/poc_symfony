<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Serie;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class SerieFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        for ($i = 0; $i < 21; $i++) {

            $serie = new Serie();
            $serie
                ->setName('serie'.$i)
                ->setSummary('test de résumé')
                ->setReleaseDate(new \DateTime('now'))
                ->setImage('https://www.google.com/search?q=netflix&rlz=1C1VDKB_frFR933FR933&sxsrf=ALeKk029kkvv5-G-Xr-aFceSmHUX3fIFNg:1617046108982&source=lnms&tbm=isch&sa=X&ved=2ahUKEwjU1KSXntbvAhUj8-AKHRoRD3QQ_AUoA3oECAEQBQ&biw=1920&bih=937#imgrc=4H7caLjkjz8KzM')
                ->setEpisodeCurrent(rand(1, 100))
                ->setSeasonCurrent(rand(1, 10));
            /** @var User $user */
            $user = $this->getReference('Utilisateur' . rand(0, 20));

            /** @var Category $category */
            $category = $this->getReference('categ' . rand(1, 3));

            $serie
                ->setUser($user)
                ->setCategory($category);

            $manager->persist($serie);
        }

        $manager->flush();
    }
    public function getDependencies(): array
    {
        return [
            UserFixtures::class,
            CategoryFixtures::class
        ];
    }
}
