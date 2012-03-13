<?php

namespace El\MicrobloggingBundle\Renderer;

use El\MicrobloggingBundle\Renderer\ContentRendererInferface;

/**
 * Description of MessageContentRenderer
 *
 * @author gcavana
 */
class MessageContentRenderer implements ContentRendererInferface
{

    protected $engine;

    public function __construct($engine)
    {
        $this->engine = $engine;
    }

    public function getHtml(array $parameters = array())
    {
       return $this->engine->render('ElMicrobloggingBundle:Renderer:message.html.twig', $parameters);
    }

    public function getName()
    {
        return 'message';
    }

    public function supports($entity)
    {
        return get_class($entity) == 'El\MicrobloggingBundle\Entity\Message';
    }

}
