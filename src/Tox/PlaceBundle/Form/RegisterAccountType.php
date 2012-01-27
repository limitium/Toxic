<?php

namespace Tox\PlaceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class RegisterAccountType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('username')
            ->add('password')
        ;
    }

    public function getName() {
        return 'register_account';
    }

    public function getDefaultOptions(array $options) {
        return array(
            'data_class' => 'Tox\PlaceBundle\Entity\RegisterAccount',
        );
    }
}
