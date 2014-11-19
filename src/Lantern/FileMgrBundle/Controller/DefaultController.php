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
        /*
        $attributes = $this->get('request')->attributes->all();
        $data = $attributes['data']->all();
        $cwd = $data['currentDir'];
        $cmd = 'ls -d ' . $cwd . '*';
        $dirs = preg_split('/[\r\n]+/', shell_exec($cmd));
        */

        $attributes = $this->get('request')->attributes->all();
        $data = $attributes['data']->all();
        $cwd = $data['currentDir'];

        $finder = new Finder();
        $finder->directories()->in($cwd)->depth('== 0');
        foreach ($finder as $file) {
            $dirs[] = array(
                'path' => $file->getRealpath(),
                'name' => $file->getRelativePathname(),
            );
        }
        //echo '<pre>';var_dump($dirs);exit;

        return new Response(json_encode($dirs));
        //return $this->render('LanternFileMgrBundle:Default:index.html.twig', array());
    }
}
