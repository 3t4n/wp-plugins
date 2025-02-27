<?php

namespace ShopMagicVendor\Getresponse\Sdk\Operation\CustomEvents\UpdateCustomEvent;

use ShopMagicVendor\Getresponse\Sdk\Client\Exception\InvalidCommandDataException;
use ShopMagicVendor\Getresponse\Sdk\Client\Operation\CommandOperation;
use ShopMagicVendor\Getresponse\Sdk\Client\Operation\Operation;
use ShopMagicVendor\Getresponse\Sdk\OperationVersionTrait;
use ShopMagicVendor\Getresponse\Sdk\Operation\Model\UpdateCustomEvent as ModelUpdateCustomEvent;
class UpdateCustomEvent extends CommandOperation
{
    use OperationVersionTrait;
    public const METHOD_URL = '/v3/custom-events/{customEventId}';
    /** @var ModelUpdateCustomEvent */
    protected $data;
    /** @var string */
    private $customEventId;
    /**
     * @param ModelUpdateCustomEvent $data
     * @param string $customEventId
     */
    public function __construct(ModelUpdateCustomEvent $data, $customEventId)
    {
        $this->data = $data;
        $this->customEventId = $customEventId;
    }
    /**
     * @return string
     */
    public function buildUrlFromTemplate()
    {
        return str_ireplace(['{customEventId}'], [$this->customEventId], self::METHOD_URL);
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
