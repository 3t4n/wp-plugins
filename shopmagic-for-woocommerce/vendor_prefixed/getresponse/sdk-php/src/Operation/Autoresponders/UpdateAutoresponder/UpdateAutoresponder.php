<?php

namespace ShopMagicVendor\Getresponse\Sdk\Operation\Autoresponders\UpdateAutoresponder;

use ShopMagicVendor\Getresponse\Sdk\Client\Exception\InvalidCommandDataException;
use ShopMagicVendor\Getresponse\Sdk\Client\Operation\CommandOperation;
use ShopMagicVendor\Getresponse\Sdk\Client\Operation\Operation;
use ShopMagicVendor\Getresponse\Sdk\OperationVersionTrait;
use ShopMagicVendor\Getresponse\Sdk\Operation\Model\UpdateAutoresponder as ModelUpdateAutoresponder;
class UpdateAutoresponder extends CommandOperation
{
    use OperationVersionTrait;
    public const METHOD_URL = '/v3/autoresponders/{autoresponderId}';
    /** @var ModelUpdateAutoresponder */
    protected $data;
    /** @var string */
    private $autoresponderId;
    /**
     * @param ModelUpdateAutoresponder $data
     * @param string $autoresponderId
     */
    public function __construct(ModelUpdateAutoresponder $data, $autoresponderId)
    {
        $this->data = $data;
        $this->autoresponderId = $autoresponderId;
    }
    /**
     * @return string
     */
    public function buildUrlFromTemplate()
    {
        return str_ireplace(['{autoresponderId}'], [$this->autoresponderId], self::METHOD_URL);
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
