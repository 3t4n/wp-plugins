<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

$this->options = get_option('rankology_social_option_name');
if (function_exists('rankology_admin_header')) {
    echo rankology_admin_header();
} ?>
<form method="post" action="<?php echo admin_url('options.php'); ?>" class="rankology-option rankology-form-heading">
    <?php
        echo $this->rankology_feature_title('social');
settings_fields('rankology_social_option_group'); ?>

    <div id="rankology-tabs" class="wrap">
        <?php
            $current_tab = '';
            $plugin_settings_tabs    = [
                'tab_rankology_social_accounts'  => __('Social URLs', 'wp-rankology'),
                'tab_rankology_social_knowledge' => __('Google Graph', 'wp-rankology'),
                'tab_rankology_social_facebook'  => __('Facebook Graph', 'wp-rankology'),
                'tab_rankology_social_twitter'   => __('Twitter card', 'wp-rankology'),
            ];

echo '<div class="nav-tab-wrapper">';
foreach ($plugin_settings_tabs as $tab_key => $tab_caption) {
    echo '<a id="' . $tab_key . '-tab" class="nav-tab" href="?page=rankology-social#tab=' . $tab_key . '">' . $tab_caption . '</a>';
}
echo '</div>'; ?>
                <div class="rankology-tab <?php if ('tab_rankology_social_knowledge' == $current_tab) {
    echo 'active';
} ?>" id="tab_rankology_social_knowledge"><?php do_settings_sections('rankology-settings-admin-social-knowledge'); ?></div>
                <div class="rankology-tab <?php if ('tab_rankology_social_accounts' == $current_tab) {
    echo 'active';
} ?>" id="tab_rankology_social_accounts"><?php do_settings_sections('rankology-settings-admin-social-accounts'); ?></div>
                <div class="rankology-tab <?php if ('tab_rankology_social_facebook' == $current_tab) {
    echo 'active';
} ?>" id="tab_rankology_social_facebook"><?php do_settings_sections('rankology-settings-admin-social-facebook'); ?></div>
                <div class="rankology-tab <?php if ('tab_rankology_social_twitter' == $current_tab) {
    echo 'active';
} ?>" id="tab_rankology_social_twitter"><?php do_settings_sections('rankology-settings-admin-social-twitter'); ?></div>
        </div>

        <?php rkseo_submit_button(__('Save changes', 'wp-rankology')); ?>
    </form>
<?php
