<?php

if ( ! defined( 'GRPDOCS_COMPARISON_PLUGIN_URL' ) )  define( 'GRPDOCS_COMPARISON_PLUGIN_URL', WP_PLUGIN_URL . '/groupdocs-comparison');

function grpdocs_comparison_mce_addbuttons() {
   // Don't bother doing this stuff if the current user lacks permissions
   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
     return;

   // Add only in Rich Editor mode
   if ( get_user_option('rich_editing') == 'true') {
     add_filter("mce_external_plugins", "grpdocs_comparison_add_tinymce_plugin");
     add_filter('mce_buttons', 'grpdocs_comparison_register_mce_button');
   }
}

function grpdocs_comparison_register_mce_button($buttons) {
   array_push($buttons, "separator", "grpdocs_comparison");
   return $buttons;
}

function grpdocs_comparison_add_tinymce_plugin($plugin_array) {
	// Load the TinyMCE plugin
   $plugin_array['grpdocs_comparison'] = GRPDOCS_COMPARISON_PLUGIN_URL.'/js/grpdocs_comparison_plugin.js';
   return $plugin_array;
}

function grpdocs_comparison_admin_print_scripts($arg) {
	global $pagenow;
	if (is_admin() && ( $pagenow == 'post-new.php' || $pagenow == 'post.php' ) ) {
		$js = GRPDOCS_COMPARISON_PLUGIN_URL.'/js/grpdocs-quicktags.js';
		wp_enqueue_script("grpdocs_comparison_qts", $js, array('quicktags') );
	}
}

// footer credit
function grpdocs_comparison_admin_footer() {
	$pdata = get_plugin_data(__FILE__);
	printf('%1$s plugin | Version %2$s<br />', $pdata['Title'], $pdata['Version']);
}
