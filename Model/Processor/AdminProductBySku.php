<?php
/**
 * Copyright © MageSpecialist - Skeeller srl. All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace MSP\ReLinkerCoreProcessors\Model\Processor;

use Magento\Backend\Model\UrlInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use MSP\ReLinkerApi\Api\Data\ProcessorInterface;
use MSP\ReLinkerApi\Api\Data\RouteInterface;

class AdminProductBySku implements ProcessorInterface
{
    const CODE = 'admin_product_by_sku';
    const DESCRIPTION = 'Products SKU (admin area)';

    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * @var UrlInterface
     */
    private $backendUrl;

    /**
     * AdminProductBySku constructor.
     * @param ProductRepositoryInterface $productRepository
     * @param UrlInterface $backendUrl
     */
    public function __construct(
        ProductRepositoryInterface $productRepository,
        UrlInterface $backendUrl
    ) {
        $this->productRepository = $productRepository;
        $this->backendUrl = $backendUrl;
    }

    /**
     * @inheritdoc
     */
    public function execute(RouteInterface $route, string $path): string
    {
        try {
            $product = $this->productRepository->get($path);
        } catch (NoSuchEntityException $e) {
            return '';
        }

        return $this->backendUrl->getUrl('catalog/product/edit', [
            'id' => $product->getId(),
        ]);
    }

    /**
     * Get processor code
     * @return string
     */
    public function getCode(): string
    {
        return self::CODE;
    }

    /**
     * Get processor description
     * @return string
     */
    public function getDescription(): string
    {
        return self::DESCRIPTION;
    }
}
