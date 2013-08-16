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
class ItemTotalConfigurationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('min', 'money', array(
                'required' => false,
                'divisor'  => 100,
                'label'    => 'sylius.form.shipping_rule.item_total.min',
                'constraints' => array(
                    new Type(array('type' => 'numeric')),
                )
            ))
            ->add('max', 'money', array(
                'required' => false,
                'divisor'  => 100,
                'label'    => 'sylius.form.shipping_rule.item_total.max',
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
        return 'sylius_shipping_rule_item_total';
    }
}
