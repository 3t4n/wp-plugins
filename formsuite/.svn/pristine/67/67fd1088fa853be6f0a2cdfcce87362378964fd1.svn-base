<?php

/**
 * Plugin Name: Formsuite
 * Text Domain: formsuite
 * Description: This Plugin Will Allows To Customize The Default Login Form Appearance.
 * Version:     1.0.0
 * Author:      Engramium
 * Author URI:  www.engramium.com/
 * License:     GPLv2 or later
 * Domain Path: /languages
 */


// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

// Constants
define( 'FORMSUITE_VERSION', '1.1.0' );
define( 'FORMSUITE_BASE', __FILE__ );
define( 'FORMSUITE_PATH', __DIR__ );
define( 'FORMSUITE_URL', plugins_url( '', FORMSUITE_BASE ) );
define( 'FORMSUITE_BASENAME', plugin_basename( __FILE__ ) );


// Plugin Main Class
class Formsuite_Login_Form_Page {

  // Construct
  public function __construct() {

    // Admin menu
    add_action('admin_menu', [$this, 'settings_page'] );

    // Register settings
    add_action( 'admin_init', [$this, 'register_settings'] );

    // Admin Scripts & Styles
    add_action( 'admin_enqueue_scripts', [$this, 'admin_scripts_styles'] );

    // Login Page Styles
    add_action( 'login_enqueue_scripts', [$this, 'public_scripts_styles'] );

    // Actions links in plugins admin screen
    add_filter( 'plugin_action_links_' . FORMSUITE_BASENAME, [$this, 'add_action_links'] );

    // Change Logo Link
    add_filter( 'login_headerurl', [$this, 'change_logo_link'] );

    // Change Logo Title
    add_filter( 'login_headertext', [$this, 'change_logo_title'] );

  }


  // Admin Scripts & Styles
  function admin_scripts_styles( $hook ) {

    // Do not load if the user doesn't have the plugin settings page
    if ( !strstr( $hook, 'formsuite-login-form-customizer' ) ) {
      return;
    }

    // WordPress Media Library
    wp_enqueue_media();

    // Color Picker
    wp_enqueue_style( 'wp-color-picker' ); 
    wp_enqueue_script( 'wp-color-picker-alpha', FORMSUITE_URL . '/js/wp-color-picker-alpha.min.js', array( 'wp-color-picker' ), '2.1.4', true );

    wp_enqueue_style( 'formsuite-admin.css', FORMSUITE_URL . '/css/formsuite-admin.css', array(), FORMSUITE_VERSION );
    wp_enqueue_script( 'formsuite-admin.js', FORMSUITE_URL . '/js/formsuite-admin.js', array( 'jquery', 'wp-color-picker' ), FORMSUITE_VERSION );

  }


  // Admin menu
  public function settings_page() {
    add_submenu_page(
      'options-general.php',
      'FormSuite',
      'FormSuite',
      'manage_options',
      'formsuite-login-form-customizer',
      [$this, 'settings_content']
    );
  }


  // Actions links in plugins admin screen
  public function add_action_links( $links ) {
    $links[] = '<a href="' . admin_url( 'options-general.php?page=formsuite-login-form-customizer' ) . '">' . __( 'Settings', 'formsuite' ) . '</a>';
    return $links;
  }


  //-----------------//
  //--- FUNCTIONS ---//
  //-----------------//

  // Change the logo link
  function change_logo_link() {
    return home_url();
  }

  // Change the logo title
  function change_logo_title() {
    return get_bloginfo('name');
  }

  // Image Uploader
  function image_uploader( $option ) {

    $logo_id = get_option( $option );
    $default_image = plugins_url('img/no-image.png', __FILE__);

    if ( ! empty( $logo_id ) ) {

      $src = wp_get_attachment_image_src( $logo_id, 'full' )[0];
      $value = $logo_id;

    } else {

      $src = $default_image;
      $value = '';

    }

    $text = __( 'Upload Image', 'formsuite' );

    // Print HTML field
    $html =

      '<div class="formsuite-login-customizer-img-upload-form">
        <img data-src="' . $default_image . '" src="' . $src . '" width="150" height="auto" />
        <div>
          <input type="hidden" name="' . $option . '" value="' . $value . '" />
          <button type="submit" class="formsuite-lform-upload-image-btn button">' . $text . '</button>
          <button type="submit" class="formsuite-loginform-remove-image-btn">Delete</button>
        </div>
      </div>';

    echo $html;

  }


  //-------------------------------//
  //--- Public Scripts & Styles ---//
  //-------------------------------//
  function public_scripts_styles() {

    // JS Script
    wp_enqueue_script( 'formsuite-public-js', FORMSUITE_URL . '/js/formsuite-public-js', array( 'jquery' ), FORMSUITE_VERSION, true );

    // CSS Stylesheet
    wp_enqueue_style( 'formsuite-public.css', FORMSUITE_URL . '/css/formsuite-public.css', array(), FORMSUITE_VERSION );

    include_once ( 'inc/public-styles.php' );

  }



  //----------------//
  //--- SETTINGS ---//
  //----------------//

  // Register settings
  public function register_settings() {
    register_setting( 'formsuite_login_form_customizer_settings', 'formsuite_logo_img' );
    register_setting( 'formsuite_login_form_customizer_settings', 'formsuite_submit_btn_bg' );
    register_setting( 'formsuite_login_form_customizer_settings', 'formsuite_submit_btn_text_color' );
    register_setting( 'formsuite_login_form_customizer_settings', 'formsuite_loginform_accent_color' );
    register_setting( 'formsuite_login_form_customizer_settings', 'formsuite_bg_color' );
    register_setting( 'formsuite_login_form_customizer_settings', 'formsuite_login_form_bg' );
    register_setting( 'formsuite_login_form_customizer_settings', 'formsuite_bg_img' );
    register_setting( 'formsuite_login_form_customizer_settings', 'formsuite_label_color' );
    register_setting( 'formsuite_login_form_customizer_settings', 'formsuite_loginform_footer_link_color' );
  }

  // Get Settings
  function get_settings(){

    $settings = [
      'logo_img'              => get_option( 'formsuite_logo_img' ),
      'bg_color'              => get_option( 'formsuite_bg_color' ),
      'submit_btn_bg'         => get_option( 'formsuite_submit_btn_bg' ),
      'submit_btn_text_color' => get_option( 'formsuite_submit_btn_text_color' ),
      'accent_color'          => get_option( 'formsuite_loginform_accent_color' ),
      'form_bg'               => get_option( 'formsuite_login_form_bg' ),
      'bg_img'                => get_option( 'formsuite_bg_img' ),
      'label_color'           => get_option( 'formsuite_label_color' ),
      'footer_link_color'     => get_option( 'formsuite_loginform_footer_link_color' ),
    ];

    return $settings;
  }

  // Settings page content
  public function settings_content() {

    // Settings Data
    $settings = $this->get_settings();

    ?>

    <div class="wrap">
      <h1>FormSuite Login Form Customizer</h1>

      <form method="post" action="options.php">

        <?php settings_fields( 'formsuite_login_form_customizer_settings' ); ?>
        <?php do_settings_sections( 'formsuite_login_form_customizer_settings' ); ?>

        <table class="form-table">
          <tr>
            <th><?php echo __( 'Logo', 'formsuite' ); ?></th>
            <td><?php $this->image_uploader( 'formsuite_logo_img' ); ?></td>
          </tr>
          <tr>
            <th><?php echo __( 'Background Image', 'formsuite' ); ?></th>
            <td><?php $this->image_uploader( 'formsuite_bg_img' ); ?></td>
          </tr>
        </table>

        <!-- Colors : START -->
        <h2><?php echo __( 'Colors', 'formsuite'); ?></h2>
        <table class="form-table">
          <tr>
            <th><?php echo __( 'Main Background', 'formsuite' ); ?></th>
            <td><input type="text" name="formsuite_bg_color" value="<?php echo $settings['bg_color']; ?>" class="color-picker" data-alpha="true" /></td>
          </tr>
          <tr>
            <th><?php echo __( 'Form Background', 'formsuite' ); ?></th>
            <td><input type="text" name="formsuite_login_form_bg" value="<?php echo $settings['form_bg']; ?>" class="color-picker" data-alpha="true" /></td>
          </tr>
          <tr>
            <th><?php echo __( 'Accent Color', 'formsuite' ); ?></th>
            <td><input type="text" name="formsuite_loginform_accent_color" value="<?php echo $settings['accent_color']; ?>" class="color-picker" data-alpha="true" /></td>
          </tr>
          <tr>
            <th><?php echo __( 'Labels', 'formsuite' ); ?></th>
            <td><input type="text" name="formsuite_label_color" value="<?php echo $settings['label_color']; ?>" class="color-picker" data-alpha="true" /></td>
          </tr>
          <tr>
            <th><?php echo __( 'Footer Links Color', 'formsuite' ); ?></th>
            <td><input type="text" name="formsuite_loginform_footer_link_color" value="<?php echo $settings['footer_link_color']; ?>" class="color-picker" data-alpha="true" /></td>
          </tr>
        </table>

        <h3><?php echo __( 'Submit Button', 'formsuite' ); ?></h3>
        <table class="form-table">
          <tr>
            <th><?php echo __( 'Text', 'formsuite' ); ?></th>
            <td><input type="text" name="formsuite_submit_btn_text_color" value="<?php echo $settings['submit_btn_text_color']; ?>" class="color-picker" data-alpha="true" /></td>
          </tr>
          <tr>
            <th><?php echo __( 'Background', 'formsuite' ); ?></th>
            <td><input type="text" name="formsuite_submit_btn_bg" value="<?php echo $settings['submit_btn_bg']; ?>" class="color-picker" data-alpha="true" /></td>
          </tr>
        </table>
        <!-- Colors : END -->

        <?php submit_button(); ?>

      </form>
    </div>

  <?php }



}


// Instantiation
$formsuite_wp_login_page = new Formsuite_Login_Form_Page();