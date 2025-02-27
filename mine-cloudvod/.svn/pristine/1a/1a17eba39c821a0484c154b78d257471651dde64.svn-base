<?php
/**
 * Plugin Name: Mine CloudVod
 * Plugin URI:  https://www.zwtt8.com/
 * Description: Mine CloudVod is an audio and video player, which can play videos from local and cloud. And it is also a complete learning management system, which can help you create an online education website very conveniently.
 * Version: 2.0.2
 * Author: mine27
 * Author URI: https://www.zwtt8.com/
 * Text Domain: mine-cloudvod
 * Domain Path: /languages/
 */
// error_reporting(0);
defined( 'ABSPATH' ) || exit;
@date_default_timezone_set(wp_timezone_string());
define('MINECLOUDVOD_VERSION', '2.0.2');
define('MINECLOUDVOD_PATH', dirname(__FILE__));

require MINECLOUDVOD_PATH.'/inc/constants.php';
require MINECLOUDVOD_PATH.'/autoload.php';
// require MINECLOUDVOD_PATH.'/csf/csf.php';
require MINECLOUDVOD_PATH.'/inc/functions.php';
require MINECLOUDVOD_PATH.'/inc/functions-lms.php';

#[AllowDynamicProperties]
class MCVClasses{
    public $Dplayer = null
    , $Aliplayer = null
    , $Tcplayer = null
    , $Audioplayer = null
    , $Playlist = null
    , $Dogecloud = null
    , $Alivod = null
    , $Alilive = null
    , $Tcvod = null
    , $Tccos = null
    , $Alioss = null
    , $Addons = null;
    public function __construct(){
        
        new MineCloudvod\Assets();
        new MineCloudvod\MineCloudVod();
        new MineCloudvod\Admin();
        $this->Addons = new MineCloudvod\Addons();
        new MineCloudvod\RestApi\LMS\Addons();

        if( MINECLOUDVOD_SETTINGS['players']['aliplayer'] ?? true ){
            $this->Aliplayer    = new MineCloudvod\Aliyun\Aliplayer();
        }
        if( MINECLOUDVOD_SETTINGS['players']['dplayer'] ?? true ){
            $this->Dplayer      = new MineCloudvod\Blocks\Dplayer();
        }
        if( MINECLOUDVOD_SETTINGS['players']['playlist'] ?? true ){
            $this->Playlist     = new MineCloudvod\Blocks\PlayList();
        }
        if( MINECLOUDVOD_SETTINGS['players']['aplayer'] ?? true ){
            $this->Audioplayer  = new MineCloudvod\Blocks\AudioPlayer();
        }
        if( MINECLOUDVOD_SETTINGS['players']['embed'] ?? true ){
            new MineCloudvod\Blocks\EmbedVideo();
        }
        new MineCloudvod\Ability\PostType();
        new MineCloudvod\Ability\Note();
        new MineCloudvod\Ability\Shortcode();
        new MineCloudvod\Ability\Plugin();
        new MineCloudvod\Ability\Ajax();
        new MineCloudvod\Ability\ClassicEditor();
        new MineCloudvod\Ability\Filters();

        new MineCloudvod\RestApi\PostTypeVideo();
        
        if( !isset( MINECLOUDVOD_SETTINGS['mcv_lms']['status'] ) || MINECLOUDVOD_SETTINGS['mcv_lms']['status'] ){
            new MineCloudvod\LMS\Init();
        }
        new \MineCloudvod\Payment\Options();
        include MINECLOUDVOD_PATH.'/csf/csf.php';
    }
}
global $mcv_classes, $McvApi;
$mcv_classes = null;
$McvApi = new MineCloudvod\MineCloudVodAPI();
if(!$mcv_classes) $mcv_classes = new MCVClasses();