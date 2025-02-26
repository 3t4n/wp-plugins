<?php

use Attrace\Connector\API\Controller\ConfigController;
use Attrace\Connector\API\Model\ConfigModel;

/**
 */
class Attr4ce_Utils
{

    public static function debugEnabled()
    {
        $debugEnabled = ConfigController::getInstance()->get(ConfigModel::PROFILING_LEVEL);
        return ($debugEnabled == ConfigModel::PROFILING_LEVEL_ALL);
    }

}
