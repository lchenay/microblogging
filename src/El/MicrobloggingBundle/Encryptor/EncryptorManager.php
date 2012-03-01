<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace El\MicrobloggingBundle\Encryptor;

use Doctrine\ORM\EntityManager;

/**
 * Description of EncryptorManager
 *
 * @author jleger
 */
class EncryptorManager
{
    protected $encryptor;
    
    public function __construct(EncryptorInterface $encryptor)
    {
        $this->encryptor = $encryptor;
    }
    
    public function encrypt($obj)
    {
        $class = get_class($obj);
        $id = $obj->getId();

        $input = sprintf('%s-%s', $class, $id);

        return $this->encryptor->encrypt($input);
    }
}