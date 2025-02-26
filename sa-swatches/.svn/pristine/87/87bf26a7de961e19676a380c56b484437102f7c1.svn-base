<?php

namespace SASW_SWATCHES\API;

require_once __DIR__ . '/attr-api.php';
require_once __DIR__ . '/product-api.php';

if (!class_exists('WP_REST_Server')) {
	require_once ABSPATH . '/wp-includes/rest-api/class-wp-rest-server.php';
}


add_action('wp_ajax_sasw_ajax', __NAMESPACE__ . '\init');
add_action('wp_ajax_nopriv_sasw_ajax', __NAMESPACE__ . '\init');
function init()
{

	$nonce = isset($_GET['nonce']) ? sanitize_text_field($_GET['nonce']) : false;
	if (!$nonce) {
		$nonce = isset($post['nonce']) ? sanitize_text_field($post['nonce']) : false;
	}
	if (!$nonce) {
		$nonce = isset($_REQUEST['nonce']) ? sanitize_text_field($_REQUEST['nonce']) : false;
	}

	if (!wp_verify_nonce($nonce, 'sasw_ajax')) {
		wp_send_json_error('-1');
		die();
	}

	$content =  \WP_REST_Server::get_raw_data();
	$post = wc_clean(json_decode($content, true));

	$endpoint =  isset($_REQUEST['endpoint']) ? sanitize_text_field($_REQUEST['endpoint']) : '';
	$method =  isset($_REQUEST['method']) ? sanitize_text_field($_REQUEST['method']) : '';
	do_action('sasw_api/' . $endpoint, $post);

	die();
}
