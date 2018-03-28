<?php
/**
 * Automatically created by MageSpecialist CodeMonkey
 * https://github.com/magespecialist/m2-MSP_CodeMonkey
 */

declare(strict_types=1);

namespace MSP\ReLinkerCoreProcessors\Api;

/**
 * @SuppressWarnings(PHPMD.ShortVariable)
 */
interface RouteExRepositoryInterface
{
    /**
     * Save RouteEx
     * @param \MSP\ReLinkerCoreProcessors\Api\Data\RouteExInterface $routeEx
     * @return int
     */
    public function save(\MSP\ReLinkerCoreProcessors\Api\Data\RouteExInterface $routeEx): int;

    /**
     * Get RouteEx by id
     * @param int $routeExIid
     * @return \MSP\ReLinkerCoreProcessors\Api\Data\RouteExInterface
     */
    public function get(int $routeExIid): \MSP\ReLinkerCoreProcessors\Api\Data\RouteExInterface;

    /**
     * Get by RouteId value
     * @param int $routeId
     * @return \MSP\ReLinkerCoreProcessors\Api\Data\RouteExInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getByRouteId(int $routeId): \MSP\ReLinkerCoreProcessors\Api\Data\RouteExInterface;

    /**
     * Delete RouteEx
     * @param int $routeExIid
     * @return void
     */
    public function deleteById(int $routeExIid);

    /**
     * Get a list of RouteEx
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \MSP\ReLinkerCoreProcessors\Api\RouteExSearchResultsInterface
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria = null
    ): \MSP\ReLinkerCoreProcessors\Api\RouteExSearchResultsInterface;
}
