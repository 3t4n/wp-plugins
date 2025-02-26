<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.
?>
<div class="wrap">
    <h2><?php esc_html_e('Advanced Settings', 'duplicate-copy-post'); ?></h2>
    <form method="post" action="options.php">
        <?php
        settings_fields('DCPDUP_advanced_settings_group');
        do_settings_sections('DCPDUP_advanced_settings');
        submit_button(__('Save Changes', 'duplicate-copy-post'));
        ?>
    </form>
</div>
