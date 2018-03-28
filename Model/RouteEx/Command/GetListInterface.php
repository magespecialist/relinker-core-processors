<?php
/**
 * Automatically created by MageSpecialist CodeMonkey
 * https://github.com/magespecialist/m2-MSP_CodeMonkey
 */

declare(strict_types=1);

namespace MSP\ReLinkerCoreProcessors\Model\RouteEx\Command;

use Magento\Framework\Api\SearchCriteriaInterface;

/**
 * Find RouteEx by SearchCriteria command (Service Provider Interface - SPI)
 *
 * Separate command interface to which Repository proxies initial GetList call, could be considered as SPI - Interfaces
 * that you should extend and implement to customize current behaviour, but NOT expected to be used (called) in the code
 * of business logic directly
 *
 * @see \MSP\ReLinkerCoreProcessors\Api\RouteExRepositoryInterface
 * @api
 */
interface GetListInterface
{
    /**
     * Find RouteEx by given SearchCriteria
     * SearchCriteria is not required because load all sources is useful case
     *
     * @param SearchCriteriaInterface|null $searchCriteria
     * @return \MSP\ReLinkerCoreProcessors\Api\RouteExSearchResultsInterface
     */
    public function execute(
        SearchCriteriaInterface $searchCriteria = null
    ): \MSP\ReLinkerCoreProcessors\Api\RouteExSearchResultsInterface;
}
