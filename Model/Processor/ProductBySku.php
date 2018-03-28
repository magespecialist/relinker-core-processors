<?php
/**
 * Copyright © MageSpecialist - Skeeller srl. All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace MSP\ReLinkerCoreProcessors\Model\Processor;

use Magento\Catalog\Api\ProductRepositoryInterface;
use MSP\ReLinkerApi\Api\Data\ProcessorInterface;
use MSP\ReLinkerApi\Api\Data\RouteInterface;

class ProductBySku implements ProcessorInterface
{
    const CODE = 'product_by_sku';
    const DESCRIPTION = 'Products SKU';

    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * Product constructor.
     * @param ProductRepositoryInterface $productRepository
     */
    public function __construct(
        ProductRepositoryInterface $productRepository
    ) {
        $this->productRepository = $productRepository;
    }

    /**
     * @inheritdoc
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function execute(RouteInterface $route, string $path): string
    {
        try {
            /** @var \Magento\Catalog\Model\Product $product */
            $product = $this->productRepository->get($path);
            return $product->getProductUrl();
        } catch (\Exception $e) {
            return '';
        }
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
