<?php

namespace Skrepr\SymfonyAgGridBundle\Data\Filter;

use Skrepr\SymfonyAgGridBundle\Data\Filter\Type\Type;

class WherePart
{
    /**
     * @var string
     */
    private $key;

    /**
     * @var Type[]
     */
    private $items;

    /**
     * @var string|null
     */
    private $operator;

    /**
     * @var string|null
     */
    private $sqlString;

    public function __construct(string $key)
    {
        $this->key = $key;
        $this->items = [];
    }

    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @return WherePart
     */
    public function setKey(string $key): self
    {
        $this->key = $key;

        return $this;
    }

    /**
     * @return Type[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param Type[] $items
     */
    public function setItems(array $items): WherePart
    {
        $this->items = $items;

        return $this;
    }

    public function addItem(Type $item): WherePart
    {
        $this->items[] = $item;

        return $this;
    }

    public function getOperator(): ?string
    {
        return $this->operator;
    }

    public function setOperator(?string $operator): WherePart
    {
        $this->operator = $operator;

        return $this;
    }

    public function getSqlString(): ?string
    {
        return $this->sqlString;
    }

    public function setSqlString(?string $sqlString): WherePart
    {
        $this->sqlString = $sqlString;

        return $this;
    }
}
