<?php

namespace El\MicrobloggingBundle\Renderer;

use El\MicrobloggingBundle\Renderer\ContentRendererInferface;

/**
 * Description of MessageContentRenderer
 *
 * @author gcavana
 */
class ReplyContentRenderer implements ContentRendererInferface
{
    
    protected $templating;


    public function __construct($templating)
    {
        $this->templating = $templating;
    }

    public function getHtml(array $parameters = array())
    {
        
    }

    public function getName()
    {
        return 'reply';
    }

    public function supports($entity)
    {
        return $entity->isReply();
    }

}