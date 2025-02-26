<?php 
namespace QSDarkMode\Base;

class BaseController
{
	public $plugin_path;

	public $plugin_url;

	public $plugin;

	public function __construct() {
		$this->plugin_path = QS_DARK_MODE_PLUGIN_PATH;
		$this->plugin_url  = QS_DARK_MODE_PLUGIN_URL;
		$this->plugin      = QS_DARK_MODE_PLUGIN;
	}

	public function css_array_to_css($rules, $indent = 0) {
		$css = '';
		$prefix = str_repeat('  ', $indent);
	  
		foreach ($rules as $key => $value) {
		  if (is_array($value)) {
			$selector = $key;
			$properties = $value;
	  
			$css .= $prefix . ".qs-dm-service-enable $selector {\n";
			$css .= $prefix . $this->css_array_to_css($properties, $indent + 1);
			$css .= $prefix . "}\n";
		  } else {
			$property = $key;
			$css .= $prefix . "$property: $value;\n";
		  }
		}
	  
		return $css;
	   }
	
	   public function php_string_to_array($css){
	
			$results = array();
	
			preg_match_all('/(.+?)\s?\{\s?(.+?)\s?\}/', $css, $matches);
			foreach($matches[0] AS $i=>$original){
	  
			  foreach(explode(';', $matches[2][$i]) AS $attr){
				if (strlen(trim($attr)) > 0) // for missing semicolon on last element, which is legal
				{
					list($name, $value) = explode(':', $attr);
					$results[$matches[1][$i]][trim($name)] = trim($value);
				}
			  }
			  
			}
		return $results;
	  }

}