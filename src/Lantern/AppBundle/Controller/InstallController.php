<?php

namespace Lantern\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class InstallController extends Controller
{
    public function indexAction()
    {
        // before proceeding
        // -> check to ensure install has already been run
        return $this->render('LanternAppBundle:Install:index.html.twig', array());
    }

    public function initializeApplicationAction()
    {
        // form and actions to start installation process
        // ---
        // default language
        // ---
        // check setup
        // - php ver
        // - timezone
        // - mem limit
        // - max upload size
        // - max post size
        // - php required libs (imagick, gd, simplexml)
        // - ffmpeg/avconv, unrar, nodejs, etc libs
        // - other php ini settings
    }

    public function createDatabaseAction()
    {
        // form and actions to create the database
        // ---
        // fields
    }

    public function createSecurityAction()
    {
        // form and actions to create security
        // ---
        // form -> create super admin
        // prepersist -> create groups, roles
    }

    public function updateApplicationAction()
    {
        // form and actions to perform any updates before completion
    }

    public function completeInstallAction()
    {
        // congrats! summary of completed install
        // ---
        // link to login
    }
}
