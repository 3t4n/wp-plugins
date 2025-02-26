<?php
/*
*     Plugin Name: Add Customizer Back For Block Themes
*
*     Plugin URI: https://fullworksplugins.com/
*     Description: Simply enable the customizer links when hidden for block themes
*     Version: 1.0
*     Requires at least: 5.9
*     Requires PHP: 5.6
*     Author: Alan
*     Author URI: https://badlywired.com/author/alan/
*/
add_action(
	'customize_register',
	function ( $manager ) {
	},
	10,
	1 );