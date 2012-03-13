<?php

namespace El\MicrobloggingBundle\Manager;

use Doctrine\ORM\EntityManager;
use El\MicrobloggingBundle\Entity\Message;
use El\MicrobloggingBundle\Manager\BaseManager;
use Symfony\Component\Security\Core\SecurityContext;

/**
 * Description of ProfileManager
 *
 * @author gcavana
 */
class MessageManager extends BaseManager
{

    protected $em,
            $securityContext;

    public function __construct(EntityManager $em, SecurityContext $securityContext)
    {
        $this->em = $em;
        $this->securityContext = $securityContext;
    }

    public function saveMessage(Message $message)
    {
        $this->persistAndFlush($message);
    }

    public function getRepository()
    {
        return $this->em->getRepository('ElMicrobloggingBundle:Message');
    }

    public function loadMessage($id)
    {
        return $this->getRepository()->findOneBy(array('id' => $id));
    }

    public function loadMessages($limit)
    {
        return $this->getRepository()->getMessagesByUserId($limit, $this->securityContext->getToken()->getUser()->getId());
    }

}