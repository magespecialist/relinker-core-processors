<?php
/**
 * Copyright © MageSpecialist - Skeeller srl. All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace MSP\ReLinkerCoreProcessors\Model\Walker;

use Magento\Catalog\Model\Product;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use Magento\Store\Model\StoreManagerInterface;
use MSP\ReLinker\Model\Walker\WalkerInterface;
use MSP\ReLinkerApi\Api\Data\RouteInterface;

class ProductBySku implements WalkerInterface
{
    /**
     * @var StoreManagerInterface
     */
    private $storeManager;

    /**
     * @var CollectionFactory
     */
    private $collectionFactory;

    /**
     * ProductBySku constructor.
     * @param StoreManagerInterface $storeManager
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(
        StoreManagerInterface $storeManager,
        CollectionFactory $collectionFactory
    ) {
        $this->storeManager = $storeManager;
        $this->collectionFactory = $collectionFactory;
    }

    /**
     * @inheritdoc
     */
    public function execute(RouteInterface $route, callable $callback)
    {
        $path = $route->getPath();
        $baseUrl = $this->storeManager->getStore()->getBaseUrl() . $path . '/';

        // Intentionally not using repositories for performance reasons
        $products = $this->collectionFactory->create();
        foreach ($products as $product) {
            /** @var Product $product */
            $productUrl = $baseUrl . $product->getSku();
            $callback($route, $product->getSku(), $productUrl);
        }
    }
}
