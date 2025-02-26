<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

function rkseo_print_section_info_advanced_security_ga()
{
    ?>
    <hr>
<h3>
    <?php esc_html_e('Google Analytics Stats in Dashboard widget', 'wp-rankology'); ?>
</h3>

<div class="rankology-notice">
    <p>
        <?php esc_html_e('By default, only users with <code>edit_dashboard</code> capability can view and configure the Google Analytics widget.','wp-rankology'); ?>
    </p>
</div>

<p>
    <?php esc_html_e('Check a user role below to allow it to view and configure the GA widget:', 'wp-rankology'); ?>
</p>

<?php
}
