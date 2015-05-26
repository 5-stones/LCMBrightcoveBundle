<?php

namespace LCM\BrightcoveBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
  /**
   * {@inheritdoc}
   */
  public function getConfigTreeBuilder()
  {
    $treeBuilder = new TreeBuilder();
    $rootNode = $treeBuilder->root('lcm_brightcove');

    $rootNode
      ->children()
        ->arrayNode('token')
          ->children()
            ->scalarNode('read')->end()
            ->scalarNode('write')->end()
          ->end()
        ->end() // token
        ->arrayNode('cache')
          ->children()
            ->scalarNode('type')->defaultNull()->end()
            ->scalarNode('time')->defaultNull()->end()
            ->scalarNode('location')->defaultValue('%kernel.cache_dir%/lcm_brightcove')->end()
            ->scalarNode('extension')->defaultNull()->end()
            ->scalarNode('port')->defaultNull()->end()
          ->end()
        ->end() // cache
      ->end();

    return $treeBuilder;
  }
}
