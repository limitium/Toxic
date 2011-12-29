<?php

namespace Tox\ParserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class SourceAccountType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('username')
            ->add('password')
            ->add('login_field')
            ->add('password_field')
            ->add('url')
            ->add('Source')
        ;
    }

    public function getName()
    {
        return 'tox_parserbundle_sourceaccounttype';
    }
}
