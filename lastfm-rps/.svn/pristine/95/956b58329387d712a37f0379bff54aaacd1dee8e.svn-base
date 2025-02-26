<?php

/**
 * Last.fm RPS Widget
 *
 * Recently Played Songs (RPS) Widget that lists your recently listened songs on your sidebar with album or artist images and text.
 *
 * @package   lastfm-rps
 * @author    Taha PAKSU <tpaksu@gmail.com>
 * @license   GPL-2.0+
 * @link      http://tahapaksu.com
 * @copyright 2017 Taha PAKSU
 *
 * @wordpress-plugin
 * Plugin Name:       Last.fm RPS Widget
 * Plugin URI:        http://www.tahapaksu.com
 * Description:       Recently Played Songs (RPS) Widget that lists your recently listened songs on your sidebar with album or artist images and text.
 * Version:           2.0.0
 * Author:            Taha Paksu
 * Author URI:        http://www.tahapaksu.com
 * Text Domain:       lastfmrps
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /lang
 */

define("LASTFMRPS_FILE", __FILE__);
/**
 * Adds LastFmRPS widget.
 */
class LastFmRPS extends WP_Widget
{
    private $UI;
    /**
     * Register widget with WordPress.
     */
    public function __construct()
    {
        //add_action('init', array($this, 'lastfmrps'));
        //add_action('plugins_loaded', array($this, 'lastfmrps'));
        //add_action('sidebar_admin_setup', array($this, 'lastfmrps'));
        $this->lastfmrps();
        parent::__construct(
            'lastfm_rps', // Base ID
            __('Last.fm RPS Widget', 'lastfmrps'), // Name
            array(
                'description' => __('Recently Played Songs (RPS) Widget that lists your recently listened songs on your sidebar with album or artist images and text.', 'lastfmrps')
            ) // Args
        );
        $this->UI = new LastFMUserInterface();
        add_action('wp_enqueue_scripts', array($this, 'register_widget_styles'));
    }
    /**
     * Front-end style enqueueing of widget.
     *
     * @since 2.0.0
     */
    public static function register_widget_styles()
    {
        wp_enqueue_style('lastfmrps-widget-styles', plugins_url('css/style.css', __FILE__));
    }
    /**
     * Load plugin textdomain.
     *
     * @since 2.0.0
     */
    public static function lastfmrps()
    {
        load_plugin_textdomain("lastfmrps", false, dirname(plugin_basename(__FILE__)) . '/lang');
    }
    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget($args, $instance)
    {
        $title = apply_filters('widget_title', $instance['title']);
        echo $args["before_widget"];
        if (!empty($title)) {
            echo $args["before_title"] . $title . $this->UI->showLogo($instance) . $args["after_title"];
        }
        $this->UI->widget($args, $instance);
        echo $args["after_widget"];
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update($new_instance, $old_instance)
    {
        $new_instance = $_POST;
        $instance = [
            'user' => isset($new_instance['lastfm_recent_user']) ? strip_tags($new_instance['lastfm_recent_user']) : "",
            'title' => isset($new_instance['lastfm_recent_title']) ? strip_tags($new_instance['lastfm_recent_title']) : "",
            'size' => isset($new_instance['lastfm_recent_size']) ? intval($new_instance['lastfm_recent_size']) : 0,
            'position' => isset($new_instance['lastfm_recent_position']) ? (in_array($new_instance['lastfm_recent_position'], ["left", "right"]) ? $new_instance['lastfm_recent_position'] : "left") : "left",
            'footer_text' => isset($new_instance['lastfm_recent_footer_text']) ? wp_kses($new_instance['lastfm_recent_footer_text'], wp_kses_allowed_html()) : "",
            'header_text' => isset($new_instance['lastfm_recent_header_text']) ? wp_kses($new_instance['lastfm_recent_header_text'], wp_kses_allowed_html()) : "",
            'showbadge' => isset($new_instance['lastfm_recent_showbadge']),
            'badgeposition' => isset($new_instance['lastfm_recent_badgeposition']) ? (in_array($new_instance['lastfm_recent_badgeposition'], ["top", "bottom"]) ? $new_instance['lastfm_recent_badgeposition'] : "top") : "",
            "showavatar" => isset($new_instance['lastfm_recent_showavatar']),
            "showrealname" => isset($new_instance['lastfm_recent_showrealname']),
            "showgender" => isset($new_instance['lastfm_recent_showgender']),
            "showage" => isset($new_instance['lastfm_recent_showage']),
            "showcountry" => isset($new_instance['lastfm_recent_showcountry']),
            "showregister" => isset($new_instance['lastfm_recent_showregister']),
            "showtrackcount" => isset($new_instance['lastfm_recent_showtrackcount']),
            'color' => isset($new_instance['lastfm_recent_color']) ? (in_array($new_instance['lastfm_recent_color'], ["black", "white", "red"]) ? $new_instance['lastfm_recent_color'] : "black") : "black",
            'caching' => isset($new_instance['lastfm_recent_caching']),
            'cache_duration' => isset($new_instance['lastfm_recent_cache_duration']) ? intval($new_instance['lastfm_recent_cache_duration']) : 0
        ];
        update_option("lastfm_recent_scrobbles_expire_{$instance['user']}", 0);
        return $instance;
    }

    /**
     * Fired when the plugin is activated.
     *
     * @param  boolean $network_wide True if WPMU superadmin uses "Network Activate" action, false if WPMU is disabled or plugin is activated on an individual blog.
     */
    public static function activate($network_wide)
    {
        // TODO define activation functionality here
    }

    /**
     * Fired when the plugin is deactivated.
     *
     * @param boolean $network_wide True if WPMU superadmin uses "Network Activate" action, false if WPMU is disabled or plugin is activated on an individual blog
     */
    public static function deactivate($network_wide)
    {
        // TODO define deactivation functionality here

    } // end deactivate

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form($instance)
    {
        $this->UI->form($instance);
        return "";
    }
} // class Foo_Widget

add_action('widgets_init', create_function('', 'register_widget("LastFmRPS");'));
register_activation_hook(LASTFMRPS_FILE, array("LastFmRPS", 'activate'));
register_deactivation_hook(LASTFMRPS_FILE, array("LastFmRPS", 'deactivate'));

require_once "lib/lastfm_ui.php";

?>
