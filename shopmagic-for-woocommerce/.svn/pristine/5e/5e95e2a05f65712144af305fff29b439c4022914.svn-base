<?php

namespace ShopMagicVendor\Getresponse\Sdk\Operation\Model;

use ShopMagicVendor\Getresponse\Sdk\Client\Operation\BaseModel;
class NewProductVariantImage extends BaseModel
{
    /** @var string */
    private $src;
    /** @var int */
    private $position;
    /**
     * @param string $src
     * @param int $position
     */
    public function __construct($src, $position)
    {
        $this->src = $src;
        $this->position = $position;
    }
    public function jsonSerialize(): array
    {
        $data = ['src' => $this->src, 'position' => $this->position];
        return $this->filterUnsetFields($data);
    }
}
