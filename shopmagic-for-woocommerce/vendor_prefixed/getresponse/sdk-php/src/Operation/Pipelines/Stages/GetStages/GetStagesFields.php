<?php

namespace ShopMagicVendor\Getresponse\Sdk\Operation\Pipelines\Stages\GetStages;

use ShopMagicVendor\Getresponse\Sdk\Client\Operation\ValueList;
class GetStagesFields extends ValueList
{
    /**
     * @return array
     */
    public function getAllowedValues()
    {
        return ['stageId', 'type', 'position', 'name', 'href'];
    }
}
