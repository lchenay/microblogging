<?php

namespace El\MicrobloggingBundle\Encryptor;

/**
 *
 * @author jleger
 */
interface EncryptorInterface
{
    function encrypt($input);
    
    function decrypt($input);
}