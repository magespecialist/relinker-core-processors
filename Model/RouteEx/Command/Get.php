<?php
/**
 * Automatically created by MageSpecialist CodeMonkey
 * https://github.com/magespecialist/m2-MSP_CodeMonkey
 */

declare(strict_types=1);

namespace MSP\ReLinkerCoreProcessors\Model\RouteEx\Command;

use Magento\Framework\Exception\NoSuchEntityException;

/**
 * @inheritdoc
 */
class Get implements GetInterface
{
    /**
     * @var \MSP\ReLinkerCoreProcessors\Model\ResourceModel\RouteEx
     */
    private $resource;

    /**
     * @var \MSP\ReLinkerCoreProcessors\Api\Data\RouteExInterfaceFactory
     */
    private $factory;

    /**
     * @param \MSP\ReLinkerCoreProcessors\Model\ResourceModel\RouteEx $resource
     * @param \MSP\ReLinkerCoreProcessors\Api\Data\RouteExInterfaceFactory $factory
     */
    public function __construct(
        \MSP\ReLinkerCoreProcessors\Model\ResourceModel\RouteEx $resource,
        \MSP\ReLinkerCoreProcessors\Api\Data\RouteExInterfaceFactory $factory
    ) {
        $this->resource = $resource;
        $this->factory = $factory;
    }

    /**
     * @inheritdoc
     */
    public function execute(int $routeExId): \MSP\ReLinkerCoreProcessors\Api\Data\RouteExInterface
    {
        /** @var \MSP\ReLinkerCoreProcessors\Api\Data\RouteExInterface $routeEx */
        $routeEx = $this->factory->create();
        $this->resource->load(
            $routeEx,
            $routeExId,
            \MSP\ReLinkerCoreProcessors\Api\Data\RouteExInterface::ID
        );

        if (null === $routeEx->getId()) {
            throw new NoSuchEntityException(__('RouteEx with id "%value" does not exist.', [
                'value' => $routeExId
            ]));
        }

        return $routeEx;
    }
}
