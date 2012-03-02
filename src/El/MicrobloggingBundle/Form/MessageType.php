<?php

namespace El\MicrobloggingBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class MessageType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('content')
        ;
    }

    public function getName()
    {
        return 'el_microbloggingbundle_messagetype';
    }
}
