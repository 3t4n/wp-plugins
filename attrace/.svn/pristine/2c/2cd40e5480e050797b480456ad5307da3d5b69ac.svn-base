<?php

namespace Attrace\Connector\API;

use Attrace\Connector\Constants\Constants;
use Attrace\Connector\Util\NetUtil;
use Attrace\Connector\Util\Router;

class API_PostRequestHandler extends API_AbstractHandler
{

    public function __construct()
    {
        parent::__construct([
            Constants::HTTP_POST => Constants::AUTH_NONE
        ]);
    }

    protected function processRequest()
    {
        $body = NetUtil::getJsonRequestBody();
        //read the body, and override uri, body and method

        if (!is_array($body)) {
            NetUtil::errorExit('Invalid JSON body');
        }

        if (!isset($body['Method'])) {
            NetUtil::errorExit('No Method defined');
        }
        //overwrite side wide http method
        NetUtil::setOverrideHttpMethod($body['Method']);

        if (!isset($body['Path'])) {
            NetUtil::errorExit('No Path defined');
        }
        $path = $body['Path'];
        if (isset($body['QueryParams'])) {
            $path .= '?' . $body['QueryParams'];
        }

        $baseApiPath = Router::getApiBasePath();

        //if routes are passed without base api path (i.e. /status instead of /attrace/v1/status), we will add this to the route
        if (!(substr($path, 0, strlen($baseApiPath)) === $baseApiPath)) {
            $path = $baseApiPath.$path;
        }

        NetUtil::setOverrideRequestUri($path);

        if (isset($body['Body'])) {
            NetUtil::setOverrideRequestBody($body['Body']);
        }

        $handler = Router::getRouteHandler(NetUtil::getRequestUri());
        if ($handler) {
            $handler->handleRequest();
            return;
        }
        NetUtil::errorExit('No handler found for '.$body['Path']);
    }
}