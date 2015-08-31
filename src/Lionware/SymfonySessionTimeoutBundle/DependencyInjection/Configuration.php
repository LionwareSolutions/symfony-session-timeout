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
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('lionware_symfony_session_timeout');

        $rootNode->children()
            ->arrayNode('session')->isRequired()->children()
            ->integerNode('expiration_time')->isRequired()->cannotBeEmpty()->end()
        ->end();

        return $treeBuilder;
    }
}
