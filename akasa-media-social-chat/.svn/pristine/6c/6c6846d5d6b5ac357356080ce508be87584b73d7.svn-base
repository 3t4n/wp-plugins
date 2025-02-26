<?php

/*
Plugin Name: Akasa Media Social chat
Description: Plugins create custom Akasa Media Social for website support live chat
Author: AKasa team WP
Version: 1.6
Author URI: https://www.facebook.com/lycan9x
*/

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

$GLOBALS['msdir'] = dirname(__FILE__);

class Akasa_media_social
{
	public $Startname;

	public $urlplugins;

	public $dirplugins;

	public $default_headers;

	function __construct()
	{


		$this->urlplugins=plugin_dir_url(__FILE__);
		$this->dirplugins=plugin_dir_path(__FILE__);
		$this->Startname="LC_social_";

		$this->default_headers=get_plugin_data(__FILE__, $markup = true, $translate = true );

		$this->_init();

	}

	public function _init(){

		add_action('after_setup_theme',array($this,'plugins_after_setup_theme'));
	
	
	
		


	}

	public function plugins_after_setup_theme(){

		$this->get_dir_plugin();
		$this->static_media_social();

	}

	
	public function static_media_social(){

	foreach (glob($this->dirplugins."static/css/*.css") as $filename)
			{
				wp_enqueue_style('media-social-'.basename($filename,'.css'),$this->urlplugins.'static/css/'.basename($filename), '');

			}


	foreach (glob($this->dirplugins."static/js/*.js") as $filename)
			{
				wp_enqueue_script('media-social-js-'.basename($filename,'.js'),$this->urlplugins.'static/js/'.basename($filename), array('jquery'));
			}



	}
	public function get_dir_plugin(){


		$directories = glob(dirname(__FILE__) . '/*' , GLOB_ONLYDIR);

	
	foreach (glob(dirname(__FILE__)."/controller/*.php") as $filename)
		{
	    require $filename;

	    $nameclass=$this->Startname.basename($filename,'.php');

	    new $nameclass();
		}

	}

	public function views($file=null,$data=array()){

		global $msdir;

		$file=basename($file,'.php');

		$dirfile=$msdir.'/views/'.$file.'.php'
		;
		if(file_exists($dirfile)){

	extract($data);

			include $dirfile;

		

			ob_start();

			$content=ob_get_contents();

			ob_clean();

			echo $content;

		}

	}
}

function akasa_ms(){
	$ams=new Akasa_media_social();
	return $ams;
}
$ams=akasa_ms();
