<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    WP_ABL_Plugin
 * @subpackage WP_ABL_Plugin/admin/partials
 */
?>

<div class="wrap">
    <h2><img class="abl-logo" src="<?php echo plugins_url().'/'."adventure-bucket-list/admin/css/ablLogo.png"?>" /><?php echo esc_html( get_admin_page_title() ); ?></h2>
    <form action="options.php" method="post">
        <?php
            settings_fields( $this->plugin_name.'_page' );
            do_settings_sections( $this->plugin_name.'_page' );
            submit_button();
        ?>
    </form>
</div>
