<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

if (is_network_admin() && is_multisite()) {
    $this->options = get_option('rankology_fno_mu_option_name');
} else {
    $this->options = get_option('rankology_fno_option_name');
}

if (is_plugin_active('rankology/rankology.php')) {

    if (function_exists('rankology_admin_header')) {
        echo rankology_admin_header();

    }
} ?>
<?php require_once RANKOLOGY_STATS_DIR . 'includes/admin/templates/header.php'; ?>
<form method="post" action="<?php echo admin_url('options.php'); ?>" class="rankology-option">
    <?php
    $current_tab = 'tab_rankology_rich_snippets';

    if (is_network_admin() && is_multisite()) {
        settings_fields('rankology_fno_mu_option_group');
    } else {
        settings_fields('rankology_fno_option_group');
    } ?>

    <div id="rankology-tabs" class="wrap">
        <?php
        $plugin_settings_tabs = [
            'tab_rankology_rich_snippets' => __('Structured Data Types', 'wp-rankology'),
            'tab_rankology_breadcrumbs' => __('Breadcrumbs', 'wp-rankology'),
            'tab_rankology_inspect_url' => __('Google Search Console', 'wp-rankology'),
            'tab_rankology_news' => __('Google News', 'wp-rankology'),
            'tab_rankology_woocommerce' => __('Woocommerce', 'wp-rankology'),
            'tab_rankology_ai' => __('AI Content', 'wp-rankology'),
            'tab_rankology_rss' => __('RSS', 'wp-rankology'),
            'tab_rankology_robots' => __('robots.txt', 'wp-rankology'),
            'tab_rankology_htaccess' => __('.htaccess', 'wp-rankology'),
            'tab_rankology_404' => __('Redirections / 404', 'wp-rankology'),
            'tab_rankology_page_speed' => __('PageSpeed Insights', 'wp-rankology'),
        ];

        if (defined('SUBDOMAIN_INSTALL') && false === constant('SUBDOMAIN_INSTALL')) { //if multisite subdirectories
            unset($plugin_settings_tabs['tab_rankology_robots'], $plugin_settings_tabs['tab_rankology_htaccess'], $plugin_settings_tabs['tab_rankology_white_label']);
        }

        $plugin_settings_tabs = apply_filters('rankology_remove_pro_settings_tabs', $plugin_settings_tabs);

        echo '<div class="nav-tab-wrapper">';
        foreach ($plugin_settings_tabs as $tab_key => $tab_caption) {
            echo '<a id="' . $tab_key . '-tab" class="nav-tab" href="?page=rankology-fno-page#tab=' . $tab_key . '">' . $tab_caption . '</a>';
        }
        echo '</div>'; ?>

        <!-- Woocommerce -->
        <div class="rankology-tab <?php if ('tab_rankology_woocommerce' == $current_tab) {
            echo 'active';
        } ?>" id="tab_rankology_woocommerce">
            <?php if (is_plugin_active('woocommerce/woocommerce.php')) { ?>
                <?php do_settings_sections('rankology-settings-admin-woocommerce'); ?>
            <?php } else {
                echo '<h4>';
                esc_html_e('WooCommerce Not Activate.', 'wp-rankology');
                echo '</h4>';
            } ?>
        </div>
        <!-- Structured Data Types -->
        <div class="rankology-tab <?php if ('tab_rankology_rich_snippets' == $current_tab) {
            echo 'active';
        } ?>" id="tab_rankology_rich_snippets">
            <?php do_settings_sections('rankology-settings-admin-rich-snippets'); ?>
        </div>

        <!-- AI -->
        <div class="rankology-tab <?php if ('tab_rankology_ai' == $current_tab) {
            echo 'active';
        } ?>" id="tab_rankology_ai"><?php do_settings_sections('rankology-settings-admin-ai'); ?>
        </div>

        <!-- Breadcrumbs -->
        <div class="rankology-tab <?php if ('tab_rankology_breadcrumbs' == $current_tab) {
            echo 'active';
        } ?>" id="tab_rankology_breadcrumbs"><?php do_settings_sections('rankology-settings-admin-breadcrumbs'); ?>
        </div>

        <!-- Google Page Speed -->
        <div class="rankology-tab <?php if ('tab_rankology_page_speed' == $current_tab) {
            echo 'active';
        } ?>" id="tab_rankology_page_speed"><?php do_settings_sections('rankology-settings-admin-page-speed'); ?>
        </div>

        <!-- Google Search Console -->
        <div class="rankology-tab <?php if ('tab_rankology_inspect_url' == $current_tab) {
            echo 'active';
        } ?>" id="tab_rankology_inspect_url"><?php do_settings_sections('rankology-settings-admin-inspect-url'); ?>
        </div>

        <!-- Robots -->
        <?php if (!defined('SUBDOMAIN_INSTALL') || (defined('SUBDOMAIN_INSTALL') && true === constant('SUBDOMAIN_INSTALL'))) { //if multisite sub-domains ?>
            <div class="rankology-tab <?php if ('tab_rankology_robots' == $current_tab) {
                echo 'active';
            } ?>" id="tab_rankology_robots"><?php do_settings_sections('rankology-settings-admin-robots'); ?>
            </div>
        <?php } ?>

        <!-- Google News Sitemap -->
        <div class="rankology-tab <?php if ('tab_rankology_news' == $current_tab) {
            echo 'active';
        } ?>" id="tab_rankology_news">
            <?php do_settings_sections('rankology-settings-admin-news'); ?>
        </div>

        <!-- 404 -->
        <div class="rankology-tab <?php if ('tab_rankology_404' == $current_tab) {
            echo 'active';
        } ?>" id="tab_rankology_404"><?php do_settings_sections('rankology-settings-admin-monitor-404'); ?>
        </div>

        <!-- htaccess -->
        <?php if (!is_multisite()) { ?>
            <div class="rankology-tab <?php if ('tab_rankology_htaccess' == $current_tab) {
                echo 'active';
            } ?>" id="tab_rankology_htaccess"><?php do_settings_sections('rankology-settings-admin-htaccess'); ?>
            </div>
        <?php } ?>

        <!-- RSS -->
        <div class="rankology-tab <?php if ('tab_rankology_rss' == $current_tab) {
            echo 'active';
        } ?>" id="tab_rankology_rss"><?php do_settings_sections('rankology-settings-admin-rss'); ?>
        </div>

        <!-- Rewrite -->
        <div class="rankology-tab <?php if ('tab_rankology_rewrite' == $current_tab) {
            echo 'active';
        } ?>" id="tab_rankology_rewrite"><?php do_settings_sections('rankology-settings-admin-rewrite'); ?>
        </div>

        <!-- White Label -->
        <?php if (!is_multisite()) { ?>
            <div class="rankology-tab <?php if ('tab_rankology_white_label' == $current_tab) {
                echo 'active';
            } ?>" id="tab_rankology_white_label"><?php do_settings_sections('rankology-settings-admin-white-label'); ?>
            </div>
        <?php } ?>

    </div>
    <!--rankology-tabs-->

    <?php echo $this->rankology_feature_save(); ?>
<!--    --><?php //if (is_plugin_active('woocommerce/woocommerce.php')) { ?>
    <?php rkseo_submit_button(__('Save changes', 'wp-rankology')); ?>
<!--    --><?php //} else {
                // echo '<h4>';
                // esc_html_e('WooCommerce Plugin Is Not Activated.', 'wp-rankology');
                // echo '</h4>';
//            } ?>
    
</form>
<?php