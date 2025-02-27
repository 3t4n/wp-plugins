<?php

namespace ShopMagicVendor\Getresponse\Sdk\Operation\Campaigns\Statistics\Summary\GetCampaignStatisticsSummary;

use ShopMagicVendor\Getresponse\Sdk\Client\Operation\SearchQuery;
class GetCampaignStatisticsSummarySearchQuery extends SearchQuery
{
    /**
     * @return array
     */
    public function getAllowedKeys()
    {
        return ['campaignId'];
    }
    /**
     * @param string $campaignId
     * @return $this
     * @throws \InvalidArgumentException
     */
    public function whereCampaignId($campaignId)
    {
        return $this->set('campaignId', $campaignId);
    }
}
