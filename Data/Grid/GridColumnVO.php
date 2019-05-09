<?php

namespace Ansien\SymfonyAgGridBundle\Data\Grid;

class GridColumnVO
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $displayName;

    /**
     * @var string
     */
    private $field;

    /**
     * @var string
     */
    private $aggFunc;

    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return GridColumnVO
     */
    public function setId(string $id): IColumnVO
    {
        $this->id = $id;

        return $this;
    }

    public function getDisplayName(): string
    {
        return $this->displayName;
    }

    /**
     * @return GridColumnVO
     */
    public function setDisplayName(string $displayName): IColumnVO
    {
        $this->displayName = $displayName;

        return $this;
    }

    public function getField(): string
    {
        return $this->field;
    }

    /**
     * @return GridColumnVO
     */
    public function setField(string $field): IColumnVO
    {
        $this->field = $field;

        return $this;
    }

    public function getAggFunc(): string
    {
        return $this->aggFunc;
    }

    /**
     * @return GridColumnVO
     */
    public function setAggFunc(string $aggFunc): IColumnVO
    {
        $this->aggFunc = $aggFunc;

        return $this;
    }
}
