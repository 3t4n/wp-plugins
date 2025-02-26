<?php

namespace Attrace\Connector\API;


use Attrace\Connector\Constants\Constants;
use Attrace\Connector\Exceptions\AttraceException;
use Attrace\Connector\MasterTag\TagManager;
use Attrace\Connector\Util\NetUtil;

class API_MtagHandler extends API_AbstractHandler
{
    private static $callback;

    public function __construct()
    {
        parent::__construct(
            [
                //no auth
                Constants::HTTP_GET    => Constants::AUTH_NONE,
            ]
        , false);
    }

    protected function processRequest()
    {
        $tagManager = new TagManager();
        //callback is linked to get possible extra status vars to display
        if (self::$callback) {
            $tagManager->setApi(call_user_func(self::$callback));
        } else {
            $tagManager->setApi(NetUtil::getDomainUrl(false));
        }
        try {
            $js = $tagManager->getJs();
        } catch (AttraceException $e) {
            return;
        }
        header('Content-Type: application/javascript');
        echo $js;
        exit;
    }

    public static function setCallable($function)
    {
        self::$callback = $function;
    }
}