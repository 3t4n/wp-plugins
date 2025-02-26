<?php
/**
* Plugin Name: Flashlight
* Plugin URI: http://wp-lessons.com/flashlight
* Description: The plugin creates a night version of the site.
* Version: 1.0
* Author: Flaeron
* Author URI: http://wp-lessons.com/
*/

/*  Copyright 2015 Flaeron  (email : d.flaeron@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

add_action('wp_enqueue_scripts', 'add_nw_custom_styles');

function add_nw_custom_styles() {
    wp_enqueue_style ('css-style', plugins_url('css/custom.css', __FILE__));
}

add_action('wp_enqueue_scripts','add_nw_script');

function add_nw_script(){
    wp_register_script('add_nw_script',plugin_dir_url( __FILE__ ).'js/jquery.flashlight.js', array('jquery'),'1.1', true);
    wp_enqueue_script('add_nw_script');
}

add_action( 'widgets_init', 'my_widget_init' );
 
function my_widget_init() {
    register_widget( 'flashlight_widget' );
}
 
class flashlight_widget extends WP_Widget
{
 
    public function __construct()
    {
        $widget_details = array(
            'classname' => 'flashlight_widget',
            'description' => 'Toggle a flashlight on and off'
        );
 
        parent::__construct( 'flashlight_widget', 'Flashlight', $widget_details );
 
    }
 
    public function update( $new_instance, $old_instance ) {  
        return $new_instance;
    }
 
    public function widget( $args, $instance ) {
       	?>
			<div class="nw-toggle toggle-nw-daynight">
					<input type="checkbox" id="toggle-nw-daynight" class="toggle-nw-checkbox" name="1">
						<label class="toggle-nw-btn" for="toggle-nw-daynight">
							<span class="toggle-nw-feature"></span>
						</label>
				</div>
		<?
    }
}

function add_nw_flashlight() {
    echo '<div class="pre-nw-flashlight"></div>';
}

add_action('wp_footer', 'add_nw_flashlight');