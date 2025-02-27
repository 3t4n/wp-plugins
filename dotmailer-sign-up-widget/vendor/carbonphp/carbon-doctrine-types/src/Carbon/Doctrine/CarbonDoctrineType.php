<?php

namespace Dotdigital_WordPress_Vendor\Carbon\Doctrine;

use Dotdigital_WordPress_Vendor\Doctrine\DBAL\Platforms\AbstractPlatform;
interface CarbonDoctrineType
{
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform);
    public function convertToPHPValue($value, AbstractPlatform $platform);
    public function convertToDatabaseValue($value, AbstractPlatform $platform);
}
