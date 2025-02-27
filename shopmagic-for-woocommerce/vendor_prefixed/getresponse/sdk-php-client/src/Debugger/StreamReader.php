<?php

namespace ShopMagicVendor\Getresponse\Sdk\Client\Debugger;

use ShopMagicVendor\Psr\Http\Message\StreamInterface;
/**
 * Interface StreamReader
 * @package Getresponse\Sdk\Client\Debugger
 */
interface StreamReader
{
    /**
     * @param StreamInterface $stream
     * @return array
     * @throws StreamReaderException
     */
    public function read(StreamInterface $stream);
}
