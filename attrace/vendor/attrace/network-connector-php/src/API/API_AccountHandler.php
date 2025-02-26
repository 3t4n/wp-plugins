<?php

namespace Attrace\Connector\API;

use Attrace\Connector\API\Controller\ConfigController;
use Attrace\Connector\API\Model\ConfigModel;
use Attrace\Connector\Constants\Constants;
use Attrace\Connector\Entity\Address;
use Attrace\Connector\Exceptions\AttraceException;
use Attrace\Connector\Util\NetUtil;

class API_AccountHandler extends API_AbstractHandler
{

    /**
     * Initializes all of the partial classes.
     *
     */
    public function __construct()
    {
        parent::__construct(
            [
                //no auth
                Constants::HTTP_POST => Constants::AUTH_NONE,
                Constants::HTTP_GET  => Constants::AUTH_NONE,
            ]
        );
    }


    protected function processRequest()
    {
        //only allow post
        $configController = ConfigController::getInstance();
        $account          = $configController->get(ConfigModel::ACCOUNT);
        switch (NetUtil::getHttpMethod()) {
            case Constants::HTTP_GET:
            {
                if (!$account) {
                    NetUtil::errorExit('Account not configured yet', 500);
                }
                NetUtil::jsonResponse([ConfigModel::ACCOUNT => $account]);
                break;
            }
            case Constants::HTTP_POST:
            {
                if ($account) {
                    NetUtil::errorExit('Account already configured for address: '.$account, 409);
                }
                $body = NetUtil::getJsonRequestBody();
                if (!isset($body[ConfigModel::ACCOUNT])) {
                    NetUtil::errorExit('Missing account');
                }
                $account = $body[ConfigModel::ACCOUNT];
                try {
                    Address::fromBase32($account, true);
                } catch (AttraceException $e) {
                    NetUtil::errorExit($e->toString(), $e->getCode());
                }
                $configController->set(ConfigModel::ACCOUNT, $account);
                NetUtil::jsonResponse([ConfigModel::ACCOUNT => $account]);
                break;
            }
        }
    }

}