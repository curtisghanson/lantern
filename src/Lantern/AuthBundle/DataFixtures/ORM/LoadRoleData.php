<?php
// src/Lantern/AuthBundle/DataFixtures/ORM/LoadRoleData.php

namespace Lantern\AuthBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use Lantern\AuthBundle\Entity\Role;

class LoadRoleData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        // Load ROLE_SUPER_ADMIN
        $roleSuperAdmin = new Role();
        $roleSuperAdmin->setShortName('ROLE_SUPER_ADMIN');
        $roleSuperAdmin->setLongName('The super admin role');
        $roleSuperAdmin->setDescription('The super admin role.');
        $roleSuperAdmin->setIsActive(true);

        $manager->persist($roleSuperAdmin);
        $manager->flush();

        $this->addReference('role-super-admin', $roleSuperAdmin);

        // Load ROLE_ADMIN
        $roleAdmin = new Role();
        $roleAdmin->setShortName('ROLE_ADMIN');
        $roleAdmin->setLongName('The admin role');
        $roleAdmin->setDescription('The admin role.');
        $roleAdmin->setParent($this->getReference('role-super-admin'));
        $roleAdmin->setIsActive(true);

        $manager->persist($roleAdmin);
        $manager->flush();

        $this->addReference('role-admin', $roleAdmin);

        // Load ROLE_USER
        $roleUser = new Role();
        $roleUser->setShortName('ROLE_USER');
        $roleUser->setLongName('The user role');
        $roleUser->setDescription('The user role.');
        $roleUser->setParent($this->getReference('role-admin'));
        $roleUser->setIsActive(true);

        $manager->persist($roleUser);
        $manager->flush();

        $this->addReference('role-user', $roleUser);

        // Load ROLE_ALLOWED_TO_SWITCH
        $roleAllowedToSwitch = new Role();
        $roleAllowedToSwitch->setShortName('ROLE_ALLOWED_TO_SWITCH');
        $roleAllowedToSwitch->setLongName('User impersonate role');
        $roleAllowedToSwitch->setDescription('Allows user to impersonate another user.');
        $roleAllowedToSwitch->setParent($this->getReference('role-super-admin'));
        $roleAllowedToSwitch->setIsActive(true);

        $manager->persist($roleAllowedToSwitch);
        $manager->flush();

        $this->addReference('role-allowed-to-switch', $roleAllowedToSwitch);
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }
}