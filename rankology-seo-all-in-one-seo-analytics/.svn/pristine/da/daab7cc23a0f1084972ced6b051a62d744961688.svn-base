<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

function rkseo_print_section_info_monitor_404() {
   // rankology_print_pre_section('404'); ?>

<div class="rankology-notice">
    <p>
        <?php esc_html_e('404 URLS are bad for User experience, Performances, and Crawl budget allocated by Google', 'wp-rankology'); ?>
    </p>

    <p>
        <a href="<?php echo admin_url('edit.php?post_type=rankology_404&post_status=redirects'); ?>" class="btn btnPrimary">
            <?php esc_html_e('View your redirects', 'wp-rankology'); ?>
        </a>
        <a href="<?php echo admin_url('edit.php?post_type=rankology_404&action=-1&m=0&redirect-cat=0&redirection-type=404&redirection-enabled&filter_action=Filter&paged=1&action2=-1&post_status=404'); ?>" class="btn btnTertiary">
            <?php esc_html_e('View your 404 errors', 'wp-rankology'); ?>
        </a>
    </p>
</div>

<?php
}
