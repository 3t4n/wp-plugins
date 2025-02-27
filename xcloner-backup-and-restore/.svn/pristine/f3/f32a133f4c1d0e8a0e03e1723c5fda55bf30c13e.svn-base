<?php

namespace Aws;

if (!defined('ABSPATH') && PHP_SAPI !== 'cli') { die(); }


use Psr\Http\Message\ResponseInterface;

interface ResponseContainerInterface
{
    /**
     * Get the received HTTP response if any.
     *
     * @return ResponseInterface|null
     */
    public function getResponse();
}