<?php

namespace Lantern\FileMgrBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('LanternFileMgrBundle:Default:index.html.twig', array());
    }

    public function getDirAction()
    {
        $attributes = $this->get('request')->attributes->all();
        $data = $attributes['data']->all();
        $cwd = $data['currentDir'];
        $finder = new Finder();
        $finder->directories()->in($cwd);
        $ls = array();

        echo '<pre>';echo shell_exec('ls -al /');exit;
        foreach ($finder as $file) {
            // Print the absolute path
            echo $file->getRealpath() . '<br />';
        }
        return new Response(json_encode($cwd));
        //return $this->render('LanternFileMgrBundle:Default:index.html.twig', array());
    }
}
