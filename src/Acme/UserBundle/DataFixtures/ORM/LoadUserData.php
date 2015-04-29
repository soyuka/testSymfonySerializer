<?php
namespace Acme\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Acme\UserBundle\Entity\User;
use Acme\UserBundle\Entity\UserGroup;

class LoadUserData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $group = new UserGroup('Admin', ['one', 'two']);
        $manager->persist($group);

        $userAdmin = new User();
        $userAdmin->setUsername('admin');
        $userAdmin->setPassword('test');
        $userAdmin->setEmail('test@mail.com');
        $userAdmin->addGroup($group);

        $manager->persist($userAdmin);
        $manager->flush();
    }
}
