<?php

namespace Attrace\Connector\API;

use Attrace\Connector\API\Controller\ConfigController;
use Attrace\Connector\API\Controller\TransactionController;
use Attrace\Connector\API\Model\ConfigModel;
use Attrace\Connector\Constants\Constants;
use Attrace\Connector\Exceptions\AttraceException;
use Attrace\Connector\Util\NetUtil;
use Attrace\Connector\Util\Util;


class API_StatusHandler extends API_AbstractHandler
{
    private static $callback;

    public function __construct()
    {
        parent::__construct([
            Constants::HTTP_GET  => Constants::AUTH_MONITOR,
            Constants::HTTP_POST => Constants::AUTH_MONITOR,
        ]);
    }


    protected function processRequest()
    {
		$response = [];
    	try {
            $response = [
                "Account"                 => ConfigController::getInstance()->get(ConfigModel::ACCOUNT),
                "StoreType"               => TransactionController::getInstance()->getStorage()->getStorageName(),
                "SystemTime"              => Util::getCurrentTimeMs(),
                "Language"                => 'php',
                "LanguageVersion"         => phpversion(),
                "Arch"                    => (PHP_INT_SIZE === 4) ? 'x86' : 'x64',
                "Version"                 => Constants::VERSION,
                ConfigModel::PROTOCOLMODE => ConfigController::getInstance()->get(ConfigModel::PROTOCOLMODE)
            ];
        } catch (AttraceException $e) {
            NetUtil::errorExit($e->toString());
        }

        $extraVars = [];
        //callback is linked to get possible extra status vars to display
        if (self::$callback) {
            $extraVars = call_user_func(self::$callback);
        }

        NetUtil::jsonResponse(array_merge($response, $extraVars));
    }

    public static function setCallable($function)
    {
        self::$callback = $function;
    }

}