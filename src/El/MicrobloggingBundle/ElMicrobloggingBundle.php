<?php

namespace El\MicrobloggingBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use El\MicrobloggingBundle\DependencyInjection\Compiler\AddContentRendererPass;

class ElMicrobloggingBundle extends Bundle
{

    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new AddContentRendererPass());
    }

}