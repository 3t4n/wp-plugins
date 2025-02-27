<?php
namespace Aws\Exception;

if (!defined('ABSPATH') && PHP_SAPI !== 'cli') { die(); }


use Aws\HasMonitoringEventsTrait;
use Aws\MonitoringEventsInterface;

class UnresolvedSignatureException extends \RuntimeException implements
    MonitoringEventsInterface
{
    use HasMonitoringEventsTrait;
}
