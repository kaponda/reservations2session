<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Users;
use App\DataFixtures\RolesFixtures;

class UsersFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
                 $users = [
            [
                'username'=>'bob',
                'password'=>'123456',
                'firstname'=>'bob',
                'lastname'=>'Dylan',
                'email'=>'bob@sull.com',
                'langue'=>'fr',
            ],
            [
                'username'=>'fred',
                'password'=>'123456',
                'firstname'=>'fred',
                'lastname'=>'Mercuri',
                'email'=>'fred@sull.com',
                'langue'=>'en',
            ],
             [
                'username'=>'stef',
                'password'=>'123456',
                'firstname'=>'stef',
                'lastname'=>'Kapond',
                'email'=>'stef@sull.com',
                'langue'=>'en',
            ],
 
        ];
        
        foreach ($users as $record) {
            $user = new Users();
            $user->setUsername($record['username']);

            //Hasher le mot de passe
            $user->setPassword(password_hash($record['password'], PASSWORD_BCRYPT));

                       $user->setFirstname($record['firstname']);
            $user->setLastname($record['lastname']);
            $user->setEmail($record['email']);
            $user->setLangue($record['langue']);
            $manager->persist($user);
            $this->addReference(
                    $record['firstname']."-".$record['lastname'],
                    $user);
             
        }

        $manager->flush();
    }
}
