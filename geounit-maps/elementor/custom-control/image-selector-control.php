<?php
namespace Elementor\CustomControl;

use \Elementor\Base_Data_Control;

class ImageSelector_Control extends Base_Data_Control {


	const ImageSelector = 'image_selector';

	/**
	 * Set control type.
	 */
	public function get_type() {
		return self::ImageSelector;
	}

	/**
	 * Enqueue control scripts and styles.
	 */
	public function enqueue() {
		wp_register_style('geounit-leaflet-css', plugins_url('assets/geounit-leaflet.css', dirname(__FILE__)), [], '1.0.0');
		wp_enqueue_style('geounit-leaflet-css');
	}

	/**
	 * Set default settings
	 */
	protected function get_default_settings() {
		return [
			'label_block' => true,
			'toggle' => true,
			'options' => [],
		];
	}
	
	/**
	 * control field markup
	 */
	public function content_template() {
		$control_uid = $this->get_control_uid('{{ value }}');
        ?>
		<div class="elementor-control-field">
			<label class="elementor-control-title">{{{ data.label }}}</label>
			<div class="elementor-control-image-selector-wrapper">
				<# _.each( data.options, function( options, value ) { #>
                    
				<input id="<?php echo esc_attr($control_uid); ?>" type="radio" name="elementor-image-selector-{{ data.name }}-{{ data._cid }}" value="{{ options.url }}" data-setting="{{ data.name }}">
				<label class="elementor-image-selector-label" for="<?php echo esc_attr($control_uid); ?>">
					<img height="82px" width="110px" src="<?php echo esc_url(GEOUNITMAPSURL); ?>/lib/images/{{ options.image }}">
				</label>
				<# } ); #>
			</div>
		</div>
		<?php
	}

}