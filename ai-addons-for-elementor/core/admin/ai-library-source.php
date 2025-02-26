<?php

use Elementor\TemplateLibrary\Source_Base;

class AIEA_Library_Source extends Source_Base {

	public function get_id() {
		return 'ai-layout-manager';
	}

	public function get_title() {
		return 'AI Layout Manager';
	}

	public function register_data() {}

	public function save_item( $template_data ) {
		return new \WP_Error( 'invalid_request', 'Cannot save template to a AI layout manager' );
	}

	public function update_item( $new_data ) {
		return new \WP_Error( 'invalid_request', 'Cannot update template to a AI layout manager' );
	}

	public function delete_template( $template_id ) {
		return new \WP_Error( 'invalid_request', 'Cannot delete template from a AI layout manager' );
	}

	public function export_template( $template_id ) {
		return new \WP_Error( 'invalid_request', 'Cannot export template from a AI layout manager' );
	}

	public function get_items( $args = [] ) {
		return [];
	}

	public function get_item( $template_id ) {
		$templates = $this->get_items();

		return $templates[ $template_id ];
	}

	public function request_template_data( $part, $template ) {
		
		if ( empty( $template ) ) {
			return;
		}

		$url = 'https://aiaddons.ai/ai-import/'. $part .'/'. $template;
		
		$response = wp_remote_get( $url .'.json', [
			'timeout'   => 60,
			'sslverify' => false
		] );
		
		return wp_remote_retrieve_body( $response );
				
	}

	public function get_data( array $args ) {
		
		$data = $this->request_template_data( $args['part'], $args['template'] );

		$data = json_decode( $data, true );

		if ( empty( $data ) || empty( $data['content'] ) ) {
			throw new \Exception( 'Template does not have any content' );
		}

		$data['content'] = $this->replace_elements_ids( $data['content'] );	
		$data['content'] = $this->process_export_import_content( $data['content'], 'on_import' );
		
		$post_id  = $args['editor_post_id'];
		$document = \Elementor\Plugin::instance()->documents->get( $post_id );

		if ( $document ) {
			$data['content'] = $document->get_elements_raw_data( $data['content'], true );
		}

		return $data;
	}

}