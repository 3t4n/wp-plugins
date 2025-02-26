<?php

namespace Attrace\Connector\API;

use Attrace\Connector\Constants\Constants;
use Attrace\Connector\Util\NetUtil;
use Attrace\Connector\Util\Util;


class API_DebugHandler extends API_AbstractHandler
{

    public function __construct()
    {
        parent::__construct(
            [
                //no auth
                Constants::HTTP_GET    => Constants::AUTH_ADMIN,
                Constants::HTTP_POST   => Constants::AUTH_ADMIN,
                Constants::HTTP_DELETE => Constants::AUTH_ADMIN,
                Constants::HTTP_PATCH  => Constants::AUTH_ADMIN,
                Constants::HTTP_PUT    => Constants::AUTH_ADMIN,
            ]
        );
    }

    protected function processRequest()
    {
        if (!Util::isDevelopment()) {
            NetUtil::errorExit('Not in development mode', 405);
        }
        $debug = NetUtil::getCheckParam('debug');
        //php info
        if ($debug == 'phpinfo') {
            //access to debug info
                phpinfo();
                exit;
        }
    }


}