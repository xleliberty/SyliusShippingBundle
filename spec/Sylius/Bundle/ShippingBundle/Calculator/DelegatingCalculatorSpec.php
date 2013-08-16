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
class DelegatingCalculatorSpec extends ObjectBehavior
{
    /**
     * @param Sylius\Component\DependencyInjection\ServiceRegistryInterface $registry
     */
    function let($registry)
    {
        $this->beConstructedWith($registry);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Sylius\Bundle\ShippingBundle\Calculator\DelegatingCalculator');
    }

    function it_implements_Sylius_delegating_shipping_calculator_interface()
    {
        $this->shouldImplement('Sylius\Bundle\ShippingBundle\Calculator\DelegatingCalculatorInterface');
    }

    /**
     * @param Sylius\Bundle\ShippingBundle\Model\ShippingSubjectInterface $subject
     */
    function it_should_complain_if_subject_has_no_method_defined($subject)
    {
        $subject->getMethod()->willReturn(null);

        $this
            ->shouldThrow('Sylius\Bundle\ShippingBundle\Calculator\UndefinedShippingMethodException')
            ->duringCalculate($subject)
        ;
    }

    /**
     * @param Sylius\Bundle\ShippingBundle\Model\ShippingSubjectInterface        $subject
     * @param Sylius\Bundle\ShippingBundle\Model\ShippingMethodInterface  $method
     * @param Sylius\Bundle\ShippingBundle\Calculator\CalculatorInterface $calculator
     */
    function it_should_delegate_calculation_to_a_calculator_defined_on_shipping_method($registry, $subject, $method, $calculator)
    {
        $subject->getShippingMethod()->willReturn($method);

        $method->getCalculator()->willReturn('default');
        $method->getConfiguration()->willReturn(array());

        $registry->get('default')->willReturn($calculator);
        $calculator->calculate($subject, array())->shouldBeCalled()->willReturn(1000);

        $this->calculate($subject, array())->shouldReturn(1000);
    }
}
