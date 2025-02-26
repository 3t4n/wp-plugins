<?php defined('ABSPATH') or die('No script kiddies please!!'); ?>
<div class="fsdt-header-relative">
    <div class="fsdt-header">
        <h1 class="fsdt-floatLeft">
            <img src="<?php echo esc_url(FSDT_IMG_DIR . '/fsdt-backend-logo.png'); ?>" class="fsdt-plugin-logo">
        </h1>

        <div class="aftm-header-btn-wrap">
            <input type="submit" class="fsdt-save-btn fsdt-btn-primary" value="<?php esc_html_e('Save Menu', 'floating-side-tab'); ?>" />
            <?php if (!empty($_GET['menu_id'])) { ?>
                <a class="fsdt-preview-btn fsdt-btn-secondary" href="<?php echo esc_url(site_url() . '?fsdt_menu_preview=true&fsdt_menu_id=' . intval($menu_row->menu_id) . '&_wpnonce=' . wp_create_nonce('fsdt_preview_nonce')); ?>" target="_blank"><?php esc_html_e('Preview', 'floating-side-tab'); ?></a>
            <?php } else {
            ?>
                <a class="fsdt-preview-btn fsdt-btn-secondary" href="<?php echo esc_url(admin_url('admin.php?page=floating-side-tab')); ?>" target="_blank"><?php esc_html_e('Menu Lists', 'floating-side-tab'); ?></a>
            <?php
            } ?>


            <a class="fsdt-preview-btn fsdt-btn-secondary" href="<?php echo esc_url('https://wordpress.org/support/plugin/floating-side-tab/'); ?>" target="_blank"><i class="dashicons dashicons-phone  fsdt-btn-icon"></i><span> <?php esc_html_e('Get Support', 'floating-side-tab') ?> </span></a>
            <a class="fsdt-preview-btn fsdt-btn-secondary" href="<?php echo esc_url('https://wpshuffle.com/wordpress-documentations/floating-side-tab/?utm_source=fsdt_dashboard'); ?>" target="_blank"><i class="dashicons dashicons-media-document  fsdt-btn-icon"></i><?php esc_html_e('Documentation', 'floating-side-tab'); ?></span></a>
            <div class="fsdt-compare-btn"><div class="fsdt-compare-click">Free Vs Pro</div></div>
        </div>
    </div>
</div>