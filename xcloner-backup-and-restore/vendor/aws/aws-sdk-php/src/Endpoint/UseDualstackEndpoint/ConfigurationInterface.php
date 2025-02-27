<?php
namespace Aws\Endpoint\UseDualstackEndpoint;

if (!defined('ABSPATH') && PHP_SAPI !== 'cli') { die(); }


interface ConfigurationInterface
{
    /**
     * Returns whether or not to use a DUALSTACK endpoint
     *
     * @return bool
     */
    public function isUseDualstackEndpoint();

    /**
     * Returns the configuration as an associative array
     *
     * @return array
     */
    public function toArray();
}
