<?php
/*
Plugin Name: Pivotpress
Plugin URI: http://internetstudio.codes/pivotpress/
Description: A simple Pivotal Tracker frontend for Wordpress
Version: 0.2.6
Author: Alex Harris
Author URI: http://alexharr.is
License: GPL
Copyright: Alex Harris
*/

require 'pivotal_api.php';

function access_pivotal_php_wrapper() {

    $pivotal = new pivotal;

    $pivotal->token = get_option( 'pivotpress_api_token' );
    $pivotal->project_id = get_option( 'pivotpress_project_id' );

    return $pivotal;
}


//include in wordpress menu
function pivotpress_menu() {
    add_options_page( 'Pivotpress', 'Pivotpress', 'manage_options', 'pivotpress', 'pivotpress_admin_page' );
}

add_action( 'admin_menu', 'pivotpress_menu' );


//Setup the admin page and form
function pivotpress_admin_page() {

    if ( !current_user_can( 'manage_options' ) )  {
        wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
    }

    ?>
    <div class="wrap">
        <h2>Pivotpress Settings</h2>
        <form action="options.php" method="POST">
            <?php settings_fields( 'pivotpress-settings-group' ); ?>
            <?php do_settings_sections( 'pivotpress' ); ?>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

// Setup admin settings

function pivotpress_init() {
    //    API TOKEN
    register_setting( 'pivotpress-settings-group', 'pivotpress_api_token' );
    add_settings_section( 'section-one', 'Section One', 'section_one_callback', 'pivotpress' );
    add_settings_field( 'field-one', 'API Key', 'field_one_callback', 'pivotpress', 'section-one' );
    //    PROJECT ID
    register_setting( 'pivotpress-settings-group', 'pivotpress_project_id' );
    add_settings_field( 'field-two', 'Project ID', 'field_two_callback', 'pivotpress', 'section-one' );
}

add_action( 'admin_init', 'pivotpress_init' );

function section_one_callback() {
    echo 'Some help text goes here.';
}

function field_one_callback() {
    $setting = esc_attr( get_option( 'pivotpress_api_token' ) );
    echo "<input type='text' name='pivotpress_api_token' value='$setting' />";
}

function section_two_callback() {
    echo 'Some help text goes here.';
}

function field_two_callback() {
    $setting = esc_attr( get_option( 'pivotpress_project_id' ) );
    echo "<input type='text' name='pivotpress_project_id' value='$setting' />";
}


// Rendering

function pivotpress_shortcode() {
    $template = load_template( dirname( __FILE__ ) . '/templates/pivotpress-main.php' );
}

add_shortcode('pivotpress', 'pivotpress_shortcode');


// Get all stories, based on credentials

function pivotpress_get_stories() {

    $pivotal = access_pivotal_php_wrapper();

    $story = $pivotal->getStories($pivotal->project_id);

    return $story;
}

// Get all labels, based on credentials

function pivotpress_get_labels() {

    $pivotal = access_pivotal_php_wrapper();

    $labels = $pivotal->getLabels($pivotal->project_id);

    return $labels;
}


/**
 * Proper way to enqueue scripts and styles
 */
function pivotpress_scripts() {
    wp_register_style('pivotpress_styles', plugins_url('css/styles.css',__FILE__ ));
    wp_enqueue_style('pivotpress_styles');
    wp_register_script('bootstrap_js', plugins_url('js/bootstrap/bootstrap.min.js',__FILE__ ), array( 'jquery' ));
    wp_enqueue_script('bootstrap_js');
    wp_register_script('pivotpress_js', plugins_url('js/script.js',__FILE__ ), array( 'jquery' ));
    wp_enqueue_script('pivotpress_js');
}

add_action( 'wp_enqueue_scripts', 'pivotpress_scripts', 9999 );


// Convert story type into icon

function pivotpress_out_story_type_svg ($story_type) {
    switch ($story_type) {
        case 'feature':
            echo '<span class="glyphicon glyphicon-star" aria-hidden="true"></span>';
            break;
        case 'bug':
            echo '<span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span>';
            break;
        case 'chore':
            echo '<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>';
            break;
        case 'release':
            echo '<span class="glyphicon glyphicon-flag" aria-hidden="true"></span>';
            break;
    }
}

//get project title
// // Doesn't work yet, might not need
//function getProjectTitle() {
//    $pivotal = access_pivotal_php_wrapper();
//    $project_title = $pivotal->getProjectTitle($pivotal->project_id);
//    return $project_title;
//}


