<?php
/**
 * Radio Image field for customier
 *
 * @package pf_preloaders WordPress Theme
 * @subpackage pf_preloaders
 * @author Pressfore - www.pressfore.com
 * @since 1.0.0
 */

/**
 * Radio image customize control.
 *
 * @since  3.0.0
 * @access public
 */
class PF_Preloaders_Button extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 *
	 * @since  3.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'button';

	public $button_text;

	/**
	 * Add custom parameters to pass to the JS via JSON.
	 *
	 * @since  3.0.0
	 * @access public
	 * @return void
	 */
	public function to_json() {
		parent::to_json();

		$this->json['button_text'] = $this->button_text;
	}

	/**
	 * Underscore JS template to handle the control's output.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function content_template() { ?>
		<# if ( data.label ) { #>
			<span class="customize-control-title">{{ data.label }}</span>
		<# } #>
		<a class="pf-preloaders-preview">{{ data.button_text }}</a>
	<?php }
}