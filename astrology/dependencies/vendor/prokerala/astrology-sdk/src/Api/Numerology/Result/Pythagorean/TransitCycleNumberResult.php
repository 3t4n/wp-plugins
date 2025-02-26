<?php

namespace Prokerala\Api\Numerology\Result\Pythagorean;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;
use Prokerala\Api\Numerology\Result\Pythagorean\Components\TransitCycleNumber;
class TransitCycleNumberResult implements ResultInterface
{
    use RawResponseTrait;
    /**
     * @var \Prokerala\Api\Numerology\Result\Pythagorean\Components\TransitCycleNumber
     */
    private $transitCycleNumber;
    /**
     * @var \Prokerala\Api\Numerology\Result\Pythagorean\NameChart
     */
    private $nameChart;
    public function __construct(TransitCycleNumber $transitCycleNumber, \Prokerala\Api\Numerology\Result\Pythagorean\NameChart $nameChart)
    {
        $this->transitCycleNumber = $transitCycleNumber;
        $this->nameChart = $nameChart;
    }
    public function getNameChart(): \Prokerala\Api\Numerology\Result\Pythagorean\NameChart
    {
        return $this->nameChart;
    }
    public function getTransitCycleNumber(): TransitCycleNumber
    {
        return $this->transitCycleNumber;
    }
}
