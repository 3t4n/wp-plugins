<?php
/*
Plugin Name: CopyProof Website
Plugin URI: https://store.devilhunter.net/wordpress-plugin/copyproof/
Description: Only Plugin activation is enough! No need to use any short-code or to edit settings.
Version: 2.0
Author: Tawhidur Rahman Dear
Author URI: https://www.tawhidurrahmandear.com
Requires at least: 5.5
Requires PHP: 7.4
License: GPLv2 or later
Text Domain: copyproof-website
 */


// Prevent direct file access
if ( ! defined ( 'ABSPATH' ) ) {
	exit;
}

// Add custom links to the plugin's action links
function copyproofwebsite_by_tawhidurrahmandear_add_plugin_links($plugin_meta, $plugin_file) {
    if ($plugin_file === plugin_basename(__FILE__)) {
        $new_links = array(
            '<a href="https://store.devilhunter.net/wordpress-plugin/copyproof" target="_blank">Introduction to Plugin with Documentation</a>',
			'<a href="https://codecanyon.net/item/copyproof-wordpress-website-only-plugin-activation-is-enough-to-make-whole-website-copyproof/19727111" target="_blank">Buy Pro Version</a>',
			'<a href="https://preview.codecanyon.net/item/copyproof-wordpress-website-only-plugin-activation-is-enough-to-make-whole-website-copyproof/full_screen_preview/19727111" target="_blank">Live Preview of Pro Version</a>',
            '<a href="https://wordpress.org/plugins/copyproof-website#reviews" target="_blank">Rate and Review at WordPress.org</a>',
            '<a href="https://itsolution.devilhunter.net" target="_blank">Hire for WordPress Web Development</a>',
        );

        // Add the new links to the existing array of links
        $plugin_meta = array_merge($plugin_meta, $new_links);
    }
    return $plugin_meta;
}
add_filter('plugin_row_meta', 'copyproofwebsite_by_tawhidurrahmandear_add_plugin_links', 10, 2);

function copyproofwebsite_by_tawhidurrahmandear_add_script_to_head() {
    ?>
<script type="text/javascript">
function disableSelection(e){if(typeof e.onselectstart!="undefined")e.onselectstart=function(){return false};else if(typeof e.style.MozUserSelect!="undefined")e.style.MozUserSelect="none";else e.onmousedown=function(){return false};e.style.cursor="default"}window.onload=function(){disableSelection(document.body)}
</script>
    <?php
}
add_action('wp_head', 'copyproofwebsite_by_tawhidurrahmandear_add_script_to_head');