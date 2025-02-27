<?php
/*
* Plugin Name: Urdu Typing
* Plugin URI: https://wordpress.org/plugins/wpac-typing/
* Author: WPAcademy.PK
* Author URI: https://wpacademy.pk
* Description: This plugin will let you write Urdu in WordPress Posts or Pages.
* Version: 1.0
* License: GPL2
* License URI:  https://www.gnu.org/licenses/gpl-2.0.html
* Text Domain: wpac_typing
*/

defined('ABSPATH') or die("No script kiddies please!");
define( 'WPACUT_VERSION',   '1.0' );
define( 'WPACUT_URL', plugins_url( '', __FILE__ ) );
define( 'WPACUT_TEXTDOMAIN',  'wpac_typing' );

class WPAC_Typing {

  function __construct() {
    add_action( 'wp_loaded', array( $this, 'init') );
  }

  public function init() {
    add_action( 'admin_menu', array( $this, 'wpac_typing_admin_page') );
    add_action( 'admin_init', array( $this, 'add_editor_buttons' ) );
    add_action( 'admin_footer', array( $this, 'popup' ) );

    // styling
    add_action( 'admin_print_styles', array( $this, 'admin_styles') );
    add_action( 'admin_print_styles',  array( $this, 'admin_scripts') );

    add_filter( 'enter_title_here',  array( $this, 'wpac_typing_title_text_input') );

    // Default WordPress post editor to HTML
    add_filter( 'wp_default_editor', function(){return "html";} );

  }

 /*
  * Register admin css
  */
  public function admin_styles() {
      wp_enqueue_style( 'wpac-ut-admin', WPACUT_URL . '/assets/css/style.css', array(), WPACUT_VERSION, 'all' );
  }

  /*
   * Register admin scripts
   */
  public function admin_scripts() {
      wp_enqueue_script( 'wpac-ut-editor', WPACUT_URL . '/assets/js/UrduEditor.js', array( 'jquery' ), WPACUT_VERSION, true );
      wp_enqueue_script( 'wpac-ut-init', WPACUT_URL . '/assets/js/init.js', array( 'jquery' ), WPACUT_VERSION, true );
  }

  /*
   * Add buttons to TimyMCE
   */
  function add_editor_buttons() {
    // add shortcode button
    add_action( 'media_buttons', array( $this, 'wpac_ut_help_button' ), 10 );
  }

  /*
   * Add button to TimyMCE
   */

  public function wpac_ut_help_button( $page = null, $target = null ) {
    ?>
      <a href="#TB_inline?width=640&amp;height=600&amp;inlineId=wpac-ut-wrap" id="urdu_keyboard_help" class="thickbox button" title="<?php _e( 'Urdu Typing Help', WPACUT_TEXTDOMAIN ); ?>" data-page="<?php echo $page; ?>" data-target="<?php echo $target; ?>">
        <img src="<?php echo WPACUT_URL . "/assets/images/keyboard.png";?>" alt="" />
      </a>
    <?php
  }

  /*
   * Help window Popup
   */

  public function popup() {
  ?>
    <div id="wpac-ut-wrap" style="display:none">
      <div class="wpac-ut">
        <img src="<?php echo WPACUT_URL . "/assets/images/keyboard-layout.png";?>" alt="" style="max-width: 100%;"/>
      </div>
    </div>

    <?php
  }

  /*
   * Post Title placeholder
   */
  public function wpac_typing_title_text_input( $title ){
     return $title = 'پوسٹ کو اردو میں عنوان دیں';
  }

  /*
   * Plugin Setting (Information) page.
   */
  public function wpac_typing_admin_page(){
    add_menu_page( 'WPAC Urdu Typing', 'WPAC Typing', 'manage_options', 'wpac_typing_options', array($this, 'wpacut_options_page'), '
    dashicons-editor-paste-text', 101 );
  }

  public function wpacut_options_page(){
      ?>
      <div class="wrap">
      <h2>Urdu Keyboard by WPAcademy</h2>
      <div class="wpac-ut_keyboard">
        <h3>Phonetic Layout</h3>
        <img src="<?php echo WPACUT_URL . "/assets/images/keyboard-layout.png";?>" alt="" style="max-width: 100%;"/>
      </div>
      <div class="wpac-ut_content">
        <h3>How to use</h3>
        <h4>This Urdu Keyoboard (Phonetic) for WordPress, enables you to easily type Urdu in WordPress without installing Urduphonetic keyboard in your system.</h4>

        <h4>Press <code>Ctrl + Space</code> to change keyboard writing from <code>English to Urdu</code> or <code>Urdu to English</code>.</h4>

        <h4>In this version, Urdu keyboard is enabled only on Posts and Pages <code>Title</code>, <code>Content</code>, <code>Excerpt</code>, <code>Category Name</code> and <code>Tags</code> </h4>

        <hr/>
        <h3>Compatible Browsers:</h3>
        <p><img src="<?php echo WPACUT_URL . "/assets/images/ic-browsers.png";?>" alt=""/></p>
      </div>
      </div>
      <?php
  }

}

new WPAC_Typing();