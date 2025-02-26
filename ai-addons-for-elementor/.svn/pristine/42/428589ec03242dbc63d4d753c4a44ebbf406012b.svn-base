<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class AIEA_Image_Select_Control extends Base_Data_Control {

	/**
	 * Get select control type.
	 *
	 * Retrieve the control type, in this case `select`.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Control type.
	 */
	public function get_type() {
		return 'aiea-image-select';
	}

	/**
	 * Get select control default settings.
	 *
	 * Retrieve the default settings of the select control. Used to return the
	 * default settings while initializing the select control.
	 *
	 * @since 2.0.0
	 * @access protected
	 *
	 * @return array Control default settings.
	 */
	protected function get_default_settings() {
		return [
			'options' => [],
		];
	}

	/**
	 * Render select control output in the editor.
	 *
	 * Used to generate the control HTML in the editor using Underscore JS
	 * template. The variables for the class are available using `data` JS
	 * object.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function content_template() {
		?>
		<div class="elementor-control-field elementor-img-select-control-field {{ data.content_classes }}">
			<# if ( data.label ) {#>
				<label for="<?php $this->print_control_uid(); ?>" class="elementor-control-title elementor-control-full-title">{{{ data.label }}}</label>
			<# } #>
			<div class="aiea-image-select-wrap">
				<div class="aiea-image-select">
				<#
					_.each( choices, function( img_sel_arr, key ) { #>
					<?php // If the option title is array of title & icon. ?>
						
						<div class="aiea-image-select-item" data-value="{{key}}">
							<span class="aiea-image-select-thumnail"><img class="" src="{{{ img_sel_arr.thumbnail }}}" alt="{{{ img_sel_arr.label }}}" /><i>{{{ img_sel_arr.label }}}</i></span>
							<span class="aiea-image-select-full"><img class="" src="{{{ img_sel_arr.image }}}" alt="{{{ img_sel_arr.label }}}" /><i>{{{ img_sel_arr.label }}}</i></span>
						</div>
						
				<# } ); #>
				</div>
				<input type="hidden" id="<?php $this->print_control_uid(); ?>" class="aiea-image-select-input" data-setting="{{ data.name }}" placeholder="{{ data.placeholder }}" />
			</div>
		</div>
		<# if ( data.description ) { #>
			<div class="elementor-control-field-description">{{{ data.description }}}</div>
		<# } #>
		<?php
	}
}
