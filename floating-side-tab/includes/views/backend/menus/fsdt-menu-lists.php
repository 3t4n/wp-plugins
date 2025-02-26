<?php defined('ABSPATH') or die('No script kiddies please!!'); ?>

<div class="wrap fsdt-wrap">
    <div class="fsdt-header-relative">
        <div class="fsdt-header">
            <h1 class="fsdt-floatLeft">
                <img src="<?php echo esc_url(FSDT_IMG_DIR . '/fsdt-backend-logo.png'); ?>" class="fsdt-plugin-logo">
            </h1>
            <div class="aftm-header-btn-wrap">
                <a class="fsdt-save-btn fsdt-btn-primary" href="<?php echo admin_url('admin.php?page=add-new-menu'); ?>"><?php esc_html_e('Add New Menu', 'floating-side-tab'); ?></a>
                <a class="fsdt-preview-btn fsdt-btn-secondary" href="<?php echo esc_url('https://wordpress.org/support/plugin/floating-side-tab/'); ?>" target="_blank"><i class="dashicons dashicons-phone  fsdt-btn-icon"></i><span> <?php esc_html_e('Get Support', 'floating-side-tab') ?> </span></a>
                <a class="fsdt-preview-btn fsdt-btn-secondary" href="<?php echo esc_url('https://wpshuffle.com/wordpress-documentations/floating-side-tab/?utm_source=fsdt_dashboard'); ?>" target="_blank"><i class="dashicons dashicons-media-document  fsdt-btn-icon"></i><span><?php esc_html_e('Documentation', 'floating-side-tab'); ?></span></a>
                <div class="fsdt-compare-btn"><div class="fsdt-compare-click">Free Vs Pro</div></div>
            </div>
        </div>
    </div>
    <!-- End of header section -->
    <?php
    if (!empty($_GET['message']) && sanitize_text_field($_GET['message']) == 1) {
    ?>
        <div class="notice notice-info is-dismissible inline">
            <p>
                <?php esc_html_e('Menu Added successfully.', 'floating-side-tab'); ?>
            </p>
        </div>
    <?php
    }
    if (!empty($_GET['message']) && sanitize_text_field($_GET['message']) == 3) {
    ?>
        <div class="notice notice-info is-dismissible inline">
            <p>
                <?php esc_html_e('Menu Deleted successfully.', 'floating-side-tab'); ?>
            </p>
        </div>
    <?php
    }
    ?>
    <h2 class="nav-tab-wrapper fsdt-menu-list wp-clearfix">
        <?php esc_html_e('Tab Menu Lists', 'floating-side-tab'); ?>
    </h2>

    <div class="fsdt-settings-wrap fsdt-form-flx fsdt-menu-list-wrap">
    <div class="fsdt-form-left">
        <div class="fsdt-settings-section">
            <table class="wp-list-table widefat fixed striped table-view-list posts">
                <thead>
                    <th>
                        <?php esc_html_e('Menu Name', 'floating-side-tab'); ?>
                    </th>
                    <th>
                        <?php esc_html_e('Action', 'floating-side-tab'); ?>
                    </th>
                </thead>
                <tbody>
                    <?php
                    global $wpdb;
                    $menu_table = FSDT_MENU_SETTING_TABLE;
                    $menu_rows = $wpdb->get_results($wpdb->prepare("select * from %i order by menu_id desc", $menu_table));
                    if (!empty($menu_rows)) {
                        foreach ($menu_rows as $menu_row) {
                    ?>
                            <tr>
                                <td><a href="<?php echo esc_url(admin_url('admin.php?page=floating-side-tab&menu_id=' . $menu_row->menu_id . '&action=edit_menu')); ?>" class="fsdt-menu-name-td">
                                        <?php echo esc_html($menu_row->menu_title); ?>
                                    </a></td>
                                <td>

                                    <a class="fsdt-menu-list-icon fsdt-list-edit" href="<?php echo esc_url(admin_url('admin.php?page=floating-side-tab&menu_id=' . $menu_row->menu_id . '&action=edit_menu')); ?>">
                                        <span class="dashicons dashicons-edit"></span></a>
                                    <?php $menu_delete_nonce = wp_create_nonce('fsdt_menu_delete_nonce'); ?>

                                    <a class="fsdt-menu-list-icon fsdt-list-preview" href="<?php echo esc_url(site_url() . '?fsdt_menu_preview=true&fsdt_menu_id=' . esc_attr(intval($menu_row->menu_id)) . '&_wpnonce=' . wp_create_nonce('fsdt_preview_nonce')); ?>" target="_blank"><span class="dashicons dashicons-visibility"></span></a>
                                    <a class="fsdt-menu-list-icon fsdt-list-delete" href="<?php echo admin_url('admin-post.php?action=fsdt_delete_menu_action&menu_id=' . $menu_row->menu_id . '&_wpnonce=' . $menu_delete_nonce); ?>" onclick="return confirm('Are you sure you want to delete this menu?');"><span class="dashicons dashicons-trash"></span></a>
                            </tr>

                    <?php }
                    } ?>
                </tbody>
            </table>
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