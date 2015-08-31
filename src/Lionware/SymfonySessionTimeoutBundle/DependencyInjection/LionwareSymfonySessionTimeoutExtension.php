<?php
namespace Lionware\SymfonySessionTimeoutBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;


class LionwareSymfonySessionTimeoutExtension extends Extension
{
    /**
     * @inheritDoc
     */
    public function load(array $config, ContainerBuilder $container)
    {
        $configuration = new Configuration();

        $config = $this->processConfiguration($configuration, $config);

        $container->setParameter(
            'lionware_symfony_session_timeout.session.expiration_time',
            $config['session']['expiration_time']
        );

        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('listeners.yml');

    }
}