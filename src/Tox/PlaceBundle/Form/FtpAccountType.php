<?php

namespace Tox\PlaceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class FtpAccountType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('username')
            ->add('password')
            ->add('url')
            ->add('HostAccount')
        ;
    }

    public function getName()
    {
        return 'tox_placebundle_ftpaccounttype';
    }
}
