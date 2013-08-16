<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sylius\Bundle\ShippingBundle\Model;

use Sylius\Bundle\ShippingBundle\Model\ShippingMethodInterface;

/**
 * Shipping method rule model interface.
 *
 * @author Saša Stamenković <umpirsky@gmail.com>
 */
interface ShippingRuleInterface
{
    const TYPE_ITEM_TOTAL = 'item_total';
    const TYPE_ITEM_COUNT = 'item_count';
    const TYPE_WEIGHT     = 'weight';

    /**
     * Get the rule type.
     *
     * @return string
     */
    public function getType();

    /**
     * Set the type of rule.
     *
     * @param string $type
     */
    public function setType($type);

    /**
     * Get the rule configuration.
     *
     * @return array
     */
    public function getConfiguration();

    /**
     * Set the configuration.
     *
     * @param array $configuration
     */
    public function setConfiguration(array $configuration);

    /**
     * Get the shipping method.
     *
     * @return ShippingMethodInterface
     */
    public function getMethod();

    /**
     * Set method.
     *
     * @param ShippingMethodInterface
     */
    public function setMethod(ShippingMethodInterface $method = null);
}
