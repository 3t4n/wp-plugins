<?php

/**
 *
 * Class ACC Dynamic CSS
 *
 * Extending A5 Dynamic Files
 *
 * Presses the dynamical CSS of the Advanceed Category Column Widget into a virtual style sheet
 *
 */

class ACC_DynamicCSS extends A5_DynamicFiles {
	
	private static $options;
	
	function __construct() {
		
		self::$options =  get_option('acc_options');
		
		if (!array_key_exists('inline', self::$options)) self::$options['inline'] = false;
		
		if (!array_key_exists('priority', self::$options)) self::$options['priority'] = false;
		
		if (!array_key_exists('compress', self::$options)) self::$options['compress'] = true;
		
		$this->a5_styles('wp', 'all', self::$options['inline'], self::$options['priority']);
		
		$acc_styles = self::$options['css_cache'];
		
		if (!$acc_styles) :
		
			$eol = (self::$options['compress']) ? '' : "\n";
			$tab = (self::$options['compress']) ? '' : "\t";
			
			$css_selector = 'widget_advanced_category_column_widget[id^="advanced_category_column_widget"]';
			
			$acc_styles = (!self::$options['compress']) ? $eol.'/* CSS portion of Advanced Category Column */'.$eol.$eol : '';
			
			if (!empty(self::$options['css'])) :
			
				$style = str_replace('; ', ';'.$eol.$tab, str_replace(array("\r\n", "\n", "\r"), ' ', self::$options['css']));
			
				$acc_styles .= parent::build_widget_css($css_selector, '').'{'.$eol.$tab.$style.$eol.'}'.$eol;
				
			endif;
			
			$acc_styles .= parent::build_widget_css($css_selector, 'img').'{'.$eol.$tab.'height: auto;'.$eol.$tab.'max-width: 100%;'.$eol.'}'.$eol;
			
			if (!empty (self::$options['link'])) :
			
				$style = str_replace('; ', ';'.$eol.$tab, str_replace(array("\r\n", "\n", "\r"), ' ', self::$options['link']));
			
				$acc_styles .= parent::build_widget_css($css_selector, 'a').'{'.$eol.$tab.$style.$eol.'}'.$eol;
				
			endif;
			
			if (!empty (self::$options['hover'])) :
			
				$style = str_replace('; ', ';'.$eol.$tab, str_replace(array("\r\n", "\n", "\r"), ' ', self::$options['hover']));
			
				$acc_styles .= parent::build_widget_css($css_selector, 'a:hover').'{'.$eol.$tab.$style.$eol.'}'.$eol;
				
			endif;
		
			self::$options['css_cache'] = $acc_styles;
			
			update_option('acc_options', self::$options);
			
		endif;
		
		parent::$wp_styles .= $acc_styles;

	}
	
} // ACC_Dynamic CSS

?>