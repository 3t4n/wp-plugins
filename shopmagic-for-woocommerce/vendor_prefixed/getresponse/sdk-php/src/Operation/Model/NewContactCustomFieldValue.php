<?php

namespace ShopMagicVendor\Getresponse\Sdk\Operation\Model;

use ShopMagicVendor\Getresponse\Sdk\Client\Operation\BaseModel;
class NewContactCustomFieldValue extends BaseModel
{
    /** @var string */
    private $customFieldId;
    /** @var array */
    private $value;
    /**
     * @param string $customFieldId
     * @param array $value
     */
    public function __construct($customFieldId, array $value)
    {
        $this->customFieldId = $customFieldId;
        $this->value = $value;
    }
    public function jsonSerialize(): array
    {
        $data = ['customFieldId' => $this->customFieldId, 'value' => $this->value];
        return $this->filterUnsetFields($data);
    }
}
