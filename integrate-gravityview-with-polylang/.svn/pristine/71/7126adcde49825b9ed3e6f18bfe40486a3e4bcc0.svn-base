<?php
/**
 * @package Integrate_GravityView_With_Polylang
 * @version 0.2
 */
/*
Plugin Name: Integrate GravityView Labels With Polylang
Plugin URI: https://kamilwezyk.pl/
Description: This is extreamly simple plugin to enable translations of GravityView Labels.
Author: Kamil Wężyk
Version: 0.2
Author URI: https://kamilwezyk.pl/
Text Domain: integrate-gravityview-with-polylang
*/

add_filter( 'gravityview/template/field/label', 'gravityview_plus_polylang_function', 10, 1 );
add_filter( 'gravityview/template/field_label', 'gravityview_plus_polylang_function', 10, 1 );
add_filter( 'gravityview/field/value', 'gravityview_plus_polylang_function', 10, 1 );
function gravityview_plus_polylang_function( $label )
{
    return pll__($label);
}