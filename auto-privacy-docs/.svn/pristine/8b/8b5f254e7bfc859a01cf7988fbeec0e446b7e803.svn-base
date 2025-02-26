<?php
/*
Plugin Name: Auto Privacy Docs
Description: Quickly generates pages or html for Privacy Policy, Terms of Use, Cookies Policy, EULA, and Disclaimers
Version: 1.0.0
Author: ADSMAX
License: GPL v2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

// start jquery
wp_enqueue_script( 'jquery' );


// Register and enqueue the main admin js and css file
function adsmax_privacydocs_enqueue_scripts() {
    wp_enqueue_script( 'adsmax_privacydocs-js', plugin_dir_url( __FILE__ ) . 'js/adsmax_privacydocs.js', array( 'jquery' ), '1.0', true );
    wp_enqueue_style( 'adsmax_privacydocs-css', plugin_dir_url( __FILE__ ) . 'css/adsmax_privacydocs.css' );
}
add_action( 'admin_enqueue_scripts', 'adsmax_privacydocs_enqueue_scripts' );


// logo
$adsmax_privacydocs_logo = ''.plugin_dir_url( __FILE__ ).'images/adsmax_privacydocs.png';


// include our admin pages
include 'adsmax_privacydocs_settings.php';


// creates all pages
function adsmax_privacydocss_create_pages() {
	
	$options = get_option( 'adsmax_privacydocs-settings' );
	$company_name = isset( $options['adsmax_privacydocs-field-1'] ) ? esc_html($options['adsmax_privacydocs-field-1']) : '';
	$company_address = isset( $options['adsmax_privacydocs-field-2'] ) ? esc_html($options['adsmax_privacydocs-field-2']) : '';
	$company_state = isset( $options['adsmax_privacydocs-field-3'] ) ? esc_html($options['adsmax_privacydocs-field-3']) : '';
	$company_contact = isset( $options['adsmax_privacydocs-field-4'] ) ? esc_html($options['adsmax_privacydocs-field-4']) : '';
	
	$thepage = sanitize_text_field($_POST['thepage']);

	if ($thepage == 'privacy' || $thepage == 'all') {
		include 'includes/privacy.php';
		$privacy_policy = array(
			'post_title'    => 'Privacy Policy',
			'post_content'  => wp_kses_post($privacy_policy_html),
			'post_status'   => 'publish',
			'post_author'   => 1,
			'post_type'     => 'page',
			'post_name'     => 'privacy'
		);
		wp_insert_post( $privacy_policy );
	}
		
	if ($thepage == 'cookies' || $thepage == 'all') {
		include 'includes/cookies.php';
		$cookies_policy = array(
			'post_title'    => 'Cookies Policy',
			'post_content'  => wp_kses_post($cookies_html),
			'post_status'   => 'publish',
			'post_author'   => 1,
			'post_type'     => 'page',
			'post_name'     => 'cookies'
		);
		wp_insert_post( $cookies_policy );
	}
	
	if ($thepage == 'terms' || $thepage == 'all') {
		include 'includes/terms.php';
		$terms = array(
			'post_title'    => 'Terms of Use',
			'post_content'  => wp_kses_post($terms_html),
			'post_status'   => 'publish',
			'post_author'   => 1,
			'post_type'     => 'page',
			'post_name'     => 'terms'
		);
		wp_insert_post( $terms );
	}
	
	if ($thepage == 'disclaimers' || $thepage == 'all') {
		include 'includes/disclaimers.php';
		$disclaimers = array(
			'post_title'    => 'Disclaimers',
			'post_content'  => wp_kses_post($disclaimers_html),
			'post_status'   => 'publish',
			'post_author'   => 1,
			'post_type'     => 'page',
			'post_name'     => 'disclaimers'
		);
		wp_insert_post( $disclaimers );
	}
	
	if ($thepage == 'eula' || $thepage == 'all') {
		include 'includes/eula.php';
		$eula = array(
			'post_title'    => 'EULA',
			'post_content'  => wp_kses_post($eula_html),
			'post_status'   => 'publish',
			'post_author'   => 1,
			'post_type'     => 'page',
			'post_name'     => 'eula'
		);
		wp_insert_post( $eula );
	}
	
}
add_action( 'wp_ajax_adsmax_privacydocs_create_legal_pages', 'adsmax_privacydocss_create_pages' );


// show a page
function adsmax_privacydocs_show_page() {
	
    ob_start();
	
	$options = get_option( 'adsmax_privacydocs-settings' );
	$company_name = isset( $options['adsmax_privacydocs-field-1'] ) ? esc_html($options['adsmax_privacydocs-field-1']) : '';
	$company_address = isset( $options['adsmax_privacydocs-field-2'] ) ? esc_html($options['adsmax_privacydocs-field-2']) : '';
	$company_state = isset( $options['adsmax_privacydocs-field-3'] ) ? esc_html($options['adsmax_privacydocs-field-3']) : '';
	$company_contact = isset( $options['adsmax_privacydocs-field-4'] ) ? esc_html($options['adsmax_privacydocs-field-4']) : '';
	
	$thepage = sanitize_text_field($_POST['thepage']);
	
	if ($thepage == 'createall') {
    	include('includes/createall.php');
	}
	
	if ($thepage == 'privacy') {
    	include('includes/privacy.php');
	}
	
	if ($thepage == 'terms') {
    	include('includes/terms.php');
	}
	
	if ($thepage == 'cookies') {
    	include('includes/cookies.php');
	}
	
	if ($thepage == 'eula') {
    	include('includes/eula.php');
	}
	
	if ($thepage == 'disclaimers') {
    	include('includes/disclaimers.php');
	}
	
    $content = ob_get_clean();
    echo wp_kses_post($content);
    wp_die();

}
add_action( 'wp_ajax_adsmax_privacydocs_show_page', 'adsmax_privacydocs_show_page' );


// show the legal docs page
function adsmax_privacydocs_page() {
	
	// get globals
	global $adsmax_privacydocs_logo;
	?>
	<style>
		#wpcontent {
		  padding-left: 0px;
		}
		.notice, div.error, div.updated {
		  background: #15172b !important;
		  border: 0px solid #c3c4c7 !important;
		  border-left-width: 0px !important;
		  box-shadow: 0 1px 1px rgb(0 0 0 / 4%);
		  margin: 0px 0px 0px !important;
		  padding: 20px 12px 1px 45px !important;
		  font-size: 16px !important;
		  font-weight: bold !important;
		  color: #08d !important;
		}
		@media (max-width: 768px) {
		  .notice, div.error, div.updated {
			background: #15172b !important;
			border: 0px solid #c3c4c7 !important;
			border-left-width: 0px !important;
			box-shadow: 0 1px 1px rgb(0 0 0 / 4%);
			margin: 0px 0px 0px !important;
			padding: 20px 12px 1px 25px !important;
			font-size: 16px !important;
			font-weight: bold !important;
			color: #08d !important;
		  }
		}
		.wp-die-message, p {
		  font-size: 16px !important;
		  line-height: 1.5 !important;
		  margin: 1em 0 !important;
		}
	</style>
	<div class="adsmax_privacydocs_pageholder">
		<div class="adsmax_privacydocs_formwrap_outter">
			<div class="adsmax_privacydocs_formwrap adsmax_privacydocs_form">
				<div class="adsmax_privacydocs_logoholder_outter">
					<div class="adsmax_privacydocs_logoholder">
						<img src="<?php echo esc_url($adsmax_privacydocs_logo); ?>" class="adsmax_privacydocs_pluginlogo">
					</div>
				</div>
				<h1 class="adsmax_privacydocs_title">Auto Privacy Docs</h1>
				<p class="adsmax_privacydocs_head_p">Just provide your company name and address, and easily generate pages for: Privacy Policy, Terms of Use, Cookies Policy, EULA, and Disclaimers</p>
				<p>Just add your company name below to generate your documents.</p>
				<form method="post" action="options.php" class="adsmax_privacydocs_form">
					<?php
					$options1 = get_option('adsmax_privacydocs-settings');
					settings_fields('adsmax_privacydocs-settings-group');
					do_settings_sections('adsmax_privacydocs');
					submit_button('Save Changes', 'adsmax_privacydocs_submit1', 'submit', false);
					?>
					<input type="hidden" name="wpautoplugin" value="legaldocs">
				</form>
			</div>
		</div>
	</div>

	<?php
	if (isset( $options1['adsmax_privacydocs-field-1'] ) && $options1['adsmax_privacydocs-field-1'] != '') {
	?>
		<div style="clear: both; height: 0px;"></div>
		<div class="adsmax_privacydocs_pagetab_holder">
			<div class="adsmax_privacydocs_pagetab adsmax_privacydocs_pagetab_active" id="adsmax_privacydocs_createall">Create All Pages</div>
			<div class="adsmax_privacydocs_pagetab" id="adsmax_privacydocs_privacy">Privacy Policy</div>
			<div class="adsmax_privacydocs_pagetab" id="adsmax_privacydocs_terms">Terms of Use</div>
			<div class="adsmax_privacydocs_pagetab" id="adsmax_privacydocs_cookies">Cookies Policy</div>
			<div class="adsmax_privacydocs_pagetab" id="adsmax_privacydocs_eula">EULA</div>
			<div class="adsmax_privacydocs_pagetab" id="adsmax_privacydocs_disclaimers">Disclaimers</div>
		</div>
		<div id="adsmax_privacydocs_showpage">
			<div class="adsmax_privacydocs_buttonholder">
			</div>
			<div class="adsmax_privacydocs_contentholder">
				<h1>Create All Pages</h1>
				<p>Just click the button below to easily create these five pages. Or review and create each page individually by clicking on them.</p>
				<div style="height:1px; clear:both;"></div>
				<div class="adsmax_privacydocs_submit3" id="adsmax_privacydocs_btn">Create All Pages</div>
			</div>
		</div>
	<?php
	}
	
}

?>