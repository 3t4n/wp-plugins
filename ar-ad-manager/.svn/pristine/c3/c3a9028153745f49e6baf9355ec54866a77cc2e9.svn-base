<?php
/**
 * @since      1.0.0
 *
 * @package    Ar_Ad_Manager
 * @subpackage Ar_Ad_Manager/admin/partials
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) exit;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (
        isset($_POST['ar_ad_manager_extra_fields_nonce'])
        && isset($_POST['ar_ad_manager_extra'])
        && wp_verify_nonce(
            sanitize_text_field(
                wp_unslash($_POST['ar_ad_manager_extra_fields_nonce'])
            ),
            'ar_ad_manager_extra_nonce'
        )
    ) {
        foreach ($_POST['ar_ad_manager_extra'] as $key => $value) {
            $sanitizedValue = sanitize_text_field($value);

            update_option(Partials_Ar_Ad_Manager_Meta_Box_Abstract::AR_AD_MANAGER_FIELD_PREFIX . '_' . $key, esc_html($value));
        }
    }
}
?>

<div class="wrap">
    <div id="poststuff">
        <div id="post-body">
            <div id="postbox-container-1" class="postbox-container">
                <div id="normal-sortables" class="meta-box-sortables ui-sortable">
                    <div class="postbox">
                        <div class="postbox-header">
                            <h2 class="hndle ui-sortable-handle"><?php echo esc_html__('Dashboard', 'ar-ad-manager'); ?></h2>
                        </div>
                        <div class="inside">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="ar-ad-manager-box">
                                    <div class="mdl-grid">
                                        <div class="mdl-cell mdl-cell--2-col mdl-cell--12-col-tablet">
                                            <h4><?php echo esc_html__('Adzone Class', 'ar-ad-manager');?></h4>
                                            <p><?php echo esc_html__('The default adzone class name.', 'ar-ad-manager');?></p>
                                        </div>
                                        <div class="mdl-cell mdl-cell--6-col mdl-cell--12-col-tablet">
                                            <?php $defaultAdzoneClass = get_option(Partials_Ar_Ad_Manager_Meta_Box_Abstract::AR_AD_MANAGER_FIELD_PREFIX . "_default_adzone_class", ''); ?>

                                            <div class="mdl-textfield mdl-js-textfield">
                                                <input
                                                    class="mdl-textfield__input"
                                                    type="text"
                                                    name="<?php echo esc_html(\Partials_Ar_Ad_Manager_Meta_Box_Abstract::AR_AD_MANAGER_FIELD_PREFIX); ?>[default_adzone_class]"
                                                    id="banner_default_image"
                                                    placeholder="<?php echo esc_html__('Default adzone class', 'ar-ad-manager');?>"
                                                    value="<?php echo esc_html($defaultAdzoneClass); ?>"
                                                >
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                    $ipToCountryProviders = [
                                        'ip_api' => 'Ip Api',
                                        'geoplugin' => 'Geo plugin',
                                        'cloudflare' => 'Cloudflare (Only if you use cloudflare)'
                                    ];

                                    $selectedIpToCountryProviders = get_option(Partials_Ar_Ad_Manager_Meta_Box_Abstract::AR_AD_MANAGER_FIELD_PREFIX . "_ip_to_country_provider", '');

                                    if (!$selectedIpToCountryProviders) {
                                        $selectedIpToCountryProviders = 'geoplugin';
                                    }
                                    ?>

                                    <div class="mdl-grid">
                                        <div class="mdl-cell mdl-cell--2-col mdl-cell--12-col-tablet">
                                            <h4><?php echo esc_html__('Ip to country provider', 'ar-ad-manager');?></h4>
                                            <p><?php echo esc_html__('A service that determines the country by IP address', 'ar-ad-manager');?></p>
                                        </div>
                                        <div class="mdl-cell mdl-cell--6-col mdl-cell--12-col-tablet">
                                            <select
                                                name="<?php echo esc_html(\Partials_Ar_Ad_Manager_Meta_Box_Abstract::AR_AD_MANAGER_FIELD_PREFIX); ?>[ip_to_country_provider]"
                                                id="ip_to_country_provider"
                                            >
                                                <?php foreach ($ipToCountryProviders as $ipToCountryProvider => $ipToCountryProviderLabel): ?>
                                                    <option value="<?php echo esc_html($ipToCountryProvider); ?>" <?php echo ($ipToCountryProvider === $selectedIpToCountryProviders) ? 'selected' : ''; ?>>
                                                        <?php echo esc_html($ipToCountryProviderLabel); ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mdl-grid">
                                        <div class="mdl-cell mdl-cell--2-col mdl-cell--12-col-tablet">
                                            <h4><?php echo esc_html__('Enable lazy-load', 'ar-ad-manager');?></h4>
                                            <p><?php echo esc_html__('Initialize the block only when it is in view', 'ar-ad-manager');?></p>
                                        </div>
                                        <div class="mdl-cell mdl-cell--6-col mdl-cell--12-col-tablet">
                                            <?php $IsActiveLazyLoad = get_option(Partials_Ar_Ad_Manager_Meta_Box_Abstract::AR_AD_MANAGER_FIELD_PREFIX . "_is_active_lazy_load"); ?>

                                            <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="is_active_lazy_load">
                                                <input
                                                    type="checkbox"
                                                    id="is_active_lazy_load"
                                                    class="mdl-switch__input"
                                                    name="<?php echo esc_html(\Partials_Ar_Ad_Manager_Meta_Box_Abstract::AR_AD_MANAGER_FIELD_PREFIX); ?>[is_active_lazy_load]"
                                                    <?php echo ($IsActiveLazyLoad === 'true') ? 'checked' : ''; ?>
                                                >
                                                <span class="mdl-switch__label"></span>
                                            </label>
                                        </div>

                                        <input
                                            type="hidden"
                                            id="is_active_lazy_load-hidden"
                                            name="<?php echo esc_html(\Partials_Ar_Ad_Manager_Meta_Box_Abstract::AR_AD_MANAGER_FIELD_PREFIX); ?>[is_active_lazy_load]"
                                            value="<?php echo esc_html($IsActiveLazyLoad); ?>"
                                        >
                                    </div>

                                    <div class="mdl-grid">
                                        <div class="mdl-cell mdl-cell--2-col mdl-cell--12-col-tablet">
                                            <h4><?php echo esc_html__('Activation of lazy loading on site action', 'ar-ad-manager');?></h4>
                                            <p><?php echo esc_html__('When you move, scroll, or click the mouse', 'ar-ad-manager');?></p>
                                        </div>
                                        <div class="mdl-cell mdl-cell--6-col mdl-cell--12-col-tablet">
                                            <?php $onSiteActionLazyLoad = get_option(Partials_Ar_Ad_Manager_Meta_Box_Abstract::AR_AD_MANAGER_FIELD_PREFIX . "_on_site_action_lazy_load"); ?>

                                            <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="on_site_action_lazy_load">
                                                <input
                                                    type="checkbox"
                                                    id="on_site_action_lazy_load"
                                                    class="mdl-switch__input"
                                                    name="<?php echo esc_html(\Partials_Ar_Ad_Manager_Meta_Box_Abstract::AR_AD_MANAGER_FIELD_PREFIX); ?>[on_site_action_lazy_load]"
                                                    <?php echo ($onSiteActionLazyLoad === 'true') ? 'checked' : ''; ?>
                                                >
                                                <span class="mdl-switch__label"></span>
                                            </label>
                                        </div>

                                        <input
                                            type="hidden"
                                            id="on_site_action_lazy_load-hidden"
                                            name="<?php echo esc_html(\Partials_Ar_Ad_Manager_Meta_Box_Abstract::AR_AD_MANAGER_FIELD_PREFIX); ?>[on_site_action_lazy_load]"
                                            value="<?php echo esc_html($onSiteActionLazyLoad); ?>"
                                        >
                                    </div>

                                    <div class="mdl-grid">
                                        <div class="mdl-cell mdl-cell--2-col mdl-cell--12-col-tablet">
                                            <h4><?php echo esc_html__('Check empty ads', 'ar-ad-manager');?></h4>
                                            <p><?php echo esc_html__('Check, if possible, for banner loading. For example, Google adsense on the parameter data-ad-status. If it is not loaded, load another one, if there is one in the same zone', 'ar-ad-manager');?></p>
                                        </div>
                                        <div class="mdl-cell mdl-cell--6-col mdl-cell--12-col-tablet">
                                            <?php $checkEmptyAds = get_option(Partials_Ar_Ad_Manager_Meta_Box_Abstract::AR_AD_MANAGER_FIELD_PREFIX . "_check_empty_ads"); ?>

                                            <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="check_empty_ads">
                                                <input
                                                    type="checkbox"
                                                    id="check_empty_ads"
                                                    class="mdl-switch__input"
                                                    name="<?php echo esc_html(\Partials_Ar_Ad_Manager_Meta_Box_Abstract::AR_AD_MANAGER_FIELD_PREFIX); ?>[check_empty_ads]"
                                                    <?php echo ($checkEmptyAds === 'true') ? 'checked' : ''; ?>
                                                >
                                                <span class="mdl-switch__label"></span>
                                            </label>
                                        </div>

                                        <input
                                            type="hidden"
                                            id="check_empty_ads-hidden"
                                            name="<?php echo esc_html(\Partials_Ar_Ad_Manager_Meta_Box_Abstract::AR_AD_MANAGER_FIELD_PREFIX); ?>[check_empty_ads]"
                                            value="<?php echo esc_html($checkEmptyAds); ?>"
                                        >
                                    </div>

                                    <div class="mdl-grid">
                                        <div class="mdl-cell mdl-cell--2-col mdl-cell--12-col-tablet">
                                            <h4><?php echo esc_html__('Transparent block after loading', 'ar-ad-manager');?></h4>
                                            <p><?php echo esc_html__('After loading the banner, make the area transparent', 'ar-ad-manager');?></p>
                                        </div>
                                        <div class="mdl-cell mdl-cell--6-col mdl-cell--12-col-tablet">
                                            <?php $transparentBlockAfterLoading = get_option(Partials_Ar_Ad_Manager_Meta_Box_Abstract::AR_AD_MANAGER_FIELD_PREFIX . "_transparent_block_after_loading"); ?>

                                            <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="transparent_block_after_loading">
                                                <input
                                                    type="checkbox"
                                                    id="transparent_block_after_loading"
                                                    class="mdl-switch__input"
                                                    name="<?php echo esc_html(\Partials_Ar_Ad_Manager_Meta_Box_Abstract::AR_AD_MANAGER_FIELD_PREFIX); ?>[transparent_block_after_loading]"
                                                    <?php echo ($transparentBlockAfterLoading === 'true') ? 'checked' : ''; ?>
                                                >
                                                <span class="mdl-switch__label"></span>
                                            </label>
                                        </div>

                                        <input
                                            type="hidden"
                                            id="transparent_block_after_loading-hidden"
                                            name="<?php echo esc_html(\Partials_Ar_Ad_Manager_Meta_Box_Abstract::AR_AD_MANAGER_FIELD_PREFIX); ?>[transparent_block_after_loading]"
                                            value="<?php echo esc_html($transparentBlockAfterLoading); ?>"
                                        >
                                    </div>

                                    <div class="mdl-grid">
                                        <div class="mdl-cell mdl-cell--2-col mdl-cell--12-col-tablet">
                                            <h4><?php echo esc_html__('Banner rotation', 'ar-ad-manager');?></h4>
                                            <p><?php echo esc_html__('If there are several banners in one zone, then rotation will occur after the time specified below.', 'ar-ad-manager');?></p>
                                        </div>
                                        <div class="mdl-cell mdl-cell--6-col mdl-cell--12-col-tablet">
                                            <?php $isBannerRotation = get_option(Partials_Ar_Ad_Manager_Meta_Box_Abstract::AR_AD_MANAGER_FIELD_PREFIX . "_is_banner_rotation"); ?>

                                            <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="is_banner_rotation">
                                                <input
                                                    type="checkbox"
                                                    id="is_banner_rotation"
                                                    class="mdl-switch__input"
                                                    name="<?php echo esc_html(\Partials_Ar_Ad_Manager_Meta_Box_Abstract::AR_AD_MANAGER_FIELD_PREFIX); ?>[is_banner_rotation]"
                                                    <?php echo ($isBannerRotation === 'true') ? 'checked' : ''; ?>
                                                >
                                                <span class="mdl-switch__label"></span>
                                            </label>
                                        </div>

                                        <input
                                            type="hidden"
                                            id="is_banner_rotation-hidden"
                                            name="<?php echo esc_html(\Partials_Ar_Ad_Manager_Meta_Box_Abstract::AR_AD_MANAGER_FIELD_PREFIX); ?>[is_banner_rotation]"
                                            value="<?php echo esc_html($isBannerRotation); ?>"
                                        >
                                    </div>

                                    <div class="mdl-grid">
                                        <div class="mdl-cell mdl-cell--2-col mdl-cell--12-col-tablet">
                                            <h4><?php echo esc_html__('Rotation time in seconds', 'ar-ad-manager');?></h4>
                                            <p><?php echo esc_html__('Time after which the banner will change', 'ar-ad-manager');?></p>
                                        </div>
                                        <div class="mdl-cell mdl-cell--6-col mdl-cell--12-col-tablet">
                                            <?php $bannerRotationTime = get_option(Partials_Ar_Ad_Manager_Meta_Box_Abstract::AR_AD_MANAGER_FIELD_PREFIX . "_banner_rotation_time", ''); ?>

                                            <div class="mdl-textfield mdl-js-textfield">
                                                <input
                                                    class="mdl-textfield__input"
                                                    type="number"
                                                    name="<?php echo esc_html(\Partials_Ar_Ad_Manager_Meta_Box_Abstract::AR_AD_MANAGER_FIELD_PREFIX); ?>[banner_rotation_time]"
                                                    id="banner_rotation_time"
                                                    placeholder="5"
                                                    value="<?php echo esc_html($bannerRotationTime); ?>"
                                                >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mdl-grid">
                                        <div class="mdl-cell mdl-cell--2-col mdl-cell--12-col-tablet">
                                            <h4><?php echo esc_html__('Enable Statistics', 'ar-ad-manager');?></h4>
                                            <p><?php echo esc_html__('Do you want to send statistics to Google Analytics?', 'ar-ad-manager');?></p>
                                        </div>
                                        <div class="mdl-cell mdl-cell--6-col mdl-cell--12-col-tablet">
                                            <?php $isGoogleAnalyticsIsActive = get_option(Partials_Ar_Ad_Manager_Meta_Box_Abstract::AR_AD_MANAGER_FIELD_PREFIX . "_is_google_analytics_active"); ?>

                                            <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="is_google_analytics_active">
                                                <input
                                                    type="checkbox"
                                                    id="is_google_analytics_active"
                                                    class="mdl-switch__input"
                                                    name="<?php echo esc_html(\Partials_Ar_Ad_Manager_Meta_Box_Abstract::AR_AD_MANAGER_FIELD_PREFIX); ?>[is_google_analytics_active]"
                                                    <?php echo ($isGoogleAnalyticsIsActive === 'true') ? 'checked' : ''; ?>
                                                >
                                                <span class="mdl-switch__label"></span>
                                            </label>
                                        </div>

                                        <input
                                            type="hidden"
                                            id="is_google_analytics_active-hidden"
                                            name="<?php echo esc_html(\Partials_Ar_Ad_Manager_Meta_Box_Abstract::AR_AD_MANAGER_FIELD_PREFIX); ?>[is_google_analytics_active]"
                                            value="<?php echo esc_html($isGoogleAnalyticsIsActive); ?>"
                                        >
                                    </div>

                                    <div class="mdl-grid">
                                        <div class="mdl-cell mdl-cell--2-col mdl-cell--12-col-tablet">
                                            <h4><?php echo esc_html__('Google Analytics track ID', 'ar-ad-manager');?></h4>
                                            <p><?php echo esc_html__('The default adzone class name.', 'ar-ad-manager');?></p>
                                        </div>
                                        <div class="mdl-cell mdl-cell--6-col mdl-cell--12-col-tablet">
                                            <?php $googleAnalyticTrackId = get_option(Partials_Ar_Ad_Manager_Meta_Box_Abstract::AR_AD_MANAGER_FIELD_PREFIX . "_google_analytic_track_id", ''); ?>

                                            <div class="mdl-textfield mdl-js-textfield">
                                                <input
                                                    class="mdl-textfield__input"
                                                    type="text"
                                                    name="<?php echo esc_html(\Partials_Ar_Ad_Manager_Meta_Box_Abstract::AR_AD_MANAGER_FIELD_PREFIX); ?>[google_analytic_track_id]"
                                                    id="google_analytic_track_id"
                                                    placeholder="G-*********"
                                                    value="<?php echo esc_html($googleAnalyticTrackId); ?>"
                                                >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mdl-grid">
                                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" type="submit">
                                            <?php echo esc_html__('Save General Settings', 'ar-ad-manager');?>
                                        </button>
                                    </div>
                                </div>

                                <input
                                    type="hidden"
                                    name="<?php echo esc_html(\Partials_Ar_Ad_Manager_Meta_Box_Abstract::AR_AD_MANAGER_FIELD_PREFIX); ?>_fields_nonce"
                                    value="<?php echo esc_html(wp_create_nonce('ar_ad_manager_extra_nonce')); ?>"
                                />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
