<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new Lantern\AdminBundle\LanternAdminBundle(),
            new Lantern\AuthBundle\LanternAuthBundle(),
            new Lantern\ExtLibBundle\LanternExtLibBundle(),
            new Lantern\FileMgrBundle\LanternFileMgrBundle(),
            new Lantern\FormBundle\LanternFormBundle(),
            new Lantern\IntlBundle\LanternIntlBundle(),
            new Lantern\MediaBundle\LanternMediaBundle(),
            new Lantern\MediaParserBundle\LanternMediaParserBundle(),
            new Lantern\MenuBundle\LanternMenuBundle(),
            new Lantern\Theme\ModernThemeBundle\LanternThemeModernThemeBundle(),
            new Lantern\TwigExtBundle\LanternTwigExtBundle(),
            new Lantern\UserBundle\LanternUserBundle(),
            new Lantern\AppBundle\LanternAppBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }
}
