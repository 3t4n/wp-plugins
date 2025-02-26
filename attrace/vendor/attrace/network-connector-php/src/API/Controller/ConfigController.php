<?php


namespace Attrace\Connector\API\Controller;


use Attrace\Connector\API\Model\ConfigModel;

class ConfigController extends AbstractController
{
    private static $instance;


    //store gets and sets here to minimize db queries
    private static $lazyCache;

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new ConfigController();
        }
        return self::$instance;
    }

    public function getAll()
    {
        $stored = parent::getAll();
        $return = ConfigModel::$DEFAULT_SETTINGS;
        foreach ($stored as $key => $value) {
            if (!isset($return[$key])) {
                continue;
            }
            $return[$key] = $value;
        }
        if (isset($return[ConfigModel::MONITORS])) {
            unset($return[ConfigModel::MONITORS]);
        }
        return $return;
    }

    public function get($key, $defaultValue = null)
    {
        //lazy cache
        if (isset(self::$lazyCache[$key])) {
            return self::$lazyCache[$key];
        }

        $value                 = parent::get($key, isset(ConfigModel::$DEFAULT_SETTINGS[$key]) ? ConfigModel::$DEFAULT_SETTINGS[$key] : null);
        self::$lazyCache[$key] = $value;
        return $value;
    }

    public function set($key, $value)
    {
        parent::set($key, $value);
        self::$lazyCache[$key] = $value;
    }

}