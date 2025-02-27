<?php

namespace ShopMagicVendor\Getresponse\Sdk\Operation\Model;

use ShopMagicVendor\Getresponse\Sdk\Client\Operation\BaseModel;
abstract class ConditionType extends BaseModel
{
    /** @var string */
    private $conditionType;
    /**
     * @param string $conditionType
     */
    public function __construct($conditionType)
    {
        $this->conditionType = $conditionType;
    }
    public function jsonSerialize(): array
    {
        $data = ['conditionType' => $this->conditionType];
        return $this->filterUnsetFields($data);
    }
}
