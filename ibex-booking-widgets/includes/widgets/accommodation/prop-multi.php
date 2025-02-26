<?php

class iBex_Widgets_Accommodation_PropMulti extends iBex_Widgets_Base {

	public $title = 'Multi Property Booking Screen';
	public $key = 'prop-multi';

	public function __construct(){
		parent::__construct();
		$this->dir .= '/accommodation';

		$this->shortCodes = array(
			'ibw-multi-bookingpage'=>array('iBex_Widgets_Accommodation_PropMulti', 'shortcode')
		);
	}

	/**
	 * @return array()
	 */
	public static function getSettings(){
		return array('default-multi-bp'=>'intval');
	}

	/**
	 * [ibw-multi-bookingpage] short code
	 * @param array $atts
	 * @return string
	 */
	public static function shortcode($atts){
		// Add extra params here
		$attrs = shortcode_atts(array(
				'ru'	=>	'',
				'height' => '600px',
				'width' => '100%'
		), $atts);

		// Register the JS
		wp_enqueue_script('ibw-bookingpage', IBEX_BW_PLUGIN_URL . '/includes/widgets/accommodation/prop-multi/prop-multi.js', array('jquery', 'ibw-resizer'), false, true);


		return '<div class="ibw-shortcode ibw-multi-bookingpage" data-ibexparams="' . htmlspecialchars(json_encode($attrs), ENT_QUOTES) . '"></div>';

	}

	/**
	 * Global Settings Section
	 */
	public function addSettingsSection(){
		add_settings_section('ibw-section-prop-multi', 'Settings', array($this, 'settingsSectionA'), 'ibw-options-prop-multi');
		add_settings_field('ibw-option-prop-multi-default-multi-bp', 'Default Multi Booking Page', array($this, 'settingsFieldA'), 'ibw-options-prop-multi', 'ibw-section-prop-multi');
	}

	/**
	 * Global Settings Text
	 */
	public function settingsSectionA(){
		echo '<p>Settings for the Multi Property Booking Screen.</p>';
	}

	/**
	 * Default Booking Page
	 */
	public function settingsFieldA(){

		$pages = get_pages(array('post_type'=>'page', 'number'=>100));
		$default = get_option('ibw-option-prop-multi-default-multi-bp', '');
		echo '<select name="ibw-option-prop-multi-default-multi-bp" id="ibw-option-prop-multi-default-multi-bp">';
		echo '<option value="0">-- Choose --</option>';
		foreach($pages as $page){
			echo '<option value="' . $page->ID . '" ' . ($page->ID == $default ? 'selected="selected"' : '') . '>(' . $page->ID . ') ' . $page->post_title . ' <i>(' . $page->post_name . ')</i></option>';
		}

		echo '</select> <span class="description">What page have you set up with this multi booking code? This is used by other widgets as a landing point.</span>';
	}

}