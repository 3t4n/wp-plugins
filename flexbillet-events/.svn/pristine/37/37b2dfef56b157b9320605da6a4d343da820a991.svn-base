<?php 
defined( 'ABSPATH' ) or die( 'I cannot do anything when called directly good sir' );

require_once FLEXBILLET_EVENTS_PLUGIN_DIR . '/includes/admin/admin_pages.php';
require_once FLEXBILLET_EVENTS_PLUGIN_DIR . '/includes/api/flexlib.php';
require_once FLEXBILLET_EVENTS_PLUGIN_DIR . '/includes/api/api_eventlist.php';
require_once FLEXBILLET_EVENTS_PLUGIN_DIR . '/includes/objects/object_eventlist.php';
require_once FLEXBILLET_EVENTS_PLUGIN_DIR . '/includes/objects/object_eventlistdetails.php';
require_once FLEXBILLET_EVENTS_PLUGIN_DIR . '/includes/objects/object_participantdesignation.php';
require_once FLEXBILLET_EVENTS_PLUGIN_DIR . '/includes/objects/object_urihandler.php';
require_once FLEXBILLET_EVENTS_PLUGIN_DIR . '/includes/saxy_1_0/xml_saxy_lite_parser.php';

/* Load scripts and files */
function flexbillet_events_load_style_scripts() {
	/* Flexbillet stylesheet */
    wp_enqueue_style( 'flexstyle', FLEXBILLET_EVENTS_PLUGIN_URL . '/css/flex.css', false, '1.0.0', 'all' );

    /* Bootstrap 4.1 stylesheet */
	wp_enqueue_style('flexbillet_bootstrap',  FLEXBILLET_EVENTS_PLUGIN_URL . '/css/bootstrap.min.css');

	/* Bootstrap js */
    if ( ! wp_script_is( 'jquery', 'enqueued' )) {
         wp_enqueue_script( 'jquery' );
    }
	wp_enqueue_script('flexbillet_events_bootstrapjs', FLEXBILLET_EVENTS_PLUGIN_URL . '/js/bootstrap.min.js');
	wp_enqueue_script('flexbillet_events_bootstrap', FLEXBILLET_EVENTS_PLUGIN_URL . '/js/popper.min.js');	

    /* Font Awesome */
	wp_enqueue_style('flexbillet_events_fontawesome', FLEXBILLET_EVENTS_PLUGIN_URL . '/css/fontawesome.min.css');	

	if ( is_admin() ) {	

		/* Copy shortcode script */
	    wp_enqueue_script( 'flexbillet_events_clipboard_js', FLEXBILLET_EVENTS_PLUGIN_URL . '/js/clipboard.min.js' );

	    /* Multiselect script */
	    wp_enqueue_style( 'flexbillet_events_multi_select_css', FLEXBILLET_EVENTS_PLUGIN_URL . '/css/multi-select.css' );
	    wp_enqueue_script( 'flexbillet_events_multi_select_js', FLEXBILLET_EVENTS_PLUGIN_URL . '/js/jquery.multi-select.js' );

	}

}

/* color picker init*/	
function flexbillet_events_enqueue_color_picker( $hook_suffix ) {
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'flexbillet-events-color-picker', plugins_url('js/flexbillet-admin.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
}

/* Create top level menu */
function flexbillet_events_admin_menu_pages() {
    // add top level menu page
    add_menu_page(
        '',
        'Flexbillet Events',
        'manage_options',
        'flexbillet_events',
        'flexbillet_events_options_page_html',
        'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBzdGFuZGFsb25lPSJubyI/Pgo8IURPQ1RZUEUgc3ZnIFBVQkxJQyAiLS8vVzNDLy9EVEQgU1ZHIDIwMDEwOTA0Ly9FTiIKICJodHRwOi8vd3d3LnczLm9yZy9UUi8yMDAxL1JFQy1TVkctMjAwMTA5MDQvRFREL3N2ZzEwLmR0ZCI+CjxzdmcgdmVyc2lvbj0iMS4wIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciCiB3aWR0aD0iNTAuMDAwMDAwcHQiIGhlaWdodD0iNTAuMDAwMDAwcHQiIHZpZXdCb3g9IjAgMCA1MC4wMDAwMDAgNTAuMDAwMDAwIgogcHJlc2VydmVBc3BlY3RSYXRpbz0ieE1pZFlNaWQgbWVldCI+CjxtZXRhZGF0YT4KQ3JlYXRlZCBieSBwb3RyYWNlIDEuMTYsIHdyaXR0ZW4gYnkgUGV0ZXIgU2VsaW5nZXIgMjAwMS0yMDE5CjwvbWV0YWRhdGE+CjxnIHRyYW5zZm9ybT0idHJhbnNsYXRlKDAuMDAwMDAwLDUwLjAwMDAwMCkgc2NhbGUoMC4xMDAwMDAsLTAuMTAwMDAwKSIKZmlsbD0iIzAwMDAwMCIgc3Ryb2tlPSJub25lIj4KPHBhdGggZD0iTTI3NSA0NzAgYy0yNSAtMjYgLTI2IC0zMSAtMTQgLTQ3IDEzIC0xNyAxMyAtMTcgLTQgLTQgLTE3IDEzIC0yOCA0Ci0xMzggLTEwNSAtMTI3IC0xMjcgLTE0MCAtMTUyIC05OSAtMTg5IDE2IC0xNSAyNSAtMTYgNDQgLTcgMzcgMTcgNjEgLTUgNTIKLTQ4IC04IC00MSAxNSAtNzAgNTMgLTcwIDIwIDAgNTQgMjggMTQ1IDExOSAxMDkgMTEwIDExOCAxMjEgMTA1IDEzOCAtMTMgMTcKLTEzIDE3IDQgNCAxNiAtMTIgMjEgLTExIDQ3IDE0IDU2IDUzIDMzIDExMCAtNDQgMTEwIGwtNDEgMCAwIDQxIGMwIDc3IC01NwoxMDAgLTExMCA0NHoiLz4KPC9nPgo8L3N2Zz4K',
50

    );
    add_submenu_page(
        'flexbillet_events',
        '',
        'Opsætning',
        'manage_options',
        'flexbillet_events',
        'flexbillet_events_options_page_html'
    );    

    add_submenu_page(
        'flexbillet_events',
        '',
        'Shortcode tilpasning',
        'manage_options',
        'flexbillet-events-shortcodes',
        'flexbillet_events_shortcode_page_html'
    );    
}

/* Register option fields for setup page */
function flexbillet_events_settings_init() {
    // register a new setting for "flexbillet" page

    register_setting( 'flexbillet_events', 'flexbillet_events_options', 'flexbillet_events_sanitize' );
    
     // Register API section 
     add_settings_section( 'flexbillet_events_section_api', __( '', '' ), 'flexbillet_events_section_api_cb', 'flexbillet_events' );

     // Register shorcode section
     add_settings_section( 'flexbillet_events_section_shortcode', __( '', '' ), 'flexbillet_events_section_shortcode_cb', 'flexbillet_events_shortcodes');     

     //Register Organizer Key field
     add_settings_field( 'flexbillet_events_field_organizerkey', __( 'Organizer Key', 'flexbillet_events' ), 'flexbillet_events_field_input_cb', 'flexbillet_events', 'flexbillet_events_section_api',
         [
         'label_for' => 'flexbillet_events_field_organizerkey',
         'class' => 'flexbillet_row',
         'flexbillet_custom_data' => 'custom',
         'flexbillet_description' => 'Organizer key kan du finde i dit Flexbillet admin panel',
         ]
     );

    //Register Organizer passphrase
    add_settings_field(
        'flexbillet_events_field_passphrase', __( 'Pass phrase', 'flexbillet_events' ), 'flexbillet_events_field_input_cb', 'flexbillet_events', 'flexbillet_events_section_api',
        [
        'label_for' => 'flexbillet_events_field_passphrase',
        'class' => 'flexbillet_row',
        'flexbillet_custom_data' => 'custom',
        'flexbillet_description' => 'Passphrase kan du finde i dit Flexbillet admin panel',
        ]
    );

}
 

/* Queue styles and scripts */
add_action('init', 'flexbillet_events_load_style_scripts');

/* Register the shortcode */
add_shortcode( 'flexbillet-events', 'flexbillet_events_list_events' );

 /* register our flexbillet_options_page to the admin_menu action hook */
add_action( 'admin_menu', 'flexbillet_events_admin_menu_pages' );

/* register our flexbillet_settings_init to the admin_init action hook */
add_action( 'admin_init', 'flexbillet_events_settings_init' );

add_action( 'admin_enqueue_scripts', 'flexbillet_events_enqueue_color_picker' );

?>