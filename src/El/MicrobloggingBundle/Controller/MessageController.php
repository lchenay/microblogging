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
        $request = $this->get('request');
        $message = new Message();
        $form = $this->createForm(new MessageType(), $message);

        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()) {
                $message = $this->get('el_microblogging.message_manipulator')->create($message);
                if ($message) {
                    $this->get('el_microblogging.message_manager')->saveMessage($message);
                }

                return $this->redirect($this->generateUrl('homepage'));
            }
        }

        return array('form' => $form->createView());
    }

    /**
     * @Route("/show/{id}", name="message_show")
     * @Template()
     */
    public function showAction($id)
    {
        $message = $this->get('el_microblogging.message_manager')->loadMessage($id);

        return array('message' => $message);
    }

    public function listAction()
    {
        $messages = $this->get('el_microblogging.message_manager')->loadMessages(10);

        return $this->render('ElMicrobloggingBundle:Message:list.html.twig', array(
                    'messages' => $messages,
                ));
    }

}