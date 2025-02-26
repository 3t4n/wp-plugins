<?php

namespace Pinchoalex\SocialPatch\components\transformers;

class Settings
{
    public static function setData($data)
    {
        return update_option(self::getName(), $data);
    }

    public static function getData()
    {
        return get_option(self::getName());
    }

    private static function getName(): string
    {
        return AP_YOUTUBE_NAME . '_settings';
    }

    public static function getValue($name, $default = '')
    {
        $data = json_decode(self::getData());

        return $data->{$name} ?? $default;
    }

    public static function getDefault($name, $attribute)
    {
        $value = Settings::getValue($name, $attribute->default);

        switch ($attribute->type) {
            case 'number':
                $value = (int)$value;
                break;
            case 'boolean':
                $value = (bool)$value;
                break;
        }

        return $value;
    }
}
