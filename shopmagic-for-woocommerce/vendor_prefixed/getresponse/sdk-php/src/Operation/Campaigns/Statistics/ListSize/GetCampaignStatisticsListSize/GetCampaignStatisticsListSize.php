<?php

namespace ShopMagicVendor\Getresponse\Sdk\Operation\Campaigns\Statistics\ListSize\GetCampaignStatisticsListSize;

use ShopMagicVendor\Getresponse\Sdk\Client\Operation\QueryOperation;
use ShopMagicVendor\Getresponse\Sdk\OperationVersionTrait;
class GetCampaignStatisticsListSize extends QueryOperation
{
    use OperationVersionTrait;
    public const METHOD_URL = '/v3/campaigns/statistics/list-size';
    /** @var GetCampaignStatisticsListSizeSearchQuery */
    private $query;
    /**
     * @param GetCampaignStatisticsListSizeSearchQuery $query
     */
    public function __construct(GetCampaignStatisticsListSizeSearchQuery $query)
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
