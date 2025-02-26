<?php

namespace Prokerala\Api\Numerology\Result\Pythagorean\Components;

class EssenceNumber
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var Essence[]
     */
    private $essence;
    /**
     * @param Essence[] $essence
     */
    public function __construct(string $name, array $essence)
    {
        $this->name = $name;
        $this->essence = $essence;
    }
    public function getName(): string
    {
        return $this->name;
    }
    /**
     * @return Essence[]
     */
    public function getEssence(): array
    {
        return $this->essence;
    }
}
