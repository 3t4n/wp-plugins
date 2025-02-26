<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

if (is_plugin_active('rankology/rankology.php')) {
    if (function_exists('rankology_admin_header')) {
        echo rankology_admin_header();
    } ?>

<form method="post"
    action="<?php echo admin_url('options.php'); ?>"
    class="rankology-option">

    <?php
    if (isset($_GET['settings-updated']) && 'true' === $_GET['settings-updated']) { ?>
        <div class="rkseo-components-snackbar-list">
            <div class="rkseo-components-snackbar">
                <div class="rkseo-components-snackbar__content">
                    <span class="dashicons dashicons-yes"></span>
                    <?php esc_html_e('Your settings have been saved.', 'wp-rankology'); ?>
                </div>
            </div>
        </div>
    <?php }

    global $wp_version, $title;
    $current_tab = '';

    echo '<h1>' . $title . '</h1>';

    if (is_network_admin() && is_multisite()) {
        settings_fields('rankology_fno_mu_option_group');
    } else {
        settings_fields('rankology_fno_option_group');
    } ?>

    <div id="rankology-tabs" class="wrap">
        <?php
                $plugin_settings_tabs = [
                    'tab_rankology_robots'      => __('robots.txt', 'wp-rankology'),
                    'tab_rankology_htaccess'    => __('.htaccess', 'wp-rankology'),
                    'tab_rankology_white_label' => __('White Label', 'wp-rankology'),
                ];

    if ( ! is_network_admin() && is_multisite()) {
        unset($plugin_settings_tabs['tab_rankology_htaccess'], $plugin_settings_tabs['tab_rankology_white_label']);
    }

    if (defined('SUBDOMAIN_INSTALL') && true === constant('SUBDOMAIN_INSTALL')) {//if subdomains
        unset($plugin_settings_tabs['tab_rankology_robots']);
    }

    echo '<div class="nav-tab-wrapper">';
    foreach ($plugin_settings_tabs as $tab_key => $tab_caption) {
        echo '<a id="' . $tab_key . '-tab" class="nav-tab" href="?page=rankology-network-option#tab=' . $tab_key . '">' . $tab_caption . '</a>';
    }
    echo '</div>'; ?>

        <!-- Robots -->
        <?php if (defined('SUBDOMAIN_INSTALL') && false === constant('SUBDOMAIN_INSTALL')) {//if subdirectories?>
        <div class="rankology-tab <?php if ('tab_rankology_robots' == $current_tab) {
        echo 'active';
    } ?>" id="tab_rankology_robots"><?php do_settings_sections('rankology-mu-settings-admin-robots'); ?>
        </div>
        <?php } ?>

        <!-- htaccess -->
        <div class="rankology-tab <?php if ('tab_rankology_htaccess' == $current_tab) {
        echo 'active';
    } ?>" id="tab_rankology_htaccess"><?php do_settings_sections('rankology-settings-admin-htaccess'); ?>
        </div>

        <!-- white label -->
        <div class="rankology-tab <?php if ('tab_rankology_white_label' == $current_tab) {
        echo 'active';
    } ?>" id="tab_rankology_white_label"><?php do_settings_sections('rankology-mu-settings-admin-white-label'); ?>
        </div>

    </div>
    <!--rankology-tabs-->
    <?php echo $this->rankology_feature_save(); ?>

    <?php rkseo_submit_button(__('Save changes', 'wp-rankology')); ?>
</form>
<?php
}
