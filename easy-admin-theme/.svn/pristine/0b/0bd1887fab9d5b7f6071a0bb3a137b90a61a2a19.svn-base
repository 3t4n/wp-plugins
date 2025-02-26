<?php

/* ------------------------------------------------------------------
 * SWITCH THEME FOR LOGGED-IN ADMINS ONLY
 * --------------------------------------------------------------- */

add_filter('template', 'eat_switch_theme');
add_filter('option_template', 'eat_switch_theme');
add_filter('option_stylesheet', 'eat_switch_theme');

function eat_switch_theme($theme) {
	global $eat_options;
	
    if ( current_user_can('manage_options') AND isset($eat_options['eat_theme']) ) {
    	//echo strtolower($eat_options['eat_theme']);
        $theme = $eat_options['eat_theme'];
    }

    return $theme;
}

/* ------------------------------------------------------------------
 * CREATE SUBMENU LINK ON PLUGINS PAGE
 * --------------------------------------------------------------- */

function eat_plugin_action_links($links, $file) {
    static $this_plugin;
 
    if (!$this_plugin) {
        $this_plugin = plugin_basename(__FILE__);
    }
 
    // check to make sure we are on the correct plugin
    if ($file == $this_plugin) {
 
		// link to what ever you want
        $plugin_links[] = '<a href="' . get_bloginfo('wpurl') . '/wp-admin/options-general.php?page=eat-settings">'.__('Configuration','eat').'</a>';
 
        // add the links to the list of links already there
		foreach($plugin_links as $link) {
			array_unshift($links, $link);
		}
    }
 
    return $links;
}
add_filter('plugin_action_links', 'eat_plugin_action_links', 10, 2);

?>