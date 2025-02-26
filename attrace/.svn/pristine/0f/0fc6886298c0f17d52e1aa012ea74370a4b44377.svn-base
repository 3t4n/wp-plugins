<?php

namespace Attrace\Connector\API;

use Attrace\Connector\API\Controller\ConfigController;
use Attrace\Connector\API\Controller\IntegrationConfigController;
use Attrace\Connector\API\Controller\TransactionController;
use Attrace\Connector\Constants\Constants;
use Attrace\Connector\Util\NetUtil;


class API_ResetHandler extends API_AbstractHandler
{

    public function __construct()
    {
        parent::__construct([
            Constants::HTTP_POST => Constants::AUTH_ADMIN,
        ]);
    }


    protected function processRequest()
    {
        $body = NetUtil::getJsonRequestBody();
        if (!isset($body['Storage'])) {
            NetUtil::errorExit('Missing Storage');
        }

        switch ($body['Storage']) {
            case 'All':
                ConfigController::getInstance()->destroy();
                ConfigController::getInstance()->init();

                TransactionController::getInstance()->destroy();
                TransactionController::getInstance()->init();

                IntegrationConfigController::getInstance()->destroy();
                IntegrationConfigController::getInstance()->init();
                NetUtil::jsonResponse(['Message' => "All storage fully reset"]);
                break;
            case 'Config':
                ConfigController::getInstance()->destroy();
                ConfigController::getInstance()->init();
                NetUtil::jsonResponse(['Message' => "Config storage fully reset"]);
                break;
            case 'IntegrationConfig':
                IntegrationConfigController::getInstance()->destroy();
                IntegrationConfigController::getInstance()->init();
                NetUtil::jsonResponse(['Message' => "IntegrationConfig storage fully reset"]);
                break;
            case 'Transaction':
                TransactionController::getInstance()->destroy();
                TransactionController::getInstance()->init();
                NetUtil::jsonResponse(['Message' => "Transaction storage fully reset"]);
                break;
            default:
                NetUtil::errorExit("Unknown storage " . $body['Storage']);
        }
    }
}