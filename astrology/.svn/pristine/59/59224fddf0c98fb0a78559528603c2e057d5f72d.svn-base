<?php

namespace Prokerala\Api\Numerology\Result\Pythagorean;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;
use Prokerala\Api\Numerology\Result\Pythagorean\Components\PlanesOfExpressionNumber;
class PlanesOfExpression implements ResultInterface
{
    use RawResponseTrait;
    /**
     * @var \Prokerala\Api\Numerology\Result\Pythagorean\Components\PlanesOfExpressionNumber
     */
    private $planesOfExpression;
    /**
     * @var \Prokerala\Api\Numerology\Result\Pythagorean\NameChart
     */
    private $nameChart;
    public function __construct(PlanesOfExpressionNumber $planesOfExpression, \Prokerala\Api\Numerology\Result\Pythagorean\NameChart $nameChart)
    {
        $this->planesOfExpression = $planesOfExpression;
        $this->nameChart = $nameChart;
    }
    public function getPlanesOfExpression(): PlanesOfExpressionNumber
    {
        return $this->planesOfExpression;
    }
    public function getNameChart(): \Prokerala\Api\Numerology\Result\Pythagorean\NameChart
    {
        return $this->nameChart;
    }
}
