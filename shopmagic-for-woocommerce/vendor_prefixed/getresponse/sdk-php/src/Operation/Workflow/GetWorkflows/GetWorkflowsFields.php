<?php

namespace ShopMagicVendor\Getresponse\Sdk\Operation\Workflow\GetWorkflows;

use ShopMagicVendor\Getresponse\Sdk\Client\Operation\ValueList;
class GetWorkflowsFields extends ValueList
{
    /**
     * @return array
     */
    public function getAllowedValues()
    {
        return ['workflowId', 'name', 'status', 'dateStart', 'dateStop', 'subscriberStatistics'];
    }
}
