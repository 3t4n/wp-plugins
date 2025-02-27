<?php 
/*
 Plugin Name: Casper's Flyin' Call-to-Action
 Plugin URI: https://wordpress.org/plugins/caspers-fly-in-cta/
 Description: Lightweight, highly customizable call-to-action plugin. Go to Appearance -> Fly-in CTA to manage.
 Version: 2.0
 Author: Casey James Perno
 Author URI: https://www.caseyjamesperno.com
 License: GPL2
*/

/******* enqueue scripts, styles, and theme/common plugin support *******/
require_once( plugin_dir_path( __FILE__ ) . 'functions/scripts-and-support.php' );
/******* create db options/settings *******/
require_once( plugin_dir_path( __FILE__ ) . 'functions/options.php' );
/******* create the admin page and menu item *******/
require_once( plugin_dir_path( __FILE__ ) . 'functions/admin/admin-page.php' );

/* Display Fly-in CTA! */  
 if( get_option('cpcta-enabled') ) { // is the cta enabled?
	$displayOn = get_option('cpcta-display-on'); // what pages do you want to display on?
	//display only on homepage
	if($displayOn == 'home'){
		add_action('template_redirect','display_on_home');
		function display_on_home() {
			if( is_front_page() ) :
				add_action('wp_footer','cpcta_display_slider');
			endif;
		}
	//display only on interior pages
	} elseif($displayOn == 'pages'){
		add_action('template_redirect','display_on_pages');
		function display_on_pages() {
			if( is_page() && !is_front_page() ) :
				add_action('wp_footer','cpcta_display_slider');
			endif;
		}
	//display only on posts
	} elseif($displayOn == 'posts'){
		add_action('template_redirect','display_on_posts');
		function display_on_posts() {
			if( is_single() ) :
				add_action('wp_footer','cpcta_display_slider');
			endif;
		}
	//display on a custom post type
	} elseif(strpos($displayOn, 'cpt-') !== false){	
		function display_on_cpt(){
			$displayOn = get_option('cpcta-display-on'); //apparently unable to pass this variable through the function? forced to requery
			//remove the cpt- prefix passed from the admin page value
			$selected_post_type = str_replace("cpt-", "", $displayOn);
			//check if the current page is a post of the selected post type
			if( get_post_type() == $selected_post_type ) :
				add_action('wp_footer','cpcta_display_slider');
			endif;
		}
		add_action('template_redirect','display_on_cpt');
	//display only on a specific page
	} elseif($displayOn == 'specific-page'){
		add_action('template_redirect','display_specific_page');
		function display_specific_page() {
			if( is_page( get_option('cpcta-display-page') ) ) :
				add_action('wp_footer','cpcta_display_slider');
			endif;
		}
	//display only on a specific post
	} elseif($displayOn == 'specific-post'){
		add_action('template_redirect','display_specific_post');
		function display_specific_post() {
			if( is_single( get_option('cpcta-display-post') ) ) :
				add_action('wp_footer','cpcta_display_slider');
			endif;
		}
	//display everywhere
	} else {
		add_action('wp_footer','cpcta_display_slider');
	}
	
	function cpcta_display_slider() {
		if( get_option('cpcta-slider-type') == 'vertical' ) {
			include('css/bottom-flyin.css.php');
		} else if( get_option('cpcta-slider-type') == 'horizontal' ) {
			include('css/side-flyin.css.php');
		}

		$cpcta_flyin_classes = array('cpcta-flyin');
		if( get_option('cpcta-slider-type') == 'horizontal' ) {
			if( get_option('cpcta-hori-slider-position') == 'right' ) {
				array_push($cpcta_flyin_classes, "cpcta-offScreenRight");
			} else {
				array_push($cpcta_flyin_classes, "cpcta-offScreenLeft");
			}
		}

		$cpcta_zindex = get_option('cpcta-zindex') ? get_option('cpcta-zindex') : 999999;
	?>
	<div 
		class="<?php echo implode($cpcta_flyin_classes, " ") ?>"
		<?php if(get_option('cpcta-enable-autopop') && is_front_page()) {
			echo 'data-autopop-timer='.get_option('cpcta-autopop-timer').'';
		}?>
		style="z-index: <?php echo $cpcta_zindex ?>"
	>
		<div class="cpcta-top-bar" data-text="<?php echo get_option('cpcta-top-bar-text') ?>">
			<?php echo get_option('cpcta-top-bar-text') ?>
			<?php if(get_option('cpcta-slider-type') == 'vertical') { echo '<span class="cpcta-close" aria-title="close"></span>'; } ?>
		</div>
		<div class="cpcta-content-panel">
			<?php if(get_option('cpcta-slider-type') == 'horizontal') { echo '<span class="cpcta-close" aria-title="close"></span>'; } ?>
			<?php echo do_shortcode( get_option('cpcta-slider-body-content') ); ?>
	</div>
	</div>
    <?php
	} //end cpcta_display_slider();
 } //end if cta_enabled
 
?>