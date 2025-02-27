<?php

namespace ShopMagicVendor\Getresponse\Sdk\Operation\Campaigns\Blacklists\UpdateBlacklists;

use ShopMagicVendor\Getresponse\Sdk\Client\Exception\InvalidCommandDataException;
use ShopMagicVendor\Getresponse\Sdk\Client\Operation\CommandOperation;
use ShopMagicVendor\Getresponse\Sdk\Client\Operation\Operation;
use ShopMagicVendor\Getresponse\Sdk\OperationVersionTrait;
use ShopMagicVendor\Getresponse\Sdk\Operation\Model\UpdateBlacklist;
class UpdateBlacklists extends CommandOperation
{
    use OperationVersionTrait;
    public const METHOD_URL = '/v3/campaigns/{campaignId}/blacklists';
    /** @var UpdateBlacklist */
    protected $data;
    /** @var string */
    private $campaignId;
    /**
     * @param UpdateBlacklist $data
     * @param string $campaignId
     */
    public function __construct(UpdateBlacklist $data, $campaignId)
    {
        $this->data = $data;
        $this->campaignId = $campaignId;
    }
    /**
     * @return string
     */
    public function buildUrlFromTemplate()
    {
        return str_ireplace(['{campaignId}'], [$this->campaignId], self::METHOD_URL);
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
