<?php
/**
Plugin Name: Document Gallery for Real Media Library
Description: Create a gallery of documents from a folder in your media library created with Real Media Library.
Author: devowl.io GmbH
Version: 1.0.0
Author URI: https://devowl.io/
Licence: GPLv2
*/

// exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit;


// check if class already exists
if( !class_exists('dg_real_media_library') ) :

class dg_real_media_library {

    /**
     * C'tor
     */
	function __construct() {
	    add_action('init',                              array($this, 'init'));
	}
	
	public function init() {
        if ( !defined('RML_VERSION') || version_compare(RML_VERSION, "3.0", "<")) {
            if ( is_admin() ) {
                add_action( 'admin_notices', array( $this, 'admin_notices' ), 10 );
            }
        }else if ( !defined('DG_VERSION') || version_compare(DG_VERSION, "4.3.2", "<=") ) {
            if ( is_admin() ) {
                add_action( 'admin_notices', array( $this, 'admin_notices_dg' ), 10 );
            }
        }else{
    	    // Actions and filters
    		add_action("dg_query", array($this, "dg_query"), 10, 4);
        }
	}
	
	public function admin_notices() {
?>
<div class="notice notice-error is-dismissible">
    <p>The plugin <a href="https://codecanyon.net/item/wordpress-real-media-library-media-categories-folders/13155134" target="_blank"><b>Real Media Library</b></a> is not active (maybe not installed neither) or the version of Real Media Library is < 3.0 (please update).</p>
</div>
<?php
	}
	
	public function admin_notices_dg() {
?>
<div class="notice notice-error is-dismissible">
    <p>The plugin <a href="https://wordpress.org/plugins/document-gallery/" target="_blank"><b>Document Gallery</b></a> is not active (maybe not installed neither) or the version of Document Gallery is <= 4.3.2 (please update).</p>
</div>
<?php
	}
	
	public function dg_query(&$query, $taxa, &$excluded_keys, &$errs) {
		if (!empty($taxa["rml_folder"]) && function_exists("is_rml_folder")) {
			$excluded_keys[] = "rml_folder";
			$folder = wp_rml_get_object_by_id($taxa["rml_folder"]);
			
			// Check if folder exists
			if (!is_rml_folder($folder)) {
				$errs[] = sprintf( __( '%s is not a valid folder id.', 'document-gallery' ), "test" );
				return;
			}
			
			// Add rml_folder to query
			$query["rml_folder"] = $folder->getId();
			$query["suppress_filters"] = false; // Do not suppress RML filters for the custom argument
			if ($query["orderby"] === "menu_order") {
				// RML does not support the default menu_order, because menu_order
				// is only used when inserting a default gallery.
				$customOrder = $folder->getId() > 0 && $folder->getContentCustomOrder() == "1";
				$query["orderby"] = $customOrder ? "rml" : "date";
				$query["order"] = $customOrder ? "DESC" : $query["order"];
			}
		}
	}
}


// initialize
new dg_real_media_library();


// class_exists check 
endif;
	
?>