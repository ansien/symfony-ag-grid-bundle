<?php

namespace Skrepr\SymfonyAgGridBundle\Data\Grid;

use Skrepr\SymfonyAgGridBundle\Context\ConverterContext;
use Skrepr\SymfonyAgGridBundle\Context\GridContext;
use Skrepr\SymfonyAgGridBundle\Converter\ConverterInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class GridManager.
 * @docs: Wrapper for gridContext and gridBuilder to have a singular dependency injection point.
 *        Inject gridContext and GridBuilder separately for more control.
 */
class GridManager
{
    /**
     * @var GridContext
     */
    private $gridContext;

    /**
     * @var ConverterContext
     */
    private $converterContext;

    /**
     * @var GridBuilder
     */
    private $gridBuilder;

    public function __construct(GridContext $gridContext, ConverterContext $converterContext, GridBuilder $gridBuilder)
    {
        $this->gridContext = $gridContext;
        $this->converterContext = $converterContext;
        $this->gridBuilder = $gridBuilder;
    }

    public function getConvertedResult(GridInterface $grid, string $converterName, Request $request, $extraInput = null)
    {
        $productGridBuilder = $this->getBuilder($grid, $request);

        $converter = $this->getConverter($converterName);

        $input = $grid->getGridInput($extraInput);

        return $converter->convert($productGridBuilder, $input);
    }

    public function getGrid(string $gridName): GridInterface
    {
        return $this->gridContext->getGrid($gridName);
    }

    public function getConverter(string $converterName): ConverterInterface
    {
        return $this->converterContext->getConverter($converterName);
    }

    public function getBuilder(GridInterface $grid, Request $request): GridBuilder
    {
        return $this->gridBuilder->buildGrid($grid, $request);
    }
}
