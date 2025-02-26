<?php defined('ABSPATH') or die('No script kiddies please!!'); ?>

<div class="wrap fsdt-wrap">

    <?php include(FSDT_PATH . '/includes/views/backend/menu-boxes/menu-header.php'); ?>
    <!-- End of header section -->
    <?php
    if (!empty($_GET['message']) && $_GET['message'] == 1) {
        ?>
        <div class="notice notice-info is-dismissible inline">
            <p>
                <?php esc_html_e('Settings saved successfully.', 'floating-side-tab'); ?>
            </p>
        </div>
        <?php
    }
    ?>
    <?php include(FSDT_PATH . '/includes/views/backend/menu-boxes/menu-nav.php'); ?>

    <div class="fsdt-settings-wrap">

        <form method="post" class="fsdt-form" action="<?php echo admin_url('admin-post.php'); ?>">
            <?php wp_nonce_field('fsdt_settings_nonce', 'fsdt_settings_nonce_field'); ?>
            <input type="hidden" name="action" value="fsdt_add_menu_action" />
            <?php
            include(FSDT_PATH . '/includes/views/backend/menu-boxes/menu-general-settings.php');
            include(FSDT_PATH . '/includes/views/backend/menu-boxes/menu-layout-settings.php');
            include(FSDT_PATH . '/includes/views/backend/menu-boxes/menu-custom-settings.php');
            include(FSDT_PATH . '/includes/views/backend/menu-boxes/menu-upgrade-to-pro.php');
            ?>
           
        </form>

    </div>
</div>
<script id="tmpl-icon-template" type="text/html">
    <?php
    unset($fsdt_menu_settings);
    $field_key = '{{data.icon_key}}';
    include(FSDT_PATH . '/includes/views/backend/js-templates/icon-template.php'); ?>
</script>

<div class="fsdt-form-message"></div>