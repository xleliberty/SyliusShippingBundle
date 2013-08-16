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

use Sylius\Bundle\ShippingBundle\Model\ShippingMethodInterface;
use Sylius\Bundle\ShippingBundle\Model\ShippingSubjectInterface;
use Sylius\Component\DependencyInjection\ServiceRegistryInterface;

/**
 * Checks if shipping method rules are satisfied.
 *
 * @author Saša Stamenković <umpirsky@gmail.com>
 */
class ShippingMethodEligibilityChecker implements ShippingMethodEligibilityCheckerInterface
{
    /**
     * Shipping rules registry.
     *
     * @var ServiceRegistryInterface
     */
    protected $registry;

    /**
     * Constructor.
     *
     * @param ServiceRegistryInterface $registry
     */
    public function __construct(ServiceRegistryInterface $registry)
    {
        $this->registry = $registry;
    }

    /**
     * {@inheritdoc}
     */
    public function isEligible(ShippingSubjectInterface $subject, ShippingMethodInterface $method)
    {
        foreach ($method->getRules() as $rule) {
            $checker = $this->registry->get($rule->getType());

            if (false === $checker->isEligible($subject, $rule->getConfiguration())) {
                return false;
            }
        }

        return true;
    }
}
