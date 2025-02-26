<?php

namespace Prokerala\Api\Numerology\Result\Pythagorean;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;
use Prokerala\Api\Numerology\Result\Pythagorean\Components\EssenceNumber;
class EssenceResult implements ResultInterface
{
    use RawResponseTrait;
    /**
     * @var \Prokerala\Api\Numerology\Result\Pythagorean\Components\EssenceNumber
     */
    private $essenceNumber;
    /**
     * @var \Prokerala\Api\Numerology\Result\Pythagorean\NameChart
     */
    private $nameChart;
    public function __construct(EssenceNumber $essenceNumber, \Prokerala\Api\Numerology\Result\Pythagorean\NameChart $nameChart)
    {
        $this->essenceNumber = $essenceNumber;
        $this->nameChart = $nameChart;
    }
    public function getEssenceNumber(): EssenceNumber
    {
        return $this->essenceNumber;
    }
    public function getNameChart(): \Prokerala\Api\Numerology\Result\Pythagorean\NameChart
    {
        return $this->nameChart;
    }
}
