<?php

namespace ShopMagicVendor\Getresponse\Sdk\Operation\Model;

use ShopMagicVendor\Getresponse\Sdk\Client\Operation\BaseModel;
class NewContactTag extends BaseModel
{
    /** @var string */
    private $tagId;
    /**
     * @param string $tagId
     */
    public function __construct($tagId)
    {
        $this->tagId = $tagId;
    }
    public function jsonSerialize(): array
    {
        $data = ['tagId' => $this->tagId];
        return $this->filterUnsetFields($data);
    }
}
