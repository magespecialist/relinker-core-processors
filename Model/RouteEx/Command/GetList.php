<?php
/**
 * Automatically created by MageSpecialist CodeMonkey
 * https://github.com/magespecialist/m2-MSP_CodeMonkey
 */

declare(strict_types=1);

namespace MSP\ReLinkerCoreProcessors\Model\RouteEx\Command;

use Magento\Framework\Api\SearchCriteriaBuilder;

/**
 * @inheritdoc
 */
class GetList implements GetListInterface
{
    /**
     * @var \MSP\ReLinkerCoreProcessors\Model\ResourceModel\RouteEx\CollectionFactory
     */
    private $collectionFactory;

    /**
     * @var \MSP\ReLinkerCoreProcessors\Api\RouteExSearchResultsInterfaceFactory
     */
    private $searchResultsFactory;

    /**
     * @var SearchCriteriaBuilder
     */
    private $searchCriteriaBuilder;

    /**
     * @param \MSP\ReLinkerCoreProcessors\Model\ResourceModel\RouteEx\CollectionFactory $collectionFactory
     * @param \MSP\ReLinkerCoreProcessors\Api\RouteExSearchResultsInterfaceFactory $searchResultsFactory
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @SuppressWarnings(PHPMD.LongVariable)
     */
    public function __construct(
        \MSP\ReLinkerCoreProcessors\Model\ResourceModel\RouteEx\CollectionFactory $collectionFactory,
        \MSP\ReLinkerCoreProcessors\Api\RouteExSearchResultsInterfaceFactory $searchResultsFactory,
        SearchCriteriaBuilder $searchCriteriaBuilder
    ) {
        $this->collectionFactory = $collectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
    }

    /**
     * @inheritdoc
     */
    public function execute(): \MSP\ReLinkerCoreProcessors\Api\RouteExSearchResultsInterface
    {
        /** @var \MSP\ReLinkerCoreProcessors\Model\ResourceModel\RouteEx\Collection $collection */
        $collection = $this->collectionFactory->create();

        /** @var \MSP\ReLinkerCoreProcessors\Api\RouteExSearchResultsInterface $searchResult */
        $searchResult = $this->searchResultsFactory->create();
        $searchResult->setItems($collection->getItems());
        $searchResult->setTotalCount($collection->getSize());
        $searchResult->setSearchCriteria($this->searchCriteriaBuilder->create());

        return $searchResult;
    }
}
