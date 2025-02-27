<?php

namespace ShopMagicVendor\Getresponse\Sdk\Operation\Model;

use ShopMagicVendor\Getresponse\Sdk\Client\Operation\BaseModel;
class NewShop extends BaseModel
{
    /** @var string */
    private $name;
    /** @var string */
    private $locale;
    /** @var string */
    private $currency;
    /**
     * @param string $name
     * @param string $locale
     * @param string $currency
     */
    public function __construct($name, $locale, $currency)
    {
        $this->name = $name;
        $this->locale = $locale;
        $this->currency = $currency;
    }
    public function jsonSerialize(): array
    {
        $data = ['name' => $this->name, 'locale' => $this->locale, 'currency' => $this->currency];
        return $this->filterUnsetFields($data);
    }
}
