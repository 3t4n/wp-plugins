<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

function rkseo_print_section_info_robots() {
    rankology_print_pre_section('robots'); ?>

<p>
    <a href="<?php echo get_home_url(); ?>/robots.txt"
        class="btn btnSecondary" target="_blank">
        <?php esc_html_e('View your robots.txt', 'wp-rankology'); ?>
    </a>
    <span class="spinner"></span>
</p>

<?php
    /* translators: %1$s: get_home_url() */ ?>
<div class="rankology-notice">
    <p><?php printf(__('A <strong>robots.txt file</strong> will place at the root of your site. So, for site %1$s, the robots.txt file can be find at %1$s/robots.txt.', 'wp-rankology'), get_home_url()); ?>
    </p>
</div>

<div class="rankology-notice is-warning">
    <p><?php esc_html_e('This virtual file will not bypass your real <strong>robots.txt</strong> file if you have one.', 'wp-rankology'); ?>
    </p>
</div>

<?php
}
