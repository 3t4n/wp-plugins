<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace Prokerala\Api\Astrology\Result\Horoscope\DivisionalPlanetPositions;

use Prokerala\Api\Astrology\Result\Element\Nakshatra;
use Prokerala\Api\Astrology\Result\Element\Planet;
use Prokerala\Api\Astrology\Result\Element\Rasi;
use Prokerala\Api\Astrology\Result\Element\Bhava;
use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;
final class DivisionalPlanetPosition implements ResultInterface
{
    use RawResponseTrait;
    /**
     * @var \Prokerala\Api\Astrology\Result\Element\Planet
     */
    private $planet;
    /**
     * @var \Prokerala\Api\Astrology\Result\Element\Nakshatra
     */
    private $nakshatra;
    /**
     * @var \Prokerala\Api\Astrology\Result\Element\Bhava
     */
    private $house;
    /**
     * @var \Prokerala\Api\Astrology\Result\Element\Rasi
     */
    private $rasi;
    /**
     * @var float
     */
    private $signDegree;
    /**
     * @var float
     */
    private $longitude;
    /**
     * @var \Prokerala\Api\Astrology\Result\Horoscope\DivisionalPlanetPositions\HouseDivision
     */
    private $division;
    public function __construct(Planet $planet, Nakshatra $nakshatra, Bhava $house, Rasi $rasi, float $signDegree, float $longitude, \Prokerala\Api\Astrology\Result\Horoscope\DivisionalPlanetPositions\HouseDivision $division)
    {
        $this->planet = $planet;
        $this->nakshatra = $nakshatra;
        $this->house = $house;
        $this->rasi = $rasi;
        $this->signDegree = $signDegree;
        $this->longitude = $longitude;
        $this->division = $division;
    }
    public function getPlanet(): Planet
    {
        return $this->planet;
    }
    public function getNakshatra(): Nakshatra
    {
        return $this->nakshatra;
    }
    public function getHouse(): Bhava
    {
        return $this->house;
    }
    public function getRasi(): Rasi
    {
        return $this->rasi;
    }
    public function getSignDegree(): float
    {
        return $this->signDegree;
    }
    public function getLongitude(): float
    {
        return $this->longitude;
    }
    public function getDivision(): \Prokerala\Api\Astrology\Result\Horoscope\DivisionalPlanetPositions\HouseDivision
    {
        return $this->division;
    }
}
