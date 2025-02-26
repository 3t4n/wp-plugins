<?php
/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://github.com/CoolS2/ar-ad-manager
 * @since      1.0.0
 *
 * @package    Ar_Ad_Manager
 * @subpackage Ar_Ad_Manager/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Ar_Ad_Manager
 * @subpackage Ar_Ad_Manager/public
 * @author     Aleksandrs Reidzans <aleksandrs.reidzans@gmail.com>
 */
class Ar_Ad_Manager_Public
{
    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $ar_ad_manager The ID of this plugin.
     */
    private $ar_ad_manager;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $version The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @param string $ar_ad_manager The name of the plugin.
     * @param string $version The version of this plugin.
     * @since    1.0.0
     */
    public function __construct($ar_ad_manager, $version)
    {
        $this->ar_ad_manager = $ar_ad_manager;
        $this->version = $version;
    }

    /**
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_styles()
    {
        if (file_exists(plugin_dir_path(__FILE__) . 'css/ar-ad-manager-style.min.css')) {
            wp_enqueue_style(
                'ar-ad-manager-custom-styles', 
                plugin_dir_url(__FILE__) . 'css/ar-ad-manager-style.min.css', 
                [], 
                get_option(Partials_Ar_Ad_Manager_Meta_Box_Abstract::AR_AD_MANAGER_FIELD_PREFIX . '_css_ver'), 
                false
            );
        }
    
    }

    /**
     * Register the JavaScript for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts()
    {
        wp_enqueue_script(
            $this->ar_ad_manager . '-main-public-js',
            plugin_dir_url(__FILE__) . 'js/ar-ad-manager-main.min.js',
            [],
            $this->version,
            [
                'in_footer' => true,
                'strategy' => 'async',
            ]
        );

        $isGoogleAnalyticsIsActive =
            get_option(Partials_Ar_Ad_Manager_Meta_Box_Abstract::AR_AD_MANAGER_FIELD_PREFIX . "_is_google_analytics_active");
        $isActiveLazyLoad =
            get_option(Partials_Ar_Ad_Manager_Meta_Box_Abstract::AR_AD_MANAGER_FIELD_PREFIX . "_is_active_lazy_load");
        $isBannerRotation =
            get_option(Partials_Ar_Ad_Manager_Meta_Box_Abstract::AR_AD_MANAGER_FIELD_PREFIX . "_is_banner_rotation");
        $bannerRotationTime =
            get_option(Partials_Ar_Ad_Manager_Meta_Box_Abstract::AR_AD_MANAGER_FIELD_PREFIX . "_banner_rotation_time");
        $onSiteActionLazyLoad =
            get_option(Partials_Ar_Ad_Manager_Meta_Box_Abstract::AR_AD_MANAGER_FIELD_PREFIX . "_on_site_action_lazy_load");
        $checkEmptyAds =
            get_option(Partials_Ar_Ad_Manager_Meta_Box_Abstract::AR_AD_MANAGER_FIELD_PREFIX . "_check_empty_ads");
        $transparentBlockAfterLoading =
            get_option(Partials_Ar_Ad_Manager_Meta_Box_Abstract::AR_AD_MANAGER_FIELD_PREFIX . "_transparent_block_after_loading");
        $isGoogleAnalyticsTrackId =
            get_option(Partials_Ar_Ad_Manager_Meta_Box_Abstract::AR_AD_MANAGER_FIELD_PREFIX . "_google_analytic_track_id");

        $mainVariables = [
            'ajaxurl' => admin_url('admin-ajax.php'),
            'ga' => ($isGoogleAnalyticsIsActive && $isGoogleAnalyticsTrackId)
                ? $isGoogleAnalyticsTrackId
                : '',
            'isActiveLazyLoad' => $isActiveLazyLoad === 'true',
            'isBannerRotation' => $isBannerRotation === 'true',
            'bannerRotationTime' => $bannerRotationTime,
            'checkEmptyAds' => $checkEmptyAds === 'true',
            'transparentBlockAfterLoading' => $transparentBlockAfterLoading === 'true',
            'onSiteActionLazyLoad' => $onSiteActionLazyLoad === 'true',
            'post_id' => get_the_ID()
        ];

        wp_add_inline_script(
            $this->ar_ad_manager . '-main-public-js',
            'var ar_wp_main_variables = ' . json_encode( $mainVariables ),
            'before'
        );
    }

    /**
     * @return void
     */
    public function add_shortcodes()
    {
        global $publicBannerClass, $publicAdzonesClass, $publicAdvertisersClass, $publicAdsProcess;

        include(plugin_dir_path(__FILE__) . 'partials/ar-ad-manager-public-find-in-set.php');
        include(plugin_dir_path(__FILE__) . 'partials/ar-ad-manager-public-banners.php');
        include(plugin_dir_path(__FILE__) . 'partials/ar-ad-manager-public-adzones.php');
        include(plugin_dir_path(__FILE__) . 'partials/ar-ad-manager-public-advertisers.php');
        include(plugin_dir_path(__FILE__) . 'partials/ar-ad-manager-public-ads-process.php');

        $publicBannerClass = new Partials_Ar_Ad_Manager_Public_Banners();
        $publicAdzonesClass = new Partials_Ar_Ad_Manager_Public_Adzones();
        $publicAdvertisersClass = new Partials_Ar_Ad_Manager_Public_Advertisers();
        $publicAdsProcess = new Partials_Ar_Ad_Manager_Public_Ads_Process();

        include(plugin_dir_path(__FILE__) . 'partials/ar-ad-manager-public-shortcodes.php');
        include(plugin_dir_path(__FILE__) . 'partials/ar-ad-manager-public-ajax.php');
    }
}
