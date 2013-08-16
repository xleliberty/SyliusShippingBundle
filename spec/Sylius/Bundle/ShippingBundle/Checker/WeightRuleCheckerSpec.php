<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Sylius\Bundle\ShippingBundle\Checker;

use PhpSpec\ObjectBehavior;

/**
 * @author Paweł Jędrzejewski <pjedrzejewski@diweb.pl>
 */
class WeightRuleCheckerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Sylius\Bundle\ShippingBundle\Checker\WeightRuleChecker');
    }

    function it_is_Sylius_shipping_method_rule_checker()
    {
        $this->shouldImplement('Sylius\Bundle\ShippingBundle\Checker\RuleCheckerInterface');
    }

    /**
     * @param Sylius\Bundle\ShippingBundle\Model\ShippingSubjectInterface $subject
     */
    function it_recognizes_subject_eligible_if_the_weight_is_greater_than_minimum($subject)
    {
        $subject->getShippingWeight()->shouldBeCalled()->willReturn(1000);

        $this->isEligible($subject, array('min' => 550))->shouldReturn(true);
    }

    /**
     * @param Sylius\Bundle\ShippingBundle\Model\ShippingSubjectInterface $subject
     */
    function it_recognizes_subject_not_eligible_if_the_weight_is_lesser_than_minimum($subject)
    {
        $subject->getShippingWeight()->shouldBeCalled()->willReturn(85);

        $this->isEligible($subject, array('min' => 200))->shouldReturn(false);
    }

    /**
     * @param Sylius\Bundle\ShippingBundle\Model\ShippingSubjectInterface $subject
     */
    function it_recognizes_subject_eligible_if_the_weight_is_lesser_than_maximum($subject)
    {
        $subject->getShippingWeight()->shouldBeCalled()->willReturn(33);

        $this->isEligible($subject, array('max' => 50))->shouldReturn(true);
    }

    /**
     * @param Sylius\Bundle\ShippingBundle\Model\ShippingSubjectInterface $subject
     */
    function it_recognizes_subject_not_eligible_if_the_weight_is_greater_than_maximum($subject)
    {
        $subject->getShippingWeight()->shouldBeCalled()->willReturn(1200);

        $this->isEligible($subject, array('max' => 300))->shouldReturn(false);
    }

    function it_uses_weight_configuration_form_type()
    {
        $this->getConfigurationFormType()->shouldReturn('sylius_shipping_rule_weight');
    }
}
