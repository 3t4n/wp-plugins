<?php

namespace AOP\App;

use Illuminate\Support\Collection;

class Session
{
    private static $instance;
    private static $optionName =  Plugin::PREFIX_ . 'session_handler';

    public static function allOptions()
    {
        if (is_null(self::$instance)) {
            add_option(self::$optionName, [], '', 'no');

            self::$instance = get_option(self::$optionName);
        }

        return self::$instance;
    }

    public static function get($sessionItem)
    {
        if (!Collection::make(self::allOptions())->has($sessionItem)) {
            return false;
        }

        return self::allOptions()[$sessionItem];
    }

    public static function add(array $sessionItem)
    {
        update_option(self::$optionName, $sessionItem);
    }

    public static function delete($sessionItem)
    {
        $options = Collection::make(self::allOptions())->filter(function ($item, $key) use ($sessionItem) {
            return $sessionItem !== $key;
        })->toArray();

        update_option(self::$optionName, $options);
    }

    public static function destroy()
    {
        update_option(self::$optionName, []);
    }
}
