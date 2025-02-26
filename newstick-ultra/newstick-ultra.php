<?php

/**
 * Plugin Name:       NewsTick Ultra
 * Plugin URI:        https://geeky.com.ng/newstick-ultra-plugin
 * Description:       A stylish and customisable news ticker that displays news or alternative content.
 * Version:           1.0
 * Requires at least: 5.4
 * Requires PHP:      7.2
 * Author:            Geeky Nigeria
 * Author URI:        https://geeky.com.ng
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 */


// this is an include only WP file
if (!defined('ABSPATH')) {
  die;
}

function NSWUP_enq_admin_styles() {

   wp_register_style( 'NSWUP_adstyle', plugins_url( 'newstick-ultra/css/styles.css' ));
   wp_enqueue_style( 'NSWUP_adstyle' );
}

add_action( 'admin_head', 'NSWUP_enq_admin_styles' );

add_action( 'wp_enqueue_scripts', 'NSWUP_enq_custom_script' );
 

function NSWUP_enq_custom_script() {


   wp_enqueue_script('NSWUP_marquee_scroll', plugins_url( 'newstick-ultra/js/marquee-scroll.js', dirname(__FILE__) ), array('jquery'));
  wp_enqueue_script('NSWUP_marquee_scroll_min', plugins_url( 'newstick-ultra/js/marquee-scroll-min.js', dirname(__FILE__) ), array('jquery'));
  wp_enqueue_script('NSWUP_marquee_min', plugins_url( 'newstick-ultra/js/jquery.marquee.min.js', dirname(__FILE__) ), array('jquery'));
 
}


function NSWUP_enq_admin_script()
{
  wp_enqueue_script('NSWUP_bt_opt_reset', plugins_url( 'newstick-ultra/js/bn-opt-res.js', dirname(__FILE__) ), array('jquery'));

}
add_action( 'admin_enqueue_scripts', 'NSWUP_enq_admin_script' );




function NSWUP_display_breaking_news($content = null)
{

  	$args = array(
  		'numberposts'      => get_option( 'NSWUP_num_not' ),
  		'offset'           => 0,
  		'category'         => get_option( 'NSWUP_fil_cat' ),
  		'orderby'          => 'post_date',
  		'order'            => 'DESC',
  		'include'          => '',
  		'exclude'          => '',
  		'meta_key'         => '',
  		'meta_value'       => '',
  		'post_type'        => 'post',
  		'post_status'      => 'publish',
  		'suppress_filters' => true
  	);

  	$recent_posts = wp_get_recent_posts( $args, OBJECT );
  


  ob_start();
	include( 'templates/one.php' );
  $NSWUP_bar = ob_get_clean();

  return $NSWUP_bar;

}
add_shortcode('newstick-ultra', 'NSWUP_display_breaking_news');

function NSWUP_add_option_page()
{
  add_menu_page( 'NewsTick Ultra', 'NewsTick Ultra', 'manage_options', 'newstick-ultra-main-menu', 'NSWUP_config', 'dashicons-text-page');
}
add_action('admin_menu', 'NSWUP_add_option_page');


function NSWUP_config()
{
  if ( ! current_user_can( 'edit_posts' ) )
  {
    wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
  }
  echo '<div class ="NSWUP_center-align"> <h1> NewsTick Ultra</h1><h2>By Geeky Nigeria</h2></div>';
  echo '<br><br>';

  NSWUP_update_options();
}



function NSWUP_activate_set_default_options()
{
  add_option('NSWUP_theme','one.php');
  add_option('NSWUP_dim_barra', '100');
  add_option('NSWUP_col_tit', '#008753');
  add_option('NSWUP_col_bar_tit', '#e7ecff');
  add_option('NSWUP_col_not', '#000000');
  add_option('NSWUP_col_bar', '#e7ecff');
  add_option('NSWUP_col_link', '#008753');
  add_option('NSWUP_fil_cat', '');
  add_option('NSWUP_num_not', 5);
  add_option('NSWUP_title_content', 'News');
  add_option('NSWUP_text', '');
}

register_activation_hook(__FILE__, 'NSWUP_activate_set_default_options');


function NSWUP_register_options_group()
{
  register_setting('NSWUP_options_group', 'NSWUP_dim_barra');
  register_setting('NSWUP_options_group', 'NSWUP_col_tit');
  register_setting('NSWUP_options_group', 'NSWUP_col_bar_tit');
  register_setting('NSWUP_options_group', 'NSWUP_col_not');
  register_setting('NSWUP_options_group', 'NSWUP_col_bar');
  register_setting('NSWUP_options_group', 'NSWUP_col_link');
  register_setting('NSWUP_options_group', 'NSWUP_fil_cat');
  register_setting('NSWUP_options_group', 'NSWUP_num_not');
  register_setting('NSWUP_options_group', 'NSWUP_title_content');
  register_setting('NSWUP_options_group', 'NSWUP_text');
}

add_action('admin_init', 'NSWUP_register_options_group');


function NSWUP_update_options()
{
  ?>
  <div class ="NSWUP_center-align">
<p class="NSWUP-h2">Shortcode : </p><span class="NSWUP-codebxne">[newstick-ultra]</span></div>
 <div class="wrap NSWUP-body">
    <form method="post" action="options.php">
    <?php settings_fields('NSWUP_options_group'); ?>
    <?php settings_errors(); ?> 

<h2 class="NSWUP-h2">Content</h2>

 <table class="form-table">
      <tbody>

        <tr valign="top">
          <th scope="row">
            <label for="NSWUP_fil_cat">News Filter By Category</label>
          </th>
          <td>
            <?php $cats = get_categories( array( 'orderby' => 'name', 'order' => 'ASC' ) ); ?>
            <select id="NSWUP_fil_cat" class="NSWUP_select-css" name="NSWUP_fil_cat" size="3" >
              <?php
                foreach ($cats as $cat)
                  { ?>
                      <option <?php if (get_option('NSWUP_fil_cat') == $cat->cat_ID) echo "selected"; ?> value="<?php echo $cat->cat_ID; ?>" ><?php echo $cat->name; ?></option>';
<?php                  
                  } ?>
            </select><br><br>
            <span class="description"><b>N.B</b>If text is entered in the alternative content, the posts will not show. Only the text will.</span>
          </td>
        </tr>

        <tr valign="top">
          <th scope="row">
            <label for="NSWUP_num_not">Number of News</label>
          </th>
          <td>
            <input type="number" id="NSWUP_num_not" name="NSWUP_num_not" min=1 max=5 value=<?php echo get_option('NSWUP_num_not'); ?>><br>
            <span class="description">Maximum of 5 posts for now</span>
          </td>
        </tr>
        <tr valign="top">
          <th scope="row">
            <label for="NSWUP_title_content" >News Bar Title</label>
          </th>
          <td>
            <input type="text" id="NSWUP_title_content" class="NSWUP-title" name="NSWUP_title_content" value="<?php echo get_option('NSWUP_title_content'); ?>">
            <span class="description"></span>
          </td>
        </tr>

<tr id="NSWUP_custom_text" valign="top">
          <th scope="row">
            <label for="NSWUP_text">Alternative Content</label>
          </th>
          <td>
                          <?php wp_editor(get_option('NSWUP_text'), 'NSWUP_text', array('media_buttons' => false, 'teeny' => true)); ?> <br>
            <span class="description">If you want to show text instead of posts, type in the above box.</span>
          </td>
        </tr>

    </tbody>
</table>

<h2 class="NSWUP-h2">Styles</h2>

    <table class="form-table">
      <tbody>
          
        
        <tr valign="top">
          <th scope="row">
            <label for="NSWUP_dim_barra">Bar Width</label>
          </th>
          <td>
            <input type="number" id="NSWUP_dim_barra" name="NSWUP_dim_barra" min=20 max=100 value=<?php echo get_option('NSWUP_dim_barra'); ?>>%
            <span class="description"></span>
          </td>
        </tr>
        <tr valign="top">
          <th scope="row">
            <label for="NSWUP_col_tit">Title Color</label>
          </th>
          <td>
            <input type="color" id="NSWUP_col_tit" name="NSWUP_col_tit" value="<?php echo get_option('NSWUP_col_tit'); ?>">
            <span class="description"></span>
          </td>
        </tr>
        <tr valign="top">
          <th scope="row">
            <label for="NSWUP_col_bar_tit">Title Background Color</label>
          </th>
          <td>
            <input type="color" id="NSWUP_col_bar_tit" name="NSWUP_col_bar_tit" value="<?php echo get_option('NSWUP_col_bar_tit'); ?>">
            <span class="description"></span>
          </td>
        </tr>
                <tr valign="top">
          <th scope="row">
            <label for="NSWUP_col_link">News Color</label>
          </th>
          <td>
            <input type="color" id="NSWUP_col_link" name="NSWUP_col_link" value="<?php echo get_option('NSWUP_col_link'); ?>">
            <span class="description"></span>
          </td>
        </tr>
                <tr valign="top">
          <th scope="row">
            <label for="NSWUP_col_bar">Background Color</label>
          </th>
          <td>
            <input type="color" id="NSWUP_col_bar" name="NSWUP_col_bar" value="<?php echo get_option('NSWUP_col_bar'); ?>">
            <span class="description"></span>
          </td>
        </tr>
        <tr valign="top">
          <th scope="row">
            <label for="NSWUP_col_not">Alternative text Color</label>
          </th>
          <td>
            <input type="color" id="NSWUP_col_not" name="NSWUP_col_not" value="<?php echo get_option('NSWUP_col_not'); ?>">
            <span class="description"></span>
          </td>
        </tr>
        <tr valign="top">
          <th scope="row"></th>
            <td>
              <p>
<?php submit_button(); ?>              </p>
            </td>
        </tr>
      </tbody>
    </table>
    </form>

    <div style="margin-top: 4%; font-style: italic; color: #555d66; font-size: 15px">
      For support or requests, send us a mail <a href="mailto:info@geeky.com.ng">info@geeky.com.ng</a>
    </div>
  </div>
  <?php
}

add_action( 'wp_ajax_NSWUP_ajax_form', 'NSWUP_ajax_form' );

function NSWUP_ajax_form() {
  global $wpdb;

  $options = $wpdb->prefix . 'options';

    $wpdb->update( $options ,
          array( 'option_value' => sanitize_text_field($_POST['NSWUP_theme']) ),
          array( 'option_name'  => 'NSWUP_theme'         ));

  $wpdb->update( $options ,
          array( 'option_value' => sanitize_text_field($_POST['NSWUP_dim_barra']) ),
          array( 'option_name'  => 'NSWUP_dim_barra'         ));

  $wpdb->update( $options ,
          array( 'option_value' => sanitize_text_field($_POST['NSWUP_col_tit']) ),
          array( 'option_name'  => 'NSWUP_col_tit'         ));

  $wpdb->update( $options ,
          array( 'option_value' => sanitize_text_field($_POST['NSWUP_col_bar_tit']) ),
          array( 'option_name'  => 'NSWUP_col_bar_tit'         ));

  $wpdb->update( $options ,
          array( 'option_value' => sanitize_text_field($_POST['NSWUP_col_not']) ),
          array( 'option_name'  => 'NSWUP_col_not'         ));

  $wpdb->update( $options ,
          array( 'option_value' => sanitize_text_field($_POST['NSWUP_col_bar']) ),
          array( 'option_name'  => 'NSWUP_col_bar'         ));

  $wpdb->update( $options ,
          array( 'option_value' => sanitize_text_field($_POST['NSWUP_col_link']) ),
          array( 'option_name'  => 'NSWUP_col_link'         ));

  $wpdb->update( $options ,
          array( 'option_value' => sanitize_text_field($_POST['NSWUP_fil_cat']) ),
          array( 'option_name'  => 'NSWUP_fil_cat'         ));

  $wpdb->update( $options ,
          array( 'option_value' => sanitize_text_field($_POST['NSWUP_num_not']) ),
          array( 'option_name'  => 'NSWUP_num_not'         ));

  $wpdb->update( $options ,
          array( 'option_value' => sanitize_text_field($_POST['NSWUP_title_content']) ),
          array( 'option_name'  => 'NSWUP_title_content'         ));

  $wpdb->update( $options ,
          array( 'option_value' => sanitize_textarea_field($_POST['NSWUP_text']) ),
          array( 'option_name'  => 'NSWUP_text'         ));

  wp_die();
}
?>
