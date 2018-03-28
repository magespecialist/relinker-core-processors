<?php
/**
 * Automatically created by MageSpecialist CodeMonkey
 * https://github.com/magespecialist/m2-MSP_CodeMonkey
 */

declare(strict_types=1);

namespace MSP\ReLinkerCoreProcessors\Api;

interface RouteExSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{
    /**
     * Get an array of objects
     * @return \MSP\ReLinkerCoreProcessors\Api\Data\RouteExInterface[]
     */
    public function getItems();

    /**
     * Set objects list
     * @param \MSP\ReLinkerCoreProcessors\Api\Data\RouteExInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
