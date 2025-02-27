<?php
namespace Aws\Arn\S3;

if (!defined('ABSPATH') && PHP_SAPI !== 'cli') { die(); }


use Aws\Arn\ArnInterface;

/**
 * @internal
 */
interface OutpostsArnInterface extends ArnInterface
{
    public function getOutpostId();
}
