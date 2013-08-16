<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Sylius\Bundle\ShippingBundle\Calculator;

use PhpSpec\ObjectBehavior;

/**
 * @author Paweł Jędrzejewski <pjedrzejewski@diweb.pl>
 */
class PerItemRateCalculatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Sylius\Bundle\ShippingBundle\Calculator\PerItemRateCalculator');
    }

    function it_implements_Sylius_shipping_calculator_interface()
    {
        $this->shouldImplement('Sylius\Bundle\ShippingBundle\Calculator\CalculatorInterface');
    }

    /**
     * @param Symfony\Component\OptionsResolver\OptionsResolverInterface $resolver
     */
    function it_has_required_amount_configuration_options($resolver)
    {
        $resolver->setRequired(array('amount'))->shouldBeCalled()->willReturn($resolver);
        $resolver->setAllowedTypes(array('amount' => array('numeric')))->shouldBeCalled()->willReturn($resolver);

        $this->setConfiguration($resolver);
    }

    function it_returns_per_item_rate_configuration_form_type()
    {
        $this->getConfigurationFormType()->shouldReturn('sylius_shipping_calculator_per_item_rate');
    }

    /**
     * @param Sylius\Bundle\ShippingBundle\Model\ShippingSubjectInterface $subject
     */
    function it_calculates_the_total_with_the_per_item_amount_configured($subject)
    {
        $subject->getShippingItemCount()->willReturn(11);

        $this->calculate($subject)->shouldReturn(2200);
    }
}
