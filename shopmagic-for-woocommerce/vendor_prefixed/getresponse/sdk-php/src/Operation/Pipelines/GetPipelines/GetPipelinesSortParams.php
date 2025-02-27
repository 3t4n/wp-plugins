<?php

namespace ShopMagicVendor\Getresponse\Sdk\Operation\Pipelines\GetPipelines;

use ShopMagicVendor\Getresponse\Sdk\Client\Operation\SortParams;
class GetPipelinesSortParams extends SortParams
{
    /**
     * @return array
     */
    public function getAllowedKeys()
    {
        return ['name'];
    }
}
