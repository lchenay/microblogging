<?php

namespace El\MicrobloggingBundle\Manipulator;

use Symfony\Component\Templating;
use El\MicrobloggingBundle\Entity\Message;
use Symfony\Component\Security\Core\SecurityContext;
use El\MicrobloggingBundle\Renderer\ContentRendererProvider;

/**
 * Description of MessageCreator
 *
 * @author gcavana
 */
class MessageManipulator
{

    protected $rendererProvider,
            $securityContext;

    public function __construct(ContentRendererProvider $rendererProvider, SecurityContext $securityContext)
    {
        $this->securityContext = $securityContext;
        $this->rendererProvider = $rendererProvider;
    }

    public function create(Message $message)
    {
        $renderer = $this->getRenderer($message);
        $message->setRendered($renderer->getHtml(array('message' => $message)));
        $message->setUser($this->securityContext->getToken()->getUser());

        return $message;
    }

    private function getRenderer(Message $message)
    {
        return $this->rendererProvider->resolve($message);
    }

}