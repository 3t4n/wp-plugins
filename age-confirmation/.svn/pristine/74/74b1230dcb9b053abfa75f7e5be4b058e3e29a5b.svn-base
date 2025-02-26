<?php
/*
Plugin Name: Confirm Age
Plugin URI: http://blogwordpress.ws/plugin-confirm-age
Description: Plugin that displays an age confirmation page on home of your blog
Author: Anderson Makiyama
Version: 0.1
Author URI: http://blogwordpress.ws
*/

if(!isset($_SESSION)) {
     session_start();
}

class Anderson_Makiyama_Confirm_Age{
	const CLASS_NAME = 'Anderson_Makiyama_Confirm_Age';
	public static $CLASS_NAME = self::CLASS_NAME;
	const PLUGIN_ID = 3;
	public static $PLUGIN_ID = self::PLUGIN_ID;
	const PLUGIN_NAME = 'Confirm Age';
	public static $PLUGIN_NAME = self::PLUGIN_NAME;
	const PLUGIN_PAGE = 'http://blogwordpress.ws/plugin-confirm-age';
	public static $PLUGIN_PAGE = self::PLUGIN_PAGE;
	const PLUGIN_VERSION = '0.1';
	public static $PLUGIN_VERSION = self::PLUGIN_VERSION;
	public $plugin_slug = "anderson_makiyama_";
	public $plugin_base_name;
	
    public function getStaticVar($var) {
        return self::$$var;
    }	
	
	public function __construct(){
		$this->plugin_base_name = plugin_basename(__FILE__);
		$this->plugin_slug.= str_replace(" ","_",self::PLUGIN_NAME);

	}
	
	public function verify_age(){
		
		if(is_home()){
			$confirm = isset($_POST["confirm_18"])?$_POST["confirm_18"]:'';
			$confirm_page = plugins_url( 'templates/index.php', __FILE__ ) . "?url=" . get_bloginfo('url');
			
			if(isset($_SESSION["anderson_makiyama_confirm_age"]) && $_SESSION["anderson_makiyama_confirm_age"]=='yes'){
				
			}else{
				switch($confirm){
					case "no":
						header("Location: " . self::PLUGIN_PAGE);exit;	
					break;
					case "":
						header("Location: $confirm_page");exit;
					break;
					default:
						$_SESSION["anderson_makiyama_confirm_age"] = "yes";	
				}
			}
		}
	}

}
if(!isset($anderson_makiyama)) $anderson_makiyama = array();
$anderson_makiyama_indice = Anderson_Makiyama_Confirm_Age::PLUGIN_ID;

$anderson_makiyama[$anderson_makiyama_indice] = new Anderson_Makiyama_Confirm_Age();

add_action("wp_head", array($anderson_makiyama[$anderson_makiyama_indice]->getStaticVar('CLASS_NAME'), 'verify_age'));
?>