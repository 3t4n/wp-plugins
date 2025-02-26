<?php
/*
Plugin Name: Advanced Exit Popup
Plugin URI: https://wordpress.org/plugins/advanced-exit-popup/
Description: Advanced Exit Popup allow you to dispaly custom code like HTML5, Subscription forms, Facebook like box, Shortcodes, etc when user intent to exit your website.
Author: wphostpk
Author URI: https://www.wphost.pk/
Version: 1.0.4
License: GPLv2
*/

if ( ! defined( 'ABSPATH' ) )
	exit;

function advanced_exit_popup_menu() {
	 add_menu_page( 
	 	__( 'Advanced Exit Popup Settings', 'textdomain' ),
	 	 __( 'Adv. Exit Popup','textdomain' ),
	   'manage_options',
        'advanced-exit-popup-settings',
        'advanced_exit_popup_settings_page',
        'dashicons-welcome-view-site'
        );	
}
add_action('admin_menu', 'advanced_exit_popup_menu');

function advanced_exit_popup_settings_page() { ?>
<style type="text/css">
.bg{
	 margin-top: 2em!important;
     background-color: #fff;
     box-shadow: 0 0 4px 1px #DAD2D2;
     padding: 15px 20px!important;
	}
</style>
<div class="wrap bg">
<h2>Advanced Exit Popup Settings</h2>
<p>Advanced Exit Popup allow you to dispaly custom code like HTML5, Facebook like box, Shortcodes, etc when user intent to exit your website.</p>
<form method="post" action="options.php">
    <?php
	settings_fields( 'advanced-exit-popup-settings' );
	do_settings_sections( 'advanced-exit-popup-settings' );
	?>
    <table class="form-table">
	    <tr valign="top">
			<th scope="row"><label for="advanced_exit_popup_box">Popup Box </label></th>
			<td>
				<input type="checkbox" name="advanced_exit_popup_box" value="true" <?php echo ( get_option('advanced_exit_popup_box') == true ) ? ' checked="checked" />' : ' />'; ?><br /><small>Only show on Front page/Home page.</small>
			</td>
		</tr>
		 <tr valign="top">
			<th scope="row">Title Background Color #</th>
			<td>
				<input type="text" size="10" name="advanced_exit_popup_popup_title_color" id="advanced_exit_popup_popup_title_color" value="<?php echo esc_attr( get_option('advanced_exit_popup_popup_title_color') ); ?>" data-default-color="#f0f1f2" /><br /><small>Unlimited Colors</small>
			</td>
		</tr>
        <tr valign="top">
			<th scope="row">Title (Text)</th>
			<td>
				<input type="text" size="40" name="advanced_exit_popup_popup_title" value="<?php echo esc_attr( get_option('advanced_exit_popup_popup_title') ); ?>" /><br /><small>Ex. Welcome Text!</small>
			</td>
		</tr>       

        <tr valign="top">
			<th scope="row">Body Background Color #</th>
			<td>
				<input type="text" size="10" name="advanced_exit_popup_popup_bg_color" id="advanced_exit_popup_popup_bg_color" value="<?php echo esc_attr( get_option('advanced_exit_popup_popup_bg_color') ); ?>" data-default-color="#f0f1f2" /><br /><small>Unlimited Colors</small>
			</td>
		</tr>

        <tr valign="top">
			<th scope="row">Body (Content)</th>
			<td>
			<?php wp_editor( get_option('advanced_exit_popup_popup_body'), 'advanced_exit_popup_popup_body' );?>
			</td>
		</tr>

		  <tr valign="top">
			<th scope="row">Footer (Text)</th>
			<td>
				<input type="text" size="40" name="advanced_exit_popup_popup_footer" value="<?php echo esc_attr( get_option('advanced_exit_popup_popup_footer') ); ?>" /><br /><small>Ex. Thank You!</small>
			</td>
        </tr>

        <tr valign="top">
			<th scope="row">Cookie Expire (days)</th>
			<td>
				<input type="text" size="10" name="advanced_exit_popup_cookie_expire" value="<?php echo esc_attr( get_option('advanced_exit_popup_cookie_expire') ); ?>" /><br /><small>Ex. 10 (Set -1 for per session)</small>
			</td>
			</tr>
        <tr valign="top">
			<th scope="row">Modal Width (px)</th>
			<td>
				<input type="text" size="10" name="advanced_exit_popup_modal_width" value="<?php echo esc_attr( get_option('advanced_exit_popup_modal_width') ); ?>" /><br /><small>Ex. 500</small>
			</td>
		</tr>
        <tr valign="top">
			<th scope="row">Modal Height (px)</th>
			<td>
				<input type="text" size="10" name="advanced_exit_popup_modal_height" value="<?php echo esc_attr( get_option('advanced_exit_popup_modal_height') ); ?>" /><br /><small>Ex. 300</small>
			</td>
		</tr>

		<tr valign="top">
			<th scope="row"><label for="advanced_exit_popup_powered_by">Show 'Developed by' Link</label></th>
			<td>
				<input type="checkbox" name="advanced_exit_popup_powered_by" value="true" <?php echo ( get_option('advanced_exit_popup_powered_by') == true ) ? ' checked="checked" />' : ' />'; ?><br /><small>Show on front-end.</small>
			</td>
		</tr>

		
    </table>
    <?php
	submit_button();
	?>
</form>
<p>Plugin developed by <a href="https://www.wphost.pk/"><img width="100" style="vertical-align:middle" src="<?php echo plugins_url( 'images/wphostpk.png', __FILE__ ) ?>" alt="Best WordPress Hosting Provider"></a></p>
</div>
<?php }

function advanced_exit_popup_settings() {
	register_setting( 'advanced-exit-popup-settings', 'advanced_exit_popup_cookie_expire' );
	register_setting( 'advanced-exit-popup-settings', 'advanced_exit_popup_modal_width' );
	register_setting( 'advanced-exit-popup-settings', 'advanced_exit_popup_modal_height' );
	register_setting( 'advanced-exit-popup-settings', 'advanced_exit_popup_popup_title_color' );
	register_setting( 'advanced-exit-popup-settings', 'advanced_exit_popup_popup_bg_color' );
	register_setting( 'advanced-exit-popup-settings', 'advanced_exit_popup_popup_title' );
	register_setting( 'advanced-exit-popup-settings', 'advanced_exit_popup_popup_body' );
	register_setting( 'advanced-exit-popup-settings', 'advanced_exit_popup_popup_footer' );
	register_setting( 'advanced-exit-popup-settings', 'advanced_exit_popup_powered_by' );
	register_setting( 'advanced-exit-popup-settings', 'advanced_exit_popup_box' );
}
add_action( 'admin_init', 'advanced_exit_popup_settings' );

function advanced_exit_popup_front_dependencies() {

	wp_register_script( 'advanced-exit-popup-js', plugins_url('js/advanced-exit-popup.js', __FILE__), array('jquery'), '1.1', false );
	wp_enqueue_script( 'advanced-exit-popup-js' );

	wp_register_style( 'advanced-exit-popup-css', plugins_url('css/advanced-exit-popup.css', __FILE__) );
	wp_enqueue_style( 'advanced-exit-popup-css' );

	wp_register_style( 'advanced-exit-popup-custom-css', plugins_url('css/custom.css', __FILE__) );
	wp_enqueue_style( 'advanced-exit-popup-custom-css' );
}
add_action( 'wp_enqueue_scripts', 'advanced_exit_popup_front_dependencies' );

function advanced_exit_popup_back_dependencies() {

	wp_enqueue_style( 'wp-color-picker' );

	wp_register_script( 'advanced-exit-popup-custom-js', plugins_url('js/custom.js', __FILE__), array('wp-color-picker'), false, true );
	wp_enqueue_script( 'advanced-exit-popup-custom-js' );
}
add_action( 'admin_enqueue_scripts', 'advanced_exit_popup_back_dependencies' );

function advanced_exit_popup() {
	
	if(!isset($_COOKIE['viewedExitPopupWP']) && $_COOKIE['viewedExitPopupWP'] != 'true') {
	
		$advanced_exit_popup_click_outside = "
		      $('body, .close_icon').on('click', function() {
		        $('#exitpopup-modal').hide();
		      });
				";
?>
<!-- Exit Popup -->
<?php if(get_option('advanced_exit_popup_box') == true){

		if(is_front_page() || is_home()){
	?>
    <div id='exitpopup-modal'>
      <div class='underlay'></div>
      <div class='exitpopup-modal-window' style='width:<?php echo esc_attr( get_option('advanced_exit_popup_modal_width') ); ?>px !important; height:<?php echo esc_attr( get_option('advanced_exit_popup_modal_height') ); ?>px !important;background-color:<?php echo esc_attr( get_option('advanced_exit_popup_popup_bg_color') ); ?> !important;'>
      		<a href="javascript:void(0);" class="close_icon" title="Close"></a>
    	<?php if( !empty( get_option('advanced_exit_popup_popup_title') ) ) { ?>
        <div class='modal-title' style='background-color:<?php echo esc_attr( get_option('advanced_exit_popup_popup_title_color') ); ?> !important;'>
          <h3><?php echo esc_attr( get_option('advanced_exit_popup_popup_title') ); ?></h3>
        </div>
        <?php } ?>
        <div class='modal-body'>
			<?php echo do_shortcode(get_option('advanced_exit_popup_popup_body')); ?>
        </div>
        <div class='exitpopup-modal-footer'>
          <p><?php echo esc_attr( get_option('advanced_exit_popup_popup_footer') ); ?></p>
        </div>
		<?php if (get_option('advanced_exit_popup_powered_by') == true) { ?> 
		<div style="position:absolute;bottom: 5px;text-align:center;width: 100%;">
		<a style="font-size:x-small;color:#3c763d;text-decoration:none;" href="https://www.wphost.pk/">Developed By WPhost.pk</a></div> <?php } ?>
      </div>
    </div>

	<script type='text/javascript'>
      var _exitpopup = exitpopup(document.getElementById('exitpopup-modal'), {
        aggressive: true,
        timer: 0,
		sensitivity: 20,
		delay: 0,
        sitewide: true,
		cookieExpire: <?php echo esc_attr( get_option('advanced_exit_popup_cookie_expire') ); ?>,
        callback: function() { console.log('exitpopup fired!'); }
      });
	  jQuery(document).ready(function($) {
      <?php echo $advanced_exit_popup_click_outside; ?>
      $('#exitpopup-modal .exitpopup-modal-footer').on('click', function() {
       // $('#exitpopup-modal').hide();
      });
      $('#exitpopup-modal .exitpopup-modal-window').on('click', function(e) {
        e.stopPropagation();
      });
      });
	</script>

	<?php }
			}else{ 

?>
    <div id='exitpopup-modal'>
      <div class='underlay'></div>
      <div class='exitpopup-modal-window' style='width:<?php echo esc_attr( get_option('advanced_exit_popup_modal_width') ); ?>px !important; height:<?php echo esc_attr( get_option('advanced_exit_popup_modal_height') ); ?>px !important;background-color:<?php echo esc_attr( get_option('advanced_exit_popup_popup_bg_color') ); ?> !important;'>
      		<a href="javascript:void(0);" class="close_icon" title="Close"></a>
    	<?php if( !empty( get_option('advanced_exit_popup_popup_title') ) ) { ?>
        <div class='modal-title' style='background-color:<?php echo esc_attr( get_option('advanced_exit_popup_popup_title_color') ); ?> !important;'>
          <h3><?php echo esc_attr( get_option('advanced_exit_popup_popup_title') ); ?></h3>
        </div>
        <?php } ?>
        <div class='modal-body'>
			<?php echo do_shortcode(get_option('advanced_exit_popup_popup_body')); ?>
        </div>
        <div class='exitpopup-modal-footer'>
          <p><?php echo esc_attr( get_option('advanced_exit_popup_popup_footer') ); ?></p>
        </div>
		<?php if (get_option('advanced_exit_popup_powered_by') == true) { ?> 
		<div style="position:absolute;bottom: 5px;text-align:center;width: 100%;">
		<a style="font-size:x-small;color:#3c763d;text-decoration:none;" href="https://www.wphost.pk/">Developed By WPhost.pk</a></div> <?php } ?>
      </div>
    </div>

	<script type='text/javascript'>
		var iScrollPos = 0;
	    var counter = 0;

      var _exitpopup = exitpopup(document.getElementById('exitpopup-modal'), {
        aggressive: true,
        timer: 0,
		sensitivity: 20,
		delay: 0,
        sitewide: true,
		cookieExpire: <?php echo esc_attr( get_option('advanced_exit_popup_cookie_expire') ); ?>,
        callback: function() { console.log('exitpopup fired!'); }
      });
	  jQuery(document).ready(function($) {
      <?php echo $advanced_exit_popup_click_outside; ?>
      $('#exitpopup-modal .exitpopup-modal-footer').on('click', function() {
       // $('#exitpopup-modal').hide();
      });
      $('#exitpopup-modal .exitpopup-modal-window').on('click', function(e) {
        e.stopPropagation();
      });

      if ($(window).width() < 700){ 

      	<?php if( get_option('advanced_exit_popup_cookie_expire') == '-1' ){?>

				$(window).scroll(function () {				 
				    var iCurScrollPos = $(this).scrollTop();
				    if (iCurScrollPos > iScrollPos) {    } else {
				    	if(counter == 0){
				    		$('#exitpopup-modal').show();
				    		counter++;	
				    	}
				    }
				    iScrollPos = iCurScrollPos;
				});

		<?php } else { ?>


      	if(localStorage.getItem("optname") != 'WPhost') {
				$(window).scroll(function () {
				    var iCurScrollPos = $(this).scrollTop();
				    if (iCurScrollPos > iScrollPos) {    } else {
				    	if(counter == 0){
				    		$('#exitpopup-modal').show();
				    		counter++;	
				    		localStorage.setItem("optname", "WPhost");
				    	}
				    }
				    iScrollPos = iCurScrollPos;
				});
		}

			<?php } ?>

		}

      });
	</script>

	<?php

				} ?>
<!-- End Exit Popup -->
<?php
	}//if viewedExitPopupWP
	}//function advanced_exit_popup
add_action( 'wp_footer', 'advanced_exit_popup', 10 );