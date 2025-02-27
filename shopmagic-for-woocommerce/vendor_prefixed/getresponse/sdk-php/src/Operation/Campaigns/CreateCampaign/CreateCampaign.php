<?php

namespace ShopMagicVendor\Getresponse\Sdk\Operation\Campaigns\CreateCampaign;

use ShopMagicVendor\Getresponse\Sdk\Client\Exception\InvalidCommandDataException;
use ShopMagicVendor\Getresponse\Sdk\Client\Operation\CommandOperation;
use ShopMagicVendor\Getresponse\Sdk\Client\Operation\Operation;
use ShopMagicVendor\Getresponse\Sdk\OperationVersionTrait;
use ShopMagicVendor\Getresponse\Sdk\Operation\Model\NewCampaign;
class CreateCampaign extends CommandOperation
{
    use OperationVersionTrait;
    public const METHOD_URL = '/v3/campaigns';
    /** @var NewCampaign */
    protected $data;
    /**
     * @param NewCampaign $data
     */
    public function __construct(NewCampaign $data)
    {
        $this->data = $data;
    }
    /**
     * @return string
     */
    public function buildUrlFromTemplate()
    {
        return self::METHOD_URL;
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
        return 201;
    }
}
