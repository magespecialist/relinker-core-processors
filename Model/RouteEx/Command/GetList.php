<?php
/**
 * Automatically created by MageSpecialist CodeMonkey
 * https://github.com/magespecialist/m2-MSP_CodeMonkey
 */

declare(strict_types=1);

namespace MSP\ReLinkerCoreProcessors\Model\RouteEx\Command;

use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;

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
     * @var CollectionProcessorInterface
     */
    private $collectionProcessor;

    /**
     * @param \MSP\ReLinkerCoreProcessors\Model\ResourceModel\RouteEx\CollectionFactory $collectionFactory
     * @param \MSP\ReLinkerCoreProcessors\Api\RouteExSearchResultsInterfaceFactory $searchResultsFactory
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @SuppressWarnings(PHPMD.LongVariable)
     */
    public function __construct(
        \MSP\ReLinkerCoreProcessors\Model\ResourceModel\RouteEx\CollectionFactory $collectionFactory,
        \MSP\ReLinkerCoreProcessors\Api\RouteExSearchResultsInterfaceFactory $searchResultsFactory,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->collectionFactory = $collectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @inheritdoc
     */
    public function execute(
        SearchCriteriaInterface $searchCriteria = null
    ): \MSP\ReLinkerCoreProcessors\Api\RouteExSearchResultsInterface {
        /** @var \MSP\ReLinkerCoreProcessors\Model\ResourceModel\RouteEx\Collection $collection */
        $collection = $this->collectionFactory->create();

        if (null === $searchCriteria) {
            $searchCriteria = $this->searchCriteriaBuilder->create();
        } else {
            $this->collectionProcessor->process($searchCriteria, $collection);
        }

        /** @var \MSP\ReLinkerCoreProcessors\Api\RouteExSearchResultsInterface $searchResult */
        $searchResult = $this->searchResultsFactory->create();
        $searchResult->setItems($collection->getItems());
        $searchResult->setTotalCount($collection->getSize());
        $searchResult->setSearchCriteria($searchCriteria);

        return $searchResult;
    }
}
