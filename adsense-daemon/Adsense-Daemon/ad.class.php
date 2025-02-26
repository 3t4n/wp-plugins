<?php

require_once 'ad.constant.php';

abstract class BaseAdsenseDaemon {
	
    // define properties
    var $wp_options;
    
    var $option_append_type;
	var $option_ad_data;
	var $option_ad_name;
	var $option_ad_after_day;
	var $option_ad_block_user;
	var $option_ad_disabled;
	var $option_ad_block_cat;
    var $option_ad_allow_cat;
	
    function BaseAdsenseDaemon() {
    	$this->wp_options = array();
    	$this->wp_options[$this->option_append_type] = AD_SELECT_NONE;
    	$this->wp_options[$this->option_ad_data] = AD_EMPTY_DATA;
    	$this->wp_options[$this->option_ad_after_day] = AD_ZERO_DATA;
    	$this->wp_options[$this->option_ad_block_user] = AD_EMPTY_DATA;
    	$this->wp_options[$this->option_ad_disabled] = AD_EMPTY_DATA;
    	$this->wp_options[$this->option_ad_block_cat] = AD_EMPTY_DATA;
    	$this->wp_options[$this->option_ad_allow_cat] = AD_EMPTY_DATA;
    }
    
	public function get_append_type(){
    	return $this->wp_options[$this->option_append_type];
    }
    
	public function get_ad_data(){
    	return $this->wp_options[$this->option_ad_data];
    }
    
	public function get_ad_after_day(){
    	return $this->wp_options[$this->option_ad_after_day];
    }
    
	public function get_ad_block_user(){
    	return $this->wp_options[$this->option_ad_block_user];
    }
    
	public function get_ad_name(){
    	return $this->option_ad_name;
    }
    
	public function get_ad_disable(){
    	return $this->wp_options[$this->option_ad_disabled];
    }
    
	public function get_ad_block_cat(){
    	return $this->wp_options[$this->option_ad_block_cat];
    }
    
	public function get_ad_allow_cat(){
    	return $this->wp_options[$this->option_ad_allow_cat];
    }
    	
}

class Ads1 extends BaseAdsenseDaemon{
	
	const OPTION_AD_NAME = "#1. Daemon Template";
	const OPTION_APPEND_TYPE = "ad1_appendType";
	const OPTION_AD_DATA = "ad1_data";
	const OPTION_AD_AFTER_DAY = "ad1_after_day";
	const OPTION_AD_BLOCK_USER = "ad1_block_user";
	const OPTION_AD_DISABLE = "ad1_disabled";
	const OPTION_AD_BLOCK_CAT = "ad1_block_cat";
	const OPTION_AD_ALLOW_CAT = "ad1_allow_cat";
	
	//constructor
    public function Ads1() {
    	$this->option_ad_name = self::OPTION_AD_NAME;
    	$this->option_append_type = self::OPTION_APPEND_TYPE;
    	$this->option_ad_data = self::OPTION_AD_DATA;
    	$this->option_ad_after_day = self::OPTION_AD_AFTER_DAY;
    	$this->option_ad_block_user = self::OPTION_AD_BLOCK_USER;
    	$this->option_ad_disabled = self::OPTION_AD_DISABLE;
    	$this->option_ad_block_cat = self::OPTION_AD_BLOCK_CAT;
    	$this->option_ad_allow_cat = self::OPTION_AD_ALLOW_CAT;
        parent::BaseAdsenseDaemon();
        
        $this->wp_options[$this->option_ad_disabled] = AD_DISABLED_1;
    } 
    
}

class Ads2 extends BaseAdsenseDaemon{
	
	const OPTION_AD_NAME = "#2. Daemon Template";
	const OPTION_APPEND_TYPE = "ad2_appendType";
	const OPTION_AD_DATA = "ad2_data";
    const OPTION_AD_AFTER_DAY = "ad2_after_day";
	const OPTION_AD_BLOCK_USER = "ad2_block_user";
	const OPTION_AD_DISABLE = "ad2_disabled";
	const OPTION_AD_BLOCK_CAT = "ad2_block_cat";
	const OPTION_AD_ALLOW_CAT = "ad2_allow_cat";
	
	//constructor
    public function Ads2() {
    	$this->option_ad_name = self::OPTION_AD_NAME;
    	$this->option_append_type = self::OPTION_APPEND_TYPE;
    	$this->option_ad_data = self::OPTION_AD_DATA;
    	$this->option_ad_after_day = self::OPTION_AD_AFTER_DAY;
    	$this->option_ad_block_user = self::OPTION_AD_BLOCK_USER;
    	$this->option_ad_disabled = self::OPTION_AD_DISABLE;
    	$this->option_ad_block_cat = self::OPTION_AD_BLOCK_CAT;
    	$this->option_ad_allow_cat = self::OPTION_AD_ALLOW_CAT;
        parent::BaseAdsenseDaemon();
        
        $this->wp_options[$this->option_ad_disabled] = AD_DISABLED_2;
    } 
    
}


class Ads3 extends BaseAdsenseDaemon{
	
	const OPTION_AD_NAME = "#3. Daemon Template";
	const OPTION_APPEND_TYPE = "ad3_appendType";
	const OPTION_AD_DATA = "ad3_data";
	const OPTION_AD_AFTER_DAY = "ad3_after_day";
	const OPTION_AD_BLOCK_USER = "ad3_block_user";
	const OPTION_AD_DISABLE = "ad3_disabled";
	const OPTION_AD_BLOCK_CAT = "ad3_block_cat";
	const OPTION_AD_ALLOW_CAT = "ad3_allow_cat";
	
	//constructor
    public function Ads3() {
    	$this->option_ad_name = self::OPTION_AD_NAME;
    	$this->option_append_type = self::OPTION_APPEND_TYPE;
    	$this->option_ad_data = self::OPTION_AD_DATA;
    	$this->option_ad_after_day = self::OPTION_AD_AFTER_DAY;
    	$this->option_ad_block_user = self::OPTION_AD_BLOCK_USER;
    	$this->option_ad_disabled = self::OPTION_AD_DISABLE;
    	$this->option_ad_block_cat = self::OPTION_AD_BLOCK_CAT;
    	$this->option_ad_allow_cat = self::OPTION_AD_ALLOW_CAT;
        parent::BaseAdsenseDaemon();
        
        $this->wp_options[$this->option_ad_disabled] = AD_DISABLED_3;
    } 
    
}

class Ads4 extends BaseAdsenseDaemon{
	
	const OPTION_AD_NAME = "#4. Daemon Template";
	const OPTION_APPEND_TYPE = "ad4_appendType";
	const OPTION_AD_DATA = "ad4_data";
	const OPTION_AD_AFTER_DAY = "ad4_after_day";
	const OPTION_AD_BLOCK_USER = "ad4_block_user";
	const OPTION_AD_DISABLE = "ad4_disabled";
	const OPTION_AD_BLOCK_CAT = "ad4_block_cat";
	const OPTION_AD_ALLOW_CAT = "ad4_allow_cat";
	
	//constructor
    public function Ads4() {
    	$this->option_ad_name = self::OPTION_AD_NAME;
    	$this->option_append_type = self::OPTION_APPEND_TYPE;
    	$this->option_ad_data = self::OPTION_AD_DATA;
    	$this->option_ad_after_day = self::OPTION_AD_AFTER_DAY;
    	$this->option_ad_block_user = self::OPTION_AD_BLOCK_USER;
    	$this->option_ad_disabled = self::OPTION_AD_DISABLE;
    	$this->option_ad_block_cat = self::OPTION_AD_BLOCK_CAT;
    	$this->option_ad_allow_cat = self::OPTION_AD_ALLOW_CAT;
        parent::BaseAdsenseDaemon();
        
        $this->wp_options[$this->option_ad_disabled] = AD_DISABLED_4;
    } 
    
}
?>