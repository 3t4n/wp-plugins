<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

function rkseo_print_section_info_htaccess() {
    rankology_print_pre_section('htaccess'); ?>

    <div class="rankology-notice is-warning">
        <p>
            <strong><?php esc_html_e('Save your HTACCESS file before edit!', 'wp-rankology'); ?></strong>
        </p>
    </div>

    <?php
}
