<?php

namespace El\MicrobloggingBundle\Manager;

/**
 * Description of BaseManager
 *
 * @author gcavana
 */
abstract class BaseManager implements ManagerInterface
{
    public function persistAndFlush($entity)
    {
        $this->em->persist($entity);
        $this->em->flush();
    }
}