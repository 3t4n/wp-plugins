<?php

namespace ShopMagicVendor\Getresponse\Sdk\Operation\FileLibrary\Folders\GetFolders;

use ShopMagicVendor\Getresponse\Sdk\Client\Operation\SortParams;
class GetFoldersSortParams extends SortParams
{
    /**
     * @return array
     */
    public function getAllowedKeys()
    {
        return ['name', 'size', 'createdOn'];
    }
}
