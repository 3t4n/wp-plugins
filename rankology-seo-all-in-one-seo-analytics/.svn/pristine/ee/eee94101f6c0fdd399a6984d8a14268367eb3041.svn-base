<?php

namespace RANKOLOGY_STATS;

class UserAgent
{
    /**
     * Get User Agent
     *
     * @return mixed
     */
    public static function getHttpUserAgent()
    {
        return apply_filters('rankology_stats_user_http_agent', (isset($_SERVER['HTTP_USER_AGENT']) ? wp_unslash($_SERVER['HTTP_USER_AGENT']) : ''));
    }

    /**
     * Calls the user agent parsing code.
     *
     * @return array|\string[]
     */
    public static function getUserAgent()
    {

        // Get Http User Agent
        $user_agent = self::getHttpUserAgent();

        if (version_compare(phpversion(), '7', ">=") && class_exists('\WhichBrowser\Parser')) {
            // Get WhichBrowser Browser
            $result = new \WhichBrowser\Parser($user_agent);

            if ((isset($result->browser->version->value))) {
                $version = Helper::makeAnonymousVersion($result->browser->version->value);
            } else {
                $version = _x('Unknown', 'Version', 'rankology-stats');
            }

            $agent = array(
                'browser'  => (isset($result->browser->name)) ? $result->browser->name : _x('Unknown', 'Browser', 'rankology-stats'),
                'platform' => (isset($result->os->name)) ? $result->os->name : _x('Unknown', 'Platform', 'rankology-stats'),
                'version'  => $version,
                'device'   => isset($result->device->type) ? $result->getType() : _x('Unknown', 'Device', 'rankology-stats'),
                'model'    => isset($result->device->manufacturer) ? $result->device->getModel() : _x('Unknown', 'Model', 'rankology-stats'),
            );
        } else {
            $agent = self::getBrowserInfo($user_agent);
        }

        return apply_filters('rankology_stats_user_agent', $agent);
    }

    /**
     * Get All Browser List For Detecting
     *
     * @param bool $all
     * @area utility
     * @return array|mixed
     */
    public static function BrowserList($all = true)
    {

        //List Of Detect Browser in Rankology Stats
        $list        = array(
            "chrome"  => __("Chrome", 'rankology-stats'),
            "firefox" => __("Firefox", 'rankology-stats'),
            "msie"    => __("Internet Explorer", 'rankology-stats'),
            "edge"    => __("Edge", 'rankology-stats'),
            "opera"   => __("Opera", 'rankology-stats'),
            "safari"  => __("Safari", 'rankology-stats')
        );
        $browser_key = array_keys($list);

        //Return All Browser List
        if ($all === true) {
            return $list;
            //Return Browser Keys For detect
        } elseif ($all == "key") {
            return $browser_key;
        } else {
            //Return Custom Browser Name by key
            if (array_search(strtolower($all), $browser_key) !== false) {
                return $list[strtolower($all)];
            } else {
                return __("Unknown", 'rankology-stats');
            }
        }
    }

    /**
     * Get Browser Logo
     *
     * @param $browser
     * @return string
     */
    public static function getBrowserLogo($browser)
    {
        $name = 'unknown';
        if (array_search(strtolower($browser), self::BrowserList('key')) !== false) {
            $name = $browser;
        }

        return RANKOLOGY_STATS_URL . 'assets/images/browser/' . $name . '.svg';
    }

    public static function getBrowserInfo($userAgent = null)
    {
        $version = '';
        $model   = _x('Unknown', 'Device Model', 'rankology-stats');

        if (preg_match('/linux|ubuntu/i', $userAgent)) {
            $platform = 'linux';
        } elseif (preg_match('/macintosh|mac os x/i', $userAgent)) {
            $platform = 'mac';
        } elseif (preg_match('/windows|win32/i', $userAgent)) {
            $platform = 'windows';
        } elseif (preg_match('/iphone/i', $userAgent)) {
            $platform = 'iPhone';
        } elseif (preg_match('/android/i', $userAgent)) {
            $platform = 'Android';
        } elseif (preg_match('/webos/i', $userAgent)) {
            $platform = 'Mobile';
        } else {
            $platform = _x('Unknown', 'Platform', 'rankology-stats');
        }

        if (preg_match('/MSIE\/([0-9.]*)/i', $userAgent, $match) && !preg_match('/Opera/i', $userAgent)) {
            $browser = 'Internet Explorer';
            $version = Helper::makeAnonymousVersion(end($match));
        } elseif (preg_match('/Edg\/([0-9.]*)/i', $userAgent, $match)) {
            $browser = 'Edge';
            $version = Helper::makeAnonymousVersion(end($match));
        } elseif (preg_match('/Firefox\/([0-9.]*)/i', $userAgent, $match)) {
            $browser = 'Firefox';
            $version = Helper::makeAnonymousVersion(end($match));
        } elseif (preg_match('/OPR\/([0-9.]*)/i', $userAgent, $match)) {
            $browser = 'Opera';
            $version = Helper::makeAnonymousVersion(end($match));
        } elseif (preg_match('/Chromium\/([0-9.]*)/i', $userAgent, $match)) {
            $browser = 'Chromium';
            $version = Helper::makeAnonymousVersion(end($match));
        } elseif (preg_match('/Chrome\/([0-9.]*)/i', $userAgent, $match)) {
            $browser = 'Chrome';
            $version = Helper::makeAnonymousVersion(end($match));
        } elseif (preg_match('/Safari\/([0-9.]*)/i', $userAgent, $match)) {
            $browser = 'Safari';
            $version = Helper::makeAnonymousVersion(end($match));
        } elseif (preg_match('/Netscape[0-9]?\/([0-9.]*)/i', $userAgent, $match)) {
            $browser = 'Netscape';
            $version = Helper::makeAnonymousVersion(end($match));
        } elseif (preg_match('/Trident\/([0-9.]*)/i', $userAgent, $match)) {
            $browser = 'Internet Explorer';
        } else {
            $browser = _x('Unknown', 'Browser', 'rankology-stats');
        }

        $pattern = '#(?<browser>)[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
        if (!preg_match_all($pattern, $userAgent, $matches)) {
            $version = _x('Unknown', 'Version', 'rankology-stats');
        }

        if (empty($version) && !empty($matches['version']) && count($matches['version'])) {
            $version = Helper::makeAnonymousVersion((end($matches['version'])));
        }

        if (preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $userAgent)) {
            $device = 'mobile';
        } else {
            $device = 'desktop';
        }

        return array(
            'browser'  => $browser,
            'version'  => $version,
            'platform' => $platform,
            'device'   => $device,
            'model'    => $model,
        );
    }

}