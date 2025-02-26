<?php
/*
utilize class
*/
	
function ap_favicon_sanitize($options){
	global $ap_favC;
	if (isset($_POST['ap_whichpage'])){
	
	
		//RESET
		if ('reset' == $_POST['ap_whichpage']){
			$options = ap_favicon_defaults();
			return $options;
		}
		
		//General settings
		if ('general' == $_POST['ap_whichpage']){
		
			$a_which = array('root','custom');
			if(!in_array($options['favicon'],$a_which)) $options['favicon']= false;
			
			$ads = array('fav_root_ico','fav_root_png','fav_root_gif');
			foreach ($ads as $ad){
				if ($options[$ad] == "1"){$options[$ad] =true;}else{$options[$ad]=false;}
			}
			$ads=array('fav_cust_ico','fav_cust_png','fav_cust_gif');
			foreach ($ads as $ad){
				if (function_exists('esc_url_raw')){
					if ($options[$ad]) $options[$ad] = esc_url_raw($options[$ad]);
				}elseif (function_exists('clean_url')){
					if ($options[$ad]) $options[$ad] = clean_url($options[$ad],null,'db');
				}
			}			
		}
		
		//Backend
		if ('backend' == $_POST['ap_whichpage']){
			if (!$options['backend']){
				$options['backend'] = false;
			}else{
			if ($options['backend']['rss_onside'] == "1"){$options['backend']['rss_onside'] =true;}else{$options['backend']['rss_onside']=false;}
			if ($options['backend']['rss_ondash'] == "1"){$options['backend']['rss_ondash'] =true;}else{$options['backend']['rss_ondash']=false;}
			if ($options['backend']['banner_onside'] == "1"){$options['backend']['banner_onside'] =true;}else{$options['backend']['banner_onside']=false;}
			if ($options['backend']['phpinfo'] == "1"){$options['backend']['phpinfo'] =true;}else{$options['backend']['phpinfo']=false;}
			
			if ($options['clean_deact'] == "1" ){$options['clean_deact']=true;}else{$options['clean_deact']=false;}
			if ($options['clean_uninst'] == "1" ){$options['clean_uninst']=true;}else{$options['clean_uninst']=false;}
			}
		}//backend
			
	} //isset $_POST
	

	
	//came so far... let's see what the options in the db have to say 
	//1. pull out options from database and merge them
	$dbopt = $ap_favC->ap_get_option('array');
	if (!$dbopt) $dbopt = array();
	$newopt = $ap_favC->ap_array_merge_recursive_distinct($dbopt,$options);
	$dbopt = array();
	foreach ($newopt as $key => $value){
		if ($value){
			if (is_array($value)){ // handle if array
				foreach ($value as $subkey => $subvalue){
					if ($subvalue){
						$dbopt[$key][$subkey] = $subvalue;
					}
				}
			}else{ //not an array
				$dbopt[$key] = $value;
			}
		}
	}
	
	return $dbopt;
	
}

?>