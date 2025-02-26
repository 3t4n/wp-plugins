<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    WP_ABL_Plugin
 * @subpackage WP_ABL_Plugin/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    WP_ABL_Plugin
 * @subpackage WP_ABL_Plugin/public
 * @author     Your Name <email@example.com>
 */
class WP_ABL_Plugin_Public {
	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $WP_ABL_Plugin    The ID of this plugin.
	 */
	private $WP_ABL_Plugin;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $WP_ABL_Plugin       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $WP_ABL_Plugin, $version ) {

		$this->WP_ABL_Plugin = $WP_ABL_Plugin;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->WP_ABL_Plugin, plugin_dir_url( __FILE__ ) . 'css/wp-abl-plugin-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( $this->WP_ABL_Plugin, plugin_dir_url( __FILE__ ) . 'js/wp-abl-plugin-public.js', array( 'jquery' ), $this->version, false );

	}
    
    public function abl_button_shortcode(){
        function abl_button($atts){
            $options = get_option( 'wp_abl_plugin_settings' );
            $atts = shortcode_atts( array('label' => 'Book Now', 'merchant' => '', 'activity' => '', 'event' => '', 'style' => ''), $atts, 'abl-button' );
            $merchant = '';
            $event = '';
            if( isset($options['wp_abl_plugin_settings_public_key']) ){
                $atts['merchant'] = $options['wp_abl_plugin_settings_public_key'];
                $merchant = 'data-merchant="'.$atts['merchant'].'"';
            }else{
                $merchant = 'data-merchant="'.$atts['merchant'].'"';
            }
            if(isset( $atts['event'] ) && $atts['event'] != ''){
                $event = 'data-event="'.$atts['event'].'"';
            }
            $output = '<style type="text/css">.abl-activity-button{font-family:"Helvetica Neue",Helvetica,Arial,sans-serif; max-width:100% !important;width:auto !important;cursor:pointer;display:inline-block;font-size:14px;height:42px;background-color:#000000;color:#ffffff !important;border:1px solid 000000;text-decoration:none !important;padding-top:px;padding-right:15px;padding-bottom:0px;padding-left:15px;line-height:42px;border-top-left-radius:4px;border-top-right-radius:4px;border-bottom-right-radius:4px;border-bottom-left-radius:4px;box-shadow:0 2px 0 rgba(0, 0, 0, 0.045);-webkit-border-top-left-radius:4px;-webkit-border-top-right-radius:4px;-webkit-border-bottom-right-radius:4px;-webkit-border-bottom-left-radius:4px;-moz-border-top-left-radius:4px;-moz-border-top-right-radius:4px;-moz-border-bottom-right-radius:4px;-moz-border-bottom-left-radius:4px;}.abl-widget-booknow:hover{text-decoration:none !important;opacity: 0.8}.abl-widget-booknow:active{transform: translateY(1px)}.abl-widget-booknow i{display:inline-block}</style>' . 
            '<a class="abl-activity-button activity-button '.$atts['style'].'" style="cursor:pointer !important" '.$merchant.' data-activity="'.$atts['activity'].'" '.$event.'>'.$atts['label'].'</a>';
            return $output;
        }
        add_shortcode("abl-button", "abl_button");
    }
    
    public function abl_redirect_shortcode(){
        function abl_redirect($atts){
            $options = get_option( 'wp_abl_plugin_settings' );
            $atts = shortcode_atts( array('label' => 'Book Now', 'merchant' => '', 'activity' => '', 'event' => '', 'style' => ''), $atts, 'abl-redirect' );
            $merchant = '';
            $activity = '';
            $event = '';
            if( isset($options['wp_abl_plugin_settings_public_key']) ){
                $atts['merchant'] = $options['wp_abl_plugin_settings_public_key'];
            }
            if(isset( $atts['activity'] ) && $atts['activity'] != ''){
                $activity = '/activity/'.$atts['activity'];
            }
            if(isset( $atts['event'] ) && $atts['event'] != ''){
                $event = '/event/'.$atts['event'];
            }
            $link = ABL_ENV_URL_REDIRECT . '#/merchant/' . $atts['merchant'];
            if($activity != ''){
                $link .= $activity;
            }
            if($event != ''){
                $link .= $event;
            }
            return '<a class="abl-activity-button ' . $atts['style'] . '" target="_blank" href="' . $link . '">' . $atts['label'] . '</a>';
        }
        add_shortcode("abl-redirect", "abl_redirect");
    }
    
    public function abl_widget_shortcode(){
        function abl_widget($atts){
            $options = get_option( 'wp_abl_plugin_settings' );
            $width = '';
            $height = '';
            $atts = shortcode_atts( array('merchant' => '', 'width' => '1001', 'height' => '503'), $atts, 'abl-widget' );
            if( isset($options['wp_abl_plugin_settings_public_key']) ){
                $atts['merchant'] = $options['wp_abl_plugin_settings_public_key'];
            }
            if(isset( $atts['width'] ) && $atts['width'] != ''){
                $width = $atts['width'];
            }
            if(isset( $atts['height'] ) && $atts['height'] != ''){
                $height = $atts['height'];
            }
            return '<iframe frameborder="0" scrolling="no" width="' . $width . '" height="' . $height . '"
  src="'.ABL_ENV_URL_WIDGET.'iframe.html?merchant='.$atts['merchant'].'"></iframe>';
        }
        add_shortcode("abl-widget", "abl_widget");
    }
    
    public function abl_calendar_shortcode(){
        
        function abl_calendar_assets() {
            wp_enqueue_style('abl-css', ABL_ENV_URL_LOADER . 'styles.css');
            wp_enqueue_script('abl-js', ABL_ENV_URL_LOADER . 'scripts.js', array( 'jquery'), '1.0.1', false);
        }
        function abl_calendar($atts){
            $options = get_option('wp_abl_plugin_settings');
            $merchant = '';
            $activity = '';
            $event = '';
            $date = '';
            $id = '';
            $type = '';
            $object = '';
            $width = '';
            $height = '';
            $label = '';
            $atts = shortcode_atts( array('merchant' => '', 'activity' => '', 'event' => '', 'date' => '', 'type' => 'embedded', 'id' => '', 'label' => '', 'width' => '100%', 'height' => '1200px'), $atts, 'abl-calendar' );
            if( isset($options['wp_abl_plugin_settings_public_key']) ){
                $atts['merchant'] = $options['wp_abl_plugin_settings_public_key'];
            }
            if(isset( $atts['merchant'] ) && $atts['merchant'] != ''){
                $merchant = $atts['merchant'];
                $object .= '{merchant:\'' . $merchant . '\'';
            }
            if(isset( $atts['activity'] ) && $atts['activity'] != ''){
                $activity = $atts['activity'];
                $object .= ', activity:\'' . $activity . '\'';
            }
            if(isset( $atts['event'] ) && $atts['event'] != ''){
                $event = $atts['event'];
                $object .= ', event:\'' . $event . '\'';
            }
            if(isset( $atts['date'] ) && $atts['date'] != ''){
                $date = $atts['date'];
                $object .= ', date:\'' . $date . '\'';
            }
            if(isset( $atts['type'] ) && $atts['type'] != ''){
                $type = $atts['type'];
                $object .= ', type:\'' . $type . '\'';
            }else{
                $object .= ', type:\'default\', ';
            }
            if(isset( $atts['id'] ) && $atts['id'] != ''){
                $id = $atts['id'];
                $object .= ', id:\'' . $atts['id'] . '\'';
            }
            if(isset( $atts['label'] ) && $atts['label'] != ''){
                $label = $atts['label'];
                $object .= ', label:\'' . $atts['label'] . '\'';
            }
            if(isset( $atts['width'] ) && $atts['width'] != ''){
                $width = $atts['width'];
                $object .= ', width:\'' . $atts['width'] . '\'';
            }
            if(isset( $atts['height'] ) && $atts['height'] != ''){
                $height = $atts['height'];
                $object .= ', height:\'' . $atts['height'] . '\'';
            }
            $object .= '}';
            return '<script id="' . $id . '">calendar.init(' . $object . ');</script>';
        }
        add_action('wp_enqueue_scripts', 'abl_calendar_assets');//add boostrap library
        add_shortcode("abl-calendar", "abl_calendar");
    }
    
    public function abl_activity_shortcode(){
        function abl_activity_assets() {
            wp_enqueue_style('abl-css', ABL_ENV_URL_LOADER . 'styles.css');
            wp_enqueue_script('abl-js', ABL_ENV_URL_LOADER . 'scripts.js', array( 'jquery'), '1.0.1', false);
        }
        function abl_activity($atts){
            $options = get_option('wp_abl_plugin_settings');
            $merchant = '';
            $activity = '';
            $event = '';
            $id = '';
            $type = '';
            $object = '';
            $width = '';
            $height = '';
            $label = '';
            $atts = shortcode_atts( array('merchant' => '', 'activity' => '', 'event' => '', 'type' => 'embedded', 'id' => '', 'label' => '', 'width' => '100%', 'height' => '1200px'), $atts, 'abl-calendar' );
            if( isset($options['wp_abl_plugin_settings_public_key']) ){
                $atts['merchant'] = $options['wp_abl_plugin_settings_public_key'];
            }
            if(isset( $atts['merchant'] ) && $atts['merchant'] != ''){
                $merchant = $atts['merchant'];
                $object .= '{merchant:\'' . $merchant . '\'';
            }
            if(isset( $atts['activity'] ) && $atts['activity'] != ''){
                $activity = $atts['activity'];
                $object .= ', activity:\'' . $activity . '\'';
            }
            if(isset( $atts['event'] ) && $atts['event'] != ''){
                $event = $atts['event'];
                $object .= ', event:\'' . $event . '\'';
            }
            if(isset( $atts['type'] ) && $atts['type'] != ''){
                $type = $atts['type'];
                $object .= ', type:\'' . $type . '\'';
            }else{
                $object .= ', type:\'default\', ';
            }
            if(isset( $atts['id'] ) && $atts['id'] != ''){
                $id = $atts['id'];
                $object .= ', id:\'' . $atts['id'] . '\'';
            }
            if(isset( $atts['label'] ) && $atts['label'] != ''){
                $label = $atts['label'];
                $object .= ', label:\'' . $atts['label'] . '\'';
            }
            if(isset( $atts['width'] ) && $atts['width'] != ''){
                $width = $atts['width'];
                $object .= ', width:\'' . $atts['width'] . '\'';
            }
            if(isset( $atts['height'] ) && $atts['height'] != ''){
                $height = $atts['height'];
                $object .= ', height:\'' . $atts['height'] . '\'';
            }
            $object .= '}';
            return '<script id="' . $id . '">activity.init(' . $object . ');</script>';
        }
        add_action('wp_enqueue_scripts', 'abl_activity_assets');//add boostrap library
        add_shortcode("abl-activity", "abl_activity");
    }

    public function abl_booknow_shortcode(){
        function abl_booknow_assets() {
            wp_enqueue_style('abl-css', ABL_ENV_URL_LOADER . 'styles.css');
            wp_enqueue_script('abl-js', ABL_ENV_URL_LOADER . 'scripts.js', array( 'jquery'), '1.0.1', false);
        }
        function abl_booknow($atts){
            $options = get_option('wp_abl_plugin_settings');
            $merchant = '';
            $option = '';
            $label = '';
            $atts = shortcode_atts( array('merchant' => '', 'options' => '', 'label' => '', 'styles' => ''), $atts, 'abl-booknow' );
            $styles = '';
            if( isset($options['wp_abl_plugin_settings_public_key']) ){
                $atts['merchant'] = $options['wp_abl_plugin_settings_public_key'];
            }
            if(isset( $atts['merchant'] ) && $atts['merchant'] != ''){
                $merchant = $atts['merchant'];
                $object .= '{merchant:\'' . $merchant . '\'';
            }
            if(isset( $atts['options'] ) && $atts['options'] != ''){
                $option = $atts['options'];
            }
            if(isset( $atts['label'] ) && $atts['label'] != ''){
                $label = $atts['label'];
            }
            if(isset( $atts['styles'] ) && $atts['styles'] != ''){
                $styles = $atts['styles'];
            }
            $rand = rand();
            $script = '<script type="text/javascript">' .
            'var d = document;' .
            'var s = d.createElement("script");' .
            's.type = "text/javascript";' .
            's.src = "' . ABL_ENV_URL_ABLWIDGET . 'assets/embed.js?r=' . $rand . '";' .
            'd.body.appendChild(s);' .
            's.onload = function(e){' .
            'window.initEmbedAblWidget.init();' .
            '}' .
            '</script>' . 
            '<style type="text/css">.abl-widget-booknow{' . $styles .';font-family:"Helvetica Neue",Helvetica,Arial,sans-serif; max-width:100% !important;width:auto !important;cursor:pointer;display:inline-block;font-size:14px;height:42px;text-decoration:none !important;padding-top:px;padding-right:15px;padding-bottom:0px;padding-left:15px;line-height:42px;border-top-left-radius:4px;border-top-right-radius:4px;border-bottom-right-radius:4px;border-bottom-left-radius:4px;box-shadow:0 2px 0 rgba(0, 0, 0, 0.045);-webkit-border-top-left-radius:4px;-webkit-border-top-right-radius:4px;-webkit-border-bottom-right-radius:4px;-webkit-border-bottom-left-radius:4px;-moz-border-top-left-radius:4px;-moz-border-top-right-radius:4px;-moz-border-bottom-right-radius:4px;-moz-border-bottom-left-radius:4px;}.abl-widget-booknow:hover{text-decoration:none !important;opacity: 0.8}.abl-widget-booknow:active{transform: translateY(1px)}.abl-widget-booknow i{display:inline-block}</style>' . 
            '<a class="abl-widget-booknow" data-options="' . $option . '" data-merchant="' . $atts['merchant'] . '" href="#ablwidget"><i style="line-height: 1;vertical-align: -0.125em;transition: margin-left 0.3s cubic-bezier(0.645, 0.045, 0.355, 1);"><svg viewBox="64 64 896 896" fill="currentColor" width="1em" height="1em" data-icon="calendar" aria-hidden="true"><path d="M880 184H712v-64c0-4.4-3.6-8-8-8h-56c-4.4 0-8 3.6-8 8v64H384v-64c0-4.4-3.6-8-8-8h-56c-4.4 0-8 3.6-8 8v64H144c-17.7 0-32 14.3-32 32v664c0 17.7 14.3 32 32 32h736c17.7 0 32-14.3 32-32V216c0-17.7-14.3-32-32-32zm-40 656H184V460h656v380zM184 392V256h128v48c0 4.4 3.6 8 8 8h56c4.4 0 8-3.6 8-8v-48h256v48c0 4.4 3.6 8 8 8h56c4.4 0 8-3.6 8-8v-48h128v136H184z"></path></svg></i><span style="margin-left: 8px;">Book Now</span></a>';
            return $script;
        }
        //add_action('wp_enqueue_scripts', 'abl_booknow_assets');//add boostrap library
        add_shortcode("abl-booknow", "abl_booknow");
    }

    public function abl_embedded_shortcode(){
        function abl_embedded_assets() {
            wp_enqueue_style('abl-css', ABL_ENV_URL_LOADER . 'styles.css');
            wp_enqueue_script('abl-js', ABL_ENV_URL_LOADER . 'scripts.js', array( 'jquery'), '1.0.1', false);
        }
        function abl_embedded($atts){
            $options = get_option('wp_abl_plugin_settings');
            $merchant = '';
            $preferences = '';
            $atts = shortcode_atts( array('merchant' => '', 'options' => ''), $atts, 'abl-embedded' );
            if( isset($options['wp_abl_plugin_settings_public_key']) ){
                $atts['merchant'] = $options['wp_abl_plugin_settings_public_key'];
            }
            if(isset( $atts['merchant'] ) && $atts['merchant'] != ''){
                $merchant = $atts['merchant'];
            }
            if(isset( $atts['options'] ) && $atts['options'] != ''){
                $preferences = $atts['options'];
            } else {
                $preferences = 'o1:activity&o2&o3&c1&c2&c3&c4&c5&p5&p6&p7&p8';
            }
            $rand = rand();
            $script = '<script type="text/javascript">' .
            'var d = document;' .
            'var s = d.createElement("script");' .
            's.type = "text/javascript";' .
            's.src = "' . ABL_ENV_URL_ABLWIDGET . 'assets/embed.js?r=' . $rand . '";' .
            'd.body.appendChild(s);' .
            's.onload = function(e){' .
            'var c = d.getElementById("abl-widget-app-container-' . $rand . '");' .
            'var i = d.createElement("iframe");' .
            'i.id = "abl-widget-iframe-embedded";' .
            'i.src = "' . ABL_ENV_URL_ABLWIDGET . 'embedding/' . $merchant . '/activities/' . $preferences . '";' .
            'i.setAttribute("style", "height:0px;min-width:100%;width:1px;border:0");' .
            'i.setAttribute("scrolling", "no");' .
            'c.appendChild(i);' .
            'window.initEmbedAblWidget.init();};</script><div id="abl-widget-app-container-' . $rand . '"></div>';
            return $script;
        }
        add_action('wp_enqueue_scripts', 'abl_embedded_assets');//add boostrap library
        add_shortcode("abl-embedded", "abl_embedded");
    }

    public function abl_egiftcard_shortcode(){
        function abl_egiftcard_assets() {
            wp_enqueue_style('abl-css', plugin_dir_url( __FILE__ ) . 'partials/css/wp-abl-plugin-public.css');
            wp_enqueue_script('abl-js', ABL_ENV_URL_LOADER . 'scripts.js', array( 'jquery'), '1.0.1', false);
        }
        function abl_egiftcard($atts){
            $options = get_option('wp_abl_plugin_settings');
            $merchant = '';
            $label = 'Buy e-Gift Card';
            $backgroundcolor = '#000000';
            $color = '#ffffff';
            $styles = 'background-color:' . $backgroundcolor . ' !important;color:' . $color . ' !important;';
            $rand = rand();
            $atts = shortcode_atts( array('merchant' => '', 'label' => '', 'styles' => ''), $atts, 'abl-egiftcard' );
            if( isset($options['wp_abl_plugin_settings_public_key']) ){
                $atts['merchant'] = $options['wp_abl_plugin_settings_public_key'];
            }
            if(isset( $atts['merchant'] ) && $atts['merchant'] != ''){
                $merchant = $atts['merchant'];
            }
            if(isset( $atts['label'] ) && $atts['label'] != ''){
                $label = $atts['label'];
            }
            if(isset( $atts['styles'] ) && $atts['styles'] != ''){
                $styles = $atts['styles'];
            }
            $script = '<script defer type="text/javascript" src="' . ABL_ENV_URL_EGIFTCARDS . 'assets/embed.js?r=' . $rand . '"></script>' . 
            '<style type="text/css">.abl-gcwidget{' . $styles . '}</style>' .
            '<a class="abl-gcwidget" data-merchant="' . $merchant . '" href="#widget">' . $label . '</a>';
            return $script;
        }
        add_action('wp_enqueue_scripts', 'abl_egiftcard_assets');//add boostrap library
        add_shortcode("abl-egiftcard", "abl_egiftcard");
    }

}
