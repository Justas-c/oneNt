<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
         $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        // // create 3 users
        // $vardai = ['Varus', 'Marus', 'Darus'];
        // for ($i=0; $i < count($vardai); $i++) {
        //     $user = new User();
        //     $user->setFirstName($vardai[$i]);
        //     $user->setLastName('lastname');
        //     $user->setEmail($vardai[$i] . '@onent.test');
        //     $user->setPassword($this->passwordEncoder->encodePassword($user, 'e1'));
        //     $manager->persist($user);
        // }

        // // create 3 admins
        //     $adVardai = ['ad_Varius', 'ad_Marius', 'ad_Darius'];
        //     for ($i=0; $i < 3; $i++) {
        //         $admin = new User();
        //         $admin->setFirstName($adVardai[$i]);
        //         $admin->setLastName('lastname');
        //         $admin->setEmail($adVardai[$i] . '@sf.test');
        //         $admin->setPassword($this->passwordEncoder->encodePassword($admin, 'e1'));
        //         $admin->setRoles(['ROLE_ADMIN']);
        //         $manager->persist($admin);
        //     }

        $manager->flush();
    }
}
