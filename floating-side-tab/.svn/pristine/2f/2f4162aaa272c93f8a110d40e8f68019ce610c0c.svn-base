<?php defined('ABSPATH') or die('No script kiddies please!!');
$fsdt_global_settings = get_option('fsdt_global_settings');

?>

<div class="wrap fsdt-wrap">
    <div class="fsdt-header-relative">
        <div class="fsdt-header">
            <h1 class="fsdt-floatLeft">
                <img src="<?php echo esc_url(FSDT_IMG_DIR . '/fsdt-backend-logo.png'); ?>" class="fsdt-plugin-logo">

            </h1>
            <div class="aftm-header-btn-wrap">
                <input type="submit" class="fsdt-save-btn fsdt-settings-save-btn fsdt-btn-primary" value="<?php esc_html_e('Save Setting', 'floating-side-tab'); ?>" />
                <a class="fsdt-preview-btn fsdt-btn-secondary" href="<?php echo esc_url('https://wordpress.org/support/plugin/floating-side-tab/'); ?>" target="_blank"><i class="dashicons dashicons-phone  fsdt-btn-icon"></i><span> <?php esc_html_e('Get Support', 'floating-side-tab') ?> </span></a>
                <a class="fsdt-preview-btn fsdt-btn-secondary" href="<?php echo esc_url('https://wpshuffle.com/wordpress-documentations/floating-side-tab/?utm_source=fsdt_dashboard'); ?>" target="_blank"><i class="dashicons dashicons-media-document  fsdt-btn-icon"></i><span><?php esc_html_e('Documentation', 'floating-side-tab'); ?></span></a>
                <div class="fsdt-compare-btn"><div class="fsdt-compare-click">Free Vs Pro</div></div>
            </div>

        </div>
    </div>
    <?php
    if (!empty($_GET['message']) && sanitize_text_field($_GET['message']) == 1) {
    ?>
        <div class="notice notice-info is-dismissible inline">
            <p>
                <?php esc_html_e('Global Settings Saved successfully.', 'floating-side-tab'); ?>
            </p>
        </div>
    <?php
    }
    ?>

    <div class="fsdt-each-icon fsdt-each-form-field fsdt-setting fsdt-no-border">
        <form method="post" class="fsdt-settings-form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
            <?php wp_nonce_field('fsdt_display_settings_nonce', 'fsdt_display_settings_nonce_field'); ?>
            <input type="hidden" name="action" value="fsdt_display_menu_action" />
            <div class="fsdt-form-flx">
            <div class="fsdt-form-left">
                <div class="fsdt-field-body">
                    <div class="fsdt-field-wrap">
                        <label>
                            <?php esc_html_e('Hompage', 'floating-side-tab'); ?>
                        </label>
                        <div class="fsdt-field-wrap fsdt-field">
                            <select name="fsdt_global_settings[display][fsdt_home_menu]" class="fsdt-icon-type-select-option fsdt-select-option">
                                <option value="">
                                    <?php esc_html_e('Select Menu', 'floating-side-tab'); ?>
                                </option>
                                <?php
                                $home_page_menu = (!empty($fsdt_global_settings['display_menu_page']['home_page'])) ? $fsdt_global_settings['display_menu_page']['home_page'] : '';
                                global $wpdb;
                                $menu_table = FSDT_MENU_SETTING_TABLE;
                                $menu_rows = $wpdb->get_results($wpdb->prepare("select * from %i order by menu_id desc", $menu_table));
                                if (!empty($menu_rows)) {
                                    foreach ($menu_rows as $menu_row) {
                                ?>
                                        <option value="<?php echo esc_attr($menu_row->menu_id); ?>" <?php selected($home_page_menu, $menu_row->menu_id); ?>>
                                            <?php echo esc_attr($menu_row->menu_title); ?>
                                        </option>
                                <?php }
                                } ?>
                            </select>
                        </div>
                    </div>

                    <div class="fsdt-field-wrap">
                        <label>
                            <?php esc_html_e('Archive Page', 'floating-side-tab'); ?>
                        </label>
                        <div class="fsdt-field-wrap fsdt-field">
                            <select name="fsdt_global_settings[display][fsdt_archieve_menu]" class="fsdt-icon-type-select-option fsdt-select-option">
                                <option value="">
                                    <?php esc_html_e('Select Menu', 'floating-side-tab'); ?>
                                </option>
                                <?php
                                $archive_page_menu = (!empty($fsdt_global_settings['display_menu_page']['archive_page'])) ? $fsdt_global_settings['display_menu_page']['archive_page'] : '';
                                global $wpdb;
                                $menu_table = FSDT_MENU_SETTING_TABLE;
                                $menu_rows = $wpdb->get_results($wpdb->prepare("select * from %i order by menu_id desc", $menu_table));
                                if (!empty($menu_rows)) {
                                    foreach ($menu_rows as $menu_row) {
                                ?>
                                        <option value="<?php echo esc_attr($menu_row->menu_id); ?>" <?php selected($archive_page_menu, $menu_row->menu_id); ?>>
                                            <?php echo esc_attr($menu_row->menu_title); ?>
                                        </option>
                                <?php }
                                } ?>
                            </select>
                        </div>
                    </div>

                    <?php

                    $args = array(
                        'public' => true,
                    );
                    $post_types = get_post_types($args, 'names');

                    foreach ($post_types as $post_type) {
                    ?>
                        <div class="fsdt-field-wrap">
                            <label>
                                <?php
                                // Translators: %s is replaced by the post type name: For example Display on Posts
                                printf(esc_html__("Display on %s", 'floating-side-tab'), esc_html($post_type));
                                ?>
                            </label>
                            <div class="fsdt-field-wrap fsdt-field">
                                <select name="fsdt_global_settings[post_type_menu][<?php echo esc_attr($post_type); ?>]" class="fsdt-icon-type-select-option fsdt-select-option">
                                    <option value="">
                                        <?php esc_html_e('Select Menu', 'floating-side-tab'); ?>
                                    </option>
                                    <?php
                                    $post_type_menu_page = (!empty($fsdt_global_settings['display_post_type_menu'][$post_type])) ? $fsdt_global_settings['display_post_type_menu'][$post_type] : '';
                                    global $wpdb;
                                    $menu_table = FSDT_MENU_SETTING_TABLE;
                                    $menu_rows = $wpdb->get_results($wpdb->prepare("select * from %i order by menu_id desc", $menu_table));
                                    if (!empty($menu_rows)) {
                                        foreach ($menu_rows as $menu_row) {
                                    ?>
                                            <option value="<?php echo esc_attr($menu_row->menu_id); ?>" <?php selected($post_type_menu_page, $menu_row->menu_id); ?>>
                                                <?php echo esc_attr($menu_row->menu_title); ?>
                                            </option>
                                    <?php }
                                    } ?>
                                </select>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="fsdt-field-wrap  fsdt-settings-action">
                        <label></label>
                        <div class="fsdt-field">
                            <input type="submit" class="button-primary fsdt-global-settings" value="<?php esc_html_e('Save Settings', 'floating-side-tab'); ?>" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="fsdt-form-right">
                <?php
                /**
                 * Upgrade Field
                 */
                include(FSDT_PATH . '/includes/views/backend/upgrade.php');
                ?>

            </div>
            </div>
        </form>
    </div>