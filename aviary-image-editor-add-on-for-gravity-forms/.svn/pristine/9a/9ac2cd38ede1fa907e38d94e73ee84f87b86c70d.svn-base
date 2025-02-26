<?php
/*
Plugin Name: Adobe Creative SDK / Aviary Editor Addon For Gravity Forms
Plugin URI: http://netherworks.com/gform-aviary-addon
Description: A free plugin that integrates the awesome Adobe Creative SDK (formerly Aviary) Photo / Image Editor with the Gravity Forms Plugin. 
Version: 3.0 (Beta r7)
Author: Leon Kiley - NetherWorks, LLC
Author URI: http://leon-kiley.com
*/
/*
* Copyright (C) 2011-2017 Leon Kiley
* http://leon-kiley.com
* lk@leon-kiley.com

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
*/
/* Disallow direct access to the plugin file */
// Add a custom field button to the advanced to the field editor

// Add a custom field button to the advanced to the field editor

if (!class_exists('GFAviaryEditor')) {
    class GFAviaryEditor {
        public function __construct() {
            include 'includes/gform_aviary_field.php';
            new GFAviaryField();
            add_filter("gform_addon_navigation", array(&$this,"add_menu_item")); 
            }
        function add_menu_item($menu_items){
            //Ken Myers 01/06/2017 modified the callback to call aviary_options_page
            $menu_items[] = array("name" => "gf_aviary_options", "label" => "Aviary Options", "callback" => array(&$this, "aviary_options_page"), "permission" => "edit_posts");
            //$menu_items[] = array( 'name' => 'gf_aviary_options', 'label' => __( 'Aviary Options' ), 'callback' => 'aviary_options_page' );
            return $menu_items;
            } 
        function aviary_options_page(){
            //Ken Myers 01/06/2017 modified the path to the included options.php file
            include ($_SERVER['DOCUMENT_ROOT']."/wp-content/plugins/aviary-image-editor-add-on-for-gravity-forms/includes/options.php");
            }
        } 
    }
add_action('init', 'gf_aviary_editor');
function gf_aviary_editor(){
    new GFAviaryEditor();
}
?>