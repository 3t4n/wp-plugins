<?php

namespace Attrace\Connector\API;

use Attrace\Connector\API\Controller\ConfigController;
use Attrace\Connector\API\Model\ConfigModel;
use Attrace\Connector\Constants\Constants;
use Attrace\Connector\Exceptions\AttraceException;
use Attrace\Connector\Util\NetUtil;


class API_MonitorsHandler extends API_AbstractHandler
{
    public function __construct()
    {
        parent::__construct(
            [
                //no auth
                Constants::HTTP_GET    => Constants::AUTH_MONITOR,
                Constants::HTTP_POST   => Constants::AUTH_ADMIN,
                Constants::HTTP_DELETE => Constants::AUTH_ADMIN
            ]
        );
    }

    protected function processRequest()
    {
        $configController = ConfigController::getInstance();
        $monitors         = json_decode($configController->get(ConfigModel::MONITORS), true);
        if (!is_array($monitors)) {
            $monitors = [];
        }
        switch (NetUtil::getHttpMethod()) {
            case Constants::HTTP_GET:
            {
                NetUtil::jsonResponse($monitors);
                break;
            }
            case Constants::HTTP_POST:
            {
                $body = NetUtil::getJsonRequestBody();
                if (isset($body['Account'])) {
                    $account = $body['Account'];
                } else if (isset($body['DiscoveryUrl'])) {
                    $discoveryUrl = $body['DiscoveryUrl'];
                    try {
                        $response = NetUtil::doGetRequest($discoveryUrl);
                    } catch (AttraceException $e) {
                        NetUtil::errorExit('Invalid DiscoveryUrl');
                        return;
                    }
                    $discoveryResponse = json_decode($response['body'], true);
                    if (!isset($discoveryResponse['Account'])) {
                        NetUtil::errorExit('Invalid DiscoveryUrl response');
                    }
                    $account = $discoveryResponse['Account'];
                } else {
                    NetUtil::errorExit('No Account or Discovery URL in request body');
                    return;
                }
                if (in_array($account, $monitors)) {
                    NetUtil::errorExit('Monitor with account ' . $account . ' already exists');
                }
                $monitors[] = $account;
                try {
                    $configController->set(ConfigModel::MONITORS, json_encode($monitors));
                } catch (AttraceException $e) {
                    NetUtil::errorExit($e->toString());
                }
                NetUtil::jsonResponse(['Message' => "Monitor added: " . $account]);
                break;
            }
            case Constants::HTTP_DELETE:
            {
                $id = $this->getId();
                if (!in_array($id, $monitors)) {
                    NetUtil::errorExit('Monitor with account ' . $id . ' does not exist.', 204);
                }
                //this is total fuckery. need cofee
                $ret = [];
                foreach ($monitors as $monitor) {
                    if ($monitor == $id) {
                        continue;
                    }
                    $ret[] = $monitor;
                }
                $configController->set(ConfigModel::MONITORS, json_encode($ret));
                NetUtil::jsonResponse(['Message' => "Monitor deleted: " . $id]);
                break;
            }
        }
    }


}