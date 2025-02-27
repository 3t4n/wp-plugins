<?php
/**
 * Plugin settings page
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
?>
<div class="wrap">
    <h1 class="screen-reader-text"><?php esc_html_e('Crucial Real Estate', 'crucial-real-estate'); ?></h1>
    <div class="cre-admin-page">
        <header class="cre-admin-page-header">
            <h2 class="title"><span class="theme-title"><?php esc_html_e('Crucial Real Estate', 'crucial-real-estate'); ?></span></h2>
        </header>
        <?php
        if ( ! current_user_can('manage_options') ) {
            wp_die(esc_html__('You do not have sufficient permissions to access this page.', 'crucial-real-estate'));
        }

        $current_tab = 'price';
        if (isset($_GET['tab']) && array_key_exists($_GET['tab'], $this->tabs())) {
            $current_tab = sanitize_text_field($_GET['tab']);
        }
        $this->tabs_nav($current_tab);

        if ( $current_tab == 'price' && ( file_exists(CRE_PLUGIN_DIR . 'includes/settings/price.php') ) ) {
            require_once CRE_PLUGIN_DIR . 'includes/settings/price.php';
        }
        elseif ( $current_tab == 'map' && ( file_exists(CRE_PLUGIN_DIR . 'includes/settings/map.php') ) ) {
            require_once CRE_PLUGIN_DIR . 'includes/settings/map.php';
        }
        elseif ( $current_tab == 'gdpr' && ( file_exists(CRE_PLUGIN_DIR . 'includes/settings/gdpr.php') ) ) {
            require_once CRE_PLUGIN_DIR . 'includes/settings/gdpr.php';
        }
        elseif ( $current_tab == 'property' && ( file_exists(CRE_PLUGIN_DIR . 'includes/settings/property.php') ) ) {
            require_once CRE_PLUGIN_DIR . 'includes/settings/property.php';
        }
        ?>
        <footer class="cre-admin-page-footer">
            <p><?php printf(esc_html__('Version  %s', 'crucial-real-estate'), esc_html($this->version)); ?></p>
        </footer>
    </div><!-- /.cre-admin-page -->
</div><!-- /.wrap -->