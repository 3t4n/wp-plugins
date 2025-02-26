<?php
/*
Plugin Name: Grey Owl Lightbox
Description: Universal lightbox for displaying various media and text information.
Version: 1.6.1
Author: Grey Owl
*/

if ( !defined('ABSPATH') )
    die();

define( 'GOLIGHTBOX', true );
define( 'GOL_VER', '1.6.1' );
define( 'GOL_MAIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'GOL_MAIN_DIR_URL', plugin_dir_url( __FILE__ ) );
define( 'GOL_PAGE_NAME', 'grey-owl-lightbox' );
define( 'GOL_BASENAME', plugin_basename( __FILE__ ) );
define( 'GOL_PAGE_OPTIONS', get_site_url() . '/wp-admin/tools.php?page=grey-owl-lightbox' );

require_once GOL_MAIN_DIR . 'core/fields-list.php';
require_once GOL_MAIN_DIR . 'functions/gol-object.php';
require_once GOL_MAIN_DIR . 'functions/functions.php';
require_once GOL_MAIN_DIR . 'core/field-type.php';
require_once GOL_MAIN_DIR . 'functions/actions.php';
require_once GOL_MAIN_DIR . 'functions/setup.php';
require_once GOL_MAIN_DIR . 'functions/ajax.php';

add_action('admin_menu', 'grey_owl_add_management_page');
add_filter( 'plugin_action_links_'.GOL_BASENAME, 'grey_owl_lightbox_plugin_add_settings_link' );
