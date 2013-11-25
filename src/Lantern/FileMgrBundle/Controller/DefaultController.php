<?php

namespace Lantern\FileMgrBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('LanternFileMgrBundle:Default:index.html.twig', array());
    }
}
