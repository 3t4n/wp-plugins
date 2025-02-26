<?php

namespace Foxlis\Geo\Helpers;

class RedirectHelper
{
    public static function getUrnWithoutSlashes($urn)
    {
        return $urn ? trim(self::getUrnWithRemovedDoubleSlashes($urn), " \t\n\r\0\x0B" . '/') : '';
    }

    public static function getUrnSurroundedBySashes($urn)
    {
        return $urn ? '/' . self::getUrnWithoutSlashes($urn) . '/' : '';
    }

    public static function getUrnWithRemovedDoubleSlashes($urn)
    {
        return $urn ? preg_replace('~[/]+~', '/', $urn) : '';
    }

    public static function getStopAskingCookieValue()
    {
        return 'foxlis-geo-redirect-question-answer';
    }

    public static function getFoxlisRedirectJsonUri()
    {
        return '/wp-json/foxlis-geo/v1/redirect/';
    }
}
