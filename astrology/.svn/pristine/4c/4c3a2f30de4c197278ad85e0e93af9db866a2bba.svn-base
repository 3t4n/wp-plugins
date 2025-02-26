<?php

namespace Prokerala\Api\Numerology\Result\Pythagorean\Components;

class KarmicNumber
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var Karmic[]
     */
    private $numbers;
    /**
     * @param Karmic[] $numbers
     */
    public function __construct(string $name, array $numbers)
    {
        $this->name = $name;
        $this->numbers = $numbers;
    }
    public function getName(): string
    {
        return $this->name;
    }
    /**
     * @return Karmic[]
     */
    public function getEssence(): array
    {
        return $this->numbers;
    }
}
