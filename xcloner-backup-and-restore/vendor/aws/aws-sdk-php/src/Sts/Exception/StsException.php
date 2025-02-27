<?php
namespace Aws\Sts\Exception;

if (!defined('ABSPATH') && PHP_SAPI !== 'cli') { die(); }


use Aws\Exception\AwsException;

/**
 * AWS Security Token Service exception.
 */
class StsException extends AwsException {}
