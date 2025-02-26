<?php defined('ABSPATH') or die('No script kiddies please!!');
$fsdt_menu_settings = maybe_unserialize($menu_row->menu_details);
?>


<div class="wrap fsdt-wrap">
    <?php include(FSDT_PATH . '/includes/views/backend/menu-boxes/menu-header.php'); ?>


    <?php
    if (!empty($_GET['message']) && sanitize_text_field($_GET['message']) == 2) {
    ?>
        <div class="notice notice-info is-dismissible inline">
            <p>
                <?php esc_html_e('Menu Updated successfully.', 'floating-side-tab'); ?>
            </p>
        </div>
    <?php
    }
    ?>
    <?php include(FSDT_PATH . '/includes/views/backend/menu-boxes/menu-nav.php'); ?>

    <div class="fsdt-settings-wrap">

        <form method="post" class="fsdt-form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
            <input type="hidden" name="menu_id" value="<?php echo intval($menu_row->menu_id); ?>" />
            <?php wp_nonce_field('fsdt_edit_menu_settings_nonce', 'fsdt_edit_menu_settings_nonce_field'); ?>
            <input type="hidden" name="action" value="fsdt_edit_menu_action" />
            <?php
            include(FSDT_PATH . '/includes/views/backend/menu-boxes/menu-general-settings.php');
            include(FSDT_PATH . '/includes/views/backend/menu-boxes/menu-layout-settings.php');
            include(FSDT_PATH . '/includes/views/backend/menu-boxes/menu-custom-settings.php');
            include(FSDT_PATH . '/includes/views/backend/menu-boxes/menu-upgrade-to-pro.php');
            ?>

        </form>

    </div>
</div>
<?php include(FSDT_PATH . '/includes/views/backend/menu-boxes/js-template-markup.php'); ?>
<div class="fsdt-form-message"></div>