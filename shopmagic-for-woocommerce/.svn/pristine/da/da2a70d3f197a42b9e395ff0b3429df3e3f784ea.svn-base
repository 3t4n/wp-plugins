<?php

namespace ShopMagicVendor\Getresponse\Sdk\Operation\Addresses\UpdateAddress;

use ShopMagicVendor\Getresponse\Sdk\Client\Exception\InvalidCommandDataException;
use ShopMagicVendor\Getresponse\Sdk\Client\Operation\CommandOperation;
use ShopMagicVendor\Getresponse\Sdk\Client\Operation\Operation;
use ShopMagicVendor\Getresponse\Sdk\OperationVersionTrait;
use ShopMagicVendor\Getresponse\Sdk\Operation\Model\UpdateAddress as ModelUpdateAddress;
class UpdateAddress extends CommandOperation
{
    use OperationVersionTrait;
    public const METHOD_URL = '/v3/addresses/{addressId}';
    /** @var ModelUpdateAddress */
    protected $data;
    /** @var string */
    private $addressId;
    /**
     * @param ModelUpdateAddress $data
     * @param string $addressId
     */
    public function __construct(ModelUpdateAddress $data, $addressId)
    {
        $this->data = $data;
        $this->addressId = $addressId;
    }
    /**
     * @return string
     */
    public function buildUrlFromTemplate()
    {
        return str_ireplace(['{addressId}'], [$this->addressId], self::METHOD_URL);
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
