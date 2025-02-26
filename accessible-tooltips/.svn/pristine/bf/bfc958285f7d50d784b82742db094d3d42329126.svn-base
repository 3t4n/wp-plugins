<?php
/**
 * Plugin Name:       Accessible Tooltips
 * Text Domain:       accessible-tooltips
 * Domain Path:       /languages
 * Description:       An extension to make accessible tooltips easily using the awesome TippyJS library (https://atomiks.github.io/tippyjs/). Works in Gutenberg and classic editor.
 * Version:           1.2
 * Requires at least: 5.6
 * Requires PHP:      7.2
 * Author:            Quentin BETTOUM "Toile de Maître"
 * Author URI:        https://toiledemaitre.fr/
 * License:           GPL v3 or later
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.html
 */

namespace AccessibleTooltips;

class AccessibleTooltips {
  const POST_TYPE_NAME = 'accessible_tooltip';

  public $plugin_name = 'Accessible Tooltips';
  public $text_domain = 'accessible-tooltips';
  public $default_options = [
    'theme' => 'default',
    'interactive_border_size' => 8,
    'placement' => 'bottom',
    'fallback_placement' => 'top',
    'allow_html' => true,
    'hide_on_click' => false
  ];

  /**
   * Initializes the plugin.
   *
   * To keep the initialization fast, only add filter and
   * action hooks in the constructor.
   */
  public function __construct() {
    add_action( 'init', array( $this, 'register_tooltip_format' ) );
    add_action( 'init', array( $this, 'add_accessible_tooltips_textdomain' ) );
    add_action( 'init', array( $this, 'accessible_tooltip_custom_post_type' ) );
    add_action( 'init', array( $this, 'add_accessible_tooltip_shortcode' ) );
    add_action( 'enqueue_block_editor_assets', array( $this, 'enqueue_tooltip_format_script' ) );
    add_action( 'admin_menu', array( $this, 'add_settings_menu' ), 9 );
    add_action( 'wp_head', array( $this, 'tooltips_scripts' ) );

    // TinyMCE and Qtags actions
    add_action( 'init', array( $this, 'tinymce_tooltip_button' ) );
    add_action( 'admin_head', array( $this, 'add_mce_translated_strings' ) );
    add_action( 'admin_print_footer_scripts', array( $this, 'add_tooltip_to_qtags' ) );

    // Enqueue tippy custom style
    add_action( 'wp_print_scripts', array( $this, 'apply_custom_tippy_style' ) );
  }

  public function apply_custom_tippy_style() {
    ?>
    <style type="text/css">
    <?= get_option('accessible_tooltips_custom_css') ?>
    </style>
    <?php
  }

  public function add_tooltip_to_qtags() { ?>
  	<script language="javascript" type="text/javascript">
      if(typeof QTags !== "undefined") {
        QTags.addButton( 'accessible-tooltips', '<?php _e('tooltip', 'accessible-tooltips') ?>', '[accessible-tooltip]', '[/accessible-tooltip]', '', '<?php _e('Add a tooltip shortcode', 'accessible-tooltips') ?>' );
      }
  	</script>
  <?php
  }

  public function add_mce_translated_strings() {
    ?>
    <script type="text/javascript">
    var accessible_tooltips_mce_data = {
      'click_to_add_a_tooltip': '<?php _e('Click to add a tooltip', 'accessible-tooltips') ?>',
      'stylesheet_directory': '<?= plugin_dir_url(__FILE__) ?>'
    };
    </script>
    <?php
  }

  public function tinymce_tooltip_button() {
    if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) || get_user_option( 'rich_editing' ) !== 'true' ) {
      return;
    }

    add_filter( 'mce_external_plugins', array( $this, 'tinymce_add_button' ) );
    add_filter( 'mce_buttons', array( $this, 'tinymce_register_button' ) );
  }

  public function tinymce_add_button( $plugin_array ) {
    $plugin_array['tooltipbutton'] = plugins_url( 'build/tinymce-tooltip-plugin.bundle.js', __FILE__ );
    return $plugin_array;
  }

  public function tinymce_register_button( $buttons ) {
    array_push( $buttons, 'tooltipbutton' );
    return $buttons;
  }

  public function add_settings_menu() {
    add_option( 'accessible_tooltips_theme', $this->default_options['theme']);
    add_option( 'accessible_tooltips_interactive_border_size', $this->default_options['interactive_border_size']);
    add_option( 'accessible_tooltips_placement', $this->default_options['placement']);
    add_option( 'accessible_tooltips_fallback_placement', $this->default_options['fallback_placement']);
    add_option( 'accessible_tooltips_allow_html', $this->default_options['allow_html']);
    add_option( 'accessible_tooltips_hide_on_click', $this->default_options['hide_on_click']);
    add_option( 'accessible_tooltips_custom_css', '');

    register_setting(
      'accessible_tooltips_options',
      'accessible_tooltips_theme',
      [
        'type' => 'string',
        'default' => $this->default_options['theme']
      ]
    );
    register_setting(
      'accessible_tooltips_options',
      'accessible_tooltips_interactive_border_size',
      [
        'type' => 'integer',
        'default' => $this->default_options['interactive_border_size']
      ]
    );
    register_setting(
      'accessible_tooltips_options',
      'accessible_tooltips_placement',
      [
        'type' => 'string',
        'default' => $this->default_options['placement']
      ]
    );
    register_setting(
      'accessible_tooltips_options',
      'accessible_tooltips_fallback_placement',
      [
        'type' => 'string',
        'default' => $this->default_options['fallback_placement']
      ]
    );
    register_setting(
      'accessible_tooltips_options',
      'accessible_tooltips_allow_html',
      [
        'type' => 'boolean',
        'default' => $this->default_options['allow_html']
      ]
    );
    register_setting(
      'accessible_tooltips_options',
      'accessible_tooltips_hide_on_click',
      [
        'type' => 'boolean',
        'default' => $this->default_options['hide_on_click']
      ]
    );
    register_setting(
      'accessible_tooltips_options',
      'accessible_tooltips_custom_css',
      [
        'type' => 'string',
        'default' => ''
      ]
    );

    add_submenu_page( 'edit.php?post_type='.self::POST_TYPE_NAME, __( 'Settings', 'accessible-tooltips' ), __( 'Settings', 'accessible-tooltips' ), 'manage_options', 'accessible-tooltips', array( &$this, 'settings_page' ) );
  }

  public function settings_page() {
    require_once 'settings_page.php';
  }

  public function accessible_tooltip_custom_post_type() {
    register_post_type( self::POST_TYPE_NAME,
      array(
        'labels'              => array(
          'name'                => __( 'Tooltips', 'accessible-tooltips' ),
          'singular_name'       => __( 'Tooltip', 'accessible-tooltips' ),
        ),
        'public'              => false,
        'has_archive'         => false,
        'exclude_from_search' => true,
        'publicly_queryable'  => false,
        'show_ui'             => true,
        'menu_icon'           => 'dashicons-admin-comments'
      )
    );
  }

  public function accessible_tooltip_shortcode( $atts = [], $content = null, $tag = '' ) {
    $tooltip_post = get_page_by_title( strip_tags($content), OBJECT, self::POST_TYPE_NAME );
    // return print_r($tooltip_post);

    if($tooltip_post !== NULL) {
      $tooltipOpeningTag =
      "<span
      class='tooltip-style'
      tabindex='0'
      data-tippy-content='".htmlentities(nl2br($tooltip_post->post_content), ENT_QUOTES, 'UTF-8', false)."'>";
      return $tooltipOpeningTag.$content.'</span>';
    }
    return $content;
  }

  public function add_accessible_tooltip_shortcode() {
    add_shortcode( 'accessible-tooltip', array( $this, 'accessible_tooltip_shortcode' ) );
  }

  public function register_tooltip_format() {
    $asset_file = include( plugin_dir_path( __FILE__ ) . 'build/index.asset.php');
    wp_register_script(
      'accessible-tooltip-format-js',
      plugins_url( 'build/index.js', __FILE__ ),
      $asset_file['dependencies'],
      $asset_file['version']
    );
  }

  public function enqueue_tooltip_format_script() {
    wp_enqueue_script( 'accessible-tooltip-format-js' );
    wp_set_script_translations( 'accessible-tooltip-format-js', 'accessible-tooltips', plugin_dir_path( __FILE__ ) . 'languages' );
  }

  public function tooltips_scripts() {
    wp_enqueue_script(
      'tooltips.js',
      plugins_url( 'build/tooltips.bundle.js', __FILE__ )
    );
    wp_localize_script(
      'tooltips.js',
      'tippy_vars',
      json_encode(array(
  			'theme' => get_option('accessible_tooltips_theme'),
  			'interactiveBorder' => intval(get_option('accessible_tooltips_interactive_border_size')),
  			'placement' => get_option('accessible_tooltips_placement'),
  			'fallbackPlacements' => get_option('accessible_tooltips_fallback_placement'), // Could be an array with multiple fallbacks, but it will only accept one value for now
  			'allowHTML' => get_option('accessible_tooltips_allow_html') === "on",
  			'hideOnClick' => get_option('accessible_tooltips_hide_on_click') === "on"
      ))
    );
  }

  public function add_accessible_tooltips_textdomain() {
    load_plugin_textdomain( 'accessible-tooltips', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
  }
}

// Initialize the plugin
( new AccessibleTooltips() );

?>
