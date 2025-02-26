<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class AIEA_Choose_Trigger_Control extends Base_Data_Control {

	public function get_type() {
		return 'ai-trigger';
	}
	
	public function enqueue() {
		wp_enqueue_script( 'ai-control-helper', AIEA_URL . 'assets/js/editor/control-helper.js', [ 'jquery', 'jqueryui' ], '1.0.0' );
	}
	
	/**
	 * Get trigger textarea control default settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 *
	 * @return array Control default settings.
	 */
	protected function get_default_settings() {
		return [
			'label_block' => true,
			'rows' => 5,
			'placeholder' => ''
		];
	}
	
	public function content_template() {
		$control_uid = $this->get_control_uid();
		?>
		<div class="elementor-control-field">
			<label for="<?php echo esc_attr( $control_uid ); ?>" class="elementor-control-title">{{{ data.label }}}</label>
			<div class="elementor-control-input-wrapper">
				<textarea id="<?php echo esc_attr( $control_uid ); ?>" class="elementor-control-tag-area" rows="{{ data.rows }}" data-setting="{{ data.name }}" placeholder="{{ data.placeholder }}"></textarea>
			</div>
		</div>
		<?php
	}

}