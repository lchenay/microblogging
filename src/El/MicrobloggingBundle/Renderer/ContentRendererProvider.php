<?php

namespace El\MicrobloggingBundle\Renderer;

/**
 * Description of MessageProvider
 *
 * @author gcavana
 */
class ContentRendererProvider
{

    protected $renderers;

    public function resolve($entity)
    {
        foreach ($this->renderers as $renderer) {
            if ($renderer->supports($entity)) {
                return $renderer;
            }
            throw new \Exception(sprintf('There is no renderer for this "%s" entity', get_class($entity)));
        }
    }

    public function addRenderer(ContentRendererInferface $renderer)
    {
        $this->renderers[] = $renderer;
    }

}