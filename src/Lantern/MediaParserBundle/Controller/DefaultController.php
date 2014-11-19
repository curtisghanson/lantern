<?php

namespace Lantern\MediaParserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('LanternMediaParserBundle:Default:index.html.twig', array('name' => $name));
    }
}
