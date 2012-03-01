<?php

namespace El\MicrobloggingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/, defaults={name=toto}")
     * @Template()
     */
    public function indexAction($name)
    {
        return array('name' => $name);
    }
}
