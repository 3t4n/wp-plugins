<?php
/**
 * This file handles the video creation through the 42videobricks service.
 *
 * @package 42videobricks
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

require_once VIDEOBRICKS42_PLUGIN_DIR . 'vendor/autoload.php';

use Api42Vb\Client\Model\VideoMultipartUploadFinalize;
use Api42Vb\Client\Model\VideoMultipartUploadFinalizePartsInner;
use Api42Vb\Client\Model\VideoProperties;

/**
 * Verifies if the credentials are valid for using the API.
 *
 * @param string $api_key Api key.
 * @param string $env Environment.
 * @return bool Response if service is authenticated.
 */
function videobricks42_verify_request( $api_key = '', $env = '' ) {
	if ( ! is_user_logged_in() && ! current_user_can( 'manage_options' ) ) {
		return false;
	}
	if ( empty( $api_key ) || empty( $env ) ) {
		$options = get_option( 'videobricks42_plugin_options' );
		if ( empty( $options ) ) {
			return false;
		}
		$api_key = $options['api_key'];
		$env     = $options['env'];
	}
	$host   = videobricks42_get_host_by_env( $env );
	$config = Api42Vb\Client\Configuration::getDefaultConfiguration();
	$config->setApiKey( 'x-api-key', $api_key );
	$config->setHost( $host );

	$api_instance = new Api42Vb\Client\Api\VideosApi(
		new GuzzleHttp\Client(),
		$config
	);
	try {
		$api_instance->getVideos();
		$response = true;
	} catch ( \Api42Vb\Client\ApiException $e ) {
		$response = false;
	}
	return $response;
}

/**
 * Get the videos from the external service.
 *
 * @param null $limit The limit.
 * @param null $offset The offset.
 * @param null $search The string to search.
 * @return \Api42Vb\Client\Model\Video[]|array|null An array with the videos objects.
 */
function videobricks42_get_videos( $limit = null, $offset = null, $search = null ) {
	if ( ! is_user_logged_in() && ! current_user_can( 'manage_options' ) ) {
		exit;
	}
	$options = get_option( 'videobricks42_plugin_options' );
	if ( isset( $options['api_key'] ) && ! empty( $options['api_key'] ) && isset( $options['env'] ) ) {
		$api_key = $options['api_key'];
		$env     = $options['env'];
		$host    = videobricks42_get_host_by_env( $env );
		$config  = Api42Vb\Client\Configuration::getDefaultConfiguration();
		$config->setApiKey( 'x-api-key', $api_key );
		$config->setHost( $host );

		$api_instance = new Api42Vb\Client\Api\VideosApi(
			new GuzzleHttp\Client(),
			$config
		);
		try {
			$videos = $api_instance->getVideos( $limit, $offset, $search );
			return $videos->getData();
		} catch ( \Api42Vb\Client\ApiException $e ) {
			return array();
		}
	}
	return array();
}

/**
 * Generate shortcode for printing the iframe video
 *
 * @param array $atts attribute.
 * @return string|null the generated iframe.
 */
function videobricks42_shortcode( $atts ) {
	$variable  = null;
	$video_id  = $atts['id'];
	$variable .= '<iframe width="640" height="480" frameborder="0" style="border: 0" src="' . esc_url( 'https://stream.42videobricks.com/' ) . esc_attr( $video_id ) . '/player" allow="encrypted-media" allowfullscreen></iframe>';
	return $variable;
}
add_shortcode( 'videobricks42', 'videobricks42_shortcode' );

/**
 * For including the css.
 */
function videobricks42_include_css() {
	wp_register_style( 'videobricks42-style', plugins_url( '../assets/style.css', __FILE__ ) );
	wp_enqueue_style( 'videobricks42-style' );
}
add_action( 'admin_init', 'videobricks42_include_css' );
add_action( 'wp_ajax_videobricks42_video_creation', 'videobricks42_video_creation' );
add_action( 'wp_ajax_videobricks42_video_finalize', 'videobricks42_video_finalize' );

/**
 * Used for processing the ending request for video creation file.
 */
function videobricks42_video_creation() {
	if ( ! is_user_logged_in() && ! current_user_can( 'manage_options' ) ) {
		exit;
	}
	$check_nonce = check_ajax_referer( 'videobricks42_add_video', 'nonce' );
	if ( ! $check_nonce ) {
		exit;
	}
	$options = get_option( 'videobricks42_plugin_options' );
	if ( ! isset( $options['api_key'] ) || ! isset( $options['env'] ) ) {
		wp_send_json( 'Bad api key', 400 );
	}
	$api_key = $options['api_key'];
	$env     = $options['env'];
	$host    = videobricks42_get_host_by_env( $env );
	$config  = Api42Vb\Client\Configuration::getDefaultConfiguration();
	$config->setApiKey( 'x-api-key', $api_key );
	$config->setHost( $host );

	$api_instance = new Api42Vb\Client\Api\VideosApi(
		new GuzzleHttp\Client(),
		$config
	);
	try {
		if ( empty( $_POST['name'] ) || empty( $_POST['size'] ) ) {
			exit;
		}
		$video_name = sanitize_text_field( wp_unslash( $_POST['name'] ) );
		if ( ! is_string( $video_name ) ) {
			return false;
		}
		$types      = wp_check_filetype( $video_name );
		$myme_types = array(
			'video/x-msvideo',
			'video/msvideo',
			'video/avi',
			'application/x-troff-msvideo',
			'video/quicktime',
			'video/mp4',
			'video/mpeg',
			'video/mpg',
			'application/mxf',
			'video/MP2T',
		);
		if ( ! in_array( $types['type'], $myme_types, true ) ) {
			wp_send_json( 'File format not supported', 400 );
		}
		$size                 = sanitize_text_field( wp_unslash( $_POST['size'] ) );
		$data['title']        = stripslashes( $video_name );
		$data['public']       = true;
		$video_props          = new VideoProperties( $data );
		$video_response       = $api_instance->addVideo( $video_props );
		$id                   = $video_response->getId();
		$data                 = new \Api42Vb\Client\Model\VideoMultipartUploadInit(
			array(
				'name' => $video_name,
				'size' => $size,
			)
		);
		$multi_parts          = $api_instance->initMultipartUploadVideoById( $id, $data );
		$response['response'] = $multi_parts->jsonSerialize();
		$response['videoId']  = $id;
		wp_send_json( $response, 200 );
	} catch ( \Api42Vb\Client\ApiException $e ) {
		wp_send_json( $e->getMessage(), $e->getCode() );
	}
	return false;
}

/**
 * Used for processing the ending request for video creation file.
 */
function videobricks42_video_finalize() {
	if ( ! is_user_logged_in() && ! current_user_can( 'manage_options' ) ) {
		exit;
	}
	$check_nonce = check_ajax_referer( 'videobricks42_add_video', 'nonce' );
	if ( ! $check_nonce ) {
		exit;
	}

	$options = get_option( 'videobricks42_plugin_options' );
	if ( ! isset( $options['api_key'] ) || ! isset( $options['env'] ) ) {
		wp_send_json( 'Bad api key', 400 );
	}
	$api_key = $options['api_key'];
	$env     = $options['env'];
	$host    = videobricks42_get_host_by_env( $env );
	$config  = Api42Vb\Client\Configuration::getDefaultConfiguration();
	$config->setApiKey( 'x-api-key', $api_key );
	$config->setHost( $host );

	$api_instance = new Api42Vb\Client\Api\VideosApi(
		new GuzzleHttp\Client(),
		$config
	);
	try {
		if ( empty( $_POST['videoId'] ) || empty( $_POST['fileId'] ) || empty( $_POST['fileKey'] ) || empty( $_POST['parts'] ) ) {
			exit;
		}
		$file_id    = sanitize_text_field( wp_unslash( $_POST['fileId'] ) );
		$file_key   = sanitize_text_field( wp_unslash( $_POST['fileKey'] ) );
		$post_parts = map_deep( wp_unslash( $_POST['parts'] ), 'sanitize_text_field' );
		$video_id   = sanitize_text_field( wp_unslash( $_POST['videoId'] ) );
		foreach ( $post_parts as $delta => $part ) {
			// sanitize parts.
			$delta                 = sanitize_text_field( $delta );
			$sanitized_part_values = array_map( 'sanitize_text_field', array_values( $part ) );
			$sanitized_part_keys   = array_map( 'sanitize_text_field', array_keys( $part ) );
			$sanitized_part        = array_combine( $sanitized_part_keys, $sanitized_part_values );
			$part_object           = new VideoMultipartUploadFinalizePartsInner();
			$part_object->setPartNumber( (int) $sanitized_part['PartNumber'] );
			$part_object->setETag( $sanitized_part['ETag'] );
			$final_parts[ $delta ] = $part_object;
		}
		if ( ! empty( $final_parts ) ) {
			$model = new VideoMultipartUploadFinalize(
				array(
					'file_id'  => $file_id,
					'file_key' => $file_key,
					'parts'    => $final_parts,
				)
			);
			$api_instance->finalizeMultipartUploadVideoById( $video_id, $model );
		}
	} catch ( \Api42Vb\Client\ApiException $e ) {
		$video_id = null;
		wp_send_json( $e->getMessage(), $e->getCode() );
	}
	wp_send_json( 'Video created with ID : ' . $video_id, 200 );
}

/**
 * Register scripts.
 */
function videobricks42_scripts() {
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'videobricks42_script', plugins_url( '../assets/script.js', __FILE__ ) );
	wp_localize_script(
		'videobricks42_script',
		'videobricks',
		array(
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
			'nonce'   => wp_create_nonce( 'videobricks42_add_video' ),
		)
	);
}

add_action( 'admin_enqueue_scripts', 'videobricks42_scripts' );
/**
 * Get host by environment selection
 *
 * @param string $env the selected environment.
 * @return string the url of the service to call.
 */
function videobricks42_get_host_by_env( $env ) {
	switch ( $env ) {
		case 'sandbox':
			$host = 'https://api-sbx.42videobricks.com';
			break;
		case 'staging':
			$host = 'https://api-stg.42videobricks.com';
			break;
		case 'production':
			$host = 'https://api.42videobricks.com';
			break;
		default:
			$host = 'https://api-sbx.42videobricks.com';
	}
	return $host;
}

/**
 * List videos in library.
 */
function videobricks42_list_init() {
	// Check if valid init request.
	$response = videobricks42_verify_request();
	if ( ! $response ) {
		add_settings_error( 'videobricks42_plugin_notice', 'api_key', 'Api key is not added/valid, please go to <a href="' . esc_url( 'admin.php?page=videobricks42-settings' ) . '">settings</a> page and update it with correct one' );
		settings_errors();
	} else {
		// Creating an instance.
		$table = new Videobricks42_List_Table();
		echo '<div class="wrap"><h1 class="wp-heading-inline">Library</h1>';
		echo '<a href="' . esc_url( 'admin.php?page=videobricks42-add-new-video' ) . '" class="page-title-action aria-button-if-js">' . esc_attr( 'Add New' ) . '</a>';
		echo '<form method="post">';
		// Prepare table.
		$table->prepare_items();
		// Search form.
		$table->search_box( esc_attr( 'Search' ), esc_attr( 'search_video' ) );
		// Display table.
		$table->display();
		echo '</div></form>';
	}
}
