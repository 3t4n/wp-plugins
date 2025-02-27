<?php
/**
 * Plugin Name: Math Captcha for Elementor Forms
 * Description: Simple match captcha for Elementor Page Builder Forms
 * Plugin URI: https://albanotoska.com/bsbanners/bs-math-captcha-for-elementor-forms/
 * Version: 1.1.0
 * Author: Albano Toska
 * Author URI: https://albanotoska.com/
 * License:     GPL2
 * License URI:  https://www.gnu.org/licenses/gpl-2.0.html
 */
if ( ! defined( 'ABSPATH' ) ) exit;
/* ENQUEUE NEEDED STYLES AND JS */
function bs_match_captcha_for_elementor_forms_scripts_style() {
      wp_register_script( 'mainjs', plugin_dir_url( __FILE__ ) . '/assets/js/main.js', array('jquery'), false, true );
            wp_enqueue_script( 'mainjs' );
            wp_register_script( 'ebrecaptcha', plugin_dir_url( __FILE__ ) . '/assets/js/jquery.ebcaptcha.js', array('jquery'), false, true );
            wp_enqueue_script( 'ebrecaptcha' );
            wp_register_script( 'arrivejs', plugin_dir_url( __FILE__ ) . '/assets/js/arrive.min.js', array('jquery'), false, true );
            wp_enqueue_script( 'arrivejs' );
  wp_register_style( 'maincss', plugin_dir_url( __FILE__ ) . '/assets/css/main.css');
            wp_enqueue_style( 'maincss' );
}
add_action( 'wp_enqueue_scripts', 'bs_match_captcha_for_elementor_forms_scripts_style' );

/* REGISTER SETTINGS */
function bs_math_captcha_for_elementor_settings_register() {
   add_option( 'bs_math_captcha_for_elementor_error', 'Error Label');
   register_setting( 'bs_math_captcha_option_value', 'bs_math_captcha_for_elementor_error', 'myplugin_callback' );
   add_option( 'bs_math_captcha_signs_plus', 'Plus Checkbox');
   register_setting( 'bs_math_captcha_option_value', 'bs_math_captcha_signs_plus', 'myplugin_callback' );
   add_option( 'bs_math_captcha_signs_minus', 'Minus Checkbox');
   register_setting( 'bs_math_captcha_option_value', 'bs_math_captcha_signs_minus', 'myplugin_callback' );
   add_option( 'bs_math_captcha_signs_multiply', 'Multiply Checkbox');
   register_setting( 'bs_math_captcha_option_value', 'bs_math_captcha_signs_multiply', 'myplugin_callback' );
}
add_action( 'admin_init', 'bs_math_captcha_for_elementor_settings_register' );

/* OPTION PAGE */
function bs_math_captcha_for_elementor_option_page() {
  add_options_page('BS Math Captcha for Elementor', 'BS Math Captcha for Elementor', 'manage_options', 'bs_math_captcha_for_elementor_option', 'bs_math_captcha_for_elementor_option_page_content');
}
add_action('admin_menu', 'bs_math_captcha_for_elementor_option_page');

/* CONTENT FOR OPTION PAGE */
function bs_math_captcha_for_elementor_option_page_content()
{
?>
  <div>
  <?php screen_icon(); ?>
  <h2>BS Math Captcha for Elementor</h2>
  <form method="post" action="options.php">
  <?php settings_fields( 'bs_math_captcha_option_value' ); ?>
  <h4>Please enter custom error message you want to show on invalid captcha</h4>
  <table>
  <tr valign="top">
  <td><input type="text" id="bs_math_captcha_for_elementor_error" name="bs_math_captcha_for_elementor_error" value="<?php echo get_option('bs_math_captcha_for_elementor_error'); ?>" /></td>
  </tr>
  </table>
  <h4> Please check which math logics to use</h4>
  <table>
  <tr valign="top">
    <td>
      <input type="checkbox" <?php if (get_option('bs_math_captcha_signs_plus')) echo 'checked' ?> id="bs_math_captcha_signs_plus" name="bs_math_captcha_signs_plus" value="+">
      <label for="bs_math_captcha_signs_plus">Plus(+)</label>&ensp;
      <input type="checkbox" <?php if (get_option('bs_math_captcha_signs_minus')) echo 'checked' ?> id="bs_math_captcha_signs_minus" name="bs_math_captcha_signs_minus" value="-">
      <label for="bs_math_captcha_signs_minus">Minus(-)</label>&ensp;
      <input type="checkbox" <?php if (get_option('bs_math_captcha_signs_multiply')) echo 'checked' ?> id="bs_math_captcha_signs_multiply" name="bs_math_captcha_signs_multiply" value="*">
      <label for="bs_math_captcha_signs_multiply">Multiply(*)</label>&ensp;
    </td>
  </tr>
  </table>
  <?php  submit_button(); ?>
  </form>
  </div>
<?php
}

/* PLUGIN SETTINGS FROM PLUGIN LIST */
function bs_math_captcha_for_elementor_settings_plugins($links) { 
  $settings_link = '<a href="options-general.php?page=bs_math_captcha_for_elementor_option">Settings</a>'; 
  array_unshift($links, $settings_link); 
  return $links; 
}
$plugin = plugin_basename(__FILE__); 
add_filter("plugin_action_links_$plugin", 'bs_math_captcha_for_elementor_settings_plugins' );

/* CHECK MATH CAPTCHA FUNCTION */
function bs_math_captcha_for_elementor_error_messages() {
  $custom_error_message = get_option('bs_math_captcha_for_elementor_error');
?>
<script>
  var bs_math_captcha_plus_sign = false;
  var bs_math_captcha_minus_sign = false;
  var bs_math_captcha_multiply_sign = false;
  <?php if (get_option('bs_math_captcha_signs_plus')) { ?>
    bs_math_captcha_plus_sign = true;
  <?php }
  if (get_option('bs_math_captcha_signs_minus')) { ?>
    bs_math_captcha_minus_sign = true;
  <?php }
  if (get_option('bs_math_captcha_signs_multiply')) { ?>
    bs_math_captcha_multiply_sign = true;
 <?php } ?>
  jQuery(document).ready(function($) {
    $(document).on('click', '.bs-submit-button-event', function (e) {   
      e.stopPropagation();
          if ($(".elementor-field-type-submit .elementor-button").is(":disabled"))
          {
          $('#errorcaptcha').show();
          $('#bs_ebcaptchainput').css('border-color', 'red');
            if ($("#errorcaptcha").length == 0) {
              $('<p id="errorcaptcha"><?php if($custom_error_message) { echo $custom_error_message; } else { echo __( 'Math Captcha Error', 'math-captcha-for-elementor-forms'); } ?></p>').insertBefore('.elementor-field-type-submit');
              $('#bs_ebcaptchainput').css('border-color', 'red');
            }
          }
          else {
            $('#errorcaptcha').hide();
            $('#bs_ebcaptchainput').css('border-color', '');
        }
      });
  });
</script>
<?php
}
add_action('wp_head', 'bs_math_captcha_for_elementor_error_messages');
