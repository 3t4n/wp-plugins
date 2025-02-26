<?php

class FWL_menu_plugin{
	
	public function __construct()
	{

	}

	/**
	 * The following pre-encode, encode, decode, post-decode function are set specifically to make sure single quote " ' ", or double quote ' " ' will be saved correctly in metabox
	 * @param  [type] $meta [description]
	 * @return [type]       [description]
	 */
	private static function metabox_pre_encode($meta){
     	
     	foreach($meta as $key =>$value){
         	if(!is_array($value)){
	            $value = str_replace('\"', 'doublequote123194839', $value);
	            $meta[$key] = str_replace("\'", "singlequote123194839", $value);
         	}else{
	            $meta[$key] = self::metabox_pre_encode($value);
         }
     }

    	return $meta; 
	}

	public static function metabox_encode($meta){
	    
	    $meta = self::metabox_pre_encode($meta);

	    $meta = json_encode($meta);
	    return $meta;
	}

	private static function metabox_post_decode($meta){

		if(is_array($meta)){
			
			foreach($meta as $key =>$value){
	            $meta[$key] = self::metabox_post_decode($value);
		    }

		}else{
			$meta = str_replace('doublequote123194839', '"', $meta); 
			$meta = str_replace("singlequote123194839", "'", $meta); 
		}		
     
    	return $meta; 
	}

	public static function metabox_decode($meta){

	    if(!empty($meta))
	    { 
	      $meta = json_decode($meta, true);
	      if(is_array($meta)){	
		      $meta = self::metabox_post_decode($meta);
	      }
	    }
	    return $meta; 
	}


	/**
	 * [validate some specifc type of value]
	 */
	public static function validate_value($testsubject, $validatetype = 'text')
	{	
		switch($validatetype){
			
			case 'color': //hex color or rgba, the reg can be further improved on rgba
				$pattern = '/^(#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$)|(rgba\(([0-9]{1,3},){1,3}\s?)/';
			break;

			case 'int'://interger
				$pattern = '/^[0-9]+$/';
			break;

			case 'text'://plain text, remove html tags
				
				$testsubject = strip_tags($testsubject);
				
				$special_characters = array('<', '>', '=');
				$testsubject = str_replace($special_characters, "", $testsubject);

				$pattern = '/^/';
			break;

			case 'switch': //accept on/off
				$pattern = '/^(on|off)$/';
			break;

			case 'pricetype':
				$pattern = '/^(single|multi)$/';
			break;

			case 'key'://allow numbers, letters, '-', '_', and space only
				$pattern = '/^[0-9a-zA-Z\-_\s]+$/';
			break;


			default:
				write_log('invalid validate type to validate for "'. $validatetype . '" type, input value: ' . $testsubject);
				return;
			break;	
		}

		if(preg_match($pattern, $testsubject))
		{
			return $testsubject;
		}else{
			write_log('Failed to validate for '. $validatetype . '"'. $validatetype . '" , input value: ' . $testsubject);
			return;
		}
	}

	public static function process_url_beforeEncode($url)
	{
		$siteURL = site_url();
		$url = str_replace($siteURL, '', $url); 
		return $url;
	}

	public static function process_url_afterDecode($url)
	{
		if(strlen($url) > 0)
		{
			$siteURL = site_url();
			$url = $siteURL.$url;
		}
		return $url;
	}

	public static function get_filenames_in_directory($directoryPath)
	{
		$namelist = scandir($directoryPath);
		$namelist = array_diff($namelist, array('.', '..'));
		return $namelist;
	}

	public static function is_empty_value_array($array)
	{
		$return = true;
		
		foreach($array as $value)
		{
			if(!empty($value))
			{
				$return = false;
			}
		}
		
		return $return;
	}



}