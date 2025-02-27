<?php

namespace ShopMagicVendor\Getresponse\Sdk\Operation\Model;

use ShopMagicVendor\Getresponse\Sdk\Client\Operation\BaseEnum;
class StatusEnum extends BaseEnum
{
    public const ENABLED = 'enabled';
    public const DISABLED = 'disabled';
    /**
     * @return bool
     */
    public function isMultiple()
    {
        return \false;
    }
    /**
     * @return array
     */
    public function getAllowedValues()
    {
        return [self::ENABLED, self::DISABLED];
    }
    /**
     * @return string
     */
    public function jsonSerialize(): string
    {
        return $this->value;
    }
}
