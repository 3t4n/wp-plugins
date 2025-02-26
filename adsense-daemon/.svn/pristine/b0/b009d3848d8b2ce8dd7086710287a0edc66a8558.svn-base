<?php

/*
Plugin Name: Adsense Daemon
Version: 2.3
Plugin URI: http://www.mkyong.com/blog/adsense-daemon-wordpress-plugin
Author: Yong Mook Kim
Author URI: http://www.mkyong.com/

Description: The simplest solution to put "Google Adsense" into Wordpress Content. Just copy your Google Adesense code, paste it and set where you want to display.
*/ 
	
/*
ini_set('display_errors',1);
error_reporting(E_ALL);
*/

//include required class
require_once 'ad.class.php';
require_once 'ad.constant.php';
require_once 'ad.printform.php';

add_action('admin_menu', 'ad_admin_menu');
add_filter('the_content', 'ad_content_hook');

function ad_DataInitialer($type=AD_FUNC_TYPE_RESET){
	    
	$ads1 = new Ads1();
	$ads2 = new Ads2();
	$ads3 = new Ads3();
	$ads4 = new Ads4();
	
	if(get_option(AD_ADS1_OPTIONS)==AD_EMPTY_VALUE || $type==AD_FUNC_TYPE_RESET)
		update_option(AD_ADS1_OPTIONS, $ads1->wp_options);
	
	if(get_option(AD_ADS2_OPTIONS)==AD_EMPTY_VALUE || $type==AD_FUNC_TYPE_RESET)
		update_option(AD_ADS2_OPTIONS, $ads2->wp_options);
		
	if(get_option(AD_ADS3_OPTIONS)==AD_EMPTY_VALUE || $type==AD_FUNC_TYPE_RESET)
		update_option(AD_ADS3_OPTIONS, $ads3->wp_options);
	
	if(get_option(AD_ADS4_OPTIONS)==AD_EMPTY_VALUE || $type==AD_FUNC_TYPE_RESET)
		update_option(AD_ADS4_OPTIONS, $ads4->wp_options);
		
}		

//reset all the value
function ad_resetIt(){
	ad_DataInitialer(AD_FUNC_TYPE_RESET);	
}

//initial the unset value
function ad_initialIt(){
	ad_DataInitialer(AD_FUNC_TYPE_INITIAL);
}

function ad_admin_menu() {
	add_submenu_page('options-general.php', 'Adsense Daemon Options', 'Adsense Daemon', 8, basename(__FILE__), 'ad_menu');
}

function filter_weird_characters($str){
	
	$str = str_replace("\\\"", "\"", $str);
	return $str;
}

function ad_menu(){
   
	$ads1 = new Ads1();
	$ads2 = new Ads2();
	$ads3 = new Ads3();
	$ads4 = new Ads4();
	
	if (isset($_POST[AD_FORM_SAVE])) {
 
	    foreach(array_keys($ads1->wp_options) as $key){
	    	
	    	if(isset($_POST[$key])){
	    		$ads1->wp_options[$key] = filter_weird_characters($_POST[$key]);
	    	}
	    	
	    }

		foreach(array_keys($ads2->wp_options) as $key){

			if(isset($_POST[$key])){
	    		$ads2->wp_options[$key] = filter_weird_characters($_POST[$key]);
	    	}
	    	
	    }
	    
		foreach(array_keys($ads3->wp_options) as $key){
			
			if(isset($_POST[$key])){
	    		$ads3->wp_options[$key] = filter_weird_characters($_POST[$key]);
	    	}
	    	
	    }
	    
		foreach(array_keys($ads4->wp_options) as $key){
		
			if(isset($_POST[$key])){
	    		$ads4->wp_options[$key] = filter_weird_characters($_POST[$key]);
	    	}
	    	
	    }

		update_option(AD_ADS1_OPTIONS, $ads1->wp_options);
		update_option(AD_ADS2_OPTIONS, $ads2->wp_options);
		update_option(AD_ADS3_OPTIONS, $ads3->wp_options);
		update_option(AD_ADS4_OPTIONS, $ads4->wp_options);
		
		echo "<div id='message' class='updated fade'><strong><p>Updated Successful.</p></strong></div>";
		
		
  	}else if(isset($_POST[AD_FORM_CLEAR])){
	
        ad_resetIt();
		echo "<div id='message' class='error fade'><p>Settings Cleared.</p></div>";
		
  	}

  	//load options from db
  	$ads1->wp_options = get_option(AD_ADS1_OPTIONS);
  	$ads2->wp_options = get_option(AD_ADS2_OPTIONS);
  	$ads3->wp_options = get_option(AD_ADS3_OPTIONS);
  	$ads4->wp_options = get_option(AD_ADS4_OPTIONS);
  
  	$ad_array = array($ads1,$ads2,$ads3,$ads4);
  
  	print_ad_menu_form($ad_array);
  
}


function ad_content_hook($content = ''){

    if(!is_single())
       return $content;
    
    $ads1 = new Ads1();
	$ads2 = new Ads2();
	$ads3 = new Ads3();
	$ads4 = new Ads4();
	
  	//load options from db
  	$ads1->wp_options = get_option(AD_ADS1_OPTIONS);
  	$ads2->wp_options = get_option(AD_ADS2_OPTIONS);
  	$ads3->wp_options = get_option(AD_ADS3_OPTIONS);
  	$ads4->wp_options = get_option(AD_ADS4_OPTIONS);
  	 	
	$ad_all_data = array($ads1,$ads2,$ads3,$ads4);
  
	//get post published date
	$publish_date = the_date('Y-m-d','','',false);
	
	$http_referer = '';
	//get referer
	if(isset($_SERVER['HTTP_REFERER'])) {
	    $http_referer = $_SERVER['HTTP_REFERER'];
	}

	$content = generateAdsenseDaemonDiv($content, $ad_all_data, $publish_date, $http_referer);
	
    return $content;
}

function ad_isCategoryAllow($categorys){
	
	$categorys = trim(strtolower($categorys));
	
	//echo ' Categorys disabled : ' . $categorys; 
	
	if($categorys == AD_EMPTY_DATA){
		return true;
	}

	$cats_disabled = explode(",", strtolower($categorys));

	foreach((get_the_category()) as $post_category) { 
		
		//echo '<br/> post category name : ' . $post_category->cat_name; 
		
		foreach($cats_disabled as $cat_disabled){
			
			$post_category_name = strtolower($post_category->cat_name);
			
			//echo '<br/>Category disabled loop : ' . $cat_disabled . '<br/> category name : ' . $post_category_name;

			if($post_category_name==trim($cat_disabled)){
				//echo ' match';
				return false;
			}else{
				//echo ' not match';
			}
		}
	}
	return true;
}


function ad_OnlyDisplayInThisCategory($categorys){
	
	$categorys = trim(strtolower($categorys));
	
	//empty, display it
	if($categorys == AD_EMPTY_DATA){
		return true;
	}

	$cats_allowed = explode(",", strtolower($categorys));

	foreach((get_the_category()) as $post_category) { 
				
		foreach($cats_allowed as $cat_allowed){
			
			$post_category_name = strtolower($post_category->cat_name);
			
			if($post_category_name==trim($cat_allowed)){
				//display it
				return true;
			}else{
				//echo ' not match';
			}
		}
	}
	return false; //hide it
}

function ad_isAllowDisplayContent($obj, $content){
	
	if (preg_match("/" . $obj->get_ad_disable() . "/i", $content)) {
	    return false;
	} else {
	    return true;
	}
	
}

function ad_isAllowDisplayAfterDay($obj, $publish_date){
	
	$after_days = $obj->get_ad_after_day();
	$allow_date = mktime(0, 0, 0, date("m"), date("d")-$after_days, date("Y"));
	$allow_date = date('Y-m-d', $allow_date);
	
	/*print_r(" allow_date : " . $allow_date);
	print_r(" publish_date : " . $publish_date);
	print_r(" <br/>");*/
	
	//if 0, display immediately
	if(trim($after_days) == AD_ZERO_DATA){
		return true;
	}

	if($allow_date >= $publish_date){
		return true;
	}else{
		return false;
	}
		
}

function ad_isRefererAllow($obj, $http_referer){
	
	$websites = explode(",",$obj->get_ad_block_user());
	
	//echo "<br /> http_referer :" . $http_referer . " | " . $obj->get_ad_block_user();
	
	$referer_allow=true;
	
	foreach($websites as $referer){
		
		$referer = trim($referer);
		//echo "<br/> referer" . $referer;
		
		//avoid empty value
		if($referer==AD_EMPTY_DATA){
			continue;
		}
		
		if (preg_match("/" . $referer . "/i", $http_referer)) {
		//	echo " matched";
		    $referer_allow = false;
		}else{
		//	echo " not match";
		}
	
	}
	
	return $referer_allow;
		
}

function generateAdsenseDaemonDiv($content, $ad_all_data, $publish_date, $http_referer){
	
	foreach($ad_all_data as $obj){
		
		//if empty data, continue next
		if($obj->get_ad_data()==AD_EMPTY_DATA){
			continue;
		}
		
		if(ad_isAllowDisplayContent($obj, $content)==false){
			continue;
		}
		
		if(ad_isCategoryAllow($obj->get_ad_block_cat())==false){
			continue;
		}
		
		if(ad_OnlyDisplayInThisCategory($obj->get_ad_allow_cat())==false){
			continue;
		}
		
		if(ad_isAllowDisplayAfterDay($obj, $publish_date)==false){
			continue;
		}
		
		if(ad_isRefererAllow($obj, $http_referer)==false){
			continue;
		}
		
		if($obj->get_append_type() == AD_SELECT_LEFT_FLOAT){
			
			$content = ad_generateDivLeftFloat($content, $obj);
			
		}else if($obj->get_append_type() == AD_SELECT_RIGHT_FLOAT){
			
			$content = ad_generateDivRightFloat($content, $obj);
			
		}else if($obj->get_append_type() == AD_SELECT_BEFORE_CONTENT){
			
			$content = ad_generateDivBefore($content, $obj);
			
		}else if($obj->get_append_type() == AD_SELECT_AFTER_CONTENT){
			
			$content = ad_generateDivAfter($content, $obj);
			
		}else if($obj->get_append_type() == AD_SELECT_PARA1){
			
			$content = ad_generateDivPara($content, $obj, 1);
			
		}else if($obj->get_append_type() == AD_SELECT_PARA2){
			
			$content = ad_generateDivPara($content, $obj, 2);
			
		}else if($obj->get_append_type() == AD_SELECT_PARA3){
			
			$content = ad_generateDivPara($content, $obj, 3);
			
		}else if($obj->get_append_type() == AD_SELECT_PARA4){
			
			$content = ad_generateDivPara($content, $obj, 4);
			
		}else if($obj->get_append_type() == AD_SELECT_PARA5){
			
			$content = ad_generateDivPara($content, $obj, 5);
			
		}else if($obj->get_append_type() == AD_SELECT_PARA6){
			
			$content = ad_generateDivPara($content, $obj, 6);
			
		}else if($obj->get_append_type() == AD_SELECT_PARA7){
			
			$content = ad_generateDivPara($content, $obj, 7);
			
		}else if($obj->get_append_type() == AD_SELECT_PARA8){
			
			$content = ad_generateDivPara($content, $obj, 8);
			
		}else if($obj->get_append_type() == AD_SELECT_PARA9){
			
			$content = ad_generateDivPara($content, $obj, 9);
			
		}else if($obj->get_append_type() == AD_SELECT_PARA10){
			
			$content = ad_generateDivPara($content, $obj, 10);
			
		}
		else if($obj->get_append_type() == AD_SELECT_RADOM_PARA){
			
			$content = ad_generateDivRandomPara($content, $obj);
			
		}
	}
	
	$content .= AD_AUTHOR_SITE;
	
	return $content;
}


function ad_generateDivLeftFloat($content, $obj){
	
	return "<div style='float:left;padding:8px 8px 8px 0px;'>" . $obj->get_ad_data() . "</div>" . $content;
	
}

function ad_generateDivRightFloat($content, $obj){
	
	return "<div style='float:right;padding:8px 0px 8px 8px;'>" . $obj->get_ad_data() . "</div>" . $content;
	
}

function ad_generateDivBefore($content, $obj){
	
	return "<div>" . $obj->get_ad_data() . "</div>" . $content;
	
}

function ad_generateDivAfter($content, $obj){
	
	return $content . "<div>" . $obj->get_ad_data() . "</div>";
	
}

function ad_generateDivPara($content, $obj, $para){
	
	$poses = array();
    $poseslast = array();
	$lastpos = -1;

	$findchar = "<p>";
	if(strpos($content, "<p") === false)
	  $repchar = "<br";

	while(strpos($content, $findchar, $lastpos+1) !== false){
	  $lastpos = strpos($content, $findchar, $lastpos+1);
	  $poses[] = $lastpos;
	}

	if(sizeof($poses)>$para)
	{			
		
		$pickme = $poses[$para];
		
		$content = substr_replace($content,  "<div>" . $obj->get_ad_data() . "</div>", $pickme, 0);
				
		//reset it
		$lastpos = -1;
	}
		
	return $content;
	
}


function ad_generateDivRandomPara($content, $obj){
	
	$poses = array();
    $poseslast = array();
	$lastpos = -1;

	$findchar = "<p>";
	if(strpos($content, "<p") === false)
	  $repchar = "<br";

	while(strpos($content, $findchar, $lastpos+1) !== false){
	  $lastpos = strpos($content, $findchar, $lastpos+1);
	  $poses[] = $lastpos;
	}

	if(sizeof($poses)>1)
	{			
		$pickme = $poses[rand(0, sizeof($poses)-1)];
		
		$content = substr_replace($content,  "<div>" . $obj->get_ad_data() . "</div>", $pickme, 0);
				
		//reset it
		$lastpos = -1;
	}
		
	return $content;
	
}
?>