<?php

namespace Tox\PlaceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class HostType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('url')
            ->add('ns_servers')
            ->add('Accounts', 'collection', array('type' => new HostAccountType(),
            'allow_add' => true,
            'allow_delete' => true));
        ;
    }

    public function getName()
    {
        return 'tox_placebundle_hosttype';
    }
}
