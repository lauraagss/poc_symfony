<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    public const USER_LIST = 200;

    private UserPasswordEncoderInterface $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $password = "'Azerty123&@.";

        for ($i = 0; $i <= 20; $i++) {
            $user = new User();
            $user
                ->setEmail('utilisateur' . $i . '@gmail.com')
                ->setLastname('NomUtilisateur' . $i)
                ->setUsername('PrenomUtilisateur' . $i)
                ->setPassword($this->encoder->encodePassword($user, $password));


            $manager->persist($user);
            $this->addReference('Utilisateur' . $i, $user);
        }
        $manager->flush();
    }
}
