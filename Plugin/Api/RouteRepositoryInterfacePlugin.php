<?php
/**
 * Copyright © MageSpecialist - Skeeller srl. All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace MSP\ReLinkerCoreProcessors\Plugin\Api;

use MSP\ReLinkerApi\Api\Data\RouteInterface;
use MSP\ReLinkerApi\Api\RouteRepositoryInterface;
use MSP\ReLinkerCoreProcessors\Model\RouteExPersist;

class RouteRepositoryInterfacePlugin
{
    /**
     * @var RouteExPersist
     */
    private $routeExPersist;

    /**
     * RouteRepositoryInterfacePlugin constructor.
     * @param RouteExPersist $routeExPersist
     */
    public function __construct(
        RouteExPersist $routeExPersist
    ) {
        $this->routeExPersist = $routeExPersist;
    }

    /**
     * @param RouteRepositoryInterface $subject
     * @param RouteInterface $result
     * @return RouteInterface
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function afterGet(RouteRepositoryInterface $subject, $result): RouteInterface
    {
        $this->routeExPersist->load($result);
        return $result;
    }

    /**
     * @param RouteRepositoryInterface $subject
     * @param RouteInterface $result
     * @return RouteInterface
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function afterGetByPath(RouteRepositoryInterface $subject, $result): RouteInterface
    {
        $this->routeExPersist->load($result);
        return $result;
    }

    /**
     * @param RouteRepositoryInterface $subject
     * @param \Closure $procede
     * @param RouteInterface $route
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     * @return int
     */
    public function aroundSave(
        RouteRepositoryInterface $subject,
        \Closure $procede,
        RouteInterface $route
    ): int {
        $routeId = $procede($route);
        $route->setId($routeId);
        $this->routeExPersist->save($route);
        return (int) $routeId;
    }
}
