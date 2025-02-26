<?php

declare (strict_types=1);
namespace Prokerala\Api\Astrology\Result\Horoscope\Ashtakavarga;

use Prokerala\Api\Astrology\Result\Element\Planet;
class AshtakavargaPlanet
{
    /**
     * @var \Prokerala\Api\Astrology\Result\Element\Planet
     */
    private $planet;
    /**
     * @var int
     */
    private $score;
    public function __construct(Planet $planet, int $score)
    {
        $this->planet = $planet;
        $this->score = $score;
    }
    public function getPlanet(): Planet
    {
        return $this->planet;
    }
    public function getScore(): int
    {
        return $this->score;
    }
}
