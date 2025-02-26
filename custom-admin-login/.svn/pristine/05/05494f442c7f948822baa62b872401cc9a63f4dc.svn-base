<?php

namespace CustomAdminLogin;

// If this file is called directly, abort.
defined( 'ABSPATH' ) || exit;

use WP_Customize_Manager;
use WP_Customize_Color_Control;
use WP_Customize_Image_Control;

/**
 * Theme_Customizer class
 *
 * @package        AdminLoginCustomizer
 * @subpackage     Admin
 * @since          1.0.0
 * @author         Javier Prieto
 */
class Theme_Customizer {

  /**
   * Single instance of this class
   *
   * @since     1.0.0
   * @var       Theme_Customizer
   */
  protected static $instance;

  /**
   * Main instance
   * Ensures only one instance of this class is loaded or can be loaded.
   *
   * @since   1.0.0
   * @static
   * @return  static
   */
  public static function &init() {
    if ( empty( self::$instance ) ) {
      self::$instance = new static();
    }

    return self::$instance;
  }

  /**
   * Class constructor
   * Declared as protected to prevent creating a new instance outside of the class via the new operator.
   *
   * @since   1.0.0
   */
  protected function __construct() {
    // admin customizer
    add_action( 'customize_register', [ $this, 'login_page' ] );

    // login page
    add_filter( 'login_headerurl', [ $this, 'login_header_url' ], 99 );
    add_filter( 'login_headertext', [ $this, 'login_header_title' ], 99 );
    add_action( 'login_enqueue_scripts', [ $this, 'login_header_image' ], 99 );
    add_action( 'login_enqueue_scripts', [ $this, 'login_font_color' ], 99 );
    add_action( 'login_enqueue_scripts', [ $this, 'login_background_color' ], 99 );
    add_action( 'login_enqueue_scripts', [ $this, 'login_background' ], 99 );
  }

  /**
   * Adds the login page menu to theme customizer
   *
   * @since   1.0.0
   *
   * @param WP_Customize_Manager $wp_customize
   */
  public function login_page( $wp_customize ) {
    $section_id = 'login_customizer_section';

    $wp_customize->add_section( $section_id, [
        'title'    => __( 'Login Page', 'custom-admin-login' ),
        'priority' => 1000,
    ] );

    $wp_customize->add_setting( 'login_background_color', [ 'default' => '#f1f1f1', ] );
    $wp_customize->add_control(
            new WP_Customize_Color_Control( $wp_customize, 'login_background_color', [
                'label'    => __( 'Background color', 'custom-admin-login' ),
                'section'  => $section_id,
                'settings' => 'login_background_color',
                    ] )
    );

    $wp_customize->add_setting( 'login_background_image' );
    $wp_customize->add_control(
            new WP_Customize_Image_Control( $wp_customize, 'login_background_image', [
                'label'    => __( 'Background image', 'custom-admin-login' ),
                'section'  => $section_id,
                'settings' => 'login_background_image',
                    ] )
    );

    $wp_customize->add_setting( 'login_background_position' );
    $wp_customize->add_control( 'login_background_position', [
        'label'    => __( 'Background position', 'custom-admin-login' ),
        'section'  => $section_id,
        'settings' => 'login_background_position',
        'type'     => 'select',
        'choices'  => [
            ''        => 'Auto',
            'contain' => 'Contain',
            'cover'   => 'Cover',
            'repeat'  => 'Repeat',
        ]
    ] );

    $wp_customize->add_setting( 'login_font_color', [ 'default' => '#555d66', ] );
    $wp_customize->add_control(
            new WP_Customize_Color_Control( $wp_customize, 'login_font_color', [
                'label'    => __( 'Font color', 'custom-admin-login' ),
                'section'  => $section_id,
                'settings' => 'login_font_color',
                    ] )
    );

    $wp_customize->add_setting( 'login_header_image' );
    $wp_customize->add_control(
            new WP_Customize_Image_Control( $wp_customize, 'login_header_image', [
                'label'       => __( 'Header image', 'custom-admin-login' ),
                'section'     => $section_id,
                'settings'    => 'login_header_image',
                'description' => __( 'The custom header is centered and contained in a 320 x 84 pixels block', 'custom-admin-login' ),
                    ] )
    );

    $wp_customize->add_setting( 'login_header_url' );
    $wp_customize->add_control( 'login_header_url', [
        'label'    => __( 'Header URL', 'custom-admin-login' ),
        'section'  => $section_id,
        'settings' => 'login_header_url',
        'type'     => 'text',
    ] );

    $wp_customize->add_setting( 'login_header_title' );
    $wp_customize->add_control( 'login_header_title', [
        'label'    => __( 'Header Title', 'custom-admin-login' ),
        'section'  => $section_id,
        'settings' => 'login_header_title',
        'type'     => 'text',
    ] );
  }

  /**
   * Replace the header url with custom url
   *
   * @since   1.0.0
   *
   * @param   string $url
   * @return  string
   */
  public function login_header_url( $url ) {
    $custom_url = get_theme_mod( 'login_header_url' );
    return $custom_url ?: $url;
  }

  /**
   * Replace the header title with custom string
   *
   * @since   1.0.0
   *
   * @param   string $title
   * @return  string
   */
  public function login_header_title( $title ) {
    $custom_title = get_theme_mod( 'login_header_title' );
    return $custom_title ?: $title;
  }

  /**
   * Replace the header WordPress logo with custom image
   *
   * @since   1.0.0
   *
   * @return  string
   */
  public function login_header_image() {
    $custom_image = get_theme_mod( 'login_header_image' );

    if ( !empty( $custom_image ) ) {
      ?>
      <style type="text/css">
        #login h1 a {
          background-image: url(<?php echo $custom_image ?>);
          background-position: center;
          background-size: contain;
          height: 84px;
          width: 320px;
        }
      </style>
      <?php
    }
  }

  /**
   * Replace the font color of WordPress login page
   *
   * @since   1.0.0
   *
   * @return  string
   */
  public function login_font_color() {
    $custom_font_color = get_theme_mod( 'login_font_color' );

    if ( !empty( $custom_font_color ) ) {
      ?>
      <style type="text/css">
        body.login #backtoblog a, body.login #nav a {
          color: <?php echo $custom_font_color ?>;
        }

        body #language-switcher .dashicons.dashicons-translation {
          color: <?php echo $custom_font_color ?>;
        }
      </style>
      <?php
    }
  }

  /**
   * Replace the background color of WordPress login page
   *
   * @since   1.0.0
   *
   * @return  string
   */
  public function login_background_color() {
    $custom_background_color = get_theme_mod( 'login_background_color' );

    if ( !empty( $custom_background_color ) ) {
      ?>
      <style type="text/css">
        body.login  {
          background-color: <?php echo $custom_background_color ?>;
        }
      </style>
      <?php
    }
  }

  /**
   * Sets the background position of WordPress login page
   *
   * @since   1.0.0
   *
   * @return  string
   */
  public function login_background() {
    $background_position = get_theme_mod( 'login_background_position' );
    $background_image    = get_theme_mod( 'login_background_image' );

    $position = 'center';
    $size     = 'auto';
    $repeat   = 'no-repeat';

    switch ( $background_position ) {
      case 'contain':
        $size = 'contain';
        break;

      case 'cover':
        $size = 'cover';
        break;

      case 'repeat':
        $repeat = 'repeat';
        break;
    }

    if ( !empty( $background_image ) ) {
      ?>
      <style type="text/css">
        body.login  {
          background-image: url(<?php echo $background_image ?>);
          background-position: <?php echo $position ?>;
          background-size:  <?php echo $size ?>;
          background-repeat:  <?php echo $repeat ?>;
        }
      </style>
      <?php
    }
  }

  /**
   * Declared as private to prevent cloning of an instance of the class via the clone operator.
   *
   * @since   1.0.0
   */
  private function __clone() {
    
  }

  /**
   * Declared as private to prevent unserializing of an instance of the class via the global function unserialize().
   *
   * @since   1.0.0
   */
  private function __wakeup() {
    
  }

  /**
   * Declared as protected to prevent serializg of an instance of the class via the global function serialize().
   *
   * @since   1.0.0
   */
  protected function __sleep() {
    
  }

}
