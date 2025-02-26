<?php

/*

* Plugin Name: Cric Zumo

* Plugin URI: http://criczumo.com/plugins

* Description: Most Easy Free Cricket Scoreboard Plugin

* Version: 0.2

* Author: CricZumo

* Author URI: http://criczumo.com/plugins

*

*/



// ======================================================================

// WP-ADMIN FUNCTIONS

// ======================================================================

add_action( 'admin_enqueue_scripts', 'criczumo_plugin_colorpicker' );

function criczumo_plugin_colorpicker( $hook_suffix ) {
	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_script( 'criczumo_plugin_colorpicker', plugins_url('includes/criczumo-script.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
}


function criczumo_plugin_menu(){
	if (current_user_can('install_plugins')) {
		add_menu_page('CricZumo Settings', 'Cric Zumo', 'manage_options', 'criczumo', 'criczumo_plugin_mainpage', plugins_url( 'includes/images/cricketball16px.png', __FILE__ ));
	}
}


add_action('admin_menu', 'criczumo_plugin_menu');


// ======================================================================

// MAIN PLUGIN PAGE

// ======================================================================



function criczumo_plugin_mainpage()

{

	if (!current_user_can('install_plugins')) {

		wp_die('So say we all :You are not authorised to access this plugin');

	}

	global $plugin_url;

	global $options;


	if (isset($_POST['criczumo_settings_form_submitted'])) {

		if (!current_user_can('install_plugins')) {

			wp_die('We hereby declarating :You are not authorised to access this plugin');

		}else{

			if (
				! isset( $_POST['criczumo_update_secret_key'] )
				|| ! wp_verify_nonce( $_POST['criczumo_update_secret_key'], 'criczumo_update_settings' )
			) {
				wp_die('So say we all :You are not authorised to access this plugin');

			} else {

				$hidden_field = sanitize_text_field($_POST['criczumo_settings_form_submitted']);

				if ($hidden_field == "Y") {


					$awayTeamColor = sanitize_text_field($_POST['away_team_color']);
					$homeTeamColor = sanitize_text_field($_POST['home_team_color']);


					$liveTeamColor = sanitize_text_field($_POST['live_team_color']);
					$endedTeamColor = sanitize_text_field($_POST['ended_team_color']);
					$upComingTeamColor = sanitize_text_field($_POST['upcoming_team_color']);

					update_option('criczumo_away_team_color', $awayTeamColor);
					update_option('criczumo_home_team_color', $homeTeamColor);


					update_option('criczumo_live_team_color', $liveTeamColor);
					update_option('criczumo_ended_team_color', $endedTeamColor);
					update_option('criczumo_upcoming_team_color', $upComingTeamColor);




					$url = admin_url('admin.php?page=criczumo', 'http');

					echo '<script> window.location="';

					echo $url . '";  console.log("should update")</script> ';
					// Nonce is matched and valid. do whatever you want now.
				}
			}
		}

	}

	if (isset($_POST['criczumo_resetColor_form'])) {
		if (!current_user_can('install_plugins')) {

			wp_die('So say we all :You are not authorised to access this plugin');

		}else{
			
			if (! isset( $_POST['criczumo_update_reset_key'] ) || ! wp_verify_nonce( $_POST['criczumo_update_reset_key'], 'criczumo_reset_settings' )) {
				wp_die('So say we all :You are not authorised to access this plugin');
			} else {
			$reset_field = esc_html($_POST['criczumo_resetColor_form']);

			if ($reset_field == "Y") {
				update_option('criczumo_away_team_color', '#030842');
				update_option('criczumo_home_team_color', '#c09f20');
				update_option('criczumo_live_team_color', '#030842');
				update_option('criczumo_ended_team_color', '#030842');
				update_option('criczumo_upcoming_team_color', '#030842');
			}

			$url = admin_url('admin.php?page=criczumo', 'http');

			echo '<script> window.location="';

			echo $url . '"; console.log("should update")</script> ';
			}
		}
	}




	$awayTeamColor = get_option('criczumo_away_team_color');
	$homeTeamColor = get_option('criczumo_home_team_color');
	
	if($homeTeamColor == ''){
		$homeTeamColor = '#030842';
	}

	if($awayTeamColor == ''){
		$awayTeamColor = '#C09F20';
	}


	if(get_option('criczumo_live_team_color') != null){
		$liveTeamColor = get_option('criczumo_live_team_color');
	}
	else{
		$liveTeamColor = '0a4';
	}

	if(get_option('criczumo_ended_team_color') != null){
		$endedTeamColor = get_option('criczumo_ended_team_color');
	}
	else{
		$endedTeamColor = '252525';
	}

	if(get_option('criczumo_upcoming_team_color') != null){
		$upComingTeamColor = get_option('criczumo_upcoming_team_color');
	}
	else{
		$upComingTeamColor = 'F36F20';
	}



	require ('includes/plugin_mainpage_wrapper.php');


}



// ======================================================================

// WIDGET SETTINGS

// ======================================================================


class criczumo_widget extends WP_Widget {


	function __construct() {
		parent::__construct(
			'criczumo_widget', // Base ID
			esc_html__( 'CricZumo Live, Upcoming Ended Match Scores', 'text_domain' ), // Name
			array( 'description' => esc_html__( 'Super Easy Cricket Live Scores,Results for Upcoming, Live & Past Matches', 'text_domain' ), ) // Args
		);
	}

	public function widget($args, $instance)

	{
		global $options;

		$awayTeamColor = get_option('criczumo_away_team_color');
		$homeTeamColor = get_option('criczumo_home_team_color');

		if(get_option('criczumo_live_team_color') != null){
			$liveTeamColor = get_option('live_team_color');
		}
		else{
			$liveTeamColor = '0a4';
		}

		if(get_option('criczumo_ended_team_color') != null){
			$endedTeamColor = get_option('criczumo_ended_team_color');
		}
		else{
			$endedTeamColor = '252525';
		}

		if(get_option('criczumo_upcoming_team_color') != null){
			$upComingTeamColor = get_option('criczumo_upcoming_team_color');
		}
		else{
			$upComingTeamColor = 'F36F20';
		}


		require ('includes/scoreboard_widget.php');

	}

}


// register Foo_Widget widget
function register_criczumo_widget() {
	register_widget( 'criczumo_widget' );
}
add_action( 'widgets_init', 'register_criczumo_widget' );






// ======================================================================

// FRONTEND JAVASCRIPT & STYLE SETTINGS

// ======================================================================

function criczumo_plugin_frontend_scripts_styles()

{
	wp_enqueue_style('bootstrap', plugin_dir_url(__FILE__) . 'includes/lib/bootstrap/css/bootstrap.css');
	wp_enqueue_style('scoreboard', plugin_dir_url(__FILE__) . 'includes/css/criczumo_scoreboard.css');
	wp_enqueue_script("jquery");
	wp_enqueue_script('bootstrap', plugin_dir_url(__FILE__) . 'includes/lib/bootstrap/js/bootstrap.min.js', '', '', false);
	wp_enqueue_script('moment', plugin_dir_url(__FILE__) . 'includes/js/moment.js', '', '', false);
}

add_action('wp_enqueue_scripts', 'criczumo_plugin_frontend_scripts_styles');





?>