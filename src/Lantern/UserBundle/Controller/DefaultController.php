<?php

namespace Lantern\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('LanternUserBundle:Default:index.html.twig', array('name' => $name));
    }
}
