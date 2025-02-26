<?php
/*
* Plugin Name: Announcement Banner
* Plugin URI: https://wordpress.org/plugins/announcement-banner/
* Description: Add an announcement banner to the top or bottom of your WordPress site.
* Version: 1.2.0
* Author: MIND Development and Design
* Author URI: www.minddnd.com
* License:GPLv2
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Create Settings Fields
include( plugin_dir_path( __FILE__ ) . 'admin/minddnd-wa-settings-fields.php');

function minddnd_wa_submenu_page() {
  add_submenu_page(
    'options-general.php',
    'Announcement Banner',
    'Announcement Banner',
    'manage_options',
    'minddnd-wa-submenu-page',
    'minddnd_wa_submenu_page_builder' 
  );
}

add_action( 'admin_menu', 'minddnd_wa_submenu_page' );

function minddnd_wa_submenu_page_builder() {
	
	if ( !current_user_can( 'manage_options' ) ) {
		return;
	} ?>

	<div class="wrap">
	  <h2><?php esc_html_e( get_admin_page_title() ) ?></h2>
	  <form method="post" action="options.php">
			<?php settings_fields( 'minddnd_wa_plgn_settings' ); ?>
	  	<?php do_settings_sections( 'minddnd-wa-submenu-page' ); ?>
			<?php submit_button(); ?>
		</form>
	</div>	

<?php 
}

// Set Options
$options = '';
$options = get_option( 'minddnd_wa_settings' );
$show_announcement = $options[ 'show_announcement' ];

if( isset( $show_announcement ) && $show_announcement == 'yes' ) {

	if ( isset( $options[ 'wa_position' ] ) && $options[ 'wa_position' ] == 'fixed' && isset( $options[ 'wa_placement' ] ) && $options[ 'wa_placement' ] == 'top' ){
		add_filter( 'body_class', function( $classes ) {
    return array_merge( $classes, array( 'minddnd-wa-announcement', 'minddnd-wa-announcement-fixed-top' ) );
		} );
	} else {
		add_filter( 'body_class', function( $classes ) {
    return array_merge( $classes, array( 'minddnd-wa-announcement' ) );
		} );

	}

	function runJSCheck() {

		$options = '';
		$options = get_option( 'minddnd_wa_settings' );
		$needJS = 'no';

		if( isset( $options[ 'wa_close_btn' ] ) ) {
	    $wa_close_btn = esc_html( $options['wa_close_btn'] );

	    if ($wa_close_btn == 'yes') {
		  	$needJS = 'yes';
		  }
	 
	  }

	  if( isset( $options[ 'wa_placement' ] ) ) {
	    $wa_placement = esc_attr( $options['wa_placement'] );

	    if ( $wa_placement == 'top' )  {
		 		$needJS = 'yes';
			}
	  }

	  if( isset( $options[ 'wa_padding_top' ] ) &&  $options[ 'wa_padding_top' ] != '' ) {
	  	$needJS = 'yes';
	  }
		
		return $needJS;

	}
	    
	// setup CSS & JS 
	function minddnd_website_announcements_scripts() {

		wp_enqueue_style( 'minddnd_wa_styles', plugin_dir_url( __FILE__ ) . 'minddnd-wa-styles.css'  );

		$needJS = howToLoadBanner();

  	if ( $needJS == 'yes' ){

	  	$options = '';
			$options = get_option( 'minddnd_wa_settings' );

	  	if (isset( $options[ 'wa_banner_duration' ]) ) {
		  	$wa_banner_duration = esc_html( intval( $options['wa_banner_duration'] ) );

		  	if ($wa_banner_duration <= 0) {
					$wa_banner_duration = 0;
		  	}
		  }
		
			if( isset( $options[ 'wa_placement' ] ) ) {
		    $wa_placement = esc_attr( $options['wa_placement'] );
		  }

	  	$html = buldHtmlString();

  		wp_enqueue_script( 'minddnd_wa_scripts', plugin_dir_url( __FILE__ ) . 'minddnd-wa-scripts.js', array( 'jquery-core' )  );
   		wp_enqueue_media();
 		 	wp_localize_script( 'minddnd_wa_scripts', 'wa_placement_script',
        array( 
            'wa_placement' => $wa_placement,
            'wa_banner_duration' => $wa_banner_duration,
            'html' => $html
        )
  		);
  	} // needs JS
	}

	add_action( 'wp_enqueue_scripts', 'minddnd_website_announcements_scripts' );

	function buldHtmlString() {

		$options = '';
		$wa_message = '';
		$wa_linkable = 'no';
		$options = get_option( 'minddnd_wa_settings' );

		if( isset( $options[ 'wa_make_linkable' ] ) &&  $options[ 'wa_make_linkable' ] == 'yes' && isset( $options[ 'wa_link' ] ) ) {
				$wa_linkable = 'yes';
		    $wa_link = esc_url( $options['wa_link'] );
	  }

	  if( isset( $options[ 'wa_message' ] ) ) {
	  	$allowed_html = wp_kses_allowed_html( 'post' );
	    $wa_message = wp_kses( $options['wa_message'], $allowed_html ); 
	  }

	  $wa_close_btn = 'no';
	  $wa_close_btn = $options['wa_close_btn'];

	  $html = "<div id='minddnd_wa_announcement_wrap' class='minddnd-wa-announcement-wrap'>"; 

	  if ( $wa_linkable == 'yes' ) {
	  	$html .= "<a href='" . $wa_link . "'>";
	  }
	  
	  $html .= $wa_message;

	  if ($wa_linkable == 'yes') {
	  	$html .= "</a>";
	  }

	  if( isset( $wa_close_btn ) && $wa_close_btn == 'yes'  ) {
	  	$html .= "<button class='mind-wa-close-announcement'>Close</button></div>";
	  }

	  $html .= "</div>";
		
		return $html;

	}


	function howToLoadBanner() {

		$runJS = runJSCheck(); 
		return $runJS;

	}

	function minddnd_wa_add_announcement() {
		$runJS = howToLoadBanner();
		if ($runJS == 'no') {
				$html = buldHtmlString(); 		
				echo $html;
		} else {
			return false;
		}
	}

	add_action( 'wp_footer', 'minddnd_wa_add_announcement' );

	
	//add CSS settings
 	function minddnd_wa_add_styles(){

 		$options = '';
 		$options = get_option( 'minddnd_wa_settings' );


		$css = '<style type="text/css" media="screen">';
		$css .= '.minddnd-wa-announcement-wrap {';

		if( isset( $options[ 'wa_background_color' ] ) ) {
	    $css .= 'background-color: ' . esc_attr( $options['wa_background_color'] ) . '; ';
	  }

	  if( isset( $options[ 'wa_text_color' ] ) ) {
	    $css .= 'color: ' . esc_attr( $options['wa_text_color'] ) . '; ';
	  }

	  if( isset( $options[ 'wa_position' ] ) ) {
	    $css .= 'position: ' . esc_attr( $options['wa_position'] ) . '; ';
	  }

	  if( isset( $options[ 'wa_placement' ] ) &&  $options[ 'wa_placement' ] == 'top' ) {
	    $css .= 'top: 0; bottom: auto; ';
	  }

	  if( isset( $options[ 'wa_placement' ] ) &&  $options[ 'wa_placement' ] == 'bottom' ) {
	    $css .= 'top: auto; bottom: 0; ';
	  }

	  if( isset( $options[ 'wa_height' ] ) && $options[ 'wa_height' ] != '') {
	    $css .= 'height: ' . esc_attr( $options['wa_height'] ) . 'px; ';
	  }
		
		$css .= '}';

		if( isset( $options[ 'wa_text_color' ] ) ) {
			$css .= '.minddnd-wa-announcement-wrap a {';
	    $css .= 'color: ' . esc_attr( $options['wa_text_color'] ) . '; ';
	    $css .= '}';
	  }

		if( isset( $options[ 'wa_close_btn' ] ) ) {
	    $wa_close_btn = esc_html( $options['wa_close_btn'] );
	  }

	  if( isset( $options[ 'wa_padding_top' ] ) &&  $options[ 'wa_padding_top' ] != '' ) {
	    $css .= 'body.minddnd-wa-announcement-padding-top { padding-top: ' . esc_attr( $options['wa_padding_top'] ) . 'px; }';
	  }

		if( isset( $wa_close_btn ) && $wa_close_btn == 'yes'  ) {
	  	$css .= '.minddnd-wa-announcement-wrap button.mind-wa-close-announcement { position: absolute; top: 20px; right: 20px; padding: 0; background: transparent; border:0; }';
	  }

	  $wa_custom_css = '';
	  if( isset( $options[ 'wa_custom_css' ] ) ) {
	    $wa_custom_css = esc_html( $options['wa_custom_css'] );
	  }

	  $css .= $wa_custom_css;
	  
		
		$css .= '</style>';

		echo $css;
	}

	add_action( 'wp_head', 'minddnd_wa_add_styles');

	howToLoadBanner();

}