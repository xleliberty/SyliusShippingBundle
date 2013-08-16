<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sylius\Bundle\ShippingBundle\Form\Type\Checker;

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
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('min', 'integer', array(
                'required' => false,
                'label'    => 'sylius.form.shipping_rule.weight.min',
                'constraints' => array(
                    new Type(array('type' => 'numeric')),
                )
            ))
            ->add('max', 'integer', array(
                'required' => false,
                'label'    => 'sylius.form.shipping_rule.weight.max',
                'constraints' => array(
                    new Type(array('type' => 'numeric')),
                )
            ))
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'sylius_shipping_rule_weight';
    }
}
