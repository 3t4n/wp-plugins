<?php
/*
Plugin Name: AudioTyped UX
Plugin URI: https://audiotyped.de/ux/
Description: Makes the Settings for the UX Interview Layouts of your Transcripts.
Author: Helmut Naber, AudioTyped
Author URI: https://audiotyped.de
Text Domain: audiotyped-ux
Version: 1.0.21
*/

// Prohibit direct script loading.
defined( 'ABSPATH' ) || die( 'No direct script access allowed!' );

add_action( 'wp_enqueue_scripts', 'audiotyped_enqueue_styles' );
function audiotyped_enqueue_styles() {
      $file_url = plugins_url('audiotyped.css',__FILE__);
      wp_enqueue_style( 'at_stylesheet', $file_url );
}

// Add the Color Picker
add_action( 'admin_enqueue_scripts', 'mw_enqueue_color_picker' );
function mw_enqueue_color_picker( $hook_suffix ) {
    //  check that $hook_suffix is appropriate for your admin page
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'my-script-handle', plugins_url('colorpicker.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
}

// Call audiotyped_settings_menu function to load plugin menu in dashboard
add_action( 'admin_menu', 'audiotyped_settings_menu' );

// Create WordPress admin menu
if( !function_exists("audiotyped_settings_menu") )
{
function audiotyped_settings_menu(){

  $page_title = 'AudioTyped UX';
  $menu_title = 'AudioTyped UX';
  $capability = 'manage_options';
  $menu_slug  = 'audiotyped-settings';
  $function   = 'audiotyped_settings_page';
  $icon_url   = 'dashicons-testimonial';
  $position   = 4;
 
  add_submenu_page( 'options-general.php', $page_title, $menu_title, $capability, $menu_slug, $function );

  // Call update_audiotyped_settings function to update database
  add_action( 'admin_init', 'update_audiotyped_settings' );

}
}

// Set default vaulues if not set
if( !function_exists("initialize_default_values") ) {
  $default_audiotyped_dc_size = get_option('audiotyped_dc_size');
  $default_audiotyped_ma_size = get_option('audiotyped_ma_size');
  $default_audiotyped_md_size = get_option('audiotyped_md_size');
  $default_audiotyped_md_size = get_option('audiotyped_mbpv_size');
  $default_audiotyped_md_size = get_option('audiotyped_mbph_size');
  $default_audiotyped_md_size = get_option('audiotyped_dbpv_size');
  $default_audiotyped_md_size = get_option('audiotyped_dbph_size');
    if($default_audiotyped_dc_size == ""){
         add_option('audiotyped_dc_size', '80');
         $default_audiotyped_dc_size= get_option('audiotyped_dc_size');
  }
    if($default_audiotyped_ma_size == ""){
         add_option('audiotyped_ma_size', '50');
         $default_audiotyped_ma_size= get_option('audiotyped_ma_size');
  }
    if($default_audiotyped_md_size == ""){
         add_option('audiotyped_md_size', '35');
         $default_audiotyped_md_size= get_option('audiotyped_md_size');
  }
    if($default_audiotyped_mbpv_size == ""){
         add_option('audiotyped_mbpv_size', '4');
         $default_audiotyped_md_size= get_option('audiotyped_mbpv_size');
  }
    if($default_audiotyped_mbph_size == ""){
         add_option('audiotyped_mbph_size', '12');
         $default_audiotyped_md_size= get_option('audiotyped_mbph_size');
  }
    if($default_audiotyped_dbpv_size == ""){
         add_option('audiotyped_dbpv_size', '10');
         $default_audiotyped_md_size= get_option('audiotyped_dbpv_size');
  }
    if($default_audiotyped_dbph_size == ""){
         add_option('audiotyped_dbph_size', '16');
         $default_audiotyped_md_size= get_option('audiotyped_dbph_size');
  }
}

// Create function to register plugin settings in the database
if( !function_exists("update_audiotyped_settings") )
{
function update_audiotyped_settings() {
  register_setting( 'audiotyped-settings', 'audiotyped_tb_color' );
  register_setting( 'audiotyped-settings', 'audiotyped_gb_color' );
  register_setting( 'audiotyped-settings', 'audiotyped_hb_color' );
  register_setting( 'audiotyped-settings', 'audiotyped_gf_color' );
  register_setting( 'audiotyped-settings', 'audiotyped_hf_color' );
  register_setting( 'audiotyped-settings', 'audiotyped_avatar' );
  register_setting( 'audiotyped-settings', 'audiotyped_bubble' );
  register_setting( 'audiotyped-settings', 'audiotyped_mf_size' );
  register_setting( 'audiotyped-settings', 'audiotyped_df_size' );
  register_setting( 'audiotyped-settings', 'audiotyped_shadow_blur' );
  register_setting( 'audiotyped-settings', 'audiotyped_dgap_size' );
  register_setting( 'audiotyped-settings', 'audiotyped_dc_size' );
  register_setting( 'audiotyped-settings', 'audiotyped_ma_size' );
  register_setting( 'audiotyped-settings', 'audiotyped_md_size' );
  register_setting( 'audiotyped-settings', 'audiotyped_mbpv_size' );
  register_setting( 'audiotyped-settings', 'audiotyped_mbph_size' );
  register_setting( 'audiotyped-settings', 'audiotyped_dbpv_size' );
  register_setting( 'audiotyped-settings', 'audiotyped_dbph_size' );
  register_setting( 'audiotyped-settings', 'audiotyped_mgap_size' );
}
}

// Create WordPress plugin page
if( !function_exists("audiotyped_settings_page") )
{
function audiotyped_settings_page(){       
?>             
  <h1>AudioTyped UX Interview Layout Settings</h1>
  <form method="post" action="options.php">
    <?php settings_fields( 'audiotyped-settings' ); ?>
    <?php do_settings_sections( 'audiotyped-settings' ); ?>
    <table class="form-table">
      <p>Here you can make the settings for the individual design of your podcast interview transcripts.</p>
      <tr valign="top">
      <th scope="row">Transcript color:</th>
      <td><input type="text" name="audiotyped_tb_color" value="<?php echo get_option('audiotyped_tb_color'); ?>" class="my-color-field" /></td>
      </tr> 
      <tr valign="top">
      <th scope="row">Host bubble color:</th>
      <td><input type="text" name="audiotyped_hb_color" value="<?php echo get_option('audiotyped_hb_color'); ?>" class="my-color-field" /></td>
      </tr>    
      <tr valign="top">
      <th scope="row">Guest bubble color:</th>
      <td><input type="text" name="audiotyped_gb_color" value="<?php echo get_option('audiotyped_gb_color'); ?>" class="my-color-field" /></td>
      </tr>
      <tr valign="top">
      <th scope="row">Host font color:</th>
      <td><input type="text" name="audiotyped_hf_color" value="<?php echo get_option('audiotyped_hf_color'); ?>" class="my-color-field" /></td>
      </tr>    
      <tr valign="top">
      <th scope="row">Guest font color:</th>
      <td><input type="text" name="audiotyped_gf_color" value="<?php echo get_option('audiotyped_gf_color'); ?>" class="my-color-field" /></td>
      </tr>
      <tr valign="top">
      <th scope="row">Avatar rounding of border:</th>
      <td><input type="number" min="0" max="50" name="audiotyped_avatar" value="<?php echo get_option('audiotyped_avatar'); ?>"/> (Numbers from 0 to 50)</td>
      </tr>
      <tr valign="top">
      <th scope="row">Bubble rounding of border:</th>
      <td><input type="number" min="0" max="10" name="audiotyped_bubble" value="<?php echo get_option('audiotyped_bubble'); ?>"/> (Numbers from 0 to 10)</td>
      </tr>    
      <tr valign="top">
      <th scope="row">Bubble shadow blur:</th>
      <td><input type="number" min="0" max="25" name="audiotyped_shadow_blur" value="<?php echo get_option('audiotyped_shadow_blur'); ?>"/> (Numbers from 0 to 25)</td>
      </tr>   
      <tr valign="top">
      <th scope="row">Desktop - Avatar size:</th>
      <td><input type="number" min="45" max="100" name="audiotyped_dc_size" value="<?php echo get_option('audiotyped_dc_size'); ?>"/> (from 45 to 100 px)</td>
      </tr>  
      <tr valign="top">
      <th scope="row">Desktop - Font size:</th>
      <td><input type="number" min="12" max="30" name="audiotyped_df_size" value="<?php echo get_option('audiotyped_df_size'); ?>"/> (from 12 to 30 px)</td>
      </tr>  
      <tr valign="top">
      <th scope="row">Desktop - Gap Bubble Avatar:</th>
      <td><input type="number" min="0" max="30" name="audiotyped_dgap_size" value="<?php echo get_option('audiotyped_dgap_size'); ?>"/> (from 0 to 30 px)</td>
      </tr>  
      <tr valign="top">
      <th scope="row">Desktop - Bubble Padding vertical:</th>
      <td><input type="number" min="0" max="40" name="audiotyped_dbpv_size" value="<?php echo get_option('audiotyped_dbpv_size'); ?>"/> (from 0 to 40 px)</td>
      </tr>
      <tr valign="top">
      <th scope="row">Desktop - Bubble Padding horizontal:</th>
      <td><input type="number" min="6" max="50" name="audiotyped_dbph_size" value="<?php echo get_option('audiotyped_dbph_size'); ?>"/> (from 6 to 50 px)</td>
      </tr>  
      <tr valign="top">
      <th scope="row">Mobile - Avatar size:</th>
      <td><input type="number" min="40" max="80" name="audiotyped_ma_size" value="<?php echo get_option('audiotyped_ma_size'); ?>"/> (from 40 to 80 px)</td>
      </tr> 
      <tr valign="top">
      <th scope="row">Mobile - Font size:</th>
      <td><input type="number" min="10" max="20" name="audiotyped_mf_size" value="<?php echo get_option('audiotyped_mf_size'); ?>"/> (from 10 to 20 px)</td>
      </tr>  
      <tr valign="top">
      <th scope="row">Mobile - Gap Bubble Avatar:</th>
      <td><input type="number" min="0" max="20" name="audiotyped_mgap_size" value="<?php echo get_option('audiotyped_mgap_size'); ?>"/> (from 0 to 20 px)</td>
      </tr>  
      <tr valign="top">
      <th scope="row">Mobile - Vertical distance:</th>
      <td><input type="number" min="30" max="80" name="audiotyped_md_size" value="<?php echo get_option('audiotyped_md_size'); ?>"/> (from 30 to 80 px)</td>
      </tr>   
      <tr valign="top">
      <th scope="row">Mobile - Bubble Padding vertical:</th>
      <td><input type="number" min="0" max="30" name="audiotyped_mbpv_size" value="<?php echo get_option('audiotyped_mbpv_size'); ?>"/> (from 0 to 30 px)</td>
      </tr>
      <tr valign="top">
      <th scope="row">Mobile - Bubble Padding horizontal:</th>
      <td><input type="number" min="6" max="30" name="audiotyped_mbph_size" value="<?php echo get_option('audiotyped_mbph_size'); ?>"/> (from 6 to 30 px)</td>
      </tr>    
    </table>
  <?php submit_button(); ?>
  </form>
<?php
}
}

// Passing the values to Javascript
add_action( 'wp_enqueue_scripts', 'audiotyped_enqueue_scripts' );
function audiotyped_enqueue_scripts() {
      $file_url = plugins_url('audiotyped.js',__FILE__);
      wp_enqueue_script( 'at_javascript', $file_url );
      wp_localize_script( 'at_javascript', 'vname',  array(
          'tbcolor' => get_option( 'audiotyped_tb_color' ),
          'gbcolor' => get_option( 'audiotyped_gb_color' ),
          'hbcolor' => get_option( 'audiotyped_hb_color' ),
          'gfcolor' => get_option( 'audiotyped_gf_color' ),
          'hfcolor' => get_option( 'audiotyped_hf_color' ),        
          'aradius' => get_option( 'audiotyped_avatar' ),
          'bcorner' => get_option( 'audiotyped_bubble' ),
          'mfsize' => get_option( 'audiotyped_mf_size' ),
          'dfsize' => get_option( 'audiotyped_df_size' ),
          'sradius' => get_option( 'audiotyped_shadow_blur' ),
          'dgapsize' => get_option( 'audiotyped_dgap_size' ),
          'dcsize' => get_option( 'audiotyped_dc_size' ),
          'masize' => get_option( 'audiotyped_ma_size' ),
          'mdsize' => get_option( 'audiotyped_md_size' ),
          'mbpvsize' => get_option( 'audiotyped_mbpv_size' ),
          'mbphsize' => get_option( 'audiotyped_mbph_size' ),
          'dbpvsize' => get_option( 'audiotyped_dbpv_size' ),
          'dbphsize' => get_option( 'audiotyped_dbph_size' ),
          'mgapsize' => get_option( 'audiotyped_mgap_size' )
));
}

?>