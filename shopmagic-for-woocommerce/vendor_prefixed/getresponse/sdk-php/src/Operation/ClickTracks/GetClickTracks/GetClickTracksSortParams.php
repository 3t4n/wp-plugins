<?php

namespace ShopMagicVendor\Getresponse\Sdk\Operation\ClickTracks\GetClickTracks;

use ShopMagicVendor\Getresponse\Sdk\Client\Operation\SortParams;
class GetClickTracksSortParams extends SortParams
{
    /**
     * @return array
     */
    public function getAllowedKeys()
    {
        return ['createdOn'];
    }
}
