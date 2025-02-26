<?php
/*
  Plugin Name: AC Prediction Game Creator
  Plugin URI: https://ambercouch.co.uk/
  Description: Create your own prediction game
  Version: 0.0.1
  Author: AmberCouch
  Author URI: http://ambercouch.co.uk
  Author Email: richard@ambercouch.co.uk
  Text Domain: ac-prediction-game-creator
  Requires PHP: 8.0
  License: GPL-2.0+
  License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */
defined('ABSPATH') or die('You do not have the required permissions');

if (!defined('ACPGC_VERSION')) define( 'ACPGC_VERSION', '0.0.3' );
if (!defined('ACPGC_PLUGIN')) define( 'ACPGC_PLUGIN', __FILE__ );
if (!defined('ACPGC_PREFIX')) define( 'ACPGC_PREFIX', 'acpgc_' );


define( 'ACPGC_PLUGIN_BASENAME', plugin_basename( ACPGC_PLUGIN ) );

define( 'ACPGC_PLUGIN_NAME', trim( dirname( ACPGC_PLUGIN_BASENAME ), '/' ) );

define( 'ACPGC_PLUGIN_DIR', untrailingslashit( dirname( ACPGC_PLUGIN ) ) );

define( 'ACPGC_PLUGIN_LIB_DIR', ACPGC_PLUGIN_DIR . '/lib' );

define( 'ACPGC_PLUGIN_TEMPLATE_DIR', ACPGC_PLUGIN_DIR . '/templates' );

require ACPGC_PLUGIN_DIR .  '/vendor/autoload.php';

require_once ACPGC_PLUGIN_LIB_DIR . '/ACPGC_background_Process.php';

require_once 'functions.php';

require_once  'default-pages.php';

require_once ACPGC_PLUGIN_LIB_DIR . '/ACPGC_predictionGame.php';

require_once ACPGC_PLUGIN_LIB_DIR . '/ACPGC_auth.php';

require_once ACPGC_PLUGIN_LIB_DIR . '/ACPGC_user.php';

require_once ACPGC_PLUGIN_LIB_DIR . '/ACPGC_userDashboard.php';

require_once ACPGC_PLUGIN_LIB_DIR . '/ACPGC_round.php';

require_once ACPGC_PLUGIN_LIB_DIR . '/ACPGC_question.php';

require_once ACPGC_PLUGIN_LIB_DIR . '/ACPGC_choice.php';

require_once ACPGC_PLUGIN_LIB_DIR . '/ACPGC_userScore.php';

require_once ACPGC_PLUGIN_LIB_DIR . '/ACPGC_league.php';

// Act on plugin activation
register_activation_hook( __FILE__, "acpgc_activate" );

// Act on plugin de-activation
register_deactivation_hook( __FILE__, "acpgc_deactivate" );

// Activate Plugin
function acpgc_activate() {

    // Execute tasks on Plugin activation

    // Insert DB Tables
    acpgc_init_db();

    acpgc_add_league_page();

    acpgc_add_create_league_page();

    acpgc_add_user_profile_page();

    acpgc_add_results_page();

    acpgc_add_rounds_page();

    acpgc_add_login_page();

    acpgc_add_register_page();

    acpgc_add_user_dashboard_page();
}

// De-activate Plugin
function acpgc_deactivate() {

    // Execute tasks on Plugin de-activation
}

// Initialize DB Tables
function acpgc_init_db() {
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();

    // Define table names with prefixes
    $rounds_predictions_table = $wpdb->prefix . ACPGC_PREFIX . 'rounds_predictions';
    $rounds_user_score_table = $wpdb->prefix . ACPGC_PREFIX . 'rounds_user_scores';
    $league_invites_table = $wpdb->prefix . ACPGC_PREFIX . 'league_invites';

    // Check if the rounds_predictions table exists
    if ($wpdb->get_var($wpdb->prepare("SHOW TABLES LIKE %s", $rounds_predictions_table)) != $rounds_predictions_table) {
        // SQL for creating the rounds_predictions table
        $sql = "CREATE TABLE `$rounds_predictions_table` (
            `id` int(11) NOT NULL auto_increment,
            `user_id` int(11) NOT NULL,
            `rounds_prediction_round_id` int(11) NOT NULL,
            `rounds_prediction_question_id` int(11) NOT NULL,
            `rounds_prediction_choice_id` int(11) NOT NULL,
            `created_at` timestamp NOT NULL,
            `updated_at` timestamp NOT NULL,
            PRIMARY KEY (`id`)
        ) $charset_collate;";
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
    }

    // Check if the rounds_user_score table exists
    if ($wpdb->get_var($wpdb->prepare("SHOW TABLES LIKE %s", $rounds_user_score_table)) != $rounds_user_score_table) {
        // SQL for creating the rounds_user_score table
        $sql = "CREATE TABLE `$rounds_user_score_table` (
            `id` int(11) NOT NULL auto_increment,
            `user_id` int(11) NOT NULL,
            `rounds_user_score_round_id` int(11) NOT NULL,
            `rounds_user_score_value` int(11) NOT NULL,
            `created_at` timestamp NOT NULL,
            `updated_at` timestamp NOT NULL,
            PRIMARY KEY (`id`)
        ) $charset_collate;";
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
    }

    // Check if the league_invites table exists
    if ($wpdb->get_var($wpdb->prepare("SHOW TABLES LIKE %s", $league_invites_table)) != $league_invites_table) {
        // SQL for creating the league_invites table
        $sql = "CREATE TABLE `$league_invites_table` (
            `id` int(11) NOT NULL auto_increment,
            `league_id` int(11) NOT NULL,
            `invite_token` varchar(55) NOT NULL,
            `email` varchar(100) NOT NULL,
            `created_at` timestamp NOT NULL,
            `updated_at` timestamp NOT NULL,
            PRIMARY KEY (`id`)
        ) $charset_collate;";
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
    }
}

/**
 *
 * Load the plugin
 *
 */
add_action( 'plugins_loaded', 'acpgc_load', 10, 0 );
function acpgc_load(){
  new ACPGC_predictionGame();
}


