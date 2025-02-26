<?php

declare (strict_types=1);
namespace Prokerala\Api\Numerology\Result\Pythagorean\Components;

use Prokerala\Api\Numerology\Result\Pythagorean\NameChart;
class TransitCycleNumber
{
    /**
     * @var Cycle[]
     */
    private $physical;
    /**
     * @var Cycle[]
     */
    private $mental;
    /**
     * @var Cycle[]
     */
    private $spiritual;
    /**
     * @param Cycle[] $physical
     * @param Cycle[] $mental
     * @param Cycle[] $spiritual
     */
    public function __construct(array $physical, array $mental, array $spiritual)
    {
        $this->physical = $physical;
        $this->mental = $mental;
        $this->spiritual = $spiritual;
    }
    /**
     * @return Cycle[]
     */
    public function getPhysical(): array
    {
        return $this->physical;
    }
    /**
     * @return Cycle[]
     */
    public function getMental(): array
    {
        return $this->mental;
    }
    /**
     * @return Cycle[]
     */
    public function getSpiritual(): array
    {
        return $this->spiritual;
    }
}
