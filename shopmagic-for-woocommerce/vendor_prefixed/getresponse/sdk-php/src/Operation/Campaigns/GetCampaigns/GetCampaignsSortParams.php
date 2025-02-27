<?php

namespace ShopMagicVendor\Getresponse\Sdk\Operation\Campaigns\GetCampaigns;

use ShopMagicVendor\Getresponse\Sdk\Client\Operation\SortParams;
class GetCampaignsSortParams extends SortParams
{
    /**
     * @return array
     */
    public function getAllowedKeys()
    {
        return ['name', 'createdOn'];
    }
}
