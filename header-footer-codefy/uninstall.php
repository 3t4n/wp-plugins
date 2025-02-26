<?php
/**
@package   Header & Footer Codefy
@author    Gabriel Froes <gabriel.froes@gmail.com>
@license   GPL-2.0+
@link      https://www.rwstudio.com.br
@copyright 2018 RW Studio
*/

// If uninstall not called from WordPress, then exit
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

$option_name = 'rwstudio_hfc_options';
delete_option($option_name);