<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

$this->options = get_option('rankology_google_analytics_option_name');
if (function_exists('rankology_admin_header')) {
    echo rankology_admin_header();
} ?>
<form method="post"
    action="<?php echo admin_url('options.php'); ?>"
    class="rankology-option">
    <?php
        echo $this->rankology_feature_title('google-analytics');
settings_fields('rankology_google_analytics_option_group'); ?>

    <div id="rankology-tabs" class="wrap">
        <?php
            $current_tab = '';

            $plugin_settings_tabs = [
                'tab_rankology_google_analytics_enable'              => __('Google Analytics', 'wp-rankology'),
                'tab_rankology_google_analytics_gdpr'                => __('Cookie bar / GDPR', 'wp-rankology'),
                'tab_rankology_google_analytics_custom_tracking'     => __('Custom Tracking', 'wp-rankology'),
            ];

echo '<div class="nav-tab-wrapper">';
foreach ($plugin_settings_tabs as $tab_key => $tab_caption) {
    echo '<a id="' . $tab_key . '-tab" class="nav-tab" href="?page=rankology-google-analytics#tab=' . $tab_key . '">' . $tab_caption . '</a>';
}
echo '</div>'; ?>
        <div class="rankology-tab <?php if ('tab_rankology_google_analytics_enable' == $current_tab) {
    echo 'active';
} ?>" id="tab_rankology_google_analytics_enable">
            <?php do_settings_sections('rankology-settings-admin-google-analytics-enable'); ?>
            <?php do_settings_sections('rankology-settings-admin-google-analytics-features'); ?>
            <?php do_settings_sections('rankology-settings-admin-google-analytics-events'); ?>
            <?php
            do_settings_sections('rankology-settings-admin-google-analytics-ecommerce');
            do_settings_sections('rankology-settings-admin-google-analytics-dashboard');
            ?>
        </div>
        <div class="rankology-tab <?php if ('tab_rankology_google_analytics_custom_tracking' == $current_tab) {
    echo 'active';
} ?>" id="tab_rankology_google_analytics_custom_tracking"><?php do_settings_sections('rankology-settings-admin-google-analytics-custom-tracking'); ?>
        </div>
        <div class="rankology-tab <?php if ('tab_rankology_google_analytics_gdpr' == $current_tab) {
    echo 'active';
} ?>" id="tab_rankology_google_analytics_gdpr"><?php do_settings_sections('rankology-settings-admin-google-analytics-gdpr'); ?>
        </div>
        <div class="rankology-tab <?php if ('tab_rankology_google_analytics_stats' == $current_tab) {
    echo 'active';
} ?>" id="tab_rankology_google_analytics_stats">
        
        <?php
        
        ?>
        
        </div>
    </div>

    <?php rkseo_submit_button(__('Save changes', 'wp-rankology')); ?>
</form>
<?php
