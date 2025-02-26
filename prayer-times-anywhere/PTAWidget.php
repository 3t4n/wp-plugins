<?php
/*
Plugin Name: Prayer times anywhere
Version: 2.0.1
Plugin URI: https://wordpress.org/plugins/prayer-times-anywhere/
Description: Show prayer start time based on your current location in any Language.
Author: mmrs151
Author URI: http://mmrs151.tumblr.com/
*/

require_once('Views/PrayerTimePrinter.php');

class PTA_Widget extends WP_Widget
{
    /** @var PrayerTimePrinter */
    private $printer;

    public function __construct()
    {
        $this->add_stylesheet();
        $this->printer = new PrayerTimePrinter();

        $widget_details = array(
            'className' => 'PTA_Widget',
            'description' => 'Display prayer start time based on your current location'
        );
        parent::__construct('PrayerTimesAnywhere', 'Prayer times anywhere', $widget_details);
    }

    public function form($instance)
    {
        include 'Views/WidgetForm.php'; ?>

        <div class='mfc-text'></div>

        <?php
        echo $args['after_widget'];
        echo "</br><a href='http://edgwareict.org.uk/' target='_blank'>Support EICT</a></br></br>";
    }

    public function widget($args, $instance)
    {
        echo $args['before_widget'];

        include 'Models/WidgetProcessing.php';

        echo $args['after_widget'];
    }

    public function update($new_instance, $old_instance)
    {
        return $new_instance;
    }

    public function add_stylesheet()
    {
        wp_register_style('prayer-time-style', plugins_url('Assets/styles.css', __FILE__));
        wp_enqueue_style('prayer-time-style');
    }
}

add_action('widgets_init', 'init_pta_widget');
function init_pta_widget()
{
    register_widget('PTA_Widget');
}

#====================== SHORTCODE =============================#
$ptaPrinter = new PrayerTimePrinter();
add_shortcode( 'print_pta', array($ptaPrinter, 'print') );
#==============================================================#

###############################################
# MENU PAGES #
###############################################
function plugin_options_page()
{
    include('Views/Prayer-Anywhere-Settings.php');
}
add_action('admin_menu', "prayer_times_settings");
function prayer_times_settings()
{
    add_options_page('Prayer Times Anywhere', 'Prayer anywhere', 'manage_options', 'PrayerAnywhere', 'plugin_options_page');
}
##########################################################
# DEACTIVATION #
##########################################################
register_deactivation_hook(__FILE__, 'p_t_a_Uninstall');

function p_t_a_Uninstall()
{
    delete_option('p_t_a_prayersLocal');
    delete_option('p_t_a_numbersLocal');
}
