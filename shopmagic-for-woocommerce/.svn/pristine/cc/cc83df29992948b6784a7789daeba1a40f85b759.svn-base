<?php

namespace ShopMagicVendor\Getresponse\Sdk\Operation\Campaigns\Statistics\ListSize\GetCampaignStatisticsListSize;

use ShopMagicVendor\Getresponse\Sdk\Client\Operation\DateRangeSearch;
use ShopMagicVendor\Getresponse\Sdk\Client\Operation\SearchQuery;
class GetCampaignStatisticsListSizeSearchQuery extends SearchQuery
{
    /**
     * @return array
     */
    public function getAllowedKeys()
    {
        return ['campaignId', 'groupBy', 'createdOn'];
    }
    /**
     * @param string $campaignId
     */
    public function __construct($campaignId)
    {
        $this->set('campaignId', $campaignId);
    }
    /**
     * @param string $groupBy
     * @return $this
     * @throws \InvalidArgumentException
     */
    public function whereGroupBy($groupBy)
    {
        return $this->set('groupBy', $groupBy);
    }
    /**
     * @param DateRangeSearch $createdOn
     * @return $this
     * @throws \InvalidArgumentException
     */
    public function whereCreatedOn(DateRangeSearch $createdOn)
    {
        return $this->set('createdOn', $createdOn->toArray());
    }
}
