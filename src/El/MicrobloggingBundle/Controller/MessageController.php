<?php

namespace El\MicrobloggingBundle\Controller;

use JMS\SecurityExtraBundle\Annotation\Secure;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use El\MicrobloggingBundle\Form\MessageType;
use El\MicrobloggingBundle\Entity\Message;

/**
 * @Route("/message") 
 */
class MessageController extends Controller
{

    /**
     * @Route("/new", name="message_new")
     * @Template()
     */
    public function newAction()
    {
        $message = new Message();
        $form = $this->createForm(new MessageType(), $message);

        return array('form' => $form->createView());
    }

    /**
     * @Route("/create", name="message_create")
     * @Template()
     */
    public function createAction()
    {

        $message = new Message();
        $form = $this->createForm(new MessageType(), $message);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()
                    ->getEntityManager();
            $em->persist($message);
            $em->flush();

            return $this->redirect($this->generateUrl('homepage'));
        }

        return array('form' => $form->createView());
    }

}