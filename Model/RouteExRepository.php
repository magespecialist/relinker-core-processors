<?php
/**
 * Automatically created by MageSpecialist CodeMonkey
 * https://github.com/magespecialist/m2-MSP_CodeMonkey
 */

declare(strict_types=1);

namespace MSP\ReLinkerCoreProcessors\Model;

use Magento\Framework\Api\SearchCriteriaInterface;

/**
 * @SuppressWarnings(PHPMD.ShortVariable)
 * @SuppressWarnings(PHPMD.LongVariable)
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class RouteExRepository implements \MSP\ReLinkerCoreProcessors\Api\RouteExRepositoryInterface
{
    /**
     * @var \MSP\ReLinkerCoreProcessors\Model\RouteEx\Command\SaveInterface
     */
    private $commandSave;

    /**
     * @var \MSP\ReLinkerCoreProcessors\Model\RouteEx\Command\GetInterface
     */
    private $commandGet;
    /**
     * @var \MSP\ReLinkerCoreProcessors\Model\RouteEx\Command\GetByRouteIdInterface
     */
    private $commandGetByRouteId;

    /**
     * @var \MSP\ReLinkerCoreProcessors\Model\RouteEx\Command\DeleteInterface
     */
    private $commandDeleteById;

    /**
     * @var \MSP\ReLinkerCoreProcessors\Model\RouteEx\Command\GetListInterface
     */
    private $commandGetList;

    /**
     * @param \MSP\ReLinkerCoreProcessors\Model\RouteEx\Command\SaveInterface $commandSave
     * @param \MSP\ReLinkerCoreProcessors\Model\RouteEx\Command\GetInterface $commandGet
     * @param \MSP\ReLinkerCoreProcessors\Model\RouteEx\Command\GetByRouteIdInterface $commandGetByRouteId
     * @param \MSP\ReLinkerCoreProcessors\Model\RouteEx\Command\DeleteInterface $commandDeleteById
     * @param \MSP\ReLinkerCoreProcessors\Model\RouteEx\Command\GetListInterface $commandGetList
     */
    public function __construct(
        \MSP\ReLinkerCoreProcessors\Model\RouteEx\Command\SaveInterface $commandSave,
        \MSP\ReLinkerCoreProcessors\Model\RouteEx\Command\GetInterface $commandGet,
        \MSP\ReLinkerCoreProcessors\Model\RouteEx\Command\GetByRouteIdInterface $commandGetByRouteId,
        \MSP\ReLinkerCoreProcessors\Model\RouteEx\Command\DeleteInterface $commandDeleteById,
        \MSP\ReLinkerCoreProcessors\Model\RouteEx\Command\GetListInterface $commandGetList
    ) {
        $this->commandSave = $commandSave;
        $this->commandGet = $commandGet;
        $this->commandGetByRouteId = $commandGetByRouteId;
        $this->commandDeleteById = $commandDeleteById;
        $this->commandGetList = $commandGetList;
    }

    /**
     * @inheritdoc
     */
    public function save(\MSP\ReLinkerCoreProcessors\Api\Data\RouteExInterface $routeEx): int
    {
        return $this->commandSave->execute($routeEx);
    }

    /**
     * @inheritdoc
     */
    public function get(int $routeExId): \MSP\ReLinkerCoreProcessors\Api\Data\RouteExInterface
    {
        return $this->commandGet->execute($routeExId);
    }

    /**
     * @inheritdoc
     */
    public function getByRouteId(int $routeId): \MSP\ReLinkerCoreProcessors\Api\Data\RouteExInterface
    {
        return $this->commandGetByRouteId->execute($routeId);
    }

    /**
     * @inheritdoc
     */
    public function deleteById(int $routeExId)
    {
        $this->commandDeleteById->execute($routeExId);
    }

    /**
     * @inheritdoc
     */
    public function getList(
        SearchCriteriaInterface $searchCriteria = null
    ): \MSP\ReLinkerCoreProcessors\Api\RouteExSearchResultsInterface {
        return $this->commandGetList->execute($searchCriteria);
    }
}
