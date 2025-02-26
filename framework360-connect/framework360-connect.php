<?php
/*
Framework360 Connect is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Framework360 Connect is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Framework360 Connect. If not, see https://www.gnu.org/licenses/gpl-2.0.html.

Plugin Name: Framework360 Connect
Plugin URI: https://wordpress.org/plugins/framework360-connect/
Description: It allows to synchronize data with Framework360.
Author: Framework360
Version: 1.0.1
Requires PHP: 5.6
Author URI: https://profiles.wordpress.org/framework360
License: GPL v2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: framework360-connect
Domain Path: /languages
*/

define( 'FW360_DIR',  plugin_dir_path( __FILE__ ));
define( 'FW360_URI', plugin_dir_url( __FILE__ ));
define( 'FW360_BASENAME', plugin_basename(__FILE__));

class Fw360Connect {
    function __construct() {

        // Imposto i Cronjob
        add_action( 'init_crons', [(new \Fw360Connect\customers()), 'syncCustomers'], 10, 1 );
        $this->initCron();

        foreach((new Fw360Connect\settings())->getSyncData() as $syncID => $syncData) {
            $syncData['init']();
        }

        add_action('plugins_loaded', array($this, 'initLanguages'));
    }

    public function initCron() {
        // Aggiungo 'ogni minuto' tra gli intervalli dei cron
        add_filter('cron_schedules', function ( $schedules ) {
            $schedules['everyminute'] = array('interval' => 60, 'display' => __('Every Minute'));
            return $schedules;
        });

        // Registro il cronjob di sincronizzazione
        add_action('wp', function () {
            if(!wp_next_scheduled ('init_crons')) {
                wp_schedule_single_event(time() + 60, 'init_crons');
            }
        });
    }


    public function initLanguages() {
        load_plugin_textdomain( 'framework360-connect', "", dirname( plugin_basename( __FILE__ ) )  . '/languages/' );
    }
}

array_map(function($path) {
    include($path);
}, glob(__DIR__ . '/classes/*.php'));

$Fw360Connect = new Fw360Connect();
$Fw360Settings = new Fw360Connect\settings();

$Fw360Settings->init();