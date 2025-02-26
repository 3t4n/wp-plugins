<?php
/*
 * @wordpress-plugin
 * Plugin Name:       hockeydata LOS
 * Plugin URI:        https://apidocs.hockeydata.net/plugins/wordpress/
 * Description:       Add statistic widgets by hockeydata with a view clicks.
 * Version:           1.2.4
 * Author:            hockeydata
 * Author URI:        http://www.hockeydata.net/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       hockeydata_los
 * Domain Path:       /languages
*/

if ( ! defined( 'ABSPATH' ) ) {

	exit;

}

define( 'HD_LOS_PLUGIN_PATH',  plugin_dir_path( __FILE__ ) );
define( 'HD_LOS_API_BASE_URL', 'https://api.hockeydata.net/'    );

function hd_los_init() {

	/** @noinspection PhpIncludeInspection */
	include( HD_LOS_PLUGIN_PATH . 'inc/helpers.php' );

	add_action( 'plugins_loaded',     'hd_los_check_update'          );
	add_action( 'plugins_loaded',     'hd_los_load_textdomain'       );
	add_action( 'widgets_init',       'hd_los_load_widgets'          );
	add_action( 'widgets_init',       'hd_los_add_shortcodes'        );
	add_action( 'wp_enqueue_scripts', 'hd_los_register_scripts', 100 );
	add_action( 'wp_head',            'hd_los_add_custom_css',   100 );

	if ( is_admin() ) {

		add_action( 'admin_print_scripts',                    'hd_los_admin_register_scripts' );
		add_action( 'elementor/editor/after_enqueue_scripts', 'hd_los_admin_register_scripts' );
		add_action( 'admin_print_styles',                     'hd_los_admin_register_styles'  );
		add_action( 'admin_init',                             'hd_los_register_settings'      );
		add_action( 'admin_menu',                             'hd_los_admin_menu'             );

	}

}

function hd_los_check_update() {

	$db_version = get_option( 'hd_los_db_version' );

	if ( version_compare( $db_version, '1.2.0' ) < 0 ) {

		hd_los_update_to_1_2_0();

	}

    if ( version_compare( $db_version, '1.2.1' ) < 0 ) {

        update_option( 'hd_los_db_version', '1.2.1' );

    }

}

function hd_los_load_textdomain() {

	load_plugin_textdomain( 'hockeydata_los', false, basename( dirname( __FILE__ ) ) . '/languages' );

}

function hd_los_load_widgets() {

	/** @noinspection PhpIncludeInspection */
	include( HD_LOS_PLUGIN_PATH . 'widgets/hd-los-widget.php' );

	$widgets = array(

		array( 'file' => 'game-full-report',       'class' => 'GameFullReport'       ),
		array( 'file' => 'game-slider',            'class' => 'GameSlider'           ),
		array( 'file' => 'game-ticker',            'class' => 'GameTicker'           ),
		array( 'file' => 'knockout-stage',         'class' => 'KnockoutStage'        ),
		array( 'file' => 'knockout-stage-compact', 'class' => 'KnockoutStageCompact' ),
		array( 'file' => 'leaders',                'class' => 'Leaders'              ),
		array( 'file' => 'live-games',             'class' => 'LiveGames'            ),
		array( 'file' => 'player-full-page',       'class' => 'PlayerFullPage'       ),
		array( 'file' => 'players',                'class' => 'Players'              ),
		array( 'file' => 'schedule',               'class' => 'Schedule'             ),
		array( 'file' => 'standings',              'class' => 'Standings'            ),
		array( 'file' => 'team-full-page',         'class' => 'TeamFullPage'         ),
		array( 'file' => 'team-stats',             'class' => 'TeamStats'            )

	);

	foreach ( $widgets as $widget ) {

		/** @noinspection PhpIncludeInspection */
		include( HD_LOS_PLUGIN_PATH . 'widgets/' . $widget[ 'file' ] . '.php' );

		register_widget( 'HD_LOS_Widget_' . $widget[ 'class' ] );

	}

}

function hd_los_register_settings() {

	register_setting( 'hd_los_general_options', 'hd_los_api_key'             );
	register_setting( 'hd_los_general_options', 'hd_los_sport'               );
	register_setting( 'hd_los_general_options', 'hd_los_language'            );
	register_setting( 'hd_los_general_options', 'hd_los_page_game_report'    );
	register_setting( 'hd_los_general_options', 'hd_los_page_player_details' );
	register_setting( 'hd_los_general_options', 'hd_los_page_team_details'   );

	register_setting( 'hd_los_styling_options', 'hd_los_template'    );
	register_setting( 'hd_los_styling_options', 'hd_los_css_color_0' );
	register_setting( 'hd_los_styling_options', 'hd_los_css_color_1' );
	register_setting( 'hd_los_styling_options', 'hd_los_css_color_2' );
	register_setting( 'hd_los_styling_options', 'hd_los_css_color_3' );
	register_setting( 'hd_los_styling_options', 'hd_los_css_color_4' );
	register_setting( 'hd_los_styling_options', 'hd_los_css_color_5' );
	register_setting( 'hd_los_styling_options', 'hd_los_css_color_6' );
	register_setting( 'hd_los_styling_options', 'hd_los_css_color_7' );
	register_setting( 'hd_los_styling_options', 'hd_los_css_color_8' );
	register_setting( 'hd_los_styling_options', 'hd_los_css_color_9' );

	register_setting( 'hd_los_divisions_options', 'hd_los_divisions'    );
	register_setting( 'hd_los_divisions_options', 'hd_los_divisions_id' );

}

function hd_los_register_scripts() {

	$option_sport    = get_option( 'hd_los_sport'    );
	$option_language = get_option( 'hd_los_language' );
	$option_template = get_option( 'hd_los_template' );

	if ( $option_template ) {

		wp_register_style( 'hd-los-template', HD_LOS_API_BASE_URL . 'css/?los_template_' . esc_attr( $option_template ) );

		wp_enqueue_style( 'hd-los-template' );

	}

	$api_script_url  = HD_LOS_API_BASE_URL . 'js/?';
	$api_script_url .= '&i18n_' . ( $option_language ? $option_language : 'en' ) . '_los';
	$api_script_url .= '&los_';
	$api_script_url .= $option_sport;

	wp_enqueue_script( 'hd-los-api-script', $api_script_url, array( 'jquery' ), false, true );

}

function hd_los_add_custom_css() {

	$custom_css = hd_los_get_custom_css();

	if ( $custom_css ) {

		echo '<style type="text/css">' . $custom_css . '</style>';

	}

}

function hd_los_add_shortcodes() {

	add_shortcode( 'hd-los-game-full-report',       function( $options ) { $widget = new HD_LOS_Widget_GameFullReport();       return $widget->render( $options ); } );
	add_shortcode( 'hd-los-game-slider',            function( $options ) { $widget = new HD_LOS_Widget_GameSlider();           return $widget->render( $options ); } );
	add_shortcode( 'hd-los-game-ticker',            function( $options ) { $widget = new HD_LOS_Widget_GameTicker();           return $widget->render( $options ); } );
	add_shortcode( 'hd-los-knockout-stage',         function( $options ) { $widget = new HD_LOS_Widget_KnockoutStage();        return $widget->render( $options ); } );
	add_shortcode( 'hd-los-knockout-stage-compact', function( $options ) { $widget = new HD_LOS_Widget_KnockoutStageCompact(); return $widget->render( $options ); } );
	add_shortcode( 'hd-los-leaders',                function( $options ) { $widget = new HD_LOS_Widget_Leaders();              return $widget->render( $options ); } );
	add_shortcode( 'hd-los-live-games',             function( $options ) { $widget = new HD_LOS_Widget_LiveGames();            return $widget->render( $options ); } );
	add_shortcode( 'hd-los-player-full-page',       function( $options ) { $widget = new HD_LOS_Widget_PlayerFullPage();       return $widget->render( $options ); } );
	add_shortcode( 'hd-los-players',                function( $options ) { $widget = new HD_LOS_Widget_Players();              return $widget->render( $options ); } );
	add_shortcode( 'hd-los-schedule',               function( $options ) { $widget = new HD_LOS_Widget_Schedule();             return $widget->render( $options ); } );
	add_shortcode( 'hd-los-standings',              function( $options ) { $widget = new HD_LOS_Widget_Standings();            return $widget->render( $options ); } );
	add_shortcode( 'hd-los-team-full-page',         function( $options ) { $widget = new HD_LOS_Widget_TeamFullPage();         return $widget->render( $options ); } );
	add_shortcode( 'hd-los-team-stats',             function( $options ) { $widget = new HD_LOS_Widget_TeamStats();            return $widget->render( $options ); } );

}

function hd_los_admin_load_page( $page ) {

	/** @noinspection PhpIncludeInspection */
	include( HD_LOS_PLUGIN_PATH . 'inc/admin-header.php' );

	/** @noinspection PhpIncludeInspection */
	include( HD_LOS_PLUGIN_PATH . 'pages/' . $page . '.php' );

	/** @noinspection PhpIncludeInspection */
	include( HD_LOS_PLUGIN_PATH . 'inc/admin-footer.php' );

}

function hd_los_admin_register_scripts() {

	$hd_los_client_translations = array(

		'Alias'                               => __( 'Alias',                               'hockeydata_los' ),
		'Division-Id, Permalink, JSON-string' => __( 'Division-Id, Permalink, JSON-string', 'hockeydata_los' )

	);

	wp_register_script( 'hd-los-admin-script', plugins_url( '/js/hd-los-admin.js', __FILE__ ), array( 'wp-color-picker' ) );

	wp_localize_script( 'hd-los-admin-script', 'hdLosTranslations', $hd_los_client_translations );

	wp_enqueue_script( 'hd-los-admin-script' );

}

function hd_los_admin_register_styles() {

	wp_register_style( 'hd-los-admin-style', plugins_url( '/css/hd-los-admin.css', __FILE__ ) );

	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_style( 'hd-los-admin-style' );

}

function hd_los_admin_menu() {

	add_options_page( 'hockeydata Live.Online Statistics', 'hockeydata LOS', 'administrator', 'hockeydata_los_settings', 'hd_los_admin_menu_settings' );

}

function hd_los_admin_menu_settings() {

	hd_los_admin_load_page( 'settings' );

}

hd_los_init();