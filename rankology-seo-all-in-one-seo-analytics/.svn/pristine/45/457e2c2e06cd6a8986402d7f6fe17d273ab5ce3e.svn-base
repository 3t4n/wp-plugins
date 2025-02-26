<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

function rkseo_print_section_info_bot() {
?>
<div class="rkseo-section-header">
    <h2>
        <?php esc_html_e('Scan', 'wp-rankology'); ?>
    </h2>
</div>
<p><?php esc_html_e('The bot scans links in your content to find errors like 404. We limit this search by default to the last 100 posts/pages/custom post types.', 'wp-rankology'); ?>

<p>
    <?php esc_html_e('You can increase this value in the settings tab.', 'wp-rankology'); ?>
</p>

<a href="<?php echo admin_url('edit.php?post_type=rankology_bot'); ?>"
    class="btn btnTertiary">
    <?php esc_html_e('View scan results', 'wp-rankology'); ?>
</a>

<?php
}

function rkseo_print_section_info_bot_settings() { ?>
<div class="rkseo-section-header">
    <h2>
        <?php esc_html_e('Settings', 'wp-rankology'); ?>
    </h2>
</div>
<p>
    <?php esc_html_e('Edit your broken links settings.', 'wp-rankology'); ?>
</p>

<?php
}
