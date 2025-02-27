<?php

namespace Dotdigital_WordPress_Vendor\Carbon\Doctrine;

use Dotdigital_WordPress_Vendor\Carbon\CarbonImmutable;
use Dotdigital_WordPress_Vendor\Doctrine\DBAL\Types\VarDateTimeImmutableType;
class DateTimeImmutableType extends VarDateTimeImmutableType implements CarbonDoctrineType
{
    /** @use CarbonTypeConverter<CarbonImmutable> */
    use CarbonTypeConverter;
    /**
     * @return class-string<CarbonImmutable>
     */
    protected function getCarbonClassName() : string
    {
        return CarbonImmutable::class;
    }
}
