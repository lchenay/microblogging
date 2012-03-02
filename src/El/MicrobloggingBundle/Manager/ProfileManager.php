<?php

namespace El\MicrobloggingBundle\Manager;


use Doctrine\ORM\EntityManager;
use El\MicrobloggingBundle\Manager\BaseManager;
use El\MicrobloggingBundle\Entity\Profile;


/**
 * Description of ProfileManager
 *
 * @author gcavana
 */
class ProfileManager extends BaseManager
{
    protected $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function saveProfile(Profile $profile)
    {
        $this->persistAndFlush($profile);
    }

    public function getRepository()
    {
        return $this->em->getRepository('ElMicrobloggingBundle:Profile');
    }

    public function loadProfile($id)
    {
        return $this->getRepository()->findOneBy(array('id' => $id));
    }

}