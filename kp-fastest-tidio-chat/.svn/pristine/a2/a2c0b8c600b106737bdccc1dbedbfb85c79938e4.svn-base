<?php


// If this file is called directly, abort.
if (! defined('WPINC')) {
    die;
}


// Rearrange Settings Links
function kpftc_rearrange_settings_links($links) {
	
	$settings = array('settings' => '<a href="options-general.php?page=kpftc">Settings</a>');
	$site_link = array('support' => '<a href="https://www.kreativopro.com/plans/" style="color:#93003c;font-weight:bold;" target="_blank">Get WordPress Support</a>');
		
    	$links = array_merge($settings, $links);
		$links = array_merge($site_link, $links);
	
	return $links;
}
add_filter('plugin_action_links_' . KPFTC_PLUGIN_BASENAME, 'kpftc_rearrange_settings_links');


// Add Promotion Link in Plugin Row Meta
function kpftc_plugin_row_meta( $links_array, $plugin_file_name, $plugin_data, $status )
{
    if ( strpos( $plugin_file_name, KPFTC_FILE_BASENAME ) )
	{
        $links_array[] = '<a href="https://www.kreativopro.com/plans/" target="_blank" style="color:#93003c;font-weight:bold;">WordPress Speed Optimization Service</a>';
    }
    return $links_array;
}
add_filter( 'plugin_row_meta', 'kpftc_plugin_row_meta', 10, 4 );


// Change WordPress Admin Branding on KPFTC Plugin Page
function kpftc_change_admin_footer ( $hooks )
{
	if( 'settings_page_kpftc' == KPFTC_PLUGIN_SLUG )
		echo '<b><a href="https://www.kreativopro.com/plans/" target="_blank" style="color:#d30c5c;text-decoration:none">WordPress Speed Optimization Service &#8594;</a></b>';
	else
		echo $hooks;
}
add_filter('admin_footer_text', 'kpftc_change_admin_footer');