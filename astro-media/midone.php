<?php
/**
* Plugin Name: Horoscopen (NL) – Astro Media 
* Plugin URI: https://midone.astromedia.nl
* Description: Horoscopen van Astro Media zijn Nederlandstalige horoscopen, geschreven voor iedereen met een brede interesse in astrologie. Start met verkopen van de daghoroscoop, maandhoroscoop, relatiehoroscoop en uitgebreide geboortehoroscoop en ontvang 25% commissie per verkoop!
* Version: 2.5.1
* Author: Astro Media B.V.
* Author URI: https://astro-media.nl
* License:           GPL v2 or later
* License URI:       https://www.gnu.org/licenses/gpl-2.0.html
**/

// if admin is logged in, only then load the pages
if( is_admin() ){
    include( plugin_dir_path( __FILE__ ) . 'functions.php' );
    include( plugin_dir_path( __FILE__ ) . 'manpage/front.php' ); 
}

define('ASTRO_MEDIA_URL', plugin_dir_url(__FILE__));

include( plugin_dir_path( __FILE__ ) . 'manpage/custom-ajax-handler.php' ); 
include( plugin_dir_path( __FILE__ ) . 'manpage/content.php' ); 
include( plugin_dir_path( __FILE__ ) . 'tarotapi.php' );

// horoscopes
include ( 'shortcodes/horoscopes/shortcodes_dayhoroscope.php' );
include ( 'shortcodes/horoscopes/shortcodes_extendedbirthhoroscope.php' );
include ( 'shortcodes/horoscopes/shortcodes_birthhoroscope.php' );
include ( 'shortcodes/horoscopes/shortcodes_monthhoroscope.php' );
include ( 'shortcodes/horoscopes/shortcodes_loverelationhoroscope.php' );
include ( 'shortcodes/horoscopes/shortcodes_yearhoroscope2024.php' );
include ( 'shortcodes/horoscopes/shortcodes_loveyearhoroscope2024.php' );
include ( 'shortcodes/horoscopes/shortcodes_chineseyearhoroscope2024.php' );
include ( 'shortcodes/horoscopes/shortcodes_chineserelationhoroscope.php' );
include ( 'shortcodes/horoscopes/shortcodes_lovetesthoroscope.php' );
include ( 'shortcodes/horoscopes/shortcodes_childparenthoroscope.php' );
include ( 'shortcodes/horoscopes/shortcodes_partnercomparisonhoroscope.php' );
include ( 'shortcodes/horoscopes/shortcodes_silentlovehoroscope.php' );
include ( 'shortcodes/horoscopes/shortcodes_childhoroscope.php' );
include ( 'shortcodes/horoscopes/shortcodes_extendedchildhoroscope.php' );
include ( 'shortcodes/horoscopes/shortcodes_starsignshoroscope.php' );
include ( 'shortcodes/horoscopes/shortcodes_kindersterrenbeeldenhoroscope.php' );
include ( 'shortcodes/horoscopes/shortcodes_ascedantenhoroscope.php' );
include ( 'shortcodes/horoscopes/shortcodes_chinesebelthoroscope.php' );
include ( 'shortcodes/horoscopes/shortcodes_yearhoroscopeextended2024.php' );

//tarot
include ( 'shortcodes/tarot/shortcodes_tarot_liefdesvraag.php' );
include ( 'shortcodes/tarot/shortcodes_tarot_deblindevlek.php' );
include ( 'shortcodes/tarot/shortcodes_tarot_relatielegging.php' );
include ( 'shortcodes/tarot/shortcodes_tarot_depoort.php' );
include ( 'shortcodes/tarot/shortcodes_tarot_deprobleemlegging.php' );
include ( 'shortcodes/tarot/shortcodes_tarot_dester.php' );
include ( 'shortcodes/tarot/shortcodes_tarot_hetgevoelsleven.php' );
include ( 'shortcodes/tarot/shortcodes_tarot_wegnaarjezelf.php' );
include ( 'shortcodes/tarot/shortcodes_tarot_inzichtevenwichtharmonie.php' );
include ( 'shortcodes/tarot/shortcodes_tarot_verledenhedentoekomst.php' );
include ( 'shortcodes/tarot/shortcodes_tarot_hetliefdesinzicht.php' );
include ( 'shortcodes/tarot/shortcodes_tarot_weekleggingliefde.php' );
include ( 'shortcodes/tarot/shortcodes_tarot_thecross.php' );
include ( 'shortcodes/tarot/shortcodes_tarot_deweeklegging.php' );
include ( 'shortcodes/tarot/shortcodes_tarot_dedagkaartliefde.php' );
include ( 'shortcodes/tarot/shortcodes_tarot_uitgebreidedaglegging.php' );
include ( 'shortcodes/tarot/shortcodes_tarot_deliefdeslegging.php' );
include ( 'shortcodes/tarot/shortcodes_tarot_dagkaartvoorspellingen.php' );
include ( 'shortcodes/tarot/shortcodes_tarot_jaarlegging.php' );
include ( 'shortcodes/tarot/shortcodes_tarot_maandlegging.php' );
include ( 'shortcodes/tarot/shortcodes_tarot_weeklegging.php' );

//lenormand
include ( 'shortcodes/lenormand/shortcodes_lenormand_relatielegging.php' );
include ( 'shortcodes/lenormand/shortcodes_lenormand_weeklegging.php' );
include ( 'shortcodes/lenormand/shortcodes_lenormand_maandlegging.php' );
include ( 'shortcodes/lenormand/shortcodes_lenormand_succeslegging.php' );

//zigeuner
include ( 'shortcodes/zigeuner/shortcodes_zigeuner_weeklegging.php' );


if (!session_id()) {
    session_start();
}

// include the widgets

// include css and jquery
function astromedia_horoscopes_nl_functionality_load_in_javascript_and_css_files() {
    wp_enqueue_script('jquery');

    $css_url = plugin_dir_url(__FILE__) . 'css/style.css';
    $js_url = plugin_dir_url(__FILE__) . 'js/underscore.js';
    $scripts_url = plugin_dir_url(__FILE__) . 'js/scripts.js';    
    $bootstrap_url = plugin_dir_url(__FILE__) . 'css/bootstrap.css';
    $fontawesome_url = plugin_dir_url(__FILE__) . 'css/fontawesome.css';
    
    wp_enqueue_style('my-plugin-style', $css_url, array(), '1.0.0', 'all');
    wp_enqueue_style('bootstrap-style', $bootstrap_url, array(), '5.3.0', 'all');
    wp_enqueue_style('fontawesome-style', $fontawesome_url, array(), '6.4.0', 'all');
    wp_enqueue_script('my-plugin-underscore', $js_url, array('jquery'), '1.0.0', true);
    wp_enqueue_script('my-plugin-scripts', $scripts_url, array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'astromedia_horoscopes_nl_functionality_load_in_javascript_and_css_files');

// include css and jquery for admin
function astromedia_horoscopes_nl_functionality_load_in_javascript_and_css_files_admin() {
    wp_enqueue_script('jquery');

    $css_url = plugin_dir_url(__FILE__) . 'css/style.css';
    $scripts_url = plugin_dir_url(__FILE__) . 'js/scripts.js';
    $bootstrap_url = plugin_dir_url(__FILE__) . 'css/bootstrap.css';
    $datatables_css_url = plugin_dir_url(__FILE__) . 'css/datatables.css';
    $datatables_js_url = plugin_dir_url(__FILE__) . 'js/datatables.js';

    wp_enqueue_style('my-plugin-style', $css_url, array(), '1.0.0', 'all');
    wp_enqueue_style('my-plugin-bootstrap', $bootstrap_url, array(), '5.3.0', 'all');
    wp_enqueue_style('my-plugin-datatables-css', $datatables_css_url, array(), '1.10.24', 'all');
    wp_enqueue_script('my-plugin-scripts', $scripts_url, array('jquery'), '1.0.0', true);
    wp_enqueue_script('my-plugin-datatables-js', $datatables_js_url, array('jquery'), '1.13.3', true);
}
add_action('admin_enqueue_scripts', 'astromedia_horoscopes_nl_functionality_load_in_javascript_and_css_files_admin');

// Enqueue and localize the script for the admin area
function astromedia_horoscopes_nl_enqueue_admin_scripts() {
    wp_enqueue_script('ajax-script', plugin_dir_url(__FILE__) . 'js/ajax-handler.js', array('jquery'));
    
    wp_localize_script('ajax-script', 'my_ajax_object', array(
        'ajax_url' => admin_url('admin-ajax.php')
    ));
}
add_action('admin_enqueue_scripts', 'astromedia_horoscopes_nl_enqueue_admin_scripts');


// add the menu page
function astromedia_horoscopes_nl_functionality_register_custom_menu_page_for_astromedia() {

    add_menu_page('Astro Media', 'Astro Media', 'add_users', 'custompage', '_custom_menu_page', plugin_dir_url(__FILE__) . 'images/logo.ico' , 25); 
    add_submenu_page('Astro Media', 'Astro Media', 'add_users', 'custompage', '_custom_menu_page', plugin_dir_url(__FILE__) . 'images/logo.ico' , 25); 
}
add_action('admin_menu', 'astromedia_horoscopes_nl_functionality_register_custom_menu_page_for_astromedia');

// create the ajax object which will be used in the shortcodes
function astromedia_horoscopes_nl_functionality_ajax_handler_for_astromedia_payments() {
    
    wp_enqueue_script( 'ajax-script', plugin_dir_url(__FILE__) . 'js/ajax-handler.js', array('jquery') );
    wp_localize_script( 'ajax-script', 'my_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}
add_action( 'wp_enqueue_scripts', 'astromedia_horoscopes_nl_functionality_ajax_handler_for_astromedia_payments' );

/*
function enqueue_admin_scripts() {
    wp_enqueue_script('ajax-script', plugin_dir_url(__FILE__) . 'path_to_your_script.js', array('jquery'), null, true);
    wp_localize_script('ajax-script', 'my_ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
}
add_action('admin_enqueue_scripts', 'enqueue_admin_scripts');
*/

// add the actions for the ajax calls
add_action( 'wp_ajax_get_countries_and_cities', 'astromedia_horoscopes_nl_functionality_get_countries_and_cities_for_astromedia' );
add_action( 'wp_ajax_nopriv_get_countries_and_cities', 'astromedia_horoscopes_nl_functionality_get_countries_and_cities_for_astromedia' );
add_action( 'wp_ajax_fetch_readings', 'astromedia_horoscopes_nl_functionality_fetch_readings_for_astromedia' );
add_action( 'wp_ajax_nopriv_fetch_readings', 'astromedia_horoscopes_nl_functionality_fetch_readings_for_astromedia' );
add_action( 'wp_ajax_fetch_results', 'astromedia_horoscopes_nl_functionality_fetch_results_for_astromedia' );
add_action( 'wp_ajax_nopriv_fetch_results', 'astromedia_horoscopes_nl_functionality_fetch_results_for_astromedia' );
add_action( 'wp_ajax_fetch_menu_content', 'astromedia_horoscopes_nl_functionality_fetch_menu_content_for_astromedia' );
add_action( 'wp_ajax_nopriv_fetch_menu_content', 'astromedia_horoscopes_nl_functionality_fetch_menu_content_for_astromedia' );
add_action( 'wp_ajax_fetch_customimages', 'astromedia_horoscopes_nl_functionality_fetch_customimages_for_astromedia' );
add_action( 'wp_ajax_nopriv_fetch_customimages', 'astromedia_horoscopes_nl_functionality_fetch_customimages_for_astromedia' );
add_action( 'wp_ajax_getcityid', 'astromedia_horoscopes_nl_functionality_getcityid_for_astromedia' );
add_action( 'wp_ajax_nopriv_getcityid', 'astromedia_horoscopes_nl_functionality_getcityid_for_astromedia' );


// function to get the countries and cities
function astromedia_horoscopes_nl_functionality_get_countries_and_cities_for_astromedia() {

  global $wpdb;
  $table_name = $wpdb->prefix . 'astrocities';
  $results = $wpdb->get_results("SELECT city_name, country_name FROM $table_name");

  echo json_encode($results);
  wp_die();
}

// add the actions for the ajax calls
add_action( 'wp_ajax_get_cities', 'astromedia_horoscopes_nl_functionality_get_cities_for_astromedia' );
add_action( 'wp_ajax_nopriv_get_cities', 'astromedia_horoscopes_nl_functionality_get_cities_for_astromedia' );
add_action( 'wp_ajax_logout_auto', 'astromedia_horoscopes_nl_functionality_logout_auto_for_astromedia' );
add_action( 'wp_ajax_update_custom_images', 'astromedia_horoscopes_nl_functionality_update_custom_images_year_horoscope_for_astromedia' );
add_action( 'wp_ajax_activate_customimages', 'astromedia_horoscopes_nl_functionality_activate_customimages_year_horoscope_for_astromedia' );
add_action( 'wp_ajax_nopriv_logout_auto', 'astromedia_horoscopes_nl_functionality_logout_auto_for_astromedia' );


// get the cities
function astromedia_horoscopes_nl_functionality_get_cities_for_astromedia(){

    $country = sanitize_text_field($_POST['data']);

    global $wpdb;
    $table_name = $wpdb->prefix . 'astrocities';
    $results = $wpdb->get_results("SELECT city_name FROM $table_name WHERE country_name = '$country'");

    echo json_encode($results);
    wp_die();
}

// logout the user
function astromedia_horoscopes_nl_functionality_logout_auto_for_astromedia(){

    global $wpdb;

    $table_name = $wpdb->prefix . 'astromedia';
    
    $wpdb->query("TRUNCATE TABLE $table_name");
    
    wp_die();
}

function astromedia_horoscopes_nl_functionality_activate_customimages_year_horoscope_for_astromedia(){

    global $wpdb;
    $table_name = $wpdb->prefix . 'customimages';

    $product_id = $_POST['product_id'];
    $token = $_POST['token'];
    $active = $_POST['active'];
    $version = $_POST['version'];

    // Check if the attribute already exists in the table
    $existing_row = $wpdb->get_row(
        $wpdb->prepare(
            "SELECT * FROM $table_name WHERE token = %s AND product_id = %s",
            $token,
            $product_id
        )
    );

    if ($existing_row) {
        // Update the existing row with the new URL
        $where_conditions = array(
            'token' => $token,
            'product_id' => $product_id,
        );  
       
        $updated = $wpdb->update(
            $table_name,
            array('active' => $active, 'vers' => $version),
            $where_conditions
        );
        if ($wpdb->last_error) {
            var_dump($wpdb->last_error);
        }
    } else {
        
        // Insert a new row with the attribute and URL
        $wpdb->insert(
            $table_name,
            array(
                'active' => $active,
                'token' => $token,
                'product_id' => $product_id,
                'vers' => $version               
            )
        );
        if ($wpdb->last_error) {
            var_dump($wpdb->last_error);
        }
        
    }

    wp_die();
}

function astromedia_horoscopes_nl_functionality_update_custom_images_year_horoscope_for_astromedia(){

    global $wpdb;
    $table_name = $wpdb->prefix . 'customimages';

    $attribute = $_POST['attribute'];
    $url = $_POST['url'];
    $product_id = $_POST['product_id'];
    $token = $_POST['token'];

    // Check if the attribute already exists in the table
    $existing_row = $wpdb->get_row(
        $wpdb->prepare(
            "SELECT * FROM $table_name WHERE token = %s AND product_id = %s",
            $token,
            $product_id
        )
    );

    if ($existing_row) {       

        $where_conditions = array(
            'id' => $existing_row->id,
            'token' => $token,
            'product_id' => $product_id,
        );  
       
        $updated = $wpdb->update(
            $table_name,
            array($attribute => $url),
            $where_conditions
        );
    
    } else {
      
        // Insert a new row with the attribute and URL
        $wpdb->insert(
            $table_name,
            array(
                'active' => $active,
                'token' => $token,
                'product_id' => $product_id,
                $attribute => $url
            )
        );
    }
    wp_die();
}

// deactivation hook
register_deactivation_hook( __FILE__, 'astromedia_horoscopes_nl_functionality__deactivation_for_astromedia' );

function astromedia_horoscopes_nl_functionality__deactivation_for_astromedia() {

    // Remove database tables
    global $wpdb;
    $table1_name = $wpdb->prefix . 'astromedia';
    $table2_name = $wpdb->prefix . 'astrocities';
    $table3_name = $wpdb->prefix . 'customimages';
    $wpdb->query( "DROP TABLE IF EXISTS $table1_name" );
    $wpdb->query( "DROP TABLE IF EXISTS $table2_name" );
    $wpdb->query( "DROP TABLE IF EXISTS $table3_name" );
}

function load_media_files() {
    wp_enqueue_media();
}
add_action( 'admin_enqueue_scripts', 'load_media_files' );

function get_product_details($product_id){

    $post_fields = array(
        'product_id' => $product_id,
    );

    $host = 'https://astromedia-business.nl/api/endpoint/v1/getproductdetails';
    
    $response = wp_remote_post($host, array(
        'headers' => array('Content-Type' => 'application/x-www-form-urlencoded'),
        'body' => $post_fields,
        'timeout' => 30,
        'sslverify' => false,
    ));
    
    if (is_wp_error($response)) {
        $error_message = $response->get_error_message();
    } else {
        $result = wp_remote_retrieve_body($response);
    }

    $product_details = json_decode($result, true);

    return $product_details;
}



