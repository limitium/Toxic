<?php

namespace Tox\ParserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class RegexpType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('url')
            ->add('regexp')
        ;
    }

    public function getName()
    {
        return 'regexp';
    }
}
