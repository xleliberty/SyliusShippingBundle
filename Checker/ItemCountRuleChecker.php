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
 * Checks if item count fits into configure range.
 *
 * @author Saša Stamenković <umpirsky@gmail.com>
 */
class ItemCountRuleChecker implements RuleCheckerInterface
{
    /**
     * {@inheritdoc}
     */
    public function isEligible(ShippingSubjectInterface $subject, array $configuration)
    {
        $count = $subject->getShippingItemCount();

        if (isset($configuration['min']) && $count < $configuration['min']) {
            return false;
        }
        if (isset($configuration['max']) && $count > $configuration['max']) {
            return false;
        }

        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function getConfigurationFormType()
    {
        return 'sylius_shipping_rule_item_count';
    }
}
