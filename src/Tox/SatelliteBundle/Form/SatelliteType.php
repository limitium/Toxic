<?php

namespace Tox\SatelliteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class SatelliteType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('Domen')
            ->add('Theme')
            ->add('FtpAccount')
            ->add('title')
            ->add('keyz')
            ->add('description')
            ->add('about')
        ;
    }

    public function getName()
    {
        return 'tox_satellitebundle_satellitetype';
    }
}
