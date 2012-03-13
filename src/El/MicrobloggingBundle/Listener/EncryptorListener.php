<?php

namespace El\MicrobloggingBundle\Listener;

use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\ORM\Event\LifecycleEventArgs;
use El\MicrobloggingBundle\Entity\Profile;
use El\MicrobloggingBundle\Encryptor\EncryptorManager;

/**
 * Description of EncryptorListener
 *
 * @author gcavana
 */
class EncryptorListener
{

    protected $encryptorManager;

    public function __construct(EncryptorManager $encryptorManager = null)
    {
        $this->encryptorManager = $encryptorManager;
    }

    public function postPersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        $entityManager = $args->getEntityManager();

        if ($entity instanceof EncryptInterface) {
            $entity->setUri($this->encryptorManager->encrypt($entity));
            $entityManager->persist($entity);
            $entityManager->flush();
        }
    }

}