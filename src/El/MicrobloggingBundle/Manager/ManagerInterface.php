<?php


namespace El\MicrobloggingBundle\Manager;

/**
 * Description of ManagerInterface
 *
 * @author gcavana
 */
interface ManagerInterface
{
    function persistAndFlush($entity);
}
