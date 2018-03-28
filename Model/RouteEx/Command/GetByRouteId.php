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
class GetByRouteId implements GetByRouteIdInterface
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
    public function execute(int $routeId): \MSP\ReLinkerCoreProcessors\Api\Data\RouteExInterface
    {
        /** @var \MSP\ReLinkerCoreProcessors\Api\Data\RouteExInterface $routeEx */
        $routeEx = $this->factory->create();
        $this->resource->load(
            $routeEx,
            $routeId,
            \MSP\ReLinkerCoreProcessors\Api\Data\RouteExInterface::ROUTE_ID
        );

        if (null === $routeEx->getId()) {
            throw new NoSuchEntityException(__('RouteEx with routeId "%value" does not exist.', [
                'value' => $routeId
            ]));
        }

        return $routeEx;
    }
}
