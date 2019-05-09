<?php

namespace Skrepr\SymfonyAgGridBundle\Data\Grid;

use Skrepr\SymfonyAgGridBundle\Data\Filter\FilterParts;
use Skrepr\SymfonyAgGridBundle\Data\ServerSideGetRowsRequest;
use Skrepr\SymfonyAgGridBundle\Handler\FilterHandler;
use Skrepr\SymfonyAgGridBundle\Util\RequestConverter;
use Symfony\Component\HttpFoundation\Request;

class GridBuilder
{
    /**
     * @var FilterHandler
     */
    private $filterHandler;

    /**
     * @var ServerSideGetRowsRequest
     */
    private $serverSideGetRowsRequest;

    /**
     * @var FilterParts
     */
    private $filterParts;

    public function __construct(FilterHandler $filterHandler)
    {
        $this->filterHandler = $filterHandler;
        $this->filterParts = [];
    }

    /**
     * @return GridBuilder
     */
    public function buildGrid(GridInterface $grid, Request $request): self
    {
        // Convert HttpFoundation request filled with AgGrid parameters to a ServerSideGetRowsRequest object.
        $this->serverSideGetRowsRequest = $this->convertRequest($request);

        // Convert the ServerSideGetRowsRequest object to a FilterParts objects we can easily work with.
        $this->filterParts = $this->filterHandler->convertRowsRequest($this->serverSideGetRowsRequest, $grid);

        return $this;
    }

    private function convertRequest(Request $request): ServerSideGetRowsRequest
    {
        if ($request->query->has('params') === false) {
            throw new \InvalidArgumentException('Query parameter "params" has to be provided.');
        }

        $params = $request->query->get('params');
        $decodedParams = json_decode($params, true);

        return RequestConverter::getRowsRequest($decodedParams);
    }

    public function getServerSideGetRowsRequest(): ServerSideGetRowsRequest
    {
        return $this->serverSideGetRowsRequest;
    }

    public function getFilterParts(): FilterParts
    {
        return $this->filterParts;
    }
}
