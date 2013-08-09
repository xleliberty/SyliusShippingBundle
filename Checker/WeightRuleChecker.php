<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sylius\Bundle\ShippingBundle\Checker;

use Sylius\Bundle\ShippingBundle\Model\ShippingSubjectInterface;

/**
 * Checks if shipping subject weight fits into the min/max range.
 *
 * @author Paweł Jędrzejewski <pjedrzejewski@diweb.pl>
 */
class WeightRuleChecker implements RuleCheckerInterface
{
    /**
     * {@inheritdoc}
     */
    public function isEligible(ShippingSubjectInterface $subject, array $configuration)
    {
        $weight = $subject->getShippingWeight();

        if (isset($configuration['min']) && $configuration['min'] > $weight) {
            return false;
        }
        if (isset($configuration['max']) && $configuration['max'] < $weight) {
            return false;
        }

        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function getConfigurationFormType()
    {
        return 'sylius_shipping_rule_weight_configuration';
    }
}
