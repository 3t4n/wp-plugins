<?php

use Attrace\Connector\API\API_AbstractHandler;
use Attrace\Connector\API\API_StatusHandler;
use Attrace\Connector\Util\Router;
use Attrace\Connector\Util\Util;

if (!function_exists('get_plugins')) {
    require_once ABSPATH . 'wp-admin/includes/plugin.php';
}

class Attr4ce_RequestHandler
{
    /** @var API_AbstractHandler $handler */
    private $handler;

    public function init()
    {
        //passing some extra vars to plugin status
        API_StatusHandler::setCallable('\Attr4ce_RequestHandler::statusCallback');


        //Catch all API errors
        set_error_handler(
            function ($errno, $errstr, $errfile, $errline) {
                throw new ErrorException($errstr, $errno, 0, $errfile, $errline);
            }
        );
        try {
            $this->handler = Router::getRouteHandler();
        } catch (ErrorException $e) {
            if (Util::isDevelopment()) {
                $this->printException($e);
                exit;
            }
        }
        restore_error_handler();

        if (!$this->handler) {
            return;
        }

        add_action('parse_request', array($this, 'handleRequest'));
    }

    public function handleRequest()
    {
        set_error_handler(
            function ($errno, $errstr, $errfile, $errline) {
                throw new ErrorException($errstr, $errno, 0, $errfile, $errline);
            }
        );
        try {
            $this->handler->handleRequest();
        } catch (ErrorException $e) {
            if (Util::isDevelopment()) {
                $this->printException($e);
                exit;
            }
        }
        restore_error_handler();
    }

    public static function statusCallback()
    {
        $installedPlugins = get_plugins();
        $pluginVersion    = 'n/a';
        if (isset($installedPlugins['attrace/attrace.php']) && isset($installedPlugins['attrace/attrace.php']['Version'])) {
            $pluginVersion = $installedPlugins['attrace/attrace.php']['Version'];
        }

        return [
            "Platform"        => "Wordpress",
            "PlatformVersion" => get_bloginfo('version'),
            "PluginProps"     => json_encode(["InstalledPlugins" => $installedPlugins]),
            "Version"         => $pluginVersion
        ];
    }

    public function printException(ErrorException $e)
    {
        echo "<h1>Error exception </h1>";
        echo "Message: " . $e->getMessage() . "<br/>" . PHP_EOL;
        echo "Code: " . $e->getCode() . "<br/>" . PHP_EOL;
        echo "File: " . $e->getFile() . "<br/>" . PHP_EOL;
        echo "Line: " . $e->getLine() . "<br/>" . PHP_EOL;
        echo "Trace: <br/>" . PHP_EOL;
        echo "<hr/>" . PHP_EOL;
        foreach ($e->getTrace() as $trace) {
            foreach ([
                         "File"     => 'file',
                         "Line"     => 'line',
                         "Function" => 'function',
                         "Class"    => 'class',
                     ] as $label => $field) {
                if (!isset($trace[$field])) {
                    continue;
                }
                echo $label . ": " . $trace[$field] . "<br/>" . PHP_EOL;
            }
            echo "<hr/>" . PHP_EOL;
        }

    }
}
