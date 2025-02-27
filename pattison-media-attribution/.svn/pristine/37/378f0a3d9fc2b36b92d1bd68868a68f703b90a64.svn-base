<?php
/*
Plugin Name: Validate Audio Attribution
Description: Enables conversion tracking for campaigns using Validate audio attribution
Version:     1.3
Author:      Pattison Media Ltd
Author URI:  https://validate.audio/
License:     GPLv2 or later

Copyright 2023 Pattison Media

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

function validate_add_tag() {
        wp_register_script('validate_add_tag', 'https://tag.validate.audio/validate.js', array(), false, false);
        wp_enqueue_script('validate_add_tag');
}
  
add_action( 'wp_enqueue_scripts', 'validate_add_tag' );

function make_script_async( $tag, $handle, $src )
{
    if ( 'validate_add_tag' != $handle ) {
        return $tag;
    }

    return str_replace( '<script', '<script async', $tag );
}
add_filter( 'script_loader_tag', 'make_script_async', 10, 3 );
?>
