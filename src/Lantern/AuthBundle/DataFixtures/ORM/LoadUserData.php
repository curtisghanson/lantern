<?php
// src/Lantern/AuthBundle/DataFixtures/ORM/LoadUserData.php

namespace Lantern\AuthBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

use Lantern\AuthBundle\Entity\User;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        // Load admin user
        $user = new User();

        $encoder  = $this->get('security.encoder_factory')->getEncoder($user);
        $password = $encoder->encodePassword('lanternAdmin', $user->getSalt());
        $user->setPassword($password);
        
        $user->setUsername('admin');
        $user->setEmail('nomail@nomail.com');
        $user->setIsActive(true);
        $user->setIsLocked(true);
        $user->addGroup($this->getReference('group-super-admin'));

        $manager->persist($user);
        $manager->flush();

        $this->addReference('user', $user);
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 3; // the order in which fixtures will be loaded
    }
}