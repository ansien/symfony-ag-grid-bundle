<?php

namespace Skrepr\SymfonyAgGridBundle\Data\Filter\Type;

class DateType extends Type
{
    /**
     * @var string
     */
    private $dateFrom;

    /**
     * @var string|null
     */
    private $dateTo;

    public function __construct(string $filterType, string $type, string $dateFrom, ?string $dateTo = null)
    {
        parent::__construct($filterType, $type);

        $this->dateFrom = $dateFrom;
        $this->dateTo = $dateTo;
    }

    public function getDateFrom(): string
    {
        return $this->dateFrom;
    }

    public function setDateFrom(string $dateFrom): DateType
    {
        $this->dateFrom = $dateFrom;

        return $this;
    }

    public function getDateTo(): ?string
    {
        return $this->dateTo;
    }

    public function setDateTo(?string $dateTo): DateType
    {
        $this->dateTo = $dateTo;

        return $this;
    }
}
