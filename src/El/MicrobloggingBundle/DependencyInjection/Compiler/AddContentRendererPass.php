<?php

namespace El\MicrobloggingBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;

/**
 * Description of AddContentRendererCompilerPass
 *
 * @author gcavana
 */
class AddContentRendererPass implements CompilerPassInterface
{

    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('el_microblogging.content_renderer.provider')) {
            return;
        }

        foreach ($container->findTaggedServiceIds('el_microblogging.content_renderer') as $id => $tags) {
            $container->getDefinition('el_microblogging.content_renderer.provider')->addMethodCall('addRenderer', array($container->getDefinition($id)));
        }
    }

}