<?php

namespace ShopMagicVendor\Getresponse\Sdk\Operation\Model;

use ShopMagicVendor\Getresponse\Sdk\Client\Operation\BaseModel;
class UpdateBlacklist extends BaseModel
{
    /** @var array */
    private $masks;
    /**
     * @param array $masks
     */
    public function __construct(array $masks)
    {
        $this->masks = $masks;
    }
    public function jsonSerialize(): array
    {
        $data = ['masks' => $this->masks];
        return $this->filterUnsetFields($data);
    }
}
