<?php
/**
 * Automatically created by MageSpecialist CodeMonkey
 * https://github.com/magespecialist/m2-MSP_CodeMonkey
 */

declare(strict_types=1);

namespace MSP\ReLinkerCoreProcessors\Model;

use Magento\Framework\Exception\NoSuchEntityException;
use MSP\ReLinker\Model\RouteExtensionLoaderInterface;
use MSP\ReLinkerApi\Api\Data\RouteInterface;
use MSP\ReLinkerCoreProcessors\Api\RouteExRepositoryInterface;
use MSP\ReLinkerCoreProcessors\Api\Data\RouteExInterfaceFactory;

class RouteExPersist
{
    /**
     * @var RouteExtensionLoaderInterface
     */
    private $routeExtensionLoader;

    /**
     * @var RouteExRepositoryInterface
     */
    private $routeExRepository;

    /**
     * @var RouteExInterfaceFactory
     */
    private $routeExInterfaceFactory;

    /**
     * RouteRepositoryInterfacePlugin constructor.
     * @param RouteExtensionLoaderInterface $routeExtensionLoader
     * @param RouteExRepositoryInterface $routeExRepository
     * @param RouteExInterfaceFactory $routeExInterfaceFactory
     * @SuppressWarnings(PHPMD.LongVariables)
     */
    public function __construct(
        RouteExtensionLoaderInterface $routeExtensionLoader,
        RouteExRepositoryInterface $routeExRepository,
        RouteExInterfaceFactory $routeExInterfaceFactory
    ) {
        $this->routeExtensionLoader = $routeExtensionLoader;
        $this->routeExRepository = $routeExRepository;
        $this->routeExInterfaceFactory = $routeExInterfaceFactory;
    }

    /**
     * Load extension attributes
     * @param RouteInterface $route
     */
    public function load(RouteInterface $route)
    {
        $this->routeExtensionLoader->execute($route);
        $extension = $route->getExtensionAttributes();

        try {
            $routeEx = $this->routeExRepository->getByRouteId((int) $route->getId());
            $extension->setQs($routeEx->getQs());
        } catch (NoSuchEntityException $e) {
            $extension->setQs(null);
        }
    }

    /**
     * Save extension attributes
     * @param RouteInterface $route
     */
    public function save(RouteInterface $route)
    {
        $extensionAttributes = $route->getExtensionAttributes();

        if (!$extensionAttributes) {
            return;
        }

        try {
            $routeEx = $this->routeExRepository->getByRouteId((int) $route->getId());
        } catch (NoSuchEntityException $e) {
            $routeEx = $this->routeExInterfaceFactory->create();
        }

        if ($extensionAttributes->getQs() !== null) {
            $routeEx->setQs($extensionAttributes->getQs());
        }

        $routeEx->setRouteId($route->getId());
        $this->routeExRepository->save($routeEx);
    }
}
