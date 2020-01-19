<?php
namespace Lionware\SymfonySessionTimeoutBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * Generates the configuration tree.
     *
     * @return TreeBuilder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('lionware_symfony_session_timeout');
        $rootNode = \method_exists($treeBuilder, 'getRootNode') ? $treeBuilder->getRootNode() : $treeBuilder->root('lionware_symfony_session_timeout');

        $rootNode->children()
            ->arrayNode('session')->isRequired()->children()
            ->integerNode('expiration_time')->isRequired()->end()
        ->end();

        return $treeBuilder;
    }
}
