<?php

namespace El\MicrobloggingBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\Extension\Core\Type\TimezoneType;
use Symfony\Component\Form\Extension\Core\Type\LanguageType;

class ProfileType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('fullname')
            ->add('language', new LanguageType())
            ->add('timezone', new TimezoneType())
            ->add('homepage')
            ->add('bio')
            ->add('location')
        ;
    }

    public function getName()
    {
        return 'el_microbloggingbundle_profiletype';
    }
}
