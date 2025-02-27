<?php

namespace ShopMagicVendor\Getresponse\Sdk\Operation\Pipelines\GetPipelines;

use ShopMagicVendor\Getresponse\Sdk\Client\Operation\ValueList;
class GetPipelinesFields extends ValueList
{
    /**
     * @return array
     */
    public function getAllowedValues()
    {
        return ['pipelineId', 'name', 'href', 'stages'];
    }
}
