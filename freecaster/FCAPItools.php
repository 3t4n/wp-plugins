<?php

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

// Load core API class
require_once(plugin_dir_path(__FILE__) . 'FCAPI.php');

// For PHP < 5.5
if (!function_exists('curl_file_create')) {
	function curl_file_create($filename, $mimetype = '', $postname = '') {
		return "@$filename;filename="
		       . ($postname ?: basename($filename))
		       . ($mimetype ? ";type=$mimetype" : '');
	}
}

////////////////////////
// API TOOLS CLASS
////////////////////////

class FCAPItools extends FreecasterPlugin
{

    public $factory;

    //	__ Public ___________________________________________________________________

    public function __construct()
    {
        $this->factory = new FCAPI(get_option('fc_apiusr'), get_option('fc_apikey'), get_option('fc_apiurl'));
    }

    public function SearchVideos($search = '') {

        try
        {

            if (!empty($search)) {

                $videos = $this->factory->get_videos($search);

            } else {

                $videos = $this->factory->get_videos(); // default call

            }

        }
        catch (Exception $e)
        {
            $apichk = array('error' => $e->getMessage());
        }

        if ( !empty($apichk['error']) ) {

            $fc_apichk  = '<img id="notice-icon" src="' . plugin_dir_url( __FILE__ ) . 'img/problem.png" />';
            $fc_apichk .= $apichk['error'];

            return json_encode(array('cnx' => 'offline', 'text' => $fc_apichk));

        } else {

            $fc_apichk  = '<img id="notice-icon" src="' . plugin_dir_url( __FILE__ ) . 'img/ok.png" />';
            $fc_apichk .= __('Connection established', 'freecaster') . ' !';

            return json_encode(array('cnx' => 'online', 'text' => $fc_apichk, 'videos' => $videos));

        }

    }

}

?>