<?php
namespace Aws\S3\UseArnRegion\Exception;

if (!defined('ABSPATH') && PHP_SAPI !== 'cli') { die(); }


use Aws\HasMonitoringEventsTrait;
use Aws\MonitoringEventsInterface;

/**
 * Represents an error interacting with configuration for S3's UseArnRegion
 */
class ConfigurationException extends \RuntimeException implements
    MonitoringEventsInterface
{
    use HasMonitoringEventsTrait;
}
