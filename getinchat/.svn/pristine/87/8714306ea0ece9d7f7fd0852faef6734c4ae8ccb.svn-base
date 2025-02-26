<?php
/**
 * Plugin Name: GetInChat
 * Author: GetInChat
 * Author URI: https://getinchat.com
 * Description: With GetInChat you can chat with visitors on your website to increase conversion and sales
 * Version: 1.0.3
 *
 * Text Domain:   getinchat
 * Domain Path:   /languages/
 */

if (!defined('ABSPATH')) die("No script kiddies please!");

//define("GIC_DEBUG",true);

//load_plugin_textdomain('getinchat');
$lang = get_bloginfo("language");
//echo $lang;

if(defined('GIC_DEBUG')) {
    $gic_addr = 'http://localhost:8001';
    $gic_script_url = 'http://localhost:3000/assets/widget.js';
    }
    else
    {
    $gic_addr =    'https://www.getinchat.com';
    $gic_script_url = 'https://cdn.getinchat.com/assets/widget.js';
    };

define("GIC_URL",$gic_addr);
define("GIC_SCRIPT_URL",$gic_script_url);
define("GIC_PLUGIN_URL",plugin_dir_url(__FILE__));

add_action( 'plugins_loaded', 'getinchat_load_textdomain' );

function getinchat_load_textdomain() {
  load_plugin_textdomain( 'getinchat', false, basename( dirname( __FILE__ ) ) . '/languages/' );
}

register_activation_hook(__FILE__, 'getinchatInstall');
register_deactivation_hook(__FILE__, 'getinchatDelete');

function getinchat_admin_menu(){
    add_menu_page(__('GetInChat','getinchat'), __('GetInChat','getinchat'), 'edit_plugins', basename(__FILE__), 'getinchatPreferences',GIC_PLUGIN_URL."/img/getinchat-icon.png");
}

add_action('admin_menu', 'getinchat_admin_menu');

function getinchat_options_validate($args){
    return $args;
}

add_action('admin_init', 'getinchat_register_settings');
function getinchat_register_settings(){
    register_setting('getinchat_channel_id', 'getinchat_channel_id', 'getinchat_options_validate');
}

add_action('wp_footer', 'getinchatAppend', 100000);

function getinchatInstall(){
    return getinchat::getInstance()->install();
}

function getinchatDelete(){
    return getinchat::getInstance()->delete();
}

function getinchatAppend(){
    echo getinchat::getInstance()->append(
        getinchat::getInstance()->getId()
    );
}

function getinchatPreferences(){
    if(isset($_POST["channel_id"]))
        getinchat::getInstance()->save();

    //load_plugin_textdomain('getinchat');
    //load_plugin_textdomain( 'getinchat', false, basename( dirname( __FILE__ ) ) . '/languages/' );

    wp_register_style('getinchat_style', plugins_url('getinchat.css', __FILE__));
    wp_enqueue_style('getinchat_style');

    echo getinchat::getInstance()->render();
}

class getinchat {

    protected static $instance, $db, $table, $lang;

    private function __construct(){
        $this->channels = get_option( 'getinchat_channels');
        $this->channel_id = get_option( 'getinchat_channel_id');
        $this->gic_setup_step = get_option( 'gic_setup_step');
    }
    private function __clone()    {}
    private function __wakeup()   {}

    private $channel_id = '';
    private $gic_setup_step = 0;

    public static function getInstance() {

        if ( is_null(self::$instance) ) {
            self::$instance = new getinchat();
        }
        self::$lang     = "en";
        if(isset($_GET["lang"])){
            switch ($_GET["lang"]) {
                case 'ru':  self::$lang     = "ru"; break;
                default:    self::$lang     = "en"; break;
            }
        }
        return self::$instance;
    }

    public function setID($id){
        $this->channel_id = $id;
    }

    public function setToken($token){
        $this->token = $token;
    }

    public function install() {
        $this->gic_setup_step = 0;
        $this->save();
        /*

        if (!$this->channel_id) {
            $default_channel_id ='';
            if (file_exists(realpath(dirname(__FILE__))."/id") ){
                $default_channel_id = file_get_contents(realpath(dirname(__FILE__))."/id");
            }
        }
        $this->channel_id = $default_channel_id;
        $this->save();
        */
    }

    public function catchPost(){
        if(isset($_GET['mode'])&&$_GET['mode']=='reset'){
            $this->channel_id = '';
            $this->gic_setup_step = 0;
            $this->save();
        }
        if(isset($_POST['channel_id'])){
            $this->channel_id = $_POST['channel_id'];
            $this->save();
        }elseif(isset($_POST['username'])&&isset($_POST['password'])){
            $query = $_POST;
    				$content = http_build_query($query);

            if(ini_get('allow_url_fopen')){
                $useCurl = false;
            }elseif(!extension_loaded('curl')) {
                if (!dl('curl.so')) {
                    $useCurl = false;
                } else {
                    $useCurl = true;
                }
            } else {
                $useCurl = true;
            }


						try{
                $path = GIC_URL."/integration/wordpress/";
                if(!extension_loaded('openssl')){
                    $path = str_replace('https:','http:',$path);
                }
                if($useCurl){

                    if ( $curl = curl_init() ) {
                        curl_setopt($curl, CURLOPT_URL, $path);
                        curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
                        curl_setopt($curl, CURLOPT_POST, true);
                        curl_setopt($curl, CURLOPT_POSTFIELDS, $content);
                        $responce = curl_exec($curl);
                        curl_close($curl);
                    }
                } else {
                    $responce = file_get_contents(
                        $path,
                        false,
                        stream_context_create(
                            array(
                                'http' => array(
                                    'method' => 'POST',
                                    'header' => 'Content-Type: application/x-www-form-urlencoded',
                                    'content' => $content
                                ),
                                'ssl' => array(
                                  'verify_peer' => false
                              )
                            )
                        )
                    );
}
                if ($responce) {
												$json_data = json_decode($responce);

												if($json_data->success == False)
												{
													return array("error"=>$json_data->error);
												} else {

                        //$this->channel_id = $json_data->channel_id;
                        $this->channels = $json_data->channels;
                        $this->gic_setup_step = 1;
                        $this->save();
						return true;
                    }
                }
            } catch (Exception $e) {
                _e("Connection error",'getinchat');
            }
        }

    }

    public function delete(){

    }


    public function getId(){
        return $this->channel_id;
    }

    public function render(){
        $result = $this->catchPost();
        $error = '';
        $channel_id = $this->channel_id;
        $gic_setup_step = $this->gic_setup_step;

        if (is_array($result)&&isset($result['error'])) {
            $error = $result['error'];
        }

            if (ini_get('allow_url_fopen')) {
                $requirementsOk = true;
            } elseif(!extension_loaded('curl')) {
                if (!dl('curl.so')) {
                    $requirementsOk = false;
                } else {
                    $requirementsOk = true;
                }
            } else {
                $requirementsOk = true;
            }

            if ($requirementsOk) {
				require_once "templates/page.php";
            }else{
                require_once "templates/error.php";
            }
    }

    public function append($channel_id = false){
        if($channel_id)
            require_once "templates/script.php";
    }

    public function save(){
        do_settings_sections( __FILE__ );

        update_option('getinchat_channels',$this->channels);
        update_option('getinchat_channel_id',$this->channel_id);
        update_option('gic_setup_step',$this->gic_setup_step);
    }

}
