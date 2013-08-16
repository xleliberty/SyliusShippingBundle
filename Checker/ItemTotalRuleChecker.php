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
 * Checks if item total fits into the min/max range.
 *
 * @author Paweł Jędrzejewski <pjedrzejewski@diweb.pl>
 */
class ItemTotalRuleChecker implements RuleCheckerInterface
{
    /**
     * {@inheritdoc}
     */
    public function isEligible(ShippingSubjectInterface $subject, array $configuration)
    {
        $total = $subject->getShippingItemTotal();

        if (isset($configuration['min']) && $configuration['min'] > $total) {
            return false;
        }
        if (isset($configuration['max']) && $configuration['max'] < $total) {
            return false;
        }

        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function getConfigurationFormType()
    {
        return 'sylius_shipping_rule_item_total';
    }
}
