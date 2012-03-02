<?php

namespace El\MicrobloggingBundle\Controller;

use JMS\SecurityExtraBundle\Annotation\Secure;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use El\MicrobloggingBundle\Form\ProfileType;

/**
 * @Route("/profile") 
 */
class ProfileController extends Controller
{

    /**
     * @Route("/edit/{id}", name="profile_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $profileManager = $this->get('el_microblogging.profile_manager');
        
        $profile = $this->get('el_microblogging.profile_manager')->loadProfile($id);

        $form = $this->createForm(new ProfileType(), $profile);

        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()) {
                
                $profileManager->saveProfile($profile);

                $this->get('session')->setFlash('profile-notice', 'Your profile has been update witch success');

                return $this->redirect($this->generateUrl('profile_edit', array('id' => $profile->getId())));
            }
        }

        return array('form' => $form->createView(), 'profile' => $profile);
    }

    /**
     * @Route("/profile/show/{id}", name="profile_show")
     * @Template()
     */
    public function showAction($username)
    {
        $profile = $this->get('profile.manager')->loadProfile($username);

        $form = $this->createForm(new ProfileType(), $profile);

        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()) {

                $this->get('session')->setFlash('blogger-notice', 'Your contact enquiry was successfully sent. Thank you!');

                return $this->redirect($this->generateUrl('BloggerBlogBundle_contact'));
            }
        }

        return $this->render('BloggerBlogBundle:Page:contact.html.twig', array('form' => $form->createView()));
    }

}
