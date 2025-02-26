<?php

declare (strict_types=1);
namespace Prokerala\Api\Numerology\Result\Pythagorean\Components;

class PeriodCycleNumber
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var PeriodCycle[]
     */
    private $cycles;
    /**
     * @param PeriodCycle[] $cycles
     */
    public function __construct(string $name, array $cycles)
    {
        $this->name = $name;
        $this->cycles = $cycles;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getCycles(): array
    {
        return $this->cycles;
    }
}
