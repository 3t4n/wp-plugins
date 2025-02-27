<?php

namespace ShopMagicVendor\Getresponse\Sdk\Operation\Shops\UpdateShop;

use ShopMagicVendor\Getresponse\Sdk\Client\Exception\InvalidCommandDataException;
use ShopMagicVendor\Getresponse\Sdk\Client\Operation\CommandOperation;
use ShopMagicVendor\Getresponse\Sdk\Client\Operation\Operation;
use ShopMagicVendor\Getresponse\Sdk\OperationVersionTrait;
use ShopMagicVendor\Getresponse\Sdk\Operation\Model\UpdateShop as ModelUpdateShop;
class UpdateShop extends CommandOperation
{
    use OperationVersionTrait;
    public const METHOD_URL = '/v3/shops/{shopId}';
    /** @var ModelUpdateShop */
    protected $data;
    /** @var string */
    private $shopId;
    /**
     * @param ModelUpdateShop $data
     * @param string $shopId
     */
    public function __construct(ModelUpdateShop $data, $shopId)
    {
        $this->data = $data;
        $this->shopId = $shopId;
    }
    /**
     * @return string
     */
    public function buildUrlFromTemplate()
    {
        return str_ireplace(['{shopId}'], [$this->shopId], self::METHOD_URL);
    }
    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->buildUrlFromTemplate();
    }
    /**
     * @return string
     */
    public function getMethod()
    {
        return Operation::POST;
    }
    /**
     * @return string
     * @throws InvalidCommandDataException
     */
    public function getBody()
    {
        return $this->encode($this->data->jsonSerialize());
    }
    /**
     * @return int
     */
    public function getSuccessCode()
    {
        return 200;
    }
}
