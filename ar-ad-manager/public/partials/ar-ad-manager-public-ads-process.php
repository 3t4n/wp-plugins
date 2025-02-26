<?php
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) exit;
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Class Partials_Ar_Ad_Manager_Public_Ads_Process
 */
class Partials_Ar_Ad_Manager_Public_Ads_Process
{
    /**
     * @param array $adzone
     * @param array $banner
     * @return string
     */
    public function toHtml($adzone, $banner = [])
    {
        $html = '';

        $defaultAdzoneClass = get_option(Partials_Ar_Ad_Manager_Meta_Box_Abstract::AR_AD_MANAGER_FIELD_PREFIX . "_default_adzone_class", '');

        $adzoneBlock = '<div';
        $adzoneClasses = [
            'ar-wp-happy-zone',
            'ar-wp-happy-zone-' . $adzone['id'],
            $adzone['adzone_css_class'],
            $defaultAdzoneClass
        ];

        $adzoneClasses = array_filter($adzoneClasses);

        $adzoneAttributes = [
            'class' => implode(' ', $adzoneClasses)
        ];

        foreach ($adzoneAttributes as $attribute => $value) {
            $adzoneBlock .= ' ' . $attribute . '="' . $value . '"';
        }

        $adzoneBlock .= '>';
        $html .= $adzoneBlock;

        if ($adzone['adzone_text']) {
            $html .= '<span class="ar-wp-happy-text">' . esc_html__($adzone['adzone_text'], 'ar-ad-manager') . '</span>';
        }

        if ($banner) {
            $bannerHeight = 'height:100%';
            $bannerOverflowHidden = '';

            if (isset($banner['height']) && $banner['height']) {
                $bannerHeight = 'height:' . $banner['height'];
            }

            if (isset($banner['overflow_hidden']) && $banner['overflow_hidden']) {
                $bannerOverflowHidden = 'overflow: hidden';
            }

            $bannerWidth = isset($banner['width']) && $banner['width'] ? 'width:' . $banner['width'] : 'width:100%;';

            $bannerStyles = [
                $bannerHeight,
                $bannerWidth,
                $bannerOverflowHidden
            ];

            $bannerClasses = [
                'ar-wp-happy-banner',
                'ar-wp-happy-banner-' . $banner['id']
            ];

            $bannerClasses = array_filter($bannerClasses);
            $bannerStyles = array_filter($bannerStyles);

            $bannerAttributes = [
                'class' => implode(' ', $bannerClasses),
                'style' => implode(';', $bannerStyles)
            ];

            $bannerBlock = '<div';

            foreach ($bannerAttributes as $attribute => $value) {
                $bannerBlock .= ' ' . $attribute . '="' . $value . '"';
            }

            $bannerBlock .= '>';

            $html .= $bannerBlock;

            if (isset($banner['script']) && $banner['script']) {
                $html .= $banner['script'];
            } else if (isset($banner['image']) && $banner['image']) {
                $imageAttributes = [
                    'src' => $banner['image']
                ];

                if (isset($banner['width']) && $banner['width']) {
                    $imageAttributes['width'] = $banner['width'];
                }

                if (isset($banner['height']) && $banner['height']) {
                    $imageAttributes['height'] = $banner['height'];
                }

                $img = '<img style="max-height:100%;width:auto;"';

                foreach ($imageAttributes as $attribute => $value) {
                    $img .= ' ' . $attribute . '="' . $value . '"';
                }

                $img .= '/>';

                if (isset($banner['link']) && $banner['link']) {
                    $html .= '<a href="' . $banner['link'] . '" target="_blank">';
                } else if (isset($adzone['adzone_default_link']) && $adzone['adzone_default_link']) {
                    $html .= '<a href="' . $adzone['adzone_default_link'] . '" target="_blank">';
                }

                $html .= $img;

                if (
                    (isset($banner['link']) && $banner['link'])
                    || (isset($adzone['adzone_default_link']) && $adzone['adzone_default_link'])
                ) {
                    $html .= '</a>';
                }
            }

            $html .= '</div>';
        }

        $html .= '</div>';

        return $html;
    }

    /**
     * @param int $adzoneId
     * @param int $windowWidth
     * @return array|null
     * @throws Exception
     */
    public function initAdzone($adzoneId, $windowWidth)
    {
        $adzone = get_post($adzoneId);

        if (!$adzone) {
            return null;
        }

        /** @var Partials_Ar_Ad_Manager_Public_Adzones $publicAdzonesClass */
        global $publicAdzonesClass;

        $device = $publicAdzonesClass->getCurrentDevice($windowWidth);
        $adzone = $publicAdzonesClass->prepareAdzoneData($adzone);
        $availableBannersData = $this->getAvailableBanners($adzoneId, $device);

        $availableAdvertisers = $availableBannersData['availableAdvertisers'] ?? [];
        $availableBanners = $availableBannersData['availableBanners'] ?? [];
        $countryCode = $availableBannersData['countryCode'] ?? null;

        $availableCount = count($availableBanners);
        $winnerBanner = [];
        $otherBanners = [];

        if (!$availableCount) {
            $html = $adzone['hide_adzone_if_empty']
                ? null
                : $this->toHtml($adzone);
        } else if ($availableCount === 1) {
            $winnerBanner = $availableBanners[0];
            $html = $this->toHtml($adzone, $availableBanners[0]);
        } else {
            $winnerBanner = $this->getByWeightRandom($availableBanners);
            $html = $this->toHtml($adzone, $winnerBanner);

            foreach ($availableBanners as $availableBanner) {
                if ($winnerBanner['id'] === $availableBanner['id']) {
                    $otherBanners[$availableBanner['id']] = $html;

                    continue;
                }

                $otherBanners[$availableBanner['id']] = $this->toHtml($adzone, $availableBanner);
            }
        }

        return [
            'advertisers' => $availableAdvertisers,
            'html' => $html,
            'adzone_name' => $adzone['title'],
            'banner_id' => $winnerBanner ? $winnerBanner['id'] : '',
            'banner_name' => $winnerBanner ? $winnerBanner['title'] : '',
            'country' => $countryCode,
            'all_available_banners' => $otherBanners
        ];
    }

    /**
     * @param array $banners
     * @return mixed
     * @throws Exception
     */
    public function getByWeightRandom($banners)
    {
        $bannerWeightValues = array_column($banners, 'weight');
        $totalWeight = array_sum($bannerWeightValues);
        $totalWeight = $totalWeight
            ?: 1;

        $selection = random_int(1, $totalWeight);
        $count = 0;

        foreach ($banners as $bannerId => $value) {
            $weight = $value['weight'];
            $chosen = $bannerId;
            $count += $weight;

            if ($count >= $selection) {
                break;
            }
        }

        return isset($chosen)
            ? $banners[$chosen]
            : $banners[0];
    }

    /**
     * @param int $adzoneId
     * @param string $device
     * @return array
     */
    public function getAvailableBanners($adzoneId, $device)
    {
        global $publicBannerClass, $publicAdvertisersClass;

        /** @var Partials_Ar_Ad_Manager_Public_Banners $publicBannerClass */
        $bannersResult = $publicBannerClass->getBanners($adzoneId, $device);

        if (!$bannersResult) {
            return [];
        }

        $bannersResult = $publicBannerClass->sortByAvailableSize($bannersResult);
        $advertiserIds = array_column($bannersResult, 'id', 'advertiser');

        /** @var Partials_Ar_Ad_Manager_Public_Advertisers $publicAdvertisersClass */
        $availableAdvertisers = $publicAdvertisersClass->getAvailableAdvertisers(array_keys($advertiserIds));

        if (!$availableAdvertisers) {
            return [];
        }

        // Availability by advertiser
        $availableBanners = [];

        foreach ($availableAdvertisers as $availableAdvertiserId => $availableAdvertisersData) {
            foreach ($bannersResult as $banner) {
                if ((int)$banner['advertiser'] === (int)$availableAdvertiserId) {
                    $availableBanners[] = $banner;
                }
            }
        }

        $countryBannerCodes = array_column($availableBanners, 'countries');
        $countryCode = 'not set';

        if ($countryBannerCodes) {
            switch (get_option(Partials_Ar_Ad_Manager_Meta_Box_Abstract::AR_AD_MANAGER_FIELD_PREFIX . "_ip_to_country_provider", '')) {
                case 'ip_api':
                    $countryCode = $this->getCountryCodeFromIpApi($this->getClientIp()) ?? 'undefined';
                    break;
                case 'cloudflare':
                    $countryCode = $_SERVER['HTTP_CF_IPCOUNTRY'] ?? 'undefined';
                    break;
                default:
                    $countryCode = $this->getCountryCodeFromGeoplugin($this->getClientIp()) ?? 'undefined';
                    break;
            }

            $availableBanners = $publicBannerClass->sortByAvailableCountries($availableBanners, $countryCode);
        }

        // Remove unused advertisers
        $advertiserIdsFromBanner = array_column($availableBanners, 'advertiser');
        $advertiserIdsFromBanner = array_unique($advertiserIdsFromBanner);

        foreach ($availableAdvertisers as $advertiserId => $advertiserData) {
            if (!in_array($advertiserId, $advertiserIdsFromBanner)) {
                unset($availableAdvertisers[$advertiserId]);
            }
        }

        return [
            'availableAdvertisers' => $availableAdvertisers,
            'availableBanners' => $availableBanners,
            'countryCode' => $countryCode
        ];
    }

    /**
     * @return mixed|null
     */
    public function getClientIp()
    {
        $ip = null;

        foreach ([
                     'HTTP_CLIENT_IP',
                     'HTTP_X_FORWARDED_FOR',
                     'HTTP_X_FORWARDED',
                     'HTTP_X_CLUSTER_CLIENT_IP',
                     'HTTP_FORWARDED_FOR',
                     'HTTP_FORWARDED',
                     'REMOTE_ADDR'
                 ] as $key) {
            if (array_key_exists($key, $_SERVER) === true && $_SERVER[$key]) {
                foreach (array_map('trim', explode(',', $_SERVER[$key])) as $ip) {
                    if (
                        filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)
                        !== false
                    ) {
                        return sanitize_text_field($ip);
                    }
                }
            }
        }

        return $ip;
    }

    /**
     * @param string $ip
     * @return string|null
     */
    public function getCountryCodeFromGeoplugin($ip)
    {
        if (!$ip) {
            return null;
        }

        $output = null;

        if (filter_var($ip, FILTER_VALIDATE_IP)) {
            $ipData = @json_decode(
                wp_remote_retrieve_body(wp_remote_get("http://www.geoplugin.net/json.gp?ip=" . $ip)),
                true
            );

            $countryCode = $ipData['geoplugin_countryCode']
                ? sanitize_text_field($ipData['geoplugin_countryCode'])
                : null;

            if (@strlen(trim($countryCode)) === 2) {
                $output = $countryCode;
            }
        }

        return $output;
    }

    /**
     * @param string $ip
     * @return string|null
     */
    public function getCountryCodeFromIpApi($ip)
    {
        if (!$ip) {
            return null;
        }

        $output = null;

        if (filter_var($ip, FILTER_VALIDATE_IP)) {
            $ipData = @unserialize(wp_remote_retrieve_body(wp_remote_get("http://ip-api.com/php/" . $ip)));
            $resultStatus = $ipData['status'] ?? false;

            if ($resultStatus === 'success') {
                $output = $ipData['countryCode'] ? sanitize_text_field($ipData['countryCode']) : null;
            }
        }

        return $output;
    }
}
