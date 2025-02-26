<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.
?>
<div class="wrap">
    <h2><?php esc_html_e('Duplication Profiles', 'duplicate-copy-post'); ?></h2>
    <p><?php esc_html_e('Manage your duplication profiles here.', 'duplicate-copy-post'); ?></p>
    <form method="post" action="options.php">
        <?php
        settings_fields('DCPDUP_profile_settings_group');
        do_settings_sections('DCPDUP_profiles_settings');
        submit_button(__('Save Profiles', 'duplicate-copy-post'));
        ?>
    </form>
</div>
