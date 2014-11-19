<?php

namespace Lantern\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    public function dashboardAction()
    {
        return $this->render('LanternAdminBundle:Admin:dashboard.html.twig', array());
    }

    public function securityAction()
    {
        return $this->render('LanternAdminBundle:Admin:security.html.twig', array());
    }

    public function userAction()
    {
        return $this->render('LanternAdminBundle:Admin:user.html.twig', array());
    }

    public function groupAction()
    {
        return $this->render('LanternAdminBundle:Admin:group.html.twig', array());
    }

    public function roleAction()
    {
        return $this->render('LanternAdminBundle:Admin:role.html.twig', array());
    }

}
