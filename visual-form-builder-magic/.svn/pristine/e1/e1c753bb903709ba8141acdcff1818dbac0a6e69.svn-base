<?php
/*
Plugin Name: Visual Form Builder Magic
Plugin URI: http://james.revillini.com/visual-form-builder-magic/
Description: Adds a little magic to the Visual Form Builder (non-pro) plugin. Add class "send-to" to any email field to cause the form to be sent to that address as well.
Version: 1.0.4
Author: James Revillini
Author URI: http://james.revillini.com
License: GPL2

    Copyright 2013 James Revillini (email : james@revillini.com)
	
    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

class Visual_Form_Builder_Magic {
	 
	/*--------------------------------------------*
	 * Constructor
	 *--------------------------------------------*/
	
	/**
	 * Initializes the plugin by setting localization, filters, and administration functions.
	 */
	public function __construct() {
	    global $wpdb;
		
		// Setup global database table names
		$this->field_table_name 	= $wpdb->prefix . 'visual_form_builder_fields';
		
		// set up hooks
		add_action( 'init', array( &$this, 'email_setup' ), 9 );	// 9 because we want this to beat VFB's email setup hook
	} // end constructor
	
	/*--------------------------------------------*
	 * Core Functions
	 *---------------------------------------------*/
	


	/**
	 * Handle emailing the content
	 * 
	 * @since 1.0
	 * @uses wp_mail() E-mails a message
	 */
	public function email_setup() {
		add_filter( 'vfb_email_form_settings', array( &$this, 'vfb_filter_form_settings_mods' ), 10, 2 );
	}
	
	function vfb_filter_form_settings_mods( $form_settings, $form_id ){
		global $wpdb;
		
		$fields = $wpdb->get_results( $wpdb->prepare( "SELECT field_id FROM $this->field_table_name WHERE form_id = %d AND field_css LIKE %s", $form_id, '%send-to%' ) );
		if (is_array($fields)) foreach ($fields as $field) {
			if ( isset ($_POST[ "vfb-{$field->field_id}" ]) )
				$form_settings->form_to[] = $_POST[ "vfb-{$field->field_id}" ];
		}
		
		return $form_settings;
	}
  
	/*--------------------------------------------*
	 * Private Functions
	 *---------------------------------------------*/
 
  
  
} // end class
new Visual_Form_Builder_Magic ();