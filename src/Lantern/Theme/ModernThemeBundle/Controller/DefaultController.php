<?php

namespace Lantern\Theme\ModernThemeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('LanternThemeModernThemeBundle:Default:index.html.twig', array('name' => $name));
    }
}
