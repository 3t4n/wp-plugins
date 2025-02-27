<?php

namespace ShopMagicVendor\Getresponse\Sdk\Operation\Campaigns\Statistics\Removals\GetCampaignStatisticsRemovals;

use ShopMagicVendor\Getresponse\Sdk\Client\Operation\QueryOperation;
use ShopMagicVendor\Getresponse\Sdk\OperationVersionTrait;
class GetCampaignStatisticsRemovals extends QueryOperation
{
    use OperationVersionTrait;
    public const METHOD_URL = '/v3/campaigns/statistics/removals';
    /** @var GetCampaignStatisticsRemovalsSearchQuery */
    private $query;
    /**
     * @param GetCampaignStatisticsRemovalsSearchQuery $query
     */
    public function __construct(GetCampaignStatisticsRemovalsSearchQuery $query)
    {
        $this->query = $query;
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
        return $this->buildUrlFromTemplate() . $this->buildQueryString($this->query, null, null);
    }
}
