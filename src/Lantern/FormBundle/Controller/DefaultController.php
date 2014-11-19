<?php

namespace Lantern\FormBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('LanternFormBundle:Default:index.html.twig', array('name' => $name));
    }
}
