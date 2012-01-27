<?php

namespace Tox\PlaceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('url')
            ->add('Accounts', 'collection', array('type' => new RegisterAccountType(),
            'allow_add' => true,
            'allow_delete' => true));
    }

    public function getName() {
        return 'register';
    }

    public function getDefaultOptions(array $options) {
        return array(
            'data_class' => 'Tox\PlaceBundle\Entity\Register',
        );
    }
}
