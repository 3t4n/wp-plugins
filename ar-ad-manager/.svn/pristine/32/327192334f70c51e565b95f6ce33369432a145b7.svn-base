<?php
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) exit;
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Class Partials_Ar_Ad_Manager_Public_Shortcodes
 */
class Partials_Ar_Ad_Manager_Public_Shortcodes
{
    public function __construct()
    {
        add_shortcode('ad_manager_display_adzone', [$this, 'ad_manager_display_adzone_shortcodes_process']);
    }

    /***
     * @param array $attributes
     * @return string|void
     */
    public function ad_manager_display_adzone_shortcodes_process($attributes)
    {
        if (!isset($attributes['id'])) {
            return;
        }

        $adzone = get_post($attributes['id']);

        if (!$adzone) {
            return;
        }

        /** @var Partials_Ar_Ad_Manager_Public_Ads_Process $publicAdsProcess */
        global $publicAdsProcess;

        /** @var Partials_Ar_Ad_Manager_Public_Adzones $publicAdzonesClass */
        global $publicAdzonesClass;

        $adzone = $publicAdzonesClass->prepareAdzoneData($adzone);

        $html = '<div class="ar-wp-happy-block-ajax ar-wp-happy-block-ajax-' . $adzone['id'] . '" data-happy-block-id="' . $adzone['id'] . '">';
        $html .= $publicAdsProcess->toHtml($adzone);
        $html .= '</div>';

        return $html;
    }
}

new Partials_Ar_Ad_Manager_Public_Shortcodes();
