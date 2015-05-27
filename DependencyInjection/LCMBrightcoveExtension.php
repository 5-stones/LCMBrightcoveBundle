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

        $container->setParameter('lcm_brightcove.account.id', $config['account']['id']);
        $container->setParameter('lcm_brightcove.client.id', $config['client']['id']);
        $container->setParameter('lcm_brightcove.client.secret', $config['client']['secret']);

        // $container->setParameter('lcm_brightcove.cache.type', isset($config['cache']) && $config['cache']['type'] ? $config['cache']['type'] : null);
        // $container->setParameter('lcm_brightcove.cache.time', isset($config['cache']) && $config['cache']['time'] ? $config['cache']['time'] : null);
        // $container->setParameter('lcm_brightcove.cache.location', isset($config['cache']) && $config['cache']['location'] ? $config['cache']['location'] : null);
        // $container->setParameter('lcm_brightcove.cache.extension', isset($config['cache']) && $config['cache']['extension'] ? $config['cache']['extension'] : null);
        // $container->setParameter('lcm_brightcove.cache.port', isset($config['cache']) && $config['cache']['port'] ? $config['cache']['port'] : null);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');

    }
}
