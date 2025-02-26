<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class AIEA_Drag_Drop_Control extends Base_Data_Control {

	public function get_type() {
		return 'drag-n-drop';
	}
	
	public function enqueue() {

		// Scripts
		wp_register_script( 'ai-control-helper', AIEA_URL . 'assets/js/editor/control-helper.js', [ 'jquery', 'jquery-ui-core' ], '1.0.0' );
		wp_enqueue_script( 'ai-control-helper' );
		
		// Styles
		wp_register_style( 'ai-control-helper', AIEA_URL . 'assets/css/editor/control-helper.css', [], '3.4.1' );
		wp_enqueue_style( 'ai-control-helper' );
	}
	
	/**
	 * Get textarea control default settings.
	 *
	 * Retrieve the default settings of the textarea control. Used to return the
	 * default settings while initializing the textarea control.
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
				
				<input type="hidden" class="drag-drop-hidden-trigger" value="{{ JSON.stringify( data.triggers ) }}" />
				
				<textarea id="<?php echo esc_attr( $control_uid ); ?>" class="elementor-control-tag-area" rows="{{ data.rows }}" data-setting="{{ data.name }}" placeholder="{{ data.placeholder }}"></textarea>
				
				<div class="drag-drop-multi-field">
				<# _.each( data.drag_items, function( option_title, option_value ) { #>
					<div class="drag-drop-childs">
						<h4>{{{ option_value }}}</h4>
						<?php echo '<ul class="meta-items ui-sortable" data-part="';?>{{{ option_value }}}<?php echo '">'; ?>
						<# _.each( option_title, function( inner_title, inner_value ) { #>
							<?php echo '<li data-id="'; ?>{{{ inner_value }}}<?php echo '" data-val="';?>{{{ inner_title }}}<?php echo '">'; ?>{{{ inner_title }}}</li>
						<# } ); #>
						</ul>
					</div>
				<# } ); #>
				</div>

			</div>
		</div>
		<# if ( data.description ) { #>
			<div class="elementor-control-field-description">{{{ data.description }}}</div>
		<# } #>
		<?php
	}

}