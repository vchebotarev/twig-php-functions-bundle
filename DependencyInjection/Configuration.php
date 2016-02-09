<?php

namespace Chebur\TwigPhpFunctionsBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('chebur_twig_php_functions');

        $rootNode
            ->addDefaultsIfNotSet()
            ->children()
                ->scalarNode('function_name')->defaultValue('php_f')->end()
            ->end()
        ;

        return $treeBuilder;
    }

}
