<?php

namespace Prokerala\Api\Numerology\Result\Pythagorean;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;
use Prokerala\Api\Numerology\Result\Pythagorean\Components\KarmicNumber;
class KarmicLessonResult implements ResultInterface
{
    use RawResponseTrait;
    /**
     * @var \Prokerala\Api\Numerology\Result\Pythagorean\Components\KarmicNumber
     */
    private $karmicLessonNumber;
    /**
     * @var \Prokerala\Api\Numerology\Result\Pythagorean\NameChart
     */
    private $nameChart;
    public function __construct(KarmicNumber $karmicLessonNumber, \Prokerala\Api\Numerology\Result\Pythagorean\NameChart $nameChart)
    {
        $this->karmicLessonNumber = $karmicLessonNumber;
        $this->nameChart = $nameChart;
    }
    public function getKarmicLessonNumber(): KarmicNumber
    {
        return $this->karmicLessonNumber;
    }
    public function getNameChart(): \Prokerala\Api\Numerology\Result\Pythagorean\NameChart
    {
        return $this->nameChart;
    }
}
