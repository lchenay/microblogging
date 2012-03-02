<?php

namespace El\MicrobloggingBundle\Controller;

use JMS\SecurityExtraBundle\Annotation\Secure;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class MainController extends Controller
{
    /**
     * @Route("/", defaults={"name" = "Guillaume Cavana"}, name="homepage")
     * @Template()
     */
    public function indexAction($name)
    {
        return array('name' => $name);
    }
}
