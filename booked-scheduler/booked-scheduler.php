<?php
/*
* Plugin Name:       Booked Scheduler
* Plugin URI:        https://www.bookedscheduler.com/wordpress-plugin
* Description:       Booked Scheduler in WordPress
* Version:           1.0.1
* Requires at least: 5.8
* Requires PHP:      8.0
* Author:            Twinkle Toes Software, LLC
* Author URI:        https://www.twinkletoessoftware.com
License:             GPL v3
License URI:         https://www.gnu.org/licenses/gpl-3.0.en.html
*/

/**
 * @copyright Copyright 2024 Twinkle Toes Software, LLC
 */

defined('ABSPATH') || exit;

define('BOOKED_SCHEDULER_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('BOOKED_SCHEDULER_PLUGIN_URL', plugin_dir_url( __FILE__ ));
define('BOOKED_SCHEDULER_PLUGIN_FILE',  __FILE__ );

function booked_activate()
{
    require_once BOOKED_SCHEDULER_PLUGIN_DIR . 'includes/class-booked-activator.php';
    Booked_Activator::activate();
}

register_activation_hook(__FILE__, 'booked_activate');


function booked_deactivate()
{
    require_once BOOKED_SCHEDULER_PLUGIN_DIR . 'includes/class-booked-activator.php';
    Booked_Activator::deactivate();
}

register_deactivation_hook(__FILE__, 'booked_deactivate');


require_once BOOKED_SCHEDULER_PLUGIN_DIR . 'includes/class-booked-plugin.php';
$booked = new Booked_Plugin();
$booked->run();
