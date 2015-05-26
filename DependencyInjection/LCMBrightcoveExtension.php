<?php

namespace LCM\BrightcoveBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class LCMBrightcoveExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setAlias('lcm_brightcove.token.read', $config['token']['read']);
        $container->setAlias('lcm_brightcove.token.write', $config['token']['write']);

        if(isset($config['cache'])) {
            $config['cache']['type'] ? $container->setAlias('lcm_brightcove.cache.type', $config['cache']['type']) : null;
            $config['cache']['time'] ? $container->setAlias('lcm_brightcove.cache.time', $config['cache']['time']) : null;
            $config['cache']['location'] ? $container->setAlias('lcm_brightcove.cache.location', $config['cache']['location']) : null;
            $config['cache']['extension'] ? $container->setAlias('lcm_brightcove.cache.extension', $config['cache']['extension']) : null;
            $config['cache']['port'] ? $container->setAlias('lcm_brightcove.cache.port', $config['cache']['port']) : null;
        }

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');
    }
}
