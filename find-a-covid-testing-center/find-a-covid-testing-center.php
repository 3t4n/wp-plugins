<?php
/*
Plugin Name: Find A Covid Testing Center
Plugin URI: https://wordpress.org/plugins/find-a-covid-testing-center/
Author: Covid Testing Centers
Contributors: covidtestingcenters, brainstormforce, rushijagani
Author URI: https://www.covidtestingcenters.com
Description: Add Covid testing Centers Search To Your Website With A Shortcode. [ctc_search] , [ctc_live_search], [ctc_search_button]
Version: 1.0.2
Text Domain: find-a-covid-testing-center
*/

// plugin constants
define('FIND_A_COVID_TESTING_CENTER_VERSION', '1.0.2');
define('FIND_A_COVID_TESTING_CENTER_DIR', plugin_dir_path( __FILE__ ));
define('FIND_A_COVID_TESTING_CENTER_URL', plugins_url( '', __FILE__ ));
// plugin functionality files
require FIND_A_COVID_TESTING_CENTER_DIR.'/public/includes/result-template.php';
require FIND_A_COVID_TESTING_CENTER_DIR. '/public/includes/shortcode.class.php';
require FIND_A_COVID_TESTING_CENTER_DIR.'/public/includes/assets.class.php';