<?php
/**
 * Automatically created by MageSpecialist CodeMonkey
 * https://github.com/magespecialist/m2-MSP_CodeMonkey
 */

declare(strict_types=1);

namespace MSP\ReLinkerCoreProcessors\Model\ResourceModel\RouteEx;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * @SuppressWarnings(PHPMD.CamelCaseMethodName)
 */
class Collection extends AbstractCollection
{
    protected $_idFieldName = \MSP\ReLinkerCoreProcessors\Api\Data\RouteExInterface::ID;

    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init(
            \MSP\ReLinkerCoreProcessors\Model\RouteEx::class,
            \MSP\ReLinkerCoreProcessors\Model\ResourceModel\RouteEx::class
        );
    }
}
