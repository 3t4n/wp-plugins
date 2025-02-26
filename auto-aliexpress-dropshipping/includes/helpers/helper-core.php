<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly

/**
 * Return needed cap for admin pages
 *
 * @since 1.0.0
 * @return string
 */
function auto_aliexpress_get_admin_cap() {
	$cap = 'manage_options';

	if ( is_multisite() && is_network_admin() ) {
		$cap = 'manage_network';
	}

	return apply_filters( 'auto_aliexpress_admin_cap', $cap );
}

/**
 * Enqueue admin fonts
 *
 * @since 1.0.0
 * @since 1.5.1 implement $version
 *
 * @param $version
 */
function auto_aliexpress_admin_enqueue_fonts( $version ) {
	wp_enqueue_style(
		'auto_aliexpress-aliexpresso',
		'https://fonts.googleapis.com/css?family=Aliexpresso+Condensed:300,300i,400,400i,700,700i|Aliexpresso:300,300i,400,400i,500,500i,700,700i',
		array(),
		'1.0.0'
	); // cache as long as you can
	wp_enqueue_style(
		'auto_aliexpress-opensans',
		'https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,700i',
		array(),
		'1.0.0'
	); // cache as long as you can
	wp_enqueue_style(
		'auto_aliexpress-source',
		'https://fonts.googleapis.com/css?family=Source+Code+Pro',
		array(),
		'1.0.0'
	); // cache as long as you can

	// if plugin internal font need to enqueued, please use $version as its subject to cache
}

/**
 * Enqueue admin styles
 *
 * @since 1.0.0
 * @since 1.1 Remove auto_aliexpress-admin css after migrate to shared-ui
 *
 * @param $version
 */
function auto_aliexpress_admin_enqueue_styles( $version ) {
	wp_enqueue_style( 'magnific-popup', AUTO_ALIEXPRESS_URL . 'assets/css/magnific-popup.css', array(), $version, false );
    wp_enqueue_style( 'auto-aliexpress-select2-style', AUTO_ALIEXPRESS_URL . 'assets/css/select2.min.css', array(), $version, false );
    wp_enqueue_style( 'auto-aliexpress-main-style', AUTO_ALIEXPRESS_URL . 'assets/css/main.css', array(), $version, false );
}


/**
 * Load admin scripts
 *
 * @since 1.0.0
 */
function auto_aliexpress_admin_jquery_ui_init() {
	wp_enqueue_script( 'jquery-ui-core' );
	wp_enqueue_script( 'jquery-ui-widget' );
	wp_enqueue_script( 'jquery-ui-mouse' );
	wp_enqueue_script( 'jquery-ui-tabs' );
	wp_enqueue_script( 'jquery-ui-sortable' );
	wp_enqueue_script( 'jquery-ui-draggable' );
	wp_enqueue_script( 'jquery-ui-droppable' );
	wp_enqueue_script( 'jquery-ui-datepicker' );
	wp_enqueue_script( 'jquery-ui-resize' );
	wp_enqueue_style( 'wp-color-picker' );
}

/**
 * Enqueue admin scripts
 *
 * @since 1.0.0
 *
 * @param       $version
 * @param array $data
 * @param array $l10n
 */
function auto_aliexpress_admin_enqueue_scripts( $version, $data = array(), $l10n = array() ) {

    if ( function_exists( 'wp_enqueue_editor' ) ) {
        wp_enqueue_editor();
    }
    if ( function_exists( 'wp_enqueue_media' ) ) {
        wp_enqueue_media();
    }

	wp_enqueue_script( 'ionicons', 'https://unpkg.com/ionicons@5.0.0/dist/ionicons.js', array(), $version, false );

	wp_enqueue_script( 'jquery-magnific-popup', AUTO_ALIEXPRESS_URL . '/assets/js/library/jquery.magnific-popup.min.js', array( 'jquery' ), $version, false );

    wp_enqueue_script( 'auto-aliexpress-select2', AUTO_ALIEXPRESS_URL . '/assets/js/library/select2.min.js', array( 'jquery' ), $version, false );


    wp_register_script(
        'auto-aliexpress-admin',
        AUTO_ALIEXPRESS_URL . '/assets/js/main.js',
        array(
            'jquery'
        ),
        $version,
        true
    );
	wp_register_script(
		'auto-aliexpress-action',
		AUTO_ALIEXPRESS_URL . '/assets/js/action.js',
		array(
			'jquery'
		),
		$version,
		true
	);
    wp_register_script(
		'auto-aliexpress-list',
		AUTO_ALIEXPRESS_URL . '/assets/js/list.js',
		array(
			'jquery'
		),
		$version,
		true
	);
	wp_register_script(
		'auto-aliexpress-addon',
		AUTO_ALIEXPRESS_URL . '/assets/js/addon.js',
		array(
			'jquery'
		),
		$version,
		true
	);

    wp_enqueue_script( 'auto-aliexpress-admin' );
    wp_enqueue_script( 'auto-aliexpress-action' );
    wp_enqueue_script( 'auto-aliexpress-list' );
	wp_enqueue_script( 'auto-aliexpress-addon' );

    wp_localize_script( 'auto-aliexpress-action', 'Auto_Aliexpress_Data', $data );
}

/**
 * Enqueue admin welcome scripts
 *
 * @since 1.0.0
 *
 * @param       $version
 * @param array $data
 * @param array $l10n
 */
function auto_aliexpress_admin_enqueue_scripts_welcome( $version, $data = array(), $l10n = array() ) {
    wp_enqueue_script( 'ionicons', 'https://unpkg.com/ionicons@5.0.0/dist/ionicons.js', array(), $version, false );

    wp_register_script(
		'auto-aliexpress-welcome',
		AUTO_ALIEXPRESS_URL . '/assets/js/welcome.js',
        array( 'jquery', 'wp-util' ),
		$version,
		true
	);

    wp_register_script(
		'auto-aliexpress-snap',
		AUTO_ALIEXPRESS_URL . '/assets/js/library/snap.svg-min.js',
		array(),
		$version,
		true
	);

    wp_enqueue_script( 'auto-aliexpress-snap' );
    wp_enqueue_script( 'auto-aliexpress-welcome' );
    wp_localize_script( 'auto-aliexpress-welcome', 'Auto_Aliexpress_Data', $data );
}

/**
 * Return AJAX url
 *
 * @since 1.0.0
 * @return mixed
 */
function auto_aliexpress_ajax_url() {
    return admin_url( 'admin-ajax.php', is_ssl() ? 'https' : 'http' );
}

/**
 * Return post status
 *
 * @since 1.0.0
 * @return array
 */
function auto_aliexpress_get_post_status() {
    return apply_filters(
        'auto_aliexpress_post_status',
        array(
            'publish'     => esc_html__( 'Publish',Auto_Aliexpress::DOMAIN ),
            'draft'     => esc_html__( 'Draft',Auto_Aliexpress::DOMAIN ),
        )
    );
}

/**
 * Return Components
 *
 * @since 1.0.0
 * @return array
 */
function auto_aliexpress_get_components($source) {

    $components_dir = "campaigns/wizard/components/";

    $components = array();

    switch ( $source ) {
        case 'rss':
            $components = ['campaign-name', 'feed-links'];
            break;
        case 'facebook':
            $components = ['campaign-name', 'facebook-links'];
            break;
        case 'search':
            $components = ['campaign-name', 'feed-keywords'];
            break;
        default:
            $components = ['campaign-name', 'init-language', 'search-keywords'];
            break;
    }

    foreach($components as $key => $value){
        $components[$key] = $components_dir.$value;
    }

    return $components;
}

/**
 * Process Twitter Campaign Job
 * @param string
 * @since 1.0.0
 * @return array
 */
function auto_aliexpress_get_random($keywords) {
    $keywords_array = explode(', ', $keywords);
    $rand = array_rand($keywords_array);

    return $keywords_array[$rand];
}

/**
 * Process RSS Campaign Job
 *
 * @since 1.0.0
 * @return int
 */
function auto_aliexpress_calculate_next_time($update_frequency, $update_frequency_unit){
    $time_length = 0;

    switch ( $update_frequency_unit ) {
        case 'Minutes':
            $time_length = $update_frequency*60;
            break;
        case 'Hours':
            $time_length = $update_frequency*60*60;
            break;
        case 'Days':
            $time_length = $update_frequency*60*60*24;
            break;
        default:
            break;
    }

    return $time_length;
}

/**
 * Save remote image to wp upload directory
 */
function auto_aliexpress_upload_image($remote_url, $id){
    $image = wp_remote_get( $remote_url );
    $upload_dir = wp_upload_dir ();
    $filename = $id. '.png';

    if (wp_mkdir_p ( $upload_dir ['path'] )){
        $file = $upload_dir ['path'] . '/' . $filename;
    }else{
        $file = $upload_dir ['basedir'] . '/' . $filename;
    }

	// check if same image name already exists
	if (file_exists ( $file )) {
		$filename = time () . '_' . rand ( 0, 999 ) . '_' . $filename;
		if (wp_mkdir_p ( $upload_dir ['path'] ))
			$file = $upload_dir ['path'] . '/' . $filename;
		else
		    $file = $upload_dir ['basedir'] . '/' . $filename;
	}

	file_put_contents ( $file, $image['body'] );
	$file_link = $upload_dir ['url'] . '/' . $filename;
    $guid = $upload_dir ['url'] . '/' . basename ( $filename );

    return $file_link;
}

if (!function_exists('auto_aliexpress_error_log')) {
    function auto_aliexpress_error_log($message) {
        Auto_Aliexpress_Log::get_instance()->add($message, 'error');
        error_log($message);
    }
}

if (!function_exists('auto_aliexpress_print_throwable')) {
    function auto_aliexpress_print_throwable($throwable) {
        auto_aliexpress_error_log('PHP Error:  '.$throwable->getMessage().' in '.$throwable->getFile().':'.$throwable->getLine().PHP_EOL.'Stack trace:'.PHP_EOL.$throwable->getTraceAsString());
    }
}