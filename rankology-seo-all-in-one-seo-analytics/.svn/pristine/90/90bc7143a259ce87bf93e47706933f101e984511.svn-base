<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

function rkseo_print_section_info_google_analytics_ecommerce()
{
?>
<hr>
<h3 id="rankology-analytics-ecommerce">
    <?php esc_html_e('Woocommerce', 'wp-rankology'); ?>
</h3>
<p><?php esc_html_e('Track your Woocommerce metrics with Google Analytics Enhanced Ecommerce.', 'wp-rankology'); ?>
</p>

<?php if (! is_plugin_active('woocommerce/woocommerce.php')) { ?>
<div class="rankology-notice is-warning">
    <p>
        <?php esc_html_e('You need to enable <strong>WooCommerce Plugin</strong> to apply these settings.', 'wp-rankology'); ?>
    </p>
</div>
<?php
    }
}
