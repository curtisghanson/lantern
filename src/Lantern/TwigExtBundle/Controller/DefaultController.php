<?php

namespace Lantern\TwigExtBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('LanternTwigExtBundle:Default:index.html.twig', array('name' => $name));
    }
}
