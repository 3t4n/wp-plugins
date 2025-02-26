<?php

namespace FIC\Featured_Image_Customizer;

! defined( ABSPATH ) || exit;

if ( ! class_exists( 'FIC_Preview_Image' ) ) {

	class FIC_Preview_Image extends Featured_Image_Customizer {

		public function __construct() {
			parent::__construct();

			$this->creator = new FIC_Creator;
		}

		public function init() {
			add_action( 'wp_loaded', array( $this, 'on_loaded' ) );
		}

		public function on_loaded() {
			add_action( 'wp_ajax_preview_featured_image', array( $this, 'preview_featured_image' ) );
		}

		public function preview_featured_image() {
			$logo_brands = json_decode( FIC12_BRAND_LOGOS );

			$logo_a       = isset( $_REQUEST['logo_a'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['logo_a'] ) ) : '';
			$logo_b       = isset( $_REQUEST['logo_b'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['logo_b'] ) ) : '';
			$conjunction  = isset( $_REQUEST['conjunction'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['conjunction'] ) ) : '';
			$bgcolor      = isset( $_REQUEST['bgcolor'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['bgcolor'] ) ) : '';
			$img_filename = isset( $_REQUEST['img_filename'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['img_filename'] ) ) : '';

			if ( empty( $logo_a ) || empty( $logo_b ) ) {
				echo wp_json_encode(
					array(
						'notice-error',
						'<strong>Missing fields!</strong><br /> Logo 1 & 2 are both required fields.',
					)
				);
				exit;
			}

			if ( ! in_array( $logo_a, $logo_brands, true ) || ! in_array( $logo_b, $logo_brands, true ) ) {
				echo wp_json_encode(
					array(
						'notice-error',
						'<strong>Not Found!</strong><br /> One of the logos you are trying to load cannot be found.',
					)
				);
				exit;
			}

			// Conjuction should 1 symbol if not an html entity
			if ( strlen( $conjunction ) > 1 && false === strpos( $conjunction, ';' ) ) {
				echo wp_json_encode(
					array(
						'notice-error',
						'<strong>Invalid conjunction!</strong><br /> You either use a single character as your conjunction (e.g. &) or an html entity (e.g. &amp;).',
					)
				);
				exit;
			}

			$tmp_file = $this->creator->generate_preview_image( $logo_a, $logo_b, $conjunction, $bgcolor );

			if ( $tmp_file ) {
				echo wp_json_encode(
					array(
						'notice-success',
						'<strong>Preview loaded!</strong><br /> Featured image preview completed!',
						$tmp_file['file_path'],
						$img_filename,
						$tmp_file['file_contents'],
					)
				);
				exit;
			}
		}
	}

	$fic = new FIC_Preview_Image();
	$fic->init();
}
