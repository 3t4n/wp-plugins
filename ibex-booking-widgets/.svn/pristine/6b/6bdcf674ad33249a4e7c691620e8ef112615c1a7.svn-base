<?php 

class iBex_Widgets_Accommodation_DateSelector extends iBex_Widgets_Base {
	
	public $title = 'Date Selector';
	public $key = 'date-selector';
	
	public function __construct(){
		parent::__construct();
		$this->dir .= '/accommodation';
		
		$this->shortCodes = array(
			'ibw-dateselector'=>array('iBex_Widgets_Accommodation_DateSelector', 'shortcode')
		);
	}
		
	/**
	 * @return array()
	 */
	public static function getSettings(){
		return array();
	}
	
	/**
	 * [ibw-dateselector] short code
	 * @param array $atts
	 * @return string
	 */
	public static function shortcode($atts){
		// Add extra params here
		$attrs = shortcode_atts(array(
				'mode'		=>	'vertical',
				'text'		=>	'Search Availability',
				'height' 	=> isset($atts['mode']) && $atts['mode'] == 'vertical' ? '60px' : '120px',
				'width' 	=> '100%',
				'target'	=>	get_option('ibw-option-prop-single-default-bp', '')
		), $atts);
		
		if($attrs['target'] == 'multi'){
			$attrs['target'] = get_option('ibw-option-prop-multi-default-multi-bp', '');
		}
		
		if(is_numeric($attrs['target'])){
			$attrs['target'] = get_permalink($attrs['target']);
		}
		
		// Legacy support
		if(isset($atts['horizontal'])){
			$attrs['mode'] = ($atts['horizontal'] == 'on') ? 'horizontal' : 'vertical';
		}
		
		// We no longer specify a pid here, instead that's handled by the target page
		if(empty($attrs['target'])){
			return '<p style="font-weight:bold;">No valid target was set in the [ibw-dateselector] shortcode</p>';
		}
		else {
			
			$params = $attrs;
			unset($params['height']);
			unset($params['width']);
			
			$params['type'] = 'date';
			$params['template'] = 'theme-default';
			
			return '<div class="ibw-shortcode ibex-dateselector"><iframe src="' . IBEX_BW_PLUGIN_URL . '/includes/widgets/accommodation/date-selector-generic.php?' . http_build_query($params) . '" scrolling="auto" style="overflow-y:auto;border:none" width="' . $attrs['width'] . '" height="' . $attrs['height'] . '"></iframe></div>';
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
		
		if(!@file_exists($this->dir . '/' . $this->key . '/theme-default.css')){
			$this->writeThemeFile($this->getThemeOptions(), 'theme-default.css');
		}
		
		// Only run on a POST
		if(!isset($_POST['act']) || $_POST['act'] != 'update_theme'){
			return;
		}
		
		$theme = preg_replace('/[^a-zA-Z0-9]/', '', $_POST['themeid']);
		
		if(isset($_POST['save_theme'])){
			$passedInThemeOptions = array_filter($_POST['theme'][$theme]);
			$themeOptions = $this->getThemeOptions($passedInThemeOptions);
		}
		else if(isset($_POST['default_theme'])){
			$themeOptions = $this->getThemeOptions();
		}
		
		// Update the array
		update_option('ibw-' . $k . '-theme-' . $theme, $themeOptions);
		
		return ($this->writeThemeFile($themeOptions, 'theme-' . $theme . '.css'));
	}
	
	/**
	 * @param array $themeOptions
	 * @param string $themeFile
	 * @return boolean
	 */
	protected function writeThemeFile(array $themeOptions, $themeFile){
		if(!class_exists('lessc')){
			require_once IBEX_BW_PLUGIN_DIR . '/includes/lessphp/lessc.inc.php';
		}
		
		$parser = new lessc();
		$parser->setVariables($themeOptions);
		$parser->setFormatter('compressed');
		
		try {
			$parser->compileFile($this->dir . '/' . $this->key . '/template.less', $this->dir . '/' . $this->key . '/' . $themeFile);
		}
		catch(Exception $ex){
			echo '<div class="error settings-error"> <p>Saving theme error: ' . $ex->getMessage() . '</p></div>';
			return false;
		}
		
		return true;
	}
}