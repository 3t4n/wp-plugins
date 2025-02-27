<?php

namespace ShopMagicVendor\Getresponse\Sdk\Operation\Workflow\GetWorkflows;

use ShopMagicVendor\Getresponse\Sdk\Client\Operation\DateRangeSearch;
use ShopMagicVendor\Getresponse\Sdk\Client\Operation\SearchQuery;
class GetWorkflowsSearchQuery extends SearchQuery
{
    /**
     * @return array
     */
    public function getAllowedKeys()
    {
        return [];
    }
}
