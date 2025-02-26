<?php

class iBex_Widgets_Accommodation_MiniCalendar extends iBex_Widgets_Accommodation_DateSelector {

	public $title = 'Mini Calendar';
	public $key = 'mini-calendar';

	public function __construct(){
		parent::__construct();

		$this->shortCodes = array(
			'ibw-minicalendar'=>array('iBex_Widgets_Accommodation_MiniCalendar', 'shortcode')
		);
	}

	/**
	 * @return array()
	 */
	public static function getSettings(){
		return array();
	}

	/**
	 * [ibw-minicalendar] short code
	 * @param array $atts
	 * @return string
	 */
	public static function shortcode($atts){
		// Add extra params here
		$attrs = shortcode_atts(array(
				'pid'		=>	0,
				'height' 	=> '260px',
				'width' 	=> '230px',
				'target'	=>	get_option('ibw-option-prop-single-default-bp', '')
		), $atts);

		if(is_numeric($attrs['target'])){
			$attrs['target'] = get_permalink($attrs['target']);
		}

		if(!isset($atts['pid'])){
			$attrs['pid'] = iBex_Manager::getInstance()->oldPid;
		}

		if(isset($_GET['pid']) && is_numeric($_GET['pid'])){
			$attrs['pid'] = $_GET['pid'];
		}

		// We no longer specify a pid here, instead that's handled by the target page
		if(empty($attrs['target'])){
			return '<p style="font-weight:bold;">No valid target was set in the [ibw-minicalendar] shortcode</p>';
		}
		else if(!is_numeric($attrs['pid']) || $attrs['pid'] == 0){
			return '<p style="font-weight:bold;">Must specifiy a pid to use the [ibw-minicalendar] shortcode</p>';
		}
		else {

			$params = $attrs;
			unset($params['height']);
			unset($params['width']);

			$params['type'] = 'calendar';
			$params['template'] = 'theme-default';

			return '<div class="ibw-shortcode ibex-minicalendar"><iframe src="' . IBEX_BW_PLUGIN_URL . '/includes/widgets/accommodation/date-selector-generic.php?' . http_build_query($params) . '" scrolling="auto" style="overflow-y:auto;border:none" width="' . $attrs['width'] . '" height="' . $attrs['height'] . '"></iframe></div>';
		}
	}

	/**
	 * Theme Options for Date Selector
	 * @param array $override
	 * @return array
	 */
	public function getThemeOptions($override = array()){
		$variables = array(
			'backgroundColor'		=>	'white',
			'font'					=>	'Arial, Helvetica, Sans-serif',
			'fontSize'				=>	'11px',
			'color'					=>	'black',
			'errorColor'			=>	'#ff0000',
			'onDemandBackground'	=>	'#66ff33',
			'onDemandTextColor'		=>	'black',
			'onRequestBackground'	=>	'#ffff33',
			'onRequestTextColor'	=>	'black',
			'unavailBackground'		=>	'#ff3333',
			'unavailTextColor'		=>	'black',
		);

		$theme = array_merge($variables, $override);

		// Make sure no unknown variables were passed in
		$keyCheck = array_keys($variables);
		$toReturn = array();
		foreach($keyCheck as $k){
			$toReturn[$k] = $theme[$k];
		}

		return $toReturn;
	}

	/**
	 * @see iBex_Widgets_Base::runCustomForms()
	 */
	public function runCustomForms($k = 'dateselector'){
		return parent::runCustomForms('minicalendar');
	}
}