<?php

declare (strict_types=1);
namespace Prokerala\Api\Astrology\Result\Horoscope\PlanetRelationship;

use Prokerala\Api\Astrology\Result\Element\Planet;
class PlanetRelation
{
    /**
     * @var \Prokerala\Api\Astrology\Result\Element\Planet
     */
    private $first_planet;
    /**
     * @var \Prokerala\Api\Astrology\Result\Element\Planet
     */
    private $second_planet;
    /**
     * @var string
     */
    private $relationship;
    public function __construct(Planet $first_planet, Planet $second_planet, string $relationship)
    {
        $this->first_planet = $first_planet;
        $this->second_planet = $second_planet;
        $this->relationship = $relationship;
    }
    public function getFirstPlanet(): Planet
    {
        return $this->first_planet;
    }
    public function getSecondPlanet(): Planet
    {
        return $this->second_planet;
    }
    public function getRelation(): string
    {
        return $this->relationship;
    }
}
