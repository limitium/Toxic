<?php

namespace Tox\ParserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class SourceType extends AbstractType {
    public function buildForm(FormBuilder $builder, array $options) {
        $builder
            ->add('name')
            ->add('url')
            ->add('Theme')
            ->add('Schedule')
            ->add('Type')
//            ->add('Account',new SourceAccountType())
            ->add('Rules', 'collection', array('type' => new RuleType(),
            'allow_add' => true,
            'allow_delete' => true,));
    }

    public function getName() {
        return 'source';
    }

    public function getDefaultOptions(array $options) {
        return array(
            'data_class' => 'Tox\ParserBundle\Entity\Source',
        );
    }

}
