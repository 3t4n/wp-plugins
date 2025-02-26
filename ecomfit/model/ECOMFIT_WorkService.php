<?php

if ( ! class_exists( 'ECOMFIT_WorkService' ) ) {

	class ECOMFIT_WorkService {
		function __construct() {
		}

		public static function getService($clientId) {
			$webId = get_option( ECOMFIT_WEB_ID );
			$token = get_option( ECOMFIT_TOKEN );
			$content = [
				'webId' => $webId
			];

			$headers = array(
				'Content-Type'  => 'application/json',
				'Authorization' => 'Bearer ' . $token
			);
			$args         = array(
				'timeout'     => 5,
				'redirection' => 5,
				'httpversion' => '1.0',
				'user-agent'  => 'WordPress/' . $wp_version . '; ' . home_url(),
				'blocking'    => true,
				'headers'     => $headers,
				'cookies'     => array(),
				'body'        => json_encode( $content ),
				'compress'    => false,
				'decompress'  => true,
				'sslverify'   => true,
				'stream'      => false,
				'filename'    => null
			);

			$url = ECOMFIT_URL_API . '/workservice/get?webId=' . $webId . '&clientId=' . $clientId;
			$response = wp_remote_get($url, $args);
			return wp_remote_retrieve_body($response);
		}
	}

}