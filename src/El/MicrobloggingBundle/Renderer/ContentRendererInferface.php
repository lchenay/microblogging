<?php

namespace El\MicrobloggingBundle\Renderer;

/**
 * Description of ContentRendererInferface
 *
 * @author gcavana
 */
interface ContentRendererInferface
{
    function getHtml(array $parameters = array());
    
    function getName();
    
    function supports($entity);
}