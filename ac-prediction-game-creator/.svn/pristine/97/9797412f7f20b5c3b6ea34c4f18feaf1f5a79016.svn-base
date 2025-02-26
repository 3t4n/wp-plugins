<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 *
 * Add the default league page if it does not already exist
 *
 */
function acpgc_add_league_page() {

    if ( ! current_user_can( 'activate_plugins' ) ) return;

    global $wpdb;

    if ( null === $wpdb->get_row(
        $wpdb->prepare( "SELECT post_name FROM {$wpdb->prefix}posts WHERE post_name = %s AND post_type = %s", 'acpgc-leagues', 'page' ),
        'ARRAY_A' ) )
    {
        // Create post object
        $acpgc_post = array(
            'post_title' => wp_strip_all_tags('Leagues'),
            'post_content' => '<!-- wp:shortcode -->[acpgc_league]<!-- /wp:shortcode -->',
            'post_status' => 'publish',
            'post_author' => 1,
            'post_type' => 'page',
            'post_name' => 'acpgc-leagues'
        );

        // Insert the post into the database
        wp_insert_post($acpgc_post);
    }
}/**
 *
 * Add the default league page if it does not already exist
 *
 */
function acpgc_add_create_league_page() {

    if ( ! current_user_can( 'activate_plugins' ) ) return;

    global $wpdb;


    if ( null === $wpdb->get_row($wpdb->prepare( "SELECT post_name FROM {$wpdb->prefix}posts WHERE post_name = %s AND post_type = %s", 'acpgc-create-your-league', 'page' ),
            'ARRAY_A' ) )
    {
        // Create post object
        $acpgc_post = array(
            'post_title' => wp_strip_all_tags('Create Your League'),
            'post_content' => '<!-- wp:shortcode -->[acpgc_create_league]<!-- /wp:shortcode -->',
            'post_status' => 'publish',
            'post_author' => 1,
            'post_type' => 'page',
            'post_name' => 'acpgc-create-your-league'
        );

        // Insert the post into the database
        wp_insert_post($acpgc_post);
    }
}

/**
 *
 * Add the custom sign up page if it does not already exist
 *
 */
function acpgc_add_register_page() {

    if ( ! current_user_can( 'activate_plugins' ) ) return;

    global $wpdb;



    if ( null === $wpdb->get_row($wpdb->prepare( "SELECT post_name FROM {$wpdb->prefix}posts WHERE post_name = %s AND post_type = %s", 'acpgc-register', 'page' ),
            'ARRAY_A' ) ) {

        // Create post object
        $acpgc_post = array(
            'post_title' => wp_strip_all_tags('Register'),
            'post_content' => '<!-- wp:shortcode -->[acpgc_register]<!-- /wp:shortcode -->',
            'post_status' => 'publish',
            'post_author' => 1,
            'post_type' => 'page',
            'post_name' => 'acpgc-register'
        );

        // Insert the post into the database
        wp_insert_post($acpgc_post);
    }
}

/**
 *
 * Add the default login page if it does not already exit
 *
 */
function acpgc_add_login_page() {

    if ( ! current_user_can( 'activate_plugins' ) ) return;

    global $wpdb;



    if ( null === $wpdb->get_row($wpdb->prepare( "SELECT post_name FROM {$wpdb->prefix}posts WHERE post_name = %s AND post_type = %s",'acpgc-login', 'page' )
            , 'ARRAY_A' ) ) {

        // Create post object
        $acpgc_post = array(
            'post_title' => wp_strip_all_tags('Login'),
            'post_content' => '<!-- wp:shortcode -->[acpgc_login]<!-- /wp:shortcode -->',
            'post_status' => 'publish',
            'post_author' => 1,
            'post_type' => 'page',
            'post_name' => 'acpgc-login'
        );

        // Insert the post into the database
        wp_insert_post($acpgc_post);
    }
}

/**
 *
 * Add the game results page if it does not already exit
 *
 */
function acpgc_add_results_page() {

    if ( ! current_user_can( 'activate_plugins' ) ) return;

    global $wpdb;



    if ( null === $wpdb->get_row($wpdb->prepare( "SELECT post_name FROM {$wpdb->prefix}posts WHERE post_name = %s AND post_type = %s", 'acpgc-results', 'page' ),
            'ARRAY_A' ) ) {

        // Create post object
        $acpgc_post = array(
            'post_title' => wp_strip_all_tags('Results'),
            'post_content' => '<!-- wp:shortcode -->[acpgc_rounds status="closed"]<!-- /wp:shortcode -->',
            'post_status' => 'publish',
            'post_author' => 1,
            'post_type' => 'page',
            'post_name' => 'acpgc-results'
        );

        // Insert the post into the database
        wp_insert_post($acpgc_post);
    }
}

/**
 *
 * Add the game rounds page if it does not already exit
 *
 */
function acpgc_add_rounds_page() {

    if ( ! current_user_can( 'activate_plugins' ) ) return;

    global $wpdb;




    if ( null === $wpdb->get_row($wpdb->prepare( "SELECT post_name FROM {$wpdb->prefix}posts WHERE post_name = %s AND post_type = %s", 'acpgc-rounds', 'page' ),
            'ARRAY_A' ) ) {

        // Create post object
        $acpgc_post = array(
            'post_title' => wp_strip_all_tags('Rounds'),
            'post_content' => '<!-- wp:shortcode -->[acpgc_rounds]<!-- /wp:shortcode -->',
            'post_status' => 'publish',
            'post_author' => 1,
            'post_type' => 'page',
            'post_name' => 'acpgc-rounds'
        );

        // Insert the post into the database
        wp_insert_post($acpgc_post);
    }
}

/**
 *
 * Add the user profile page if it does not already exit
 *
 */
function acpgc_add_user_profile_page() {

    if ( ! current_user_can( 'activate_plugins' ) ) return;

    global $wpdb;



    if ( null === $wpdb->get_row( $wpdb->prepare( "SELECT post_name FROM {$wpdb->prefix}posts WHERE post_name = %s AND post_type = %s", 'acpgc-user-profile', 'page' ),
            'ARRAY_A' ) ) {

        // Create post object
        $acpgc_post = array(
            'post_title' => wp_strip_all_tags('Your Profile'),
            'post_content' => '<!-- wp:shortcode -->[acpgc_user_profile]<!-- /wp:shortcode -->',
            'post_status' => 'publish',
            'post_author' => 1,
            'post_type' => 'page',
            'post_name' => 'acpgc-user-profile'
        );

        // Insert the post into the database
        wp_insert_post($acpgc_post);
    }
}

/**
 *
 * Add the user dashboard page if it does not already exit
 *
 */
function acpgc_add_user_dashboard_page() {

    if ( ! current_user_can( 'activate_plugins' ) ) return;

    global $wpdb;

    // Prepare the query to check if the page exists


    if ( null === $wpdb->get_row( $wpdb->prepare( "SELECT post_name FROM {$wpdb->prefix}posts WHERE post_name = %s AND post_type = %s", 'acpgc-dashboard', 'page' ),
            'ARRAY_A' ) ) {

        // Create post object with updated content
        $acpgc_post = array(
            'post_title' => wp_strip_all_tags('Dashboard'),
            'post_content' => '
<!-- wp:shortcode -->
[acpgc_user_dash<!-- /wp:shortcode -->

<!-- wp:heading -->
<h2 class="wp-block-heading">Next Round</h2>
<!-- /wp:heading -->

<!-- wp:shortcode -->
[acpgc_rounds status="open" show="1"]
<!-- /wp:shortcode -->

<!-- wp:heading -->
<h2 class="wp-block-heading">Up and Coming Rounds</h2>
<!-- /wp:heading -->

<!-- wp:shortcode -->
[acpgc_rounds status="future" show="3"]
<!-- /wp:shortcode -->',
            'post_status' => 'publish',
            'post_author' => 1,
            'post_type' => 'page',
            'post_name' => 'acpgc-dashboard'
        );

        // Insert the post into the database
        wp_insert_post($acpgc_post);
    }
}


