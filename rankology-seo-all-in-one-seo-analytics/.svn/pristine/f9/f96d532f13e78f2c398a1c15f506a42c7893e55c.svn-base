<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

function rkseo_print_section_info_edd() {
    rankology_print_pre_section('edd');

    if ( ! is_plugin_active('easy-digital-downloads/easy-digital-downloads.php')) { ?>

<div class="rankology-notice is-warning">
    <p>
        <?php esc_html_e('You need to enable <strong>Easy Digital Downloads</strong> to apply these settings.', 'wp-rankology'); ?>
    </p>
</div>

<?php
    }
}
