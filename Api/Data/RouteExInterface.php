<?php
/**
 * Automatically created by MageSpecialist CodeMonkey
 * https://github.com/magespecialist/m2-MSP_CodeMonkey
 */

declare(strict_types=1);

namespace MSP\ReLinkerCoreProcessors\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

interface RouteExInterface extends ExtensibleDataInterface
{
    const ID = 'msp_relinker_core_processors_id';
    const ROUTE_ID = 'route_id';
    const QS = 'qs';

    /**
     * Get value for rule_id
     * @return int
     */
    public function getId();

    /**
     * Set value for rule_id
     * @param int $value
     * @return void
     */
    public function setId($value);

    /**
     * Get value for route_id
     * @return int
     */
    public function getRouteId();

    /**
     * Set value for route_id
     * @param int $value
     * @return void
     */
    public function setRouteId($value);

    /**
     * Get value for qs
     * @return string
     */
    public function getQs();

    /**
     * Set value for qs
     * @param string $value
     * @return void
     */
    public function setQs($value);

    /**
     * Retrieve existing extension attributes object or create a new one
     * @return \MSP\ReLinkerCoreProcessors\Api\Data\RouteExExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object
     * @param \MSP\ReLinkerCoreProcessors\Api\Data\RouteExExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \MSP\ReLinkerCoreProcessors\Api\Data\RouteExExtensionInterface $extensionAttributes
    );
}
