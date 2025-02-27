<?php
/*
Plugin Name: Exit Popup
Plugin URI: https://www.brontobytes.com/
Description: Exit Popup enables you to display a jQuery modal before a visitor leaves your website.
Author: Brontobytes
Author URI: https://www.brontobytes.com/
Version: 3.2
License: GPLv2
Text Domain: exit-popup
Domain Path: /languages
*/

if ( ! defined( 'ABSPATH' ) )
	exit;

function exit_popup_menu() {
	add_options_page(__('Exit Popup Settings', 'exit-popup'), __('Exit Popup', 'exit-popup'), 'administrator', 'exit-popup-settings', 'exit_popup_settings_page');
}
add_action('admin_menu', 'exit_popup_menu');


function my_admin_enqueue($hook_suffix) {
    if($hook_suffix == 'settings_page_exit-popup-settings') {
        wp_register_style( 'select2css', '//cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css', false, '1.0', 'all' );
        wp_register_script( 'select2', '//cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js', array( 'jquery' ), '1.0', true );
        wp_enqueue_style( 'select2css' );
        wp_enqueue_script( 'select2' );

        wp_enqueue_style( 'wp-color-picker' );

    }
}
add_action('admin_enqueue_scripts', 'my_admin_enqueue');


add_filter( 'plugin_action_links', 'exis_popup_settings_plugin_link', 10, 2 );

function exis_popup_settings_plugin_link( $links, $file )
{
    if ( $file == plugin_basename(dirname(__FILE__) . '/exit-popup.php') )
    {
        /*
         * Insert the link at the beginning
         */
        //   $in = '<a href="options-general.php?page=cookie-bar-settings">' . __('Settings','mtt') . '</a>';
        //   array_unshift($links, $in);

        /*
         * Insert at the end
         */
        $links[] = '<a href="options-general.php?page=exit-popup-settings">'.__('Settings','mtt').'</a>';
    }
    return $links;
}


function exit_popup_settings_page() { ?>
    <style type="text/css" >
        .wrap {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 20px;
        }

        .postbox .inside h2, .wrap [class$="icon32"] + h2, .wrap h1, .wrap > h2:first-child {
            padding: 0px;
        }

        @media screen and (max-width: 768px) {
            input[type="text"] {
                max-width: 200px !important;
            ; }

            xmp {
                display: block;
                white-space: pre-wrap;
            }
        }

    </style>
<div class="wrap">
<h2><?php echo __('Exit Popup Settings', 'exit-popup'); ?></h2>
<p><?php echo __('Exit Popup enables you to display a jQuery modal before a visitor leaves your website.', 'exit-popup'); ?></p>
<form method="post" action="options.php">
    <?php
	settings_fields( 'exit-popup-settings' );
	do_settings_sections( 'exit-popup-settings' );
	?>
    <table class="form-table">
		<tr valign="top">
			<th scope="row"><?php echo __('Cookie expiration (days)', 'exit-popup'); ?></th>
			<td>
				<input type="text" size="10" name="exit_popup_cookie_expire" value="<?php echo esc_attr( get_option('exit_popup_cookie_expire') ); ?>" /><br /><small><?php echo __('E.g.: 10', 'exit-popup'); ?></small><br /><small><?php echo __('Enter -1 to have the cookies last for the session.', 'exit-popup'); ?></small>
			</td>
			</tr>
        <tr valign="top">
			<th scope="row"><?php echo __('Prevent close on click outside of modal box', 'exit-popup'); ?></th>
			<td>
				<input type="checkbox" name="exit_popup_click_outside" value="true" <?php echo ( get_option('exit_popup_click_outside') == true ) ? ' checked="checked" />' : ' />'; ?> <br /><small></small>
			</td>
		</tr>
        <tr valign="top">
            <th scope="row"><?php echo __('Show for logged out users only', 'exit-popup'); ?></th>
            <td>
                <input type="checkbox" name="exit_popup_logged_out_users_only" value="true" <?php echo ( get_option('exit_popup_logged_out_users_only') == true ) ? ' checked="checked" />' : ' />'; ?> <br /><small></small>
            </td>
        </tr>
		<tr valign="top">
			<th scope="row"><?php echo __('Modal width (px or %)', 'exit-popup'); ?></th>
			<td>
				<input type="text" size="10" name="exit_popup_modal_width" value="<?php echo esc_attr( get_option('exit_popup_modal_width') ); ?>" /><br /><small><?php echo __('E.g.: 500px or 50%', 'exit-popup'); ?></small>
			</td>
		</tr>
        <tr valign="top">
			<th scope="row"><?php echo __('Modal height (px or %)', 'exit-popup'); ?></th>
			<td>
				<input type="text" size="10" name="exit_popup_modal_height" value="<?php echo esc_attr( get_option('exit_popup_modal_height') ); ?>" /><br /><small><?php echo __('E.g.: 500px or 50%', 'exit-popup'); ?></small>
			</td>
		</tr>
        <tr valign="top">
			<th scope="row"><?php echo __('Title background colour', 'exit-popup'); ?></th>
			<td>
				<input id="exit_popup_popup_title_color" type="text" size="10" name="exit_popup_popup_title_color" value="<?php echo esc_attr( get_option('exit_popup_popup_title_color') ); ?>" /><br />
			</td>
		</tr>
        <tr valign="top">
			<th scope="row"><?php echo __('Title (Text)', 'exit-popup'); ?></th>
			<td>
				<input type="text" size="40" name="exit_popup_popup_title" value="<?php echo esc_attr( get_option('exit_popup_popup_title') ); ?>" /><br /><small><?php echo __('E.g.: Don\'t Leave Yet!', 'exit-popup'); ?></small>
			</td>
		</tr>
        <tr valign="top">
			<th scope="row"><?php echo __('Footer (Text)', 'exit-popup'); ?></th>
			<td>
				<input type="text" size="40" name="exit_popup_popup_footer" value="<?php echo esc_attr( get_option('exit_popup_popup_footer') ); ?>" /><br /><small><?php echo __('E.g.: Thank You!', 'exit-popup'); ?></small><br /><small><?php echo __('This is a clickable text/button that closes the popup when clicked. Leave empty to hide the footer.', 'exit-popup'); ?></small>
			</td>
        </tr>
        <tr valign="top">
			<th scope="row"><?php echo __('Body (HTML)', 'exit-popup'); ?></th>
			<td><textarea rows="10" cols="100" name="exit_popup_popup_body"><?php echo esc_html( get_option('exit_popup_popup_body') ); ?></textarea>
				<small>
				<xmp>
<?php echo __('HTML code example:
	<style>
		.discount-box  {
			font-size: 2em;
			font-weight: bold;
			display: inline;
			background: #ec971f;
			color: #fff;
			padding: 20px;
			padding-left: 5px;
			padding-right: 5px;
			box-shadow: 10px 0 0 #777, -10px 0 0 #777;
			align: center;
		}
	</style>

	<h4>Best Offer</h4>
	<p style="padding-top: 20px"></p>
	<p><span class="discount-box">3 For The Price Of 2!</span></p>
	<p style="padding-top: 20px"></p>
	<p><small>The offer is available to all.</small></p>', 'exit-popup'); ?>
                </xmp>
				</small>
			</td>
		</tr>
		<?php if( array_key_exists( 'wpml_object_id' , $GLOBALS['wp_filter']) ): // check for WPML ?>
 		 <tr valign="top">
 		   <th scope="row"><?php _e('Enabled language','exit-popup');?></th>
  		  <td>
 		     <?php $languages = apply_filters( 'wpml_active_languages', NULL, 'orderby=id&order=desc' );
 		           $enabled_languages = get_option('exit_popup_languages');
 		     foreach ($languages as $key => $value) : ?>
 		       <label style="padding-right: 15px;"><input type="checkbox" name="exit_popup_languages[<?php echo $key;?>]" value="<?php echo $key; ?>" <?php checked( $key, $enabled_languages[$key], true); ?> />&nbsp;<?php echo $value['native_name']; ?></label>
 		     <?php endforeach; ?>
 		   </td>
  		</tr>

		<?php endif; ?>
        <tr valign="top">
            <th scope="row"><?php _e('Exclude from Posts/Pages','exit-popup');?></th>
            <td>
                <?php




                $ep_post_types = get_post_types();


                $selected_posts_to_exclude = get_option('exit-popup-exclude-from-posts') ;

                if(empty($selected_posts_to_exclude)) {
                    $selected_posts_to_exclude = array();
                }


                echo '<label for="exit-popup-exclude-from-posts"></label>';
                echo '<select id="js-hide-search-multi" name="exit-popup-exclude-from-posts[]" multiple="multiple" class="request-schedule-select" >';


                foreach($ep_post_types as $post_type) {
                    if($post_type == 'attachment' || $post_type == 'nav_menu_item' || $post_type == 'revision' || $post_type == 'custom_css'
                        || $post_type == 'customize_changeset' || $post_type == 'oembed_cache' || $post_type == 'user_request' || $post_type == 'wp_block'
                        || $post_type == 'wp_template' || $post_type == 'wp_template_part' || $post_type == 'wp_global_styles' || $post_type == 'wp_navigation'

                    ) {
                        break ;
                    }

                    $args = array(
                        'post_type' => $post_type,
                        'order' => 'DESC',
                        'post_status' => 'publish',
                        'posts_per_page' => -1
                    );

                    $query = new WP_Query($args);

                    if ($query->have_posts()) {
                        echo '<optgroup label="' . $post_type . '" >';


                        while ($query->have_posts()) : $query->the_post();
                            $id = get_the_ID();
                            echo '<option value="' . $id . '" ' . ((in_array($id, $selected_posts_to_exclude)) ? ('selected') : '') . '  . >' . get_the_title() . '</option>';

                        endwhile;
                        echo '</optgroup >';
                    }
                }
                echo '</select>';



                ?>
            </td>
        </tr>
		<tr valign="top">
			<th scope="row"><label for="exit_popup_powered_by"><?php echo __("Show 'Powered by' link",'exit-popup');?></label></th>
			<td>
				<input type="checkbox" name="exit_popup_powered_by" value="true" <?php echo ( get_option('exit_popup_powered_by') == true ) ? ' checked="checked" />' : ' />'; ?><br /><small><?php echo __('We are very happy to be able to provide this for free along with other <a href="https://www.brontobytes.com/blog
/c/wordpress-plugins/" target="_blank">free WordPress plugins</a>.', 'exit-popup');?> </small>
			</td>
		</tr>
    </table>
    <script type="text/javascript" >
        jQuery(document).ready(function(){
            jQuery("#exit_popup_popup_title_color").wpColorPicker();

            jQuery('#js-hide-search-multi').select2();


        });

    </script>
    <?php
	submit_button();
	?>
</form>
    <p><?php echo __('Plugin developed by ','exit-popup');?><a href="https://www.brontobytes.com/" target="_blank" >Brontobytes</a></p>
       <a  href="https://www.brontobytes.com/" target="_blank"><img width="100" style="vertical-align:middle" src="<?php echo plugins_url( 'images/brontobytes.svg', __FILE__ ) ?>" alt="<?php echo __('Web & VPS hosting provider','exit-popup');?>"></a>
</div>
<?php }

function exit_popup_settings() {
	register_setting( 'exit-popup-settings', 'exit_popup_cookie_expire' );
	register_setting( 'exit-popup-settings', 'exit_popup_click_outside' );
	register_setting( 'exit-popup-settings', 'exit_popup_modal_width' );
	register_setting( 'exit-popup-settings', 'exit_popup_modal_height' );
	register_setting( 'exit-popup-settings', 'exit_popup_popup_title_color' );
	register_setting( 'exit-popup-settings', 'exit_popup_popup_title' );
	register_setting( 'exit-popup-settings', 'exit_popup_popup_body' );
	register_setting( 'exit-popup-settings', 'exit_popup_popup_footer' );
    register_setting( 'exit-popup-settings', 'exit_popup_languages' );
    register_setting( 'exit-popup-settings', 'exit-popup-exclude-from-posts' );
    register_setting( 'exit-popup-settings', 'exit_popup_powered_by' );
    register_setting( 'exit-popup-settings', 'exit_popup_logged_out_users_only' );

}
add_action( 'admin_init', 'exit_popup_settings' );

function exit_popup_deactivation() {
    delete_option( 'exit_popup_cookie_expire' );
    delete_option( 'exit_popup_click_outside' );
    delete_option( 'exit_popup_modal_width' );
    delete_option( 'exit_popup_modal_height' );
    delete_option( 'exit_popup_popup_title_color' );
    delete_option( 'exit_popup_popup_title' );
    delete_option( 'exit_popup_popup_body' );
    delete_option( 'exit_popup_popup_footer' );
	delete_option( 'exit_popup_languages' );
    delete_option( 'exit_popup_powered_by' );
    delete_option( 'exit-popup-exclude-from-posts' );
    delete_option( 'exit_popup_logged_out_users_only' );
}
register_deactivation_hook( __FILE__, 'exit_popup_deactivation' );

function exit_popup_dependencies() {
	wp_register_script( 'js-cookie-js', plugins_url('js/js-cookie.js', __FILE__), array('jquery'), time(), false );
	wp_enqueue_script( 'js-cookie-js' );
	wp_register_script( 'exit-popup-js', plugins_url('js/exit-popup.js', __FILE__), array('jquery'), time(), false );
	wp_enqueue_script( 'exit-popup-js' );
	wp_register_style( 'exit-popup-css', plugins_url('css/exit-popup.css', __FILE__) );
	wp_enqueue_style( 'exit-popup-css' );
}
add_action( 'wp_enqueue_scripts', 'exit_popup_dependencies' );

function exit_popup() {


    $show_for_logged_out_users_only = get_option('exit_popup_logged_out_users_only' , false ) ;

    if(!$show_for_logged_out_users_only ) {

    }
    else {
        if(is_user_logged_in()) {
            return;
        }
        
    }




    $selected_posts_to_exclude = get_option('exit-popup-exclude-from-posts') ;


    if(empty($selected_posts_to_exclude)) {
        $selected_posts_to_exclude = array();
    }

    if (in_array(get_the_ID(), $selected_posts_to_exclude) )
    {
        return;
    }


    // Check for language
	$check_lg = true;
	if( array_key_exists( 'wpml_object_id' , $GLOBALS['wp_filter']) ) {
		$epp_lg = get_option('exit_popup_languages');
  
		$current_lg = ICL_LANGUAGE_CODE;
  
		$check_lg = false;
  
		if( in_array($current_lg, $epp_lg) ) $check_lg = true;
	}
	
	if($check_lg) { // v3.0
	//if($check_lg && !isset($_COOKIE['viewedExitPopupWP']) && $_COOKIE['viewedExitPopupWP'] != 'true') {
		
	if(esc_attr( get_option('exit_popup_click_outside') ) == "true") {
		$exit_popup_click_outside = "";
	} else {
		$exit_popup_click_outside = "
      $('body').on('click', function() {
        $('#exitpopup-modal').hide();
      });
		";
	}
?>
<!-- Exit Popup -->
    <div id='exitpopup-modal'>
      <div class='underlay'></div>
	  <div class='exitpopup-modal-window' style='width:<?php echo esc_attr( get_option('exit_popup_modal_width') ); if (preg_match('(px|%)', esc_attr( get_option('exit_popup_modal_height') )) !== 1) { echo 'px'; } ?> !important; height:<?php echo esc_attr( get_option('exit_popup_modal_height') ); if (preg_match('(px|%)', esc_attr( get_option('exit_popup_modal_height') )) !== 1) { echo 'px'; } ?> !important;'>
          <?php $title_background_color = get_option('exit_popup_popup_title_color');
          if(!empty($title_background_color))
          {

            //  echo $title_background_color . '   ' . strpos($title_background_color, '#' ) . 'yay';
              if(strpos($title_background_color, '#' ) !==  false)
              {
                  $title_background_color =  $title_background_color;
              }
              else {
                  $title_background_color = '#' . $title_background_color;
              }
          }
          ?>

        <div class='modal-title' style='background-color:<?php    echo esc_attr( $title_background_color ); ?> !important;'>
          <h3><?php echo esc_html( get_option('exit_popup_popup_title') ); ?></h3>
        </div>
        <div class='modal-body'>
			<?php echo do_shortcode(html_entity_decode(get_option('exit_popup_popup_body'))); ?>
        </div>
        <div class='exitpopup-modal-footer'>
          <p><?php echo esc_html( get_option('exit_popup_popup_footer') ); ?></p>
        </div>
		<?php if (get_option('exit_popup_powered_by') == true) { ?> <div style="bottom: -25px;position: absolute;right: 0px;"><a style="font-size:x-small;color:white;text-decoration:none;" target="_blank" href="https://www.brontobytes.com/blog/exit-popup-free-wordpress-plugin/"><?php echo __('Exit Popup for WordPress','exit-popup');?></a></div> <?php } ?>
      </div>
    </div>

	<script type='text/javascript'>
	  jQuery(document).ready(function($) {
      var exit_popup_value = Cookies.get('viewedExitPopupWP'); // v3.0
      if(!exit_popup_value){ // v3.0
	  var _exitpopup = exitpopup(document.getElementById('exitpopup-modal'), {
        aggressive: true,
        timer: 0,
		sensitivity: 20,
		delay: 0,
        sitewide: true,
		cookieExpire: <?php echo esc_attr( get_option('exit_popup_cookie_expire') ); ?>,
        callback: function() { console.log('exitpopup fired!'); }
      });

      <?php echo $exit_popup_click_outside; ?>
      $('#exitpopup-modal .exitpopup-modal-footer').on('click', function() {
        $('#exitpopup-modal').hide();
      });
      $('#exitpopup-modal .exitpopup-modal-window').on('click', function(e) {
        e.stopPropagation();
      });
      } // v3.0
      });
	</script>
<!-- End Exit Popup -->
<?php
	}//if viewedExitPopupWP
	}//function exit_popup
add_action( 'wp_footer', 'exit_popup', 10 );