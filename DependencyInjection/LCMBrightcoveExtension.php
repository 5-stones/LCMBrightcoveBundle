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

        // $container->setParameter('lcm_brightcove.token.read', $config['token']['read']);
        // $container->setParameter('lcm_brightcove.token.write', $config['token']['write']);

        // $container->setParameter('lcm_brightcove.cache.type', isset($config['cache']) && $config['cache']['type'] ? $config['cache']['type'] : null);
        // $container->setParameter('lcm_brightcove.cache.time', isset($config['cache']) && $config['cache']['time'] ? $config['cache']['time'] : null);
        // $container->setParameter('lcm_brightcove.cache.location', isset($config['cache']) && $config['cache']['location'] ? $config['cache']['location'] : null);
        // $container->setParameter('lcm_brightcove.cache.extension', isset($config['cache']) && $config['cache']['extension'] ? $config['cache']['extension'] : null);
        // $container->setParameter('lcm_brightcove.cache.port', isset($config['cache']) && $config['cache']['port'] ? $config['cache']['port'] : null);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');

        //$this->configureService($config, $container);
    }

    /**
     * Finish configuring the BC service
     */
    private function configureService($config, $container) {
        unset(
            $config['token'],
            $config['cache']
        );

        $bc = $container->get('lcm_brightcove');

        // Set extra config
        foreach($config as $key => $value) {

            if(!is_array($value)) {
                $bc->__set($key, $value);
            } else {
                foreach($value as $k => $v) {
                    $bc->__set($key.'_'.$k, $v);
                }
            }
        }
    }
}
