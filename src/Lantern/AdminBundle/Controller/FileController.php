<?php

namespace Lantern\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\Finder\Finder;
use \GetId3\GetId3Core as GetId3;

class FileController extends Controller
{
    private $directory = [];

    public function indexAction()
    {
        $tvDir = '/mnt/mount1/tv/Arabian Nights';

        $this->directory[] = $tvDir;
        $this->getDirectoryContents($tvDir);

        //foreach ($finder as $file) {
        //    // Print the absolute path
        //    print $file->getRealpath()."\n";

        //    // Print the relative path to the file, omitting the filename
        //    print $file->getRelativePath()."\n";

        //    // Print the relative path to the file
        //    print $file->getRelativePathname()."\n";
        //}
        echo '<pre>';
        foreach ($this->directory as $directory)
        {
            if (preg_match('/\/[^\/]*(\.mp4)$/', $directory))
            {
                $getId3 = new GetId3();
                
                $video = $getId3->analyze($directory);
                print_r($video);
                //if (isset($audio['error'])) {
                //    throw new \RuntimeException(sprintf('Error at reading audio properties from "%s" with GetId3: %s.', $mp3File, $audio['error']));
                //}           
                //$this->setLength(isset($audio['playtime_seconds']) ? $audio['playtime_seconds'] : '');
            }
        }
        exit;

        return $this->render('LanternAdminBundle:File:index.html.twig', array(
            'directory' => $this->directory,
        ));
    }

    public function getDirectoryContents($dir)
    {
        $finder = new Finder();
        $dirs = $finder->in($dir)->directories()->sortByName();
        
        if (count($dirs) > 0)
        {
            foreach ($dirs as $dir)
            {
                array_push($this->directory, $dir->getRealpath());
                $this->getDirectoryContents($dir->getRealpath());
            }
        }
        else
        {
            $files = $finder->files()->sortByName();
            foreach ($files as $file)
            {
                array_push($this->directory, $file);
            }
        }

    }

}
