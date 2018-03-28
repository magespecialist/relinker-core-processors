<?php
/**
 * Automatically created by MageSpecialist CodeMonkey
 * https://github.com/magespecialist/m2-MSP_CodeMonkey
 */

declare(strict_types=1);

namespace MSP\ReLinkerCoreProcessors\Model\RouteEx\Command;

use Magento\Framework\Exception\CouldNotSaveException;
use Psr\Log\LoggerInterface;

/**
 * @inheritdoc
 */
class Save implements SaveInterface
{
    /**
     * @var \MSP\ReLinkerCoreProcessors\Model\ResourceModel\RouteEx
     */
    private $resource;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @param \MSP\ReLinkerCoreProcessors\Model\ResourceModel\RouteEx $resource
     * @param LoggerInterface $logger
     */
    public function __construct(
        \MSP\ReLinkerCoreProcessors\Model\ResourceModel\RouteEx $resource,
        LoggerInterface $logger
    ) {
        $this->resource = $resource;
        $this->logger = $logger;
    }

    /**
     * @inheritdoc
     */
    public function execute(\MSP\ReLinkerCoreProcessors\Api\Data\RouteExInterface $routeEx): int
    {
        try {
            $this->resource->save($routeEx);
            return (int) $routeEx->getId();
        } catch (\Exception $e) {
            $this->logger->error($e->getMessage());
            throw new CouldNotSaveException(__('Could not save RouteEx'), $e);
        }
    }
}
