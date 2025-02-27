<?php

namespace ShopMagicVendor\Getresponse\Sdk\Operation\Contacts\Activities\GetActivities;

use ShopMagicVendor\Getresponse\Sdk\Client\Operation\ValueList;
class GetActivitiesFields extends ValueList
{
    /**
     * @return array
     */
    public function getAllowedValues()
    {
        return ['activity', 'subject', 'createdOn', 'previewUrl', 'resource', 'clickTrack'];
    }
}
