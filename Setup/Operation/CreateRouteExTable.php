<?php
/**
 * Copyright © MageSpecialist - Skeeller srl. All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace MSP\ReLinkerCoreProcessors\Setup\Operation;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\SchemaSetupInterface;

class CreateRouteExTable
{
    const TABLE_NAME_ROUTE_EXT = 'msp_relinker_route_core_processors_ex';

    /**
     * @param SchemaSetupInterface $setup
     * @return void
     * @throws \Zend_Db_Exception
     */
    public function execute(SchemaSetupInterface $setup)
    {
        $table = $setup->getConnection()->newTable(
            $setup->getTable(self::TABLE_NAME_ROUTE_EXT)
        )->setComment(
            'MSP ReLinker Route Extension Table'
        );

        $table = $this->addFields($table);
        $table = $this->addIndexes($setup, $table);

        $setup->getConnection()->createTable($table);
    }

    /**
     * Add fields
     * @param Table $table
     * @return Table
     * @throws \Zend_Db_Exception
     */
    private function addFields(Table $table): Table
    {
        $table
            ->addColumn(
                'msp_relinker_core_processors_id',
                Table::TYPE_INTEGER,
                null,
                [
                    'identity' => true,
                    'unsigned' => true,
                    'nullable' => false,
                    'primary' => true,
                ],
                'Core processors ID'
            )

            ->addColumn(
                'route_id',
                Table::TYPE_INTEGER,
                null,
                [
                    'nullable' => false,
                    'unsigned' => true,
                ],
                'Route ID'
            )
            ->addColumn(
                'qs',
                Table::TYPE_TEXT,
                null,
                [
                    'nullable' => true,
                ],
                'Query String'
            );

        return $table;
    }

    /**
     * Add indexes
     * @param SchemaSetupInterface $setup
     * @param Table $table
     * @return Table
     * @throws \Zend_Db_Exception
     */
    private function addIndexes(SchemaSetupInterface $setup, Table $table): Table
    {
        $table
            ->addForeignKey(
                $setup->getFkName(
                    $setup->getTable(self::TABLE_NAME_ROUTE_EXT),
                    'route_id',
                    $setup->getTable('msp_relinker_route'),
                    'route_id'
                ),
                'route_id',
                $setup->getTable('msp_relinker_route'),
                'route_id',
                Table::ACTION_CASCADE
            );

        return $table;
    }
}
