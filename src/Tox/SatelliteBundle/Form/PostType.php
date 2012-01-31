<?php

namespace Tox\SatelliteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class PostType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('body')
            ->add('file_name')
            ->add('Satellite')
        ;
    }

    public function getName()
    {
        return 'tox_satellitebundle_posttype';
    }
}
