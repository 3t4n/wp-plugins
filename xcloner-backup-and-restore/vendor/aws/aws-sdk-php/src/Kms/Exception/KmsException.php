<?php
namespace Aws\Kms\Exception;

if (!defined('ABSPATH') && PHP_SAPI !== 'cli') { die(); }


use Aws\Exception\AwsException;

/**
 * Represents an error interacting with the AWS Key Management Service.
 */
class KmsException extends AwsException {}
