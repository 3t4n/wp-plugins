<?php
namespace Aws\Exception;

if (!defined('ABSPATH') && PHP_SAPI !== 'cli') { die(); }


use Aws\HasMonitoringEventsTrait;
use Aws\MonitoringEventsInterface;

class IncalculablePayloadException extends \RuntimeException implements
    MonitoringEventsInterface
{
    use HasMonitoringEventsTrait;
}
