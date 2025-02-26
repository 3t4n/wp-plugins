<?php
defined( 'ABSPATH' ) or die();

require_once( 'WL_AGM_LITE_MENU.php' );
require_once( 'WL_AGM_LITE_INIT.php' );
require_once( 'inc/controllers/WL_AGM_LITE_Cpt.php' );
require_once( 'inc/controllers/WL_AGM_LITE_MetaBox_L.php' );
require_once( 'inc/controllers/WL_AGM_LITE_MetaBox_R.php' );
require_once( 'inc/controllers/WL_AGM_LITE_MetaBox_M.php' );
require_once( 'inc/controllers/WL_AGM_LITE_MetaBox_I.php' );
require_once( 'inc/controllers/WL_AGM_LITE_Setting.php' );
require_once( 'inc/controllers/WL_AGM_LITE_End_Css_Js.php' );

/* Action for creating advance google map menu pages */
add_action( 'admin_menu', array( 'WL_AGM_LITE_Menu', 'create_menu' ) );

/* Init functions */
add_action( 'admin_init', array( 'WL_AGM_LITE_INIT', 'wl_agm_lite_activation_redirect' ) );

/* Action for creating Advance Google Map CPT */
add_action( 'admin_init', array( 'WL_AGM_LITE_CPT', 'cpt_assets' ) );

/* Action for creating MetaBox for Location CPT */
add_action( 'admin_init', array( 'WL_AGM_LITE_METABOX_L', 'create_metabox' ) );

/* Action for creating MetaBox for Route CPT's */
add_action( 'admin_init', array( 'WL_AGM_LITE_METABOX_R', 'create_metabox' ) );

/* Action for creating MetaBox for Multi Map CPT's */
add_action( 'admin_init', array( 'WL_AGM_LITE_METABOX_M', 'create_metabox' ) );

/* Action for creating MetaBox for Interactive Map CPT's */
add_action( 'admin_init', array( 'WL_AGM_LITE_METABOX_I', 'create_metabox' ) );

/* Add settings link on plugin page */
add_filter( 'plugin_action_links_' . WL_AGM_LITE_PLUGIN_BASENAME, array( 'WL_AGM_LITE_INIT', 'wl_agm_lite_links' ) );

/* action call for Sub-conrinents in wl_agm_region_ajax.js */
add_action( 'wp_ajax_nopriv_wl_agm_lite_ajax_continent', array( 'WL_AGM_LITE_INIT', 'wl_agm_ajax_lite_region_action' ) );
add_action( 'wp_ajax_wl_agm_lite_ajax_continent', array( 'WL_AGM_LITE_INIT', 'wl_agm_ajax_lite_region_action' ) );

/* action call for Countries in wl_agm_region_ajax.js */
add_action( 'wp_ajax_nopriv_wl_agm_lite_ajax_country', array( 'WL_AGM_LITE_INIT', 'wl_agm_lite_ajax_country_action' ) );
add_action( 'wp_ajax_wl_agm_lite_ajax_country', array( 'WL_AGM_LITE_INIT', 'wl_agm_lite_ajax_country_action' ) );

/* On admin init */
add_action( 'wp_ajax_wl-agm-lite-settings', array( 'WL_AGM_LITE_Setting', 'register_settings' ) );

/* Enqueue CSS and Js files on Admin-End for Advance Google Map Cpt Only  */
add_action( "admin_print_styles-post-new.php", array( 'WL_AGM_LITE_ADMIN_END_CSS_JS', 'admin_end_css' ) );
add_action( "admin_print_styles-post.php", array( 'WL_AGM_LITE_ADMIN_END_CSS_JS', 'admin_end_css' ) );

add_action( 'admin_print_styles-edit.php', array( 'WL_AGM_LITE_ADMIN_END_CSS_JS', 'wl_agm_admin_styles_edit_php' ), 10, 1 );