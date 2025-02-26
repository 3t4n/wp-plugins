<?php

namespace Attrace\Connector\API;

use Attrace\Connector\Constants\Constants;
use Attrace\Connector\Util\NetUtil;
use Attrace\Connector\Util\Network;


class API_RedirectHandler extends API_AbstractHandler
{
    public function __construct()
    {
        parent::__construct(
            [
                //no auth
                Constants::HTTP_GET => Constants::AUTH_NONE,
            ]
            , false);
    }

    protected function processRequest()
    {
        $clickOut = $this->getClickoutSlug();
        $hash     = $this->getId('/' . $clickOut);

        if (!$hash) {
            NetUtil::errorExit("Missing hash");
        }

        $debug = NetUtil::getCheckParam('debug');
        $pulse = NetUtil::getCheckParam('Pulse');
        $meta  = NetUtil::getQueryParams();

        unset($meta['debug']);
        unset($meta['Pulse']);

        Network::clickAndRedirect($hash, $meta, $debug, $pulse);
    }
}