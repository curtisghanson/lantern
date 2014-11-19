<?php

namespace Lantern\MenuBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('LanternMenuBundle:Default:index.html.twig', array('name' => $name));
    }
}
