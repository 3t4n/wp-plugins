<?php 

class iBex_Widgets_Accommodation_SingleRatesCalendar extends iBex_Widgets_Base {
	
	public $title = 'Rates Calendar (Single Property)';
	public $key = 'single-rates-calendar';
	
	public function __construct(){
		parent::__construct();

		$this->dir .= '/accommodation';
		
		$this->shortCodes = array(
			'ibw-ratescalendar'=>array('iBex_Widgets_Accommodation_SingleRatesCalendar', 'shortcode')
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
				'pid'					=>	0,
				'ru'					=>	'',
				'height' 				=>	'400px',
				'width' 				=>	'700px',
				'allminstays'			=>	'true',
				'hideunavailminstays'	=>	'true',
				'showmaxguests'			=>	'true',
				'showratename'			=>	'true',
				'dateoffset'			=>	0,
				'days'					=>	7,
				'theme'					=>	'navy',
				'target'				=>	get_option('ibw-option-prop-single-default-bp', '')
		), $atts);
		
		if(isset($_GET['pid']) && is_numeric($_GET['pid'])){
			$attrs['pid'] = $_GET['pid'];
		}
		
		if(is_numeric($attrs['target'])){
			$attrs['target'] = get_permalink($attrs['target']);
		}
			
		if(empty($attrs['target'])){
			return '<!-- No valid target was set in the [ibw-ratescalendar] shortcode -->';
		}
		else if(!is_numeric($attrs['pid']) || $attrs['pid'] == 0){
			return '<!-- Must specifiy a pid to use the [ibw-ratescalendar] shortcode -->';
		}
		else {
			
			$params = $attrs;
			unset($params['height']);
			unset($params['width']);
			
			$params['type'] = 'calendar';
			$params['template'] = 'theme-default';
			
			return '<div class="ibw-shortcode ibex-ratecalendar"><iframe src="http://ibex.seekom.com/accommodation/distributions/ratecal/Loader.php?url=' . urlencode(IBEX_BW_PLUGIN_URL . '/includes/widgets/accommodation/single-rates-calendar/client.php?' . http_build_query($params)) . '" scrolling="auto" style="background-color: transparent; border:none;" width="' . $attrs['width'] . '" height="' . $attrs['height'] . '" frameborder="0" scrolling="auto"></iframe></div>';
		}
	}
	
	public static function getThemes(){
		return array(
			'navy','brown','green','orange','pink','purple','red','slate'	
		);
	}
}