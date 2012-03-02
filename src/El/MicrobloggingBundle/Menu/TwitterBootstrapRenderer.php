<?php

namespace El\MicrobloggingBundle\Menu;

use Knp\Menu\ItemInterface;
use Knp\Menu\Renderer\TwigRenderer;

/**
 * Description of TwitterBootstrapRenderer
 *
 * @author gcavana
 */
class TwitterBootstrapRenderer extends TwigRenderer
{

    public function render(ItemInterface $item, array $options = array())
    {
        $options = array_merge(
                array('currentClass' => 'active'), $options
        );

        if ('root' === $item->getName()) {
            $item->setChildrenAttribute('class',  trim('nav ' . $item->getAttribute('class')));
        }

        return parent::render($item, $options);
    }

}