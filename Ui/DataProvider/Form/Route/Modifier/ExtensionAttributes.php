<?php
/**
 * Copyright © MageSpecialist - Skeeller srl. All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace MSP\ReLinkerCoreProcessors\Ui\DataProvider\Form\Route\Modifier;

use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Ui\DataProvider\Modifier\ModifierInterface;
use MSP\ReLinkerApi\Api\Data\RouteInterface;
use MSP\ReLinkerCoreProcessors\Api\RouteExRepositoryInterface;

class ExtensionAttributes implements ModifierInterface
{
    /**
     * @var RouteExRepositoryInterface
     */
    private $routeExRepository;

    /**
     * RuleDataProviderPlugin constructor.
     * @param RouteExRepositoryInterface $routeExRepository
     */
    public function __construct(
        RouteExRepositoryInterface $routeExRepository
    ) {
        $this->routeExRepository = $routeExRepository;
    }

    /**
     * @param array $data
     * @return array
     * @since 100.1.0
     */
    public function modifyData(array $data)
    {
        foreach ($data['items'] as &$item) {
            try {
                $ext = $this->routeExRepository->getByRouteId((int) $item[RouteInterface::ID]);
                if (!isset($item['extension_attributes'])) {
                    $item['extension_attributes'] = [];
                }

                $item['extension_attributes']['qs'] = $ext->getQs();
            } catch (NoSuchEntityException $e) {
                continue;
            }
        }

        return $data;
    }

    /**
     * @param array $meta
     * @return array
     * @since 100.1.0
     */
    public function modifyMeta(array $meta)
    {
        return $meta;
    }
}
