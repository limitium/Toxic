<?php

namespace Tox\PlaceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class DomenType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('bought_at')
            ->add('whois')
            ->add('paid_unitl')
            ->add('Satellite')
            ->add('RegisterAccount')
            ->add('Bot')
        ;
    }

    public function getName()
    {
        return 'tox_placebundle_domentype';
    }
}
