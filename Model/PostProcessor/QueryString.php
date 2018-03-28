<?php
/**
 * Copyright © MageSpecialist - Skeeller srl. All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace MSP\ReLinkerCoreProcessors\Model\PostProcessor;

use Magento\Framework\App\RequestInterface;
use MSP\ReLinker\Model\PostProcessor\PostProcessorInterface;
use MSP\ReLinkerApi\Api\Data\RouteInterface;

class QueryString implements PostProcessorInterface
{
    /**
     * @var RequestInterface
     */
    private $request;

    /**
     * QueryString constructor.
     * @param RequestInterface $request
     */
    public function __construct(
        RequestInterface $request
    ) {
        $this->request = $request;
    }

    /**
     * @inheritdoc
     */
    public function execute(string $url, RouteInterface $route, string $path): string
    {
        $routeQs = $route->getQs();
        if (!$routeQs) {
            $routeQs = '';
        }

        if (trim($routeQs)) {
            $originalParams = $this->request->getParams();

            if (strpos($url, '?') !== false) {
                list($url, $queryString) = explode('?', $url, 2);
            } else {
                $queryString = '';
            }

            // @codingStandardsIgnoreStart
            parse_str($queryString, $originalParams);
            parse_str($routeQs, $additionalParams);
            // @codingStandardsIgnoreEnd

            $params = array_merge($originalParams, $additionalParams);
            $newQueryString = http_build_query($params);

            if ($newQueryString !== '') {
                return $url . '?' . $newQueryString;
            }
        }

        return $url;
    }
}
