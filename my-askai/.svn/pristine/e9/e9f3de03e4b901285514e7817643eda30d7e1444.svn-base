<?php
/**
 * Plugin Name: My AskAI
 * Plugin URI: http://myaskai.com/connect-askai-wordpress
 * Description: This plugin allows you to add your AskAI into your Wordpress site.
 * Version: 1.0.0
 * Author: My AskAI
 * Author URI: https://myaskai.com/
 * License: GPLv2 or later
 *
 * Copyright 2023 My AskAI
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2, as
 * published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

//-- shortcode
add_shortcode( 'myaskai', 'myaskai_shortcode_func' );

//-- shortcode function
function myaskai_shortcode_func( $atts ) {
	$atts = shortcode_atts( array(
		'id' => ''
	), $atts, 'myaskai' );

    if( empty( $atts['id'] ) ){
        return 'Please enter your MyAskAI id in this format: <strong>[</strong>myaskai id="XXXXXX"<strong>]</strong>';
    }

    return '
        <div class="askai-frame-embed" data-id="'. $atts['id'] .'"></div>
        <script defer type="text/javascript" src="https://myaskai.com/embed-js-min"></script>
    ';
}


//--------------------------------------------------------------------

//-- Block

function myaskai_block_script_register(){
    wp_enqueue_script( 'myaskai-block', plugin_dir_url(__FILE__) . 'assets/myaskai-block.js', ['wp-blocks', 'wp-i18n', 'wp-editor'], true, false );
    wp_enqueue_style( 'myaskai-block-css', plugin_dir_url(__FILE__) . 'assets/myaskai-block.css' );
}

add_action( 'enqueue_block_editor_assets', 'myaskai_block_script_register' );