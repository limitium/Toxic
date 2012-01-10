<?php

namespace Tox\ParserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class RuleType extends AbstractType {
    public function buildForm(FormBuilder $builder, array $options) {
        $builder
            ->add('pattern')
            ->add('Type', 'entity_id', array(
            'class' => 'Tox\ParserBundle\Entity\PatternType',
            'hidden' => true,
            'property' => 'id',
        ))
            ->add('Source', 'entity_id', array(
            'class' => 'Tox\ParserBundle\Entity\Source',
            'hidden' => true,
            'property' => 'id',
        ))
            ->add('id', 'hidden');
    }

    public function getName() {
        return 'rule';
    }

    public function getDefaultOptions(array $options) {
        return array(
            'data_class' => 'Tox\ParserBundle\Entity\Rule',
        );
    }
}
