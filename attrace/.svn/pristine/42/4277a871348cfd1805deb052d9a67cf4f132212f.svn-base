<?php

namespace Attrace\Connector\API;

use Attrace\Connector\API\Controller\ConfigController;
use Attrace\Connector\Constants\Constants;
use Attrace\Connector\Util\NetUtil;


class API_ConfigHandler extends API_AbstractHandler
{

    public function __construct()
    {
        parent::__construct(
            [
                //no auth
                Constants::HTTP_GET    => Constants::AUTH_MONITOR,
                Constants::HTTP_PATCH  => Constants::AUTH_ADMIN,
                Constants::HTTP_DELETE => Constants::AUTH_ADMIN,
            ]
        );
    }

    protected function processRequest()
    {
        $configController = ConfigController::getInstance();
        switch (NetUtil::getHttpMethod()) {
            case Constants::HTTP_GET:
            {
                NetUtil::jsonResponse($configController->getAll());
                break;
            }
            case Constants::HTTP_PATCH:
            {
                $configToUpdate = NetUtil::getJsonRequestBody();
                foreach ($configToUpdate as $key => $value) {
                    $configController->set($key, $value);
                }
                NetUtil::jsonResponse($configController->getAll());
                break;
            }
            case Constants::HTTP_DELETE:
            {
                $id = $this->getId();
                if (!$id) {
                    NetUtil::errorExit('Delete config needs an identifier');
                }
                //looking for one agreement
                $integrationConfig = $configController->get($id);
                if (!$integrationConfig) {
                    NetUtil::errorExit('Config  ' . $id . ' not found', 204);
                }
                $configController->delete($id);
                NetUtil::jsonResponse(['Config \''.$id.'\' deleted']);
                break;
            }
        }
    }
}
