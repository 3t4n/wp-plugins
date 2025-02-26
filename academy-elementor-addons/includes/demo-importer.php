<?php
namespace AcademyEA;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class DemoImporter {

	public static function init() {
		$self = new self();
		$self->load_default_template_post();
	}

	public function load_json_files() {
		return [
			ACADEMYEA_CORE_ROOT_PATH . 'assets/json/course-single-demo-one.json',
			ACADEMYEA_CORE_ROOT_PATH . 'assets/json/course-single-demo-two.json',
			ACADEMYEA_CORE_ROOT_PATH . 'assets/json/course-single-demo-three.json',
		];
	}
	public function load_default_template_post() {
		$urls = $this->load_json_files();
		foreach ( $urls as $url ) {
			$this->load_template( $url );
		}
	}

	public function load_template( $url ) {
		$response_data = file_get_contents( $url );// phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents
		$response_data = json_decode( $response_data, true );
		$page_title = ! empty( $response_data ) && ! empty( $response_data['title'] ) ? $response_data['title'] : '';

		if ( get_page_by_title( $page_title, ARRAY_A, 'academyea-template' ) === null ) {
			$args = [
				'post_type'    => ! empty( $page_title ) ? 'academyea-template' : 'elementor_library',
				'post_status'  => ! empty( $page_title ) ? 'publish' : 'draft',
				'post_title'   => ! empty( $page_title ) ? $page_title : esc_attr( 'AcademyEA template ' . time() ),
				'post_content' => '',
			];

			$new_post_id = wp_insert_post( $args );

			update_post_meta( $new_post_id, '_elementor_data', $response_data['content'] );
			update_post_meta( $new_post_id, '_elementor_template_type', $response_data['type'] );
			update_post_meta( $new_post_id, 'academyea_template_meta_type', 'course' );
			update_post_meta( $new_post_id, '_elementor_edit_mode', 'builder' );

			if ( isset( $response_data['page_settings'] ) ) {
				update_post_meta( $new_post_id, '_elementor_page_settings', $response_data['page_settings'] );
			}

			if ( $new_post_id && ! is_wp_error( $new_post_id ) ) {
				update_post_meta( $new_post_id, '_wp_page_template', ! empty( $response_data['page_template'] ) ? $response_data['page_template'] : 'elementor_header_footer' );
			}
		}//end if
	}
}
