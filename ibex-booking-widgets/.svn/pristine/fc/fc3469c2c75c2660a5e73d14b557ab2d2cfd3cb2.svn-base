<?php

class iBex_Widgets_Accommodation_PropSingle extends iBex_Widgets_Base {

	public $title = 'Single Property Booking Screen';
	public $key = 'prop-single';

	public function __construct(){
		parent::__construct();
		$this->dir .= '/accommodation';

		$this->shortCodes = array(
			'ibw-bookingpage'=>array('iBex_Widgets_Accommodation_PropSingle', 'shortcode')
		);
	}

	/**
	 * @return array()
	 */
	public static function getSettings(){
		return array('default-bp'=>'intval');
	}

	/**
	 * [ibw-bookingpage] short code
	 * @param array $atts
	 * @return string
	 */
	public static function shortcode($atts){
		// Add extra params here
		$attrs = shortcode_atts(array(
				'pid'	=>	0,
				'ru'	=>	'',
				'height' => '600px',
				'width' => '100%',
				'rmtype'	=>	''
		), $atts);

		if(!isset($atts['pid'])){
			$attrs['pid'] = iBex_Manager::getInstance()->oldPid;
		}

		if(isset($_GET['pid']) && is_numeric($_GET['pid'])){
			$attrs['pid'] = $_GET['pid'];
		}

		if(!is_numeric($attrs['pid']) || $attrs['pid'] == 0){
			return '<p style="font-weight:bold;">Must specifiy a pid to use the [ibw-bookingpage] shortcode</p>';
		}
		else {

			if(!preg_match('#^[\d,]+$#', $attrs['rmtype'])){
				unset($attrs['rmtype']);
			}

			// Register the JS
			wp_enqueue_script('ibw-bookingpage', IBEX_BW_PLUGIN_URL . '/includes/widgets/accommodation/prop-single/prop-single.js', array('jquery', 'ibw-resizer'), false, true);


			return '<div class="ibw-shortcode ibw-bookingpage" data-ibexparams="' . htmlspecialchars(json_encode($attrs), ENT_QUOTES) . '"></div>';
		}
	}

	/**
	 * Global Settings Section
	 */
	public function addSettingsSection(){
		add_settings_section('ibw-section-prop-single', 'Settings', array($this, 'settingsSectionA'), 'ibw-options-prop-single');
		add_settings_field('ibw-option-prop-single-default-bp', 'Default Booking Page', array($this, 'settingsFieldA'), 'ibw-options-prop-single', 'ibw-section-prop-single');
	}

	/**
	 * Global Settings Text
	 */
	public function settingsSectionA(){
		echo '<p>Settings for the Single Property Booking Screen.</p>';
	}

	/**
	 * Default Booking Page
	 */
	public function settingsFieldA(){

		$pages = get_pages(array('post_type'=>'page', 'number'=>100));
		$default = get_option('ibw-option-prop-single-default-bp', '');
		echo '<select name="ibw-option-prop-single-default-bp" id="ibw-option-prop-single-default-bp">';
		echo '<option value="0">-- Choose --</option>';
		foreach($pages as $page){
			echo '<option value="' . $page->ID . '" ' . ($page->ID == $default ? 'selected="selected"' : '') . '>' . $page->post_title . ' <i>(' . $page->post_name . ')</i></option>';
		}

		echo '</select> <span class="description">What page have you set up with this booking code? This is used by other widgets as a landing point.</span>';
	}

}