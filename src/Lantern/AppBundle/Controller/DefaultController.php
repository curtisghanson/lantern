<?php

namespace Lantern\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('LanternAppBundle:Default:index.html.twig', array());
    }
}
