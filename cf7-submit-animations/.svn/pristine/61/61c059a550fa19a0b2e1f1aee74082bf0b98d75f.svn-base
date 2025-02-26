<?php
/*
 @package CF7SubmitAnimations

Plugin Name: CF7 Submit Animations
Description: Get rid of boring submit messages on Contact Form 7. Customizable Particle Effects animations for contact form 7.
Version: 1.3
Version Log: Added i18n Support
Requires at least: 5.0
Requires PHP: 7.1
Author: Grey Hatch
Author URI: https://www.greyhatch.com/
License: GPLv2 or later
Text Domain: cf7-submit-animations
*/

//TODO: Add a disable effects functionality in the plugin settings


defined('ABSPATH') or die("don't sneak around");

if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

function activate_wpcf7_submit_animations()
{
    Cf7subanimsinc\Base\Activate::activate();
}
function deactivate_wpcf7_submit_animations()
{
    Cf7subanimsinc\Base\Deactivate::deactivate();
}

register_activation_hook(__FILE__, 'activate_wpcf7_submit_animations');
register_deactivation_hook(__FILE__, 'deactivate_wpcf7_submit_animations');

if (class_exists('Cf7subanimsinc\\Init')) {
    Cf7subanimsinc\Init::register_services();
}
