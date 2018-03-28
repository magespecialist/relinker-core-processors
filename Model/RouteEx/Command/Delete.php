<?php
/**
 * Automatically created by MageSpecialist CodeMonkey
 * https://github.com/magespecialist/m2-MSP_CodeMonkey
 */

declare(strict_types=1);

namespace MSP\ReLinkerCoreProcessors\Model\RouteEx\Command;

use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\CouldNotDeleteException;
use Psr\Log\LoggerInterface;

/**
 * @inheritdoc
 */
class Delete implements DeleteInterface
{
    /**
     * @var \MSP\ReLinkerCoreProcessors\Model\ResourceModel\RouteEx
     */
    private $resource;

    /**
     * @var GetInterface
     */
    private $commandGet;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @param \MSP\ReLinkerCoreProcessors\Model\ResourceModel\RouteEx $resource
     * @param GetInterface $commandGet
     * @param LoggerInterface $logger
     */
    public function __construct(
        \MSP\ReLinkerCoreProcessors\Model\ResourceModel\RouteEx $resource,
        GetInterface $commandGet,
        LoggerInterface $logger
    ) {
        $this->resource = $resource;
        $this->commandGet = $commandGet;
        $this->logger = $logger;
    }

    /**
     * @inheritdoc
     */
    public function execute(int $routeExId)
    {
        /** @var \MSP\ReLinkerCoreProcessors\Api\Data\RouteExInterface $routeEx */
        try {
            $routeEx = $this->commandGet->execute($routeExId);
        } catch (NoSuchEntityException $e) {
            return;
        }

        try {
            $this->resource->delete($routeEx);
        } catch (\Exception $e) {
            $this->logger->error($e->getMessage());
            throw new CouldNotDeleteException(__('Could not delete RouteEx'), $e);
        }
    }
}
