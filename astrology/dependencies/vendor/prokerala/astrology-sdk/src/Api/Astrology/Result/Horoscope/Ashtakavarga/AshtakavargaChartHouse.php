<?php

declare (strict_types=1);
namespace Prokerala\Api\Astrology\Result\Horoscope\Ashtakavarga;

use Prokerala\Api\Astrology\Result\Element\Bhava;
use Prokerala\Api\Astrology\Result\Element\Rasi;
class AshtakavargaChartHouse
{
    /**
     * @var \Prokerala\Api\Astrology\Result\Element\Bhava
     */
    private $house;
    /**
     * @var \Prokerala\Api\Astrology\Result\Element\Rasi
     */
    private $rasi;
    /**
     * @var int
     */
    private $score;
    public function __construct(Bhava $house, Rasi $rasi, int $score)
    {
        $this->house = $house;
        $this->rasi = $rasi;
        $this->score = $score;
    }
    public function getHouse(): Bhava
    {
        return $this->house;
    }
    public function getRasi(): Rasi
    {
        return $this->rasi;
    }
    public function getScore(): int
    {
        return $this->score;
    }
}
