<?php
/**
 * Automatically created by MageSpecialist CodeMonkey
 * https://github.com/magespecialist/m2-MSP_CodeMonkey
 */

declare(strict_types=1);

namespace MSP\ReLinkerCoreProcessors\Model;

use Magento\Framework\Model\AbstractExtensibleModel;

/**
 * @SuppressWarnings(PHPMD.CamelCaseMethodName)
 */
class RouteEx extends AbstractExtensibleModel implements
    \MSP\ReLinkerCoreProcessors\Api\Data\RouteExInterface
{
    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init(\MSP\ReLinkerCoreProcessors\Model\ResourceModel\RouteEx::class);
    }

    /**
     * @inheritdoc
     */
    public function getRouteId()
    {
        return $this->getData(self::ROUTE_ID);
    }

    /**
     * @inheritdoc
     */
    public function setRouteId($value)
    {
        return $this->setData(self::ROUTE_ID, $value);
    }

    /**
     * @inheritdoc
     */
    public function getQs()
    {
        return $this->getData(self::QS);
    }

    /**
     * @inheritdoc
     */
    public function setQs($value)
    {
        return $this->setData(self::QS, $value);
    }

    /**
     * @inheritdoc
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * @inheritdoc
     */
    public function setExtensionAttributes(
        \MSP\ReLinkerCoreProcessors\Api\Data\RouteExExtensionInterface $extensionAttributes
    ) {
        $this->_setExtensionAttributes($extensionAttributes);
    }
}
