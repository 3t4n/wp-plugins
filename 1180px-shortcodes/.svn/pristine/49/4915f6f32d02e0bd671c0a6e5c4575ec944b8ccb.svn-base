<?php
/*
Plugin Name: 1180px Shortcodes
Plugin URI: http://1180px.com
Description: Adds simple shortcodes for the 1180px css framework
Version: 1.1.1
Author: Chris Blackwell
Author URI: http://chrisblackwell.me
*/

/**
 * Copyright (c) 2014 Chris Blackwell. All rights reserved.
 *
 * Released under the GPL license
 * http://www.opensource.org/licenses/gpl-license.php
 *
 * This is an add-on for WordPress
 * http://wordpress.org/
 *
 * **********************************************************************
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * **********************************************************************
 */

class ElevenEightyShortcodes {

  /**
   * The version number of 1180px
   * @var string
   */
  private $version;

  /**
   * The instance of the class, set to null by default
   * @var null
   */
  private static $instance = null;

  /**
   * Initialize the plugin and active the _setup() function
   */
  public static function init() {
    add_action('plugins_loaded', array(self::get_instance(), '_setup') );
  }

  /**
   * Create an instance of the ElevenEightyShortcodes class
   * and set it to the $instance variable
   *
   * @return ElevenEightyShortcodes|null
   */
  public static function get_instance() {
    if( is_null(self::$instance) ) {
      self::$instance = new self;
    }
    return self::$instance;
  }

  /**
   * Set version number of plugin and activate actions and hooks
   */
  public function _setup() {
    $this->version = '1.1.0';
    $this->register_styles_and_scripts();
    $this->add_new_shortcode( 'row', 'row_shortcode_callback' );
    $this->add_new_shortcode( 'span', 'span_shortcode_callback' );

    add_action('init', array(self::$instance, 'wp1180px_shortcode_button_init'));
  }

  /**
   * Register CSS and JavaScript files
   */
  private function register_styles_and_scripts() {
    add_action( 'wp_enqueue_scripts', array(self::$instance, 'register_1180_css_file') );
  }

  /**
   * Registers the 1180px css file
   */
  public function register_1180_css_file() {
    wp_enqueue_style( '1180px', plugins_url( '/css/1180px.css', __FILE__ ), array(), $this->get_version(), 'all' );
  }

  /**
   * Registers the shortcode with @WordPress
   */
  private function add_new_shortcode($shortcode, $callback) {
    add_shortcode( $shortcode, array(self::$instance, $callback) );
  }

  /**
   * Callback function to specify the output
   * of the [row] shortcode
   *
   * @param array $atts
   * @param array $content
   *
   * @return string
   */
  public function row_shortcode_callback( $atts, $content = null ) {

    $content = $this->sanitizeContent($content);

    if(isset($atts['class']))
    {
      return '<div class="row ' . $atts['class'] . '">' . $content . '</div>';
    }
    return '<div class="row">' . $content . '</div>';

  }

  /**
   * Callback function for the registered span shortcodes
   *
   * @param array   $atts
   * @param null    $content
   * @param string  $tag
   *
   * @return string
   */
  public function span_shortcode_callback($atts, $content = null) {

    $content = $this->sanitizeContent($content);

    return '<div class="span' . $atts['col'] . '">' . $content . '</div>';
  }

  /**
   * Create a new button on the WYSIWYG editor
   * for the row and span shortcodes
   */
  public function wp1180px_shortcode_button_init() {
    // Abort early if the user will never see TinyMCE
    if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') && get_user_option('rich_editing') == 'true')
      return;

    //Add a callback to regiser our tinymce plugin
    add_filter('mce_external_plugins', array(self::$instance, 'wp1180px_register_tinymce_plugin') );

    // Add a callback to add our button to the TinyMCE toolbar
    add_filter('mce_buttons', array(self::$instance, 'wp1180p_add_tinymce_button') );
  }

  /**
   * Register a new tinymce plugin
   *
   * @param array $plugin_array
   * @return array
   */
  public function wp1180px_register_tinymce_plugin($plugin_array) {
    $plugin_array['wp1180px_buttons'] = plugin_dir_url(__FILE__) . '/js/1180px_tinymce_plugin.js';
    return $plugin_array;
  }

  /**
   * Add new tinymce buttons to the editor
   *
   * @param array $buttons
   * @return array
   */
  public function wp1180p_add_tinymce_button($buttons) {
    array_push( $buttons, 'wp1180px_row', 'wp1180px_span' );
    return $buttons;
  }

  /**
   * Remove excess whitespace from shortcode content
   * and return the $content
   *
   * @param  mixed|string $content
   * @return mixed|string $content
   */
  public function sanitizeContent($content) {
    /* Parse nested shortcodes and add formatting. */
    $content = trim( do_shortcode( shortcode_unautop( $content ) ) );

    /* Remove '' from the start of the string. */
    if ( substr( $content, 0, 4 ) == '' )
      $content = substr( $content, 4 );

    /* Remove '' from the end of the string. */
    if ( substr( $content, -3, 3 ) == '' )
      $content = substr( $content, 0, -3 );

    /* Remove any instances of ''. */
    $content = str_replace( array( '<p></p>' ), '', $content );
    $content = str_replace( array( '<p>  </p>' ), '', $content );

    remove_filter( 'the_content', 'wpautop' );
    add_filter( 'the_content', 'wpautop' , 99);
    add_filter( 'the_content', 'shortcode_unautop',100 );

    return $content;
  }

  /**
   * Get the version number for the plugin
   *
   * @return string
   */
  public function get_version() {
    return $this->version;
  }
}

ElevenEightyShortcodes::init();
