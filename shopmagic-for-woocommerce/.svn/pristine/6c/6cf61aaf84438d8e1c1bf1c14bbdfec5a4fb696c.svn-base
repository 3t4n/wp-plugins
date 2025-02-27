<?php

namespace ShopMagicVendor\Getresponse\Sdk\Operation\Shops\Products\UpdateProduct;

use ShopMagicVendor\Getresponse\Sdk\Client\Exception\InvalidCommandDataException;
use ShopMagicVendor\Getresponse\Sdk\Client\Operation\CommandOperation;
use ShopMagicVendor\Getresponse\Sdk\Client\Operation\Operation;
use ShopMagicVendor\Getresponse\Sdk\OperationVersionTrait;
use ShopMagicVendor\Getresponse\Sdk\Operation\Model\UpdateProduct as ModelUpdateProduct;
class UpdateProduct extends CommandOperation
{
    use OperationVersionTrait;
    public const METHOD_URL = '/v3/shops/{shopId}/products/{productId}';
    /** @var ModelUpdateProduct */
    protected $data;
    /** @var string */
    private $shopId;
    /** @var string */
    private $productId;
    /**
     * @param ModelUpdateProduct $data
     * @param string $shopId
     * @param string $productId
     */
    public function __construct(ModelUpdateProduct $data, $shopId, $productId)
    {
        $this->data = $data;
        $this->shopId = $shopId;
        $this->productId = $productId;
    }
    /**
     * @return string
     */
    public function buildUrlFromTemplate()
    {
        return str_ireplace(['{shopId}', '{productId}'], [$this->shopId, $this->productId], self::METHOD_URL);
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
