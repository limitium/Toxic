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
            ->add('paid_unitl')
            ->add('RegisterAccount')
        ;
    }

    public function getName()
    {
        return 'tox_placebundle_domentype';
    }
}
