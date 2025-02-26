<?php


namespace Attrace\Connector\Util;


use Attrace\Connector\API\API_AbstractHandler;
use Attrace\Connector\API\API_AccountHandler;
use Attrace\Connector\API\API_ActionHandler;
use Attrace\Connector\API\API_ConfigHandler;
use Attrace\Connector\API\API_DebugHandler;
use Attrace\Connector\API\API_IntegrationConfigHandler;
use Attrace\Connector\API\API_MonitorsHandler;
use Attrace\Connector\API\API_MtagHandler;
use Attrace\Connector\API\API_PostRequestHandler;
use Attrace\Connector\API\API_RedirectHandler;
use Attrace\Connector\API\API_ResetHandler;
use Attrace\Connector\API\API_StatusHandler;
use Attrace\Connector\API\API_TransactionsHandler;
use Attrace\Connector\API\Controller\ConfigController;
use Attrace\Connector\API\Model\ConfigModel;
use Attrace\Connector\Constants\Constants;

class Router
{
    /**
     * @var string[] Default routing
     */
    private static $routing = [
        Constants::API_PATH_STATUS             => API_StatusHandler::class,
        Constants::API_PATH_TRANSACTIONS       => API_TransactionsHandler::class,
        Constants::API_PATH_CONFIG             => API_ConfigHandler::class,
        Constants::API_PATH_INTEGRATIONCONFIGS => API_IntegrationConfigHandler::class,
        Constants::API_PATH_ACCOUNT            => API_AccountHandler::class,
        Constants::API_PATH_ACTION             => API_ActionHandler::class,
        Constants::API_PATH_DEBUG              => API_DebugHandler::class,
        Constants::API_PATH_MONITORS           => API_MonitorsHandler::class,
        Constants::API_PATH_POST_REQUEST       => API_PostRequestHandler::class,
        Constants::API_PATH_RESET              => API_ResetHandler::class
    ];


    /**
     * Handle request of current Route
     */
    public static function handleRequest()
    {
        $handler = self::getRouteHandler();
        if ($handler) {
            $handler->handleRequest();
        }
    }

    /**
     * Gets handler of route return null
     *
     * @param $route
     * @return API_AbstractHandler|null
     */
    public static function getRouteHandler($route = null)
    {
        if (!$route) {
            $route = NetUtil::getRequestUri();
        }

        //check if this mtag call
        $handler = self::getMtagHandler($route);
        if ($handler) {
            return $handler;
        }

        //check if this is a redirect
        $handler = self::getRedirectHandler($route);
        if ($handler) {
            return $handler;
        }

        /**
         * Check if standard API call
         */
        preg_match(sprintf('/%s\/([a-z\-]+)/', self::getApiBasePath(true)), $route, $matches);
        if (isset($matches[1])) {
            return self::getAPIHandler($matches[1]);
        }
        return null;
    }

    /**
     * @param null $route
     * @return API_MtagHandler|null
     */
    public static function getMtagHandler($route = null)
    {
        if (!$route) {
            $route = NetUtil::getRequestUri();
        }
        $masterTag = ConfigController::getInstance()->get(ConfigModel::MASTERTAG_URL);
        //determine seperator

        $endswith = function ($haystack, $needle) {
            return substr_compare($haystack, $needle, -strlen($needle)) === 0;
        };

        $separator = '.';
        if ($endswith($masterTag, '_js')) {
            $separator = '_';
        }

        $pattern = $masterTag;
        $pattern = str_replace('/', '\/', $pattern);
        $pattern = '/^\/' . str_replace($separator . 'js', '(' . $separator . '[a-zA-Z\d]{8})?' . $separator . 'js', $pattern) . '/';
        preg_match($pattern, $route, $matches);
        if (!isset($matches[0])) {
            return null;
        }
        return new API_MtagHandler();
    }

    public static function getApiBasePath($escaped = false)
    {
        $apiBasePath = ConfigController::getInstance()->get(ConfigModel::API_BASE_PATH);
        if ($escaped) {
            $apiBasePath = str_replace("/", "\/", $apiBasePath);
        }
        return $apiBasePath;
    }

    /**
     * @param null $route
     * @return API_RedirectHandler|null
     */
    public static function getRedirectHandler($route = null)
    {
        if (!$route) {
            $route = NetUtil::getRequestUri();
        }
        $clickOut = ConfigController::getInstance()->get(ConfigModel::CLICKOUT_PATH);
        $pattern  = "/^\/" . $clickOut . "\//";
        preg_match($pattern, $route, $matches);
        if (!isset($matches[0])) {
            return null;
        }
        return new API_RedirectHandler();
    }

    /**
     * @param $method
     * @return API_AbstractHandler|null
     */
    public static function getAPIHandler($method)
    {
        if (!isset(self::$routing[$method])) {
            if (Util::isDevelopment()) {
                NetUtil::errorExit(
                    'no route Found',
                    400,
                    [
                        'route'      => NetUtil::getRequestUri(),
                        'routeMatch' => $method,
                        'routingArr' => self::$routing,
                    ]
                );
            }
            return null;
        }
        $handlerClass = self::$routing[$method];

        /** @var API_AbstractHandler $handler */
        $handler = new $handlerClass();
        return $handler;
    }
}