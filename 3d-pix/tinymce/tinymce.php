<?php

/**
 * @title TinyMCE V3 Button Integration (for Wp2.5+)
 * @author Alex Rabe
 */

class add_tdPix_button {
	
	var $pluginname = "tdPix";
	
	function add_tdPix_button()  {
		// Modify the version when tinyMCE plugins are changed.
		add_filter('tiny_mce_version', array (&$this, 'td_change_tinymce_version') );
		
		// init process for button control
		add_action('init', array (&$this, 'td_addbuttons') );
	}

	function td_addbuttons() {
	
		// Don't bother doing this stuff if the current user lacks permissions
		if ( !current_user_can('edit_posts') && !current_user_can('edit_pages') ) return;
		
		// Add only in Rich Editor mode
		if ( get_user_option('rich_editing') == 'true') {
		 
		// add the button for wp2.5 in a new way
			add_filter("mce_external_plugins", array (&$this, "td_add_tinymce_plugin" ), 5);
			add_filter('mce_buttons', array (&$this, 'td_register_button' ), 5);
		}
	}
	
	// used to insert button in wordpress 2.5x editor
	function td_register_button($buttons) {
	
		array_push($buttons, "separator", $this->pluginname );
	
		return $buttons;
	}
	
	// Load the TinyMCE plugin : editor_plugin.js (wp2.5)
	function td_add_tinymce_plugin($plugin_array) {    
	
		$plugin_array[$this->pluginname] =  tdPix_URLPATH.'tinymce/editor_plugin.js';
		
		return $plugin_array;
	}
	
	function td_change_tinymce_version($version) {
		return ++$version;
	}
	
}

// Call it now
$tinymce_button = new add_tdPix_button ();

?>