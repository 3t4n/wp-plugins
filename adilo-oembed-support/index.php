<?php
/**
 * Plugin Name: Adilo Oembed Support
 * Description: Adilo Embed wordpress plugin to support oembed url in wordpress.
 * Version: 1.0.0
 * Author: Adilo
 * Author URI: https://adilo.bigcommand.com
 */

wp_oembed_add_provider(
    'https://adilo.bigcommand.com/watch/*',
    'https://adilo.bigcommand.com/web/oembed',
    false
);

?>
