<?php


namespace Attrace\Connector\Util;


use Attrace\Connector\API\Controller\ConfigController;
use Attrace\Connector\API\Model\ConfigModel;

class Util
{

    /**
     * Get current time in milis
     *
     * @return int
     */
    public static function getCurrentTimeMs()
    {
        return round(microtime(true) * 1000);
    }

    public static function quickRandom($length = 5)
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        return substr(str_shuffle(str_repeat($pool, $length)), 0, $length);
    }

    /**
     * Checks if this is assoc array
     *
     * @param array $arr
     * @return bool
     */
    public static function isAssoc(array $arr)
    {
        if (array() === $arr) {
            return false;
        }
        return array_keys($arr) !== range(0, count($arr) - 1);
    }

    /**
     * @return bool
     * @throws \Attrace\Connector\Exceptions\AttraceException
     */
    public static function isDevelopment() {
        return (ConfigController::getInstance()->get(ConfigModel::MODE) == ConfigModel::MODE_DEVELOPMENT);
    }

    /**
     * @return bool
     * @throws \Attrace\Connector\Exceptions\AttraceException
     */
    public static function isProfiling() {
        return (ConfigController::getInstance()->get(ConfigModel::PROFILING_LEVEL) == ConfigModel::PROFILING_LEVEL_ALL);
    }
}