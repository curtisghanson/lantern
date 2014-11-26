<?php

namespace Lantern\ExtLibBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('LanternExtLibBundle:Default:index.html.twig', array('name' => $name));
    }
}
