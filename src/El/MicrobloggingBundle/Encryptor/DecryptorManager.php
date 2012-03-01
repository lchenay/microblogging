<?php

namespace El\MicrobloggingBundle\Encryptor;

use Doctrine\ORM\EntityManager;

/**
 * Description of DecryptorManager
 *
 * @author jleger
 */
class DecryptorManager
{
    protected $encryptor;
    protected $em;
    
    public function __construct(EncryptorInterface $encryptor, EntityManager $em)
    {
        $this->encryptor = $encryptor;
        $this->em = $em;
    }
    
    public function decrypt($identifier)
    {
        try {
            $res = explode('-', $this->encryptor->decrypt($identifier));

            list($entityName, $id) = $res;

            $object = $this->em->getRepository($entityName)->findOneBy(array(
                'id' => $id
            ));

            return $object;
        } catch (\Exception $e) {
            return false;
        }
    }
}