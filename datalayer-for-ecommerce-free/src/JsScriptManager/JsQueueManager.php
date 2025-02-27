<?php
/**
 * JsQueueManager Init
 *
 * @version 1.0.1
 * @package 'datalayer'
 */

namespace DatalayerForWoocommerceFree\JsScriptManager;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'JsQueueManager' ) ) :
	/**
	 * Class JsQueueManager
	 */
	class JsQueueManager {

		/**
		 * QueuedJs
		 *
		 * @var string $queued_js Js Queued.
		 */
		private $queued_js = array();

		/**
		 * Enqueue_js.
		 *
		 * @param array $code Array Code Push Script.
		 * @param string $param Set Param Type Script.
		 * @name 'enqueue_js'
		 */
		public function enqueue_js( $code, $param ) {
			$this->queued_js[] = array(
				'code' => $code,
				'param' => $param,
			);
		}

		/**
		 * Print_js.
		 *
		 * @name 'print_js'
		 */
		public function print_js() {
			if ( ! empty( $this->queued_js ) ) {
				print "<!-- Datalayer  WooCommerce JavaScript -->\n<script type=\"text/javascript\">";

				foreach ($this->queued_js as $print) {
					$printCode = wp_json_encode($print['code']);
					$printCode = wp_check_invalid_utf8( $printCode );
					$printCode = preg_replace( '/&#(x)?0*(?(1)27|39);?/i', "'", $printCode );
					$printCode = str_replace( "\r", '', $printCode );
					$printCode = json_decode($printCode, true);

					if ('push_script' === $print['param']) {
						printf ('
document.addEventListener("DOMContentLoaded", (event) => {
	RenderDatalayer.products=%1s;
});', wp_json_encode($printCode) );
					}

					if ('push_to_data_layer' === $print['param']) {
						printf ('
document.addEventListener("DOMContentLoaded", (event) => {
	if(typeof dataLayer == "undefined"){
			dataLayer = [];
		}
		dataLayer.push({ ecommerce: null });
		dataLayer.push( %1s )
});', wp_json_encode($printCode) );
					}

					if ('push_to_data_layer_sleep' === $print['param']) {
						printf ('
window.addEventListener("load", (event) => {
	setTimeout( function() {
		if(typeof dataLayer == "undefined"){
			dataLayer = [];
		}
		dataLayer.push({ ecommerce: null });
		dataLayer.push( %1s )
	}, 1000)
});', wp_json_encode($printCode) );
					}
					print "\n";
				}

				print "</script>";
			}
		}
	}
endif;
