<?php
/**
 * Plugin Name: Auto Delete Trash
 * Plugin URI: https://neonbrand.com/plugins/auto-trash-delete/
 * Description: This plugin sets the time to automatically delete your trash posts.
 * Version: 1.0.1
 * Author: NeONBRAND
 * Author URI: https://neonbrand.com
 * License: GPL2
 * 
 * 
 * Auto Trash Delete is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 * 
 * Auto Trash Delete is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with Auto Trash Delete. If not, see http://www.gnu.org/licenses/gpl-3.0.en.html.
 */

class AutoTrashSettings
{
    /**
     * Holds the values to be used in the fields callbacks
     */
    private $options;

    /**
     * Start up
     */
    public function __construct()
    {
    	add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
    	add_action( 'admin_init', array( $this, 'page_init' ) );
    }

    /**
     * Add options page
     */
    public function add_plugin_page()
    {
        // This page will be under "Settings"
    	add_options_page(
    		'Settings Admin', 
    		'Auto Trash Settings', 
    		'manage_options', 
    		'auto-trash_setting', 
    		array( $this, 'create_admin_page' )
    		);
    }

    /**
     * Options page callback
     */
    public function create_admin_page()
    {
        // Set class property
    	$this->options = get_option( 'auto-trash_name' );
    	?>
    	<div class="wrap">
    		<h2>Auto Trash Settings</h2>           
    		<form method="post" action="options.php">
    			<?php
                // This prints out all hidden setting fields
    			settings_fields( 'auto-trash_group' );   
    			do_settings_sections( 'auto-trash_setting' );
    			submit_button(); 
    			?>
    		</form>
    	</div>
    	<?php
    }

    /**
     * Register and add settings
     */
    public function page_init()
    {        
    	register_setting(
            'auto-trash_group', // Option group
            'auto-trash_name', // Option name
            array( $this, 'sanitize' ) // Sanitize
            );

    	add_settings_section(
            'setting_section_id', // ID
            '', // Title
            array( $this, 'print_section_info' ), // Callback
            'auto-trash_setting' // Page
            );  

    	add_settings_field(
            'auto_trash_days', // ID
            'Days to Keep Trash:', // Title 
            array( $this, 'auto_trash_days_callback' ), // Callback
            'auto-trash_setting', // Page
            'setting_section_id' // Section           
            );      

    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize( $input )
    {
    	$new_input = array();
    	if( isset( $input['auto_trash_days'] ) )
    		$new_input['auto_trash_days'] = absint( $input['auto_trash_days'] );

    	return $new_input;
    }

    /** 
     * Print the Section text
     */
    public function print_section_info()
    {
    	print 'Note: If this is set to 0, the trash functionality will be disabled and the "Delete Permanently" button will appear instead of "Trash" button. If you click "Delete Permanently" button, the item will immediately deleted without any alert message.<br><br>
    	    Maximum number of days to keep trash is 30.';
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function auto_trash_days_callback()
    {
    	printf(
    		'<input type="number" id="auto_trash_days" name="auto-trash_name[auto_trash_days]" value="%s" max="30" />',
    		isset( $this->options['auto_trash_days'] ) ? esc_attr( $this->options['auto_trash_days']) : '30'
    		);
    }

}

if( is_admin() )
	$at_settings_page = new AutoTrashSettings();

function define_trash_days() {
	$days = get_option('auto-trash_name');
	$days = $days['auto_trash_days'];
	define( 'EMPTY_TRASH_DAYS', $days );
}

add_action('plugins_loaded', 'define_trash_days');