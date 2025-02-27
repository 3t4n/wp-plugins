<?php

namespace ShopMagicVendor\Getresponse\Sdk\Operation\FileLibrary\Files\GetFile;

use ShopMagicVendor\Getresponse\Sdk\Client\Operation\ValueList;
class GetFileFields extends ValueList
{
    /**
     * @return array
     */
    public function getAllowedValues()
    {
        return ['fileId', 'fileSize', 'group', 'thumbnail', 'url', 'properties', 'createdOn', 'href', 'name', 'extension', 'folder'];
    }
}
