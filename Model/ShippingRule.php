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
 * Shipping method rule model.
 *
 * @author Saša Stamenković <umpirsky@gmail.com>
 */
class ShippingRule implements ShippingRuleInterface
{
    /**
     * Rule id.
     *
     * @var integer
     */
    protected $id;

    /**
     * Type.
     *
     * @var integer
     */
    protected $type;

    /**
     * Configuration.
     *
     * @var array
     */
    protected $configuration;

    /**
     * Method.
     *
     * @var ShippingMethodInterface
     */
    protected $method;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->configuration = array();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * {@inheritdoc}
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getConfiguration()
    {
        return $this->configuration;
    }

    /**
     * {@inheritdoc}
     */
    public function setConfiguration(array $configuration)
    {
        $this->configuration = $configuration;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * {@inheritdoc}
     */
    public function setMethod(ShippingMethodInterface $method = null)
    {
        $this->method = $method;

        return $this;
    }
}
