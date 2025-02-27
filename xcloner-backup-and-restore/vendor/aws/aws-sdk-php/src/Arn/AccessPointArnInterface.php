<?php
namespace Aws\Arn;

if (!defined('ABSPATH') && PHP_SAPI !== 'cli') { die(); }


/**
 * @internal
 */
interface AccessPointArnInterface extends ArnInterface
{
    public function getAccesspointName();
}
