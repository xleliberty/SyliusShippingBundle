<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sylius\Bundle\ShippingBundle\Form\Type\Rule;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Item total rule configuration form type.
 *
 * @author Paweł Jędrzejewski <pjedrzejewski@diweb.pl>
 */
class WeightConfigurationType extends AbstractType
{
    /**
     * Validation groups.
     *
     * @var array
     */
    protected $validationGroups;

    /**
     * Constructor.
     *
     * @param array  $validationGroups
     */
    public function __construct(array $validationGroups)
    {
        $this->validationGroups = $validationGroups;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('min', 'integer', array(
                'label' => 'sylius.form.rule.weight_configuration.min',
                'constraints' => array(
                    new Type(array('type' => 'numeric')),
                )
            ))
            ->add('max', 'integer', array(
                'label' => 'sylius.form.rule.weight_configuration.max',
                'constraints' => array(
                    new Type(array('type' => 'numeric')),
                )
            ))
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver
            ->setDefaults(array(
                'validation_groups' => $this->validationGroups,
            ))
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'sylius_shipping_rule_weight_configuration';
    }
}
