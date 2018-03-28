<?php
/**
 * Copyright © MageSpecialist - Skeeller srl. All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace MSP\ReLinkerCoreProcessors\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use MSP\ReLinkerCoreProcessors\Setup\Operation\CreateRouteExTable;

class InstallSchema implements InstallSchemaInterface
{
    /**
     * @var CreateRouteExTable
     */
    private $createRouteExTable;

    /**
     * InstallSchema constructor.
     * @param CreateRouteExTable $createRouteExTable
     */
    public function __construct(
        CreateRouteExTable $createRouteExTable
    ) {

        $this->createRouteExTable = $createRouteExTable;
    }

    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $this->createRouteExTable->execute($setup);
        $setup->endSetup();
    }
}
