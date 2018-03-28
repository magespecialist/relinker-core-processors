<?php
/**
 * Automatically created by MageSpecialist CodeMonkey
 * https://github.com/magespecialist/m2-MSP_CodeMonkey
 */

declare(strict_types=1);

namespace MSP\ReLinkerCoreProcessors\Model\RouteEx\Command;

use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Get RouteEx by routeExId command (Service Provider Interface - SPI)
 *
 * Separate command interface to which Repository proxies initial Get call, could be considered as SPI - Interfaces
 * that you should extend and implement to customize current behaviour, but NOT expected to be used (called) in the code
 * of business logic directly
 *
 * @see \MSP\ReLinkerCoreProcessors\Api\RouteExRepositoryInterface
 * @api
 */
interface GetInterface
{
    /**
     * Get RouteEx data by given routeExId
     *
     * @param int $routeExId
     * @return \MSP\ReLinkerCoreProcessors\Api\Data\RouteExInterface
     * @throws NoSuchEntityException
     */
    public function execute(int $routeExId): \MSP\ReLinkerCoreProcessors\Api\Data\RouteExInterface;
}
