<?php

namespace ShopMagicVendor\Getresponse\Sdk\Operation\Contacts\Tags\UpsertTags;

use ShopMagicVendor\Getresponse\Sdk\Client\Exception\InvalidCommandDataException;
use ShopMagicVendor\Getresponse\Sdk\Client\Operation\CommandOperation;
use ShopMagicVendor\Getresponse\Sdk\Client\Operation\Operation;
use ShopMagicVendor\Getresponse\Sdk\OperationVersionTrait;
use ShopMagicVendor\Getresponse\Sdk\Operation\Model\UpsertContactTags;
class UpsertTags extends CommandOperation
{
    use OperationVersionTrait;
    public const METHOD_URL = '/v3/contacts/{contactId}/tags';
    /** @var UpsertContactTags */
    protected $data;
    /** @var string */
    private $contactId;
    /**
     * @param UpsertContactTags $data
     * @param string $contactId
     */
    public function __construct(UpsertContactTags $data, $contactId)
    {
        $this->data = $data;
        $this->contactId = $contactId;
    }
    /**
     * @return string
     */
    public function buildUrlFromTemplate()
    {
        return str_ireplace(['{contactId}'], [$this->contactId], self::METHOD_URL);
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
