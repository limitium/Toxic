<?php

namespace Tox\ParserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class RuleType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('pattern')
            ->add('Type')
            ->add('Source')
            ->add('id','hidden')
        ;
    }

    public function getName()
    {
        return 'rule';
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Tox\ParserBundle\Entity\Rule',
        );
    }
}
