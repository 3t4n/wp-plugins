<?php

namespace AdBlockGuard;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Formatter\LineFormatter;
use Monolog\Processor\IntrospectionProcessor;

class PluginLogger
{
    private static $logger;

    /**
     * Get or initialize the logger instance.
     *
     * @return Logger
     */
	public static function getLogger(): Logger
	{
	    if (!self::$logger) {
	        self::$logger = new Logger(__NAMESPACE__);

	        // Set logger timezone to match WordPress installation timezone
	        self::$logger->setTimezone(new \DateTimeZone(get_option('timezone_string') ?: 'UTC'));

	        $logFile = ADBLOCKGUARD_PLUGIN_DIR . '/ad-block-guard.log';
	        $streamHandler = new StreamHandler($logFile, Logger::DEBUG);

	        $formatter = new LineFormatter(
	            "[%datetime%] %channel%.%level_name%: %message% %context%\n",
	            "Y-m-d H:i:s"
	        );
	        $streamHandler->setFormatter($formatter);
	        self::$logger->pushHandler($streamHandler);

	        // Add IntrospectionProcessor only for 'error' logs
	        $introspectionProcessor = new IntrospectionProcessor(Logger::ERROR, ['AdBlockGuard']);
	        self::$logger->pushProcessor($introspectionProcessor);
	    }

	    return self::$logger;
	}


    /**
     * Log a message.
     *
     * @param string $level Log level (e.g., 'info', 'error').
     * @param string $message Log message.
     * @param array $context Contextual data for the log, including 'bypass' (optional).
     */
    public static function log(string $level, string $message, array $context = [])
    {

	    // Automatically add URL to 'error' logs
	    if ($level === 'error') {
	        $context['url'] = $_SERVER['REQUEST_URI'] ?? 'N/A';
	    }

        // Extract and remove 'bypass' from context, defaulting to false
        $bypass = $context['bypass'] ?? false;
        unset($context['bypass']);

        // Always log errors and forced bypass logs
        if ($bypass || $level === 'error') {
            self::getLogger()->log($level, $message, $context);
            return;
        }

        // Log info and debug messages only when debugging is enabled
        if (defined('ADBLOCKGUARD_DEBUG') && ADBLOCKGUARD_DEBUG && in_array($level, ['info', 'debug'])) {
            self::getLogger()->log($level, $message, $context);
        }
    }
}
