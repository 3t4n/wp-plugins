<?php

namespace Prokerala\Api\Numerology\Result\Pythagorean;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;
use Prokerala\Api\Numerology\Result\Pythagorean\Components\InclusionNumber;
class InclusionTableResult implements ResultInterface
{
    use RawResponseTrait;
    /**
     * @var \Prokerala\Api\Numerology\Result\Pythagorean\Components\InclusionNumber
     */
    private $inclusionTableNumber;
    /**
     * @var \Prokerala\Api\Numerology\Result\Pythagorean\NameChart
     */
    private $nameChart;
    public function __construct(InclusionNumber $inclusionTableNumber, \Prokerala\Api\Numerology\Result\Pythagorean\NameChart $nameChart)
    {
        $this->inclusionTableNumber = $inclusionTableNumber;
        $this->nameChart = $nameChart;
    }
    public function getInclusionTableNumber(): InclusionNumber
    {
        return $this->inclusionTableNumber;
    }
    public function getNameChart(): \Prokerala\Api\Numerology\Result\Pythagorean\NameChart
    {
        return $this->nameChart;
    }
}
