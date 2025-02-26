<?php
/**
 * The sdk main file.
 *
 * @link
 * @since 1.0.0
 *
 * @package HTO_SDK_V1/SDK
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'hto_sk_v1_register_action_hook' ) ) {

	/**
	 * HTO SDK V1 action initialization function.
	 *
	 * @since    1.0.0
	 */
	function hto_sk_v1_register_action_hook() {
		$sdk = new HTO_SDK_V1();

		if ( ! $sdk->is_already_sdk_initialized() ) {

			$sdk->initialize_sdk_popup();

			if ( $sdk->accept_concent() ) {

				if ( ! class_exists( 'HTO_SDK_TRACER_V1' ) ) {
					require_once __DIR__ . '/class-hto-sdk-tracer-v1.php';
				}

				$params     = $sdk->get_sdk_config();
				$trace_dirs = array();

				foreach ( $sdk->get_registered_configs() as $config ) {
					$trace_dirs[] = 'plugins/' . $config['plugin_name'];
				}

				$tracer = new HTO_SDK_TRACER_V1(
					array(
						'public_key' => $params['public_key'],
						'server_url' => str_ireplace( '/insight', '/tracer', $params['server_url'] ),
						'trace_dirs' => $trace_dirs,
					)
				);

				if ( ! $tracer->is_already_tracing() ) {
					$tracer->start_tracing();
				}
			}
		}
	}
}

if ( ! function_exists( 'init_hto_sdk_v1' ) ) {
	/**
	 * Initialize New HTO SDK for Data Insight and Error Tracing.
	 *
	 * @param array $params sdk configurator.
	 * @since    1.0.0
	 */
	function init_hto_sdk_v1( $params ) {
		if ( ! is_admin() ) {
			return;
		}

		if ( ! class_exists( 'HTO_SDK_V1' ) ) {
			require_once __DIR__ . '/class-hto-sdk-v1.php';
		}

		$plugin_name = plugin_basename( isset( $params['plugin_dir'] ) ? $params['plugin_dir'] . '/sdk' : __DIR__ );
		$plugin_name = substr( $plugin_name, 0, strpos( $plugin_name, '/' ) );

		$params['plugin_name'] = $plugin_name;

		HTO_SDK_V1::register( $params );

		if ( ! HTO_SDK_V1::is_already_hook_initialized() ) {
			HTO_SDK_V1::set_hook_initialized();

			add_action( 'plugins_loaded', 'hto_sk_v1_register_action_hook', 11 );
		}
	}
}
