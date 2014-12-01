<?php
// src/Lantern/AuthBundle/DataFixtures/ORM/LoadGroupData.php

namespace Lantern\AuthBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use Lantern\AuthBundle\Entity\Group;

class LoadGroupData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        // Load GROUP_SUPER_ADMIN
        $groupSuperAdmin = new Group();
        $groupSuperAdmin->setShortName('GROUP_SUPER_ADMIN');
        $groupSuperAdmin->setLongName('The super admin group');
        $groupSuperAdmin->setDescription('The super admin group, contains all roles.');
        $groupSuperAdmin->addRole($this->getReference('role-super-admin'));
        $groupSuperAdmin->setIsActive(true);

        $manager->persist($groupSuperAdmin);
        $manager->flush();

        $this->addReference('group-super-admin', $groupSuperAdmin);

        // Load GROUP_ADMIN
        $groupAdmin = new Group();
        $groupAdmin->setShortName('GROUP_ADMIN');
        $groupAdmin->setLongName('The admin group');
        $groupAdmin->setDescription('The admin group, no permissions to impersonate.');
        $groupAdmin->setParent($this->getReference('group-super-admin'));
        $groupSuperAdmin->addRole($this->getReference('role-admin'));
        $groupAdmin->setIsActive(true);

        $manager->persist($groupAdmin);
        $manager->flush();

        $this->addReference('group-admin', $groupAdmin);

        // Load GROUP_USER
        $groupUser = new Group();
        $groupUser->setShortName('GROUP_USER');
        $groupUser->setLongName('The user group');
        $groupUser->setDescription('The user group.');
        $groupUser->setParent($this->getReference('group-admin'));
        $groupSuperAdmin->addRole($this->getReference('role-user'));
        $groupUser->setIsActive(true);

        $manager->persist($groupUser);
        $manager->flush();

        $this->addReference('group-user', $groupUser);
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 2; // the order in which fixtures will be loaded
    }
}