<?php

namespace Tox\ParserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class SourceType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('url')
            ->add('Account')
            ->add('Theme')
            ->add('Schedule')
            ->add('Type')
        ;
    }

    public function getName()
    {
        return 'tox_parserbundle_sourcetype';
    }
}
