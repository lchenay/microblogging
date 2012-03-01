<?php

namespace El\MicrobloggingBundle\Encryptor;

class Encryptor implements EncryptorInterface
{
    protected $key;

    public function __construct($key)
    {
        $this->key = $key;
    }

    public function encrypt($input)
    {
        $iv_size = mcrypt_get_iv_size(MCRYPT_XTEA, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $enc = mcrypt_encrypt(MCRYPT_XTEA, $this->key, $input, MCRYPT_MODE_ECB, $iv);
        $benc = base64_encode($enc);
        $benc = str_replace('=', '_', base64_encode($enc));
        return $benc;
    }

    public function decrypt($input)
    {
        $bdec = str_replace('_', '=', base64_encode($input));
        $iv_size = mcrypt_get_iv_size(MCRYPT_XTEA, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $dec = mcrypt_decrypt(MCRYPT_XTEA, $this->key, $bdec, MCRYPT_MODE_ECB, $iv);
        
        return $dec;
    }
}
