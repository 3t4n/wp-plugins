<?php
namespace Aws\Endpoint\UseFipsEndpoint;

if (!defined('ABSPATH') && PHP_SAPI !== 'cli') { die(); }


interface ConfigurationInterface
{
    /**
     * Returns whether or not to use a FIPS endpoint
     *
     * @return bool
     */
    public function isUseFipsEndpoint();

    /**
     * Returns the configuration as an associative array
     *
     * @return array
     */
    public function toArray();
}
