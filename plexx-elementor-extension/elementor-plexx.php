<?php

/*
Plugin Name: Plexx Elementor Extension
Plugin URI: https://themeworm.com/plexx-elementor-extension/
Description: Elementor extension for Plexx theme. Please click Initial Setup to see instructions after activation.
Author: themeworm
Author URI: https://themeworm.com/
Version: 1.4.0
Text Domain: themeworm
Domain Path: /languages
Elementor tested up to: 3.26.3
License: GPLv2
*/

/* Copyright 2024 Themeworm
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

define( 'ELEMENTOR_PLEXX__FILE__', __FILE__ );
define( 'ELEMENTOR_PLEXX_PLUGIN_BASE', plugin_basename( ELEMENTOR_PLEXX__FILE__ ) );

/**
 * Main Elementor Test Extension Class
 *
 * The main class that initiates and runs the plugin.
 *
 * @since 1.0.0
 */
final class Elementor_Plexx_Extension {

    /**
     * Plugin Version
     *
     * @since 1.0.0
     *
     * @var string The plugin version.
     */
    const VERSION = '1.4.0';

    /**
     * Minimum Elementor Version
     *
     * @since 1.0.0
     *
     * @var string Minimum Elementor version required to run the plugin.
     */
    const MINIMUM_ELEMENTOR_VERSION = '3.4.0';
    const MINIMUM_PLEXX_VERSION = '3.3.0';

    /**
     * Minimum PHP Version
     *
     * @since 1.0.0
     *
     * @var string Minimum PHP version required to run the plugin.
     */
    const MINIMUM_PHP_VERSION = '7.0';

    /**
     * Instance
     *
     * @since 1.0.0
     *
     * @access private
     * @static
     *
     * @var Elementor_Plexx_Extension The single instance of the class.
     */
    private static $_instance = null;

    /**
     * Instance
     *
     * Ensures only one instance of the class is loaded or can be loaded.
     *
     * @since 1.0.0
     *
     * @access public
     * @static
     *
     * @return Elementor_Plexx_Extension An instance of the class.
     */
    public static function instance() {

        if ( is_null( self::$_instance ) ) {
          self::$_instance = new self();
        }
        return self::$_instance;

    }

    /**
     * Constructor
     *
     * @since 1.0.0
     *
     * @access public
     */
    public function __construct() {

        add_action( 'init', [ $this, 'i18n' ] );
        add_action( 'plugins_loaded', [ $this, 'init' ] );
        add_filter( 'plugin_row_meta', [ $this, 'plugin_row_meta' ], 10, 2 );

    }

    /**
     * Load Textdomain
     *
     * Load plugin localization files.
     *
     * Fired by `init` action hook.
     *
     * @since 1.0.0
     *
     * @access public
     */
    public function i18n() {

        load_plugin_textdomain( 'themeworm' );

    }

    /**
     * Initialize the plugin
     *
     * Load the plugin only after Elementor (and other plugins) are loaded.
     * Checks for basic plugin requirements, if one check fail don't continue,
     * if all check have passed load the files required to run the plugin.
     *
     * Fired by `plugins_loaded` action hook.
     *
     * @since 1.0.0
     *
     * @access public
     */
    public function init() {

        // $plexx_theme = wp_get_theme();
        // if ( $plexx_theme != "Plexx" ) {
        //   if ( $plexx_theme != "Plexx Child Theme" ) {
        //     add_action( 'admin_notices', [ $this, 'admin_notice_theme_version' ] );
        //     return;
        //   }
        // }

        $plexx_theme = wp_get_theme( 'Plexx' );
        // if ( $plexx_theme->exists() && version_compare( $plexx_theme->Version, self::MINIMUM_PLEXX_VERSION, '<' )) {
        //   add_action( 'admin_notices', [ $this, 'admin_notice_minimum_plexx_version' ] );
        //   return;
        // }

        // Check if Elementor installed and activated
        // if ( ! did_action( 'elementor/loaded' ) ) {
        //     add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
        //     return;
        // }

        // Check for required Elementor version
        // if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
        //     add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
        //     return;
        // }

        // Check for required PHP version
        if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
            add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
            return;
        }

        // add_action( 'admin_notices', [ $this, 'admin_notice_installation_steps' ] );

        add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'plexx_elementor_settings_page');

        function plexx_elementor_settings_page($links) {
          $plexx_elementor_plugin_name = class_exists('plexx_elementor_plugin_name') ? new plexx_elementor_plugin_name() : (object) ['plugin_name' => 'plexx-elementor-extension'];
          $links[] = '<a href="' . admin_url( 'options-general.php?page=' . $plexx_elementor_plugin_name->plugin_name ) . '">' . esc_html('Initial Setup', 'themeworm') . '</a>';
          return $links;
        }

        // Include plugin files
    // $this->includes();

    // Register widgets
      add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );

      function add_elementor_widget_categories( $elements_manager ) {

      	$elements_manager->add_category(
      		'plexx-elementor-category',
      		[
      			'title' => __( 'Plexx Elementor Widgets', 'themeworm' ),
      			'icon' => 'fa fa-plug',
      		]
      	);

      }

      add_action( 'elementor/elements/categories_registered', 'add_elementor_widget_categories' );


    }

    public function plugin_row_meta( $plugin_meta, $plugin_file ) {
  		if ( ELEMENTOR_PLEXX_PLUGIN_BASE === $plugin_file ) {
  			$row_meta = [
  				'video' => '<a href="https://www.youtube.com/playlist?list=PLqDyho5B-c6UeZlU0pHsN7l1-qvKpdOis" aria-label="' . esc_attr( __( 'Video Tutorials', 'themeworm' ) ) . '" target="_blank">' . __( 'Video Tutorials', 'themeworm' ) . '</a>',
  			];

  			$plugin_meta = array_merge( $plugin_meta, $row_meta );
  		}

  		return $plugin_meta;
  	}


    /**
     * Admin notice
     *
     * Warning when the site doesn't have Elementor installed or activated.
     *
     * @since 1.0.0
     *
     * @access public
     */
    public function admin_notice_missing_main_plugin() {

        if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

        $message = sprintf(
            /* translators: 1: Plugin name 2: Elementor */
            esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'themeworm' ),
            '<strong>' . esc_html__( 'Elementor Plexx Extension', 'themeworm' ) . '</strong>',
            '<strong>' . esc_html__( 'Elementor', 'themeworm' ) . '</strong>'
        );

        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

    }

    /**
     * Admin notice
     *
     * Warning when the site doesn't have a minimum required Elementor version.
     *
     * @since 1.0.0
     *
     * @access public
     */
    public function admin_notice_minimum_elementor_version() {

        if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

        $message = sprintf(
            /* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
            esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'themeworm' ),
            '<strong>' . esc_html__( 'Elementor Plexx Extension', 'themeworm' ) . '</strong>',
            '<strong>' . esc_html__( 'Elementor', 'themeworm' ) . '</strong>',
             self::MINIMUM_ELEMENTOR_VERSION
        );

        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

    }

    /**
     * Admin notice
     *
     * Warning when the site doesn't have a minimum required PHP version.
     *
     * @since 1.0.0
     *
     * @access public
     */
    public function admin_notice_minimum_php_version() {

        if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

        $message = sprintf(
            /* translators: 1: Plugin name 2: PHP 3: Required PHP version */
            esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'themeworm' ),
            '<strong>' . esc_html__( 'Elementor Plexx Extension', 'themeworm' ) . '</strong>',
            '<strong>' . esc_html__( 'PHP', 'themeworm' ) . '</strong>',
             self::MINIMUM_PHP_VERSION
        );

        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

    }


    public function admin_notice_theme_version() {

        if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

        $message = sprintf(

          esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'themeworm' ),
          '<strong>' . esc_html__( 'Elementor Plexx Extension', 'themeworm' ) . '</strong>',
          '<strong>' . esc_html__( 'Plexx Premium Theme', 'themeworm' ) . '</strong>'
        );

        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

    }


    public function admin_notice_minimum_plexx_version() {

        if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

        $message = sprintf(

          esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'themeworm' ),
          '<strong>' . esc_html__( 'Elementor Plexx Extension', 'themeworm' ) . '</strong>',
          '<strong>' . esc_html__( 'Plexx Premium Theme', 'themeworm' ) . '</strong>',
          self::MINIMUM_PLEXX_VERSION
        );

        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

    }

    public function admin_notice_installation_steps() {

        if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

        $message = sprintf(

          esc_html__( 'After Plexx Elementor Activation please follow these important steps: "%1$s"', 'themeworm' ),
          '<a href="' . admin_url( 'options-general.php?page=plexx_elementor' ) . '">' . esc_html__( 'Initial Setup', 'themeworm' ) . '</a>'
        );

        printf( '<div class="notice notice-success is-dismissible"><p>%1$s</p></div>', $message );

    }

    /**
     * Include Files
     *
     * Load required plugin core files.
     *
     * @since 1.0.0
     *
     * @access public
     */
    public function includes() {

        require_once( __DIR__ . '/widgets/plexx-portfolio.php' );
        require_once( __DIR__ . '/widgets/plexx-gallery.php' );
        require_once( __DIR__ . '/widgets/plexx-hero.php' );
        require_once( __DIR__ . '/widgets/plexx-slider.php' );
        require_once( __DIR__ . '/widgets/plexx-blog.php' );
        require_once( __DIR__ . '/widgets/plexx-heading.php' );
        require_once( __DIR__ . '/widgets/plexx-text.php' );
        require_once( __DIR__ . '/widgets/plexx-button.php' );
        require_once( __DIR__ . '/widgets/plexx-video.php' );
        // require_once( __DIR__ . '/widgets/plexx-aboutme.php' );

    }


    public function register_widgets() {

        $this->includes();
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Portfolio_Widget() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Plexx_Gallery() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Plexx_Hero() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Plexx_Slider() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Plexx_Blog() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Plexx_Heading() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Plexx_Text() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Plexx_Button() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Plexx_Video() );
        // \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Plexx_Aboutme() );

    }


}

Elementor_Plexx_Extension::instance();

if ( ! class_exists( 'Plexx_elementor' ) ) :

  class Plexx_elementor {

    function __construct() {
  		add_action( 'admin_menu', array( $this, 'plexx_elementor_add_page' ) );
  	}

    function plexx_elementor_add_page() {
      $plexx_elementor_plugin_name = class_exists('plexx_elementor_plugin_name') ? new plexx_elementor_plugin_name() : (object) ['plugin_name' => 'plexx-elementor-extension'];
      $page = add_options_page( 'Plexx Elementor', 'Plexx Elementor', 'manage_options', $plexx_elementor_plugin_name->plugin_name, array( $this, 'plexx_elementor_do_page' ) );
    }

    function plexx_elementor_do_page() {

      if ( !current_user_can( 'manage_options' ) )  {
        wp_die( esc_html__( 'You do not have sufficient permissions to access this page.', 'themeworm' ) );
      } ?>

      <h2><?php esc_html_e('Plexx Elementor plugin', 'themeworm'); ?></h2>
      <div style="font-size:120%;">
        <p>Thank you for using Plexx Elementor plugin, <strong>please follow these important steps</strong> after the plugin installation:</p>
        <ol>
          <li>Open <strong>Elementor > Settings</strong> and select <strong>Disable Default Colors and Disable Default Fonts</strong> checkboxes then click Save.</li>
          <li>Go to <strong>Pages > Add New</strong> and <strong>Edit it with Elementor</strong>.<br />
            <strong>Click Menu</strong> (Three lines icon) in the top left corner of Elementor panel.<br />
            Click <strong>Site Settings</strong> in the menu then <strong>Lightbox</strong>.<br />
            Turn <strong>Image Lightbox</strong> Off</li>
        </ol>
        <p>That's all you need for initial setup. You can watch Plexx Elementor tutorials on Youtube - <a href="https://www.youtube.com/playlist?list=PLqDyho5B-c6UeZlU0pHsN7l1-qvKpdOis" target="_blank">https://www.youtube.com/playlist?list=PLqDyho5B-c6UeZlU0pHsN7l1-qvKpdOis</a></p>
      </div>

    <?php }

  }

  new Plexx_elementor();

endif;
