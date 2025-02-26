<?php
/*
 * Plugin Name: Personal Library    
 * Plugin URI: https://wordpress.org/plugins/personal-library/
 * Description: Restricts users to managing/using their own attachments only.
 * Version: 1.0.0
 * Author: Derek Held
 * Author URI: https://profiles.wordpress.org/derekheld/
 */
 
/*
 * Adds an additional filter to all queries for an attachment depending on user role and plugin settings
 *
 * @author Derek Held
 *
 * @param wp_query object
 *
 * @return void
 */
function restrict_media_to_user( $wp_query ) {
    global $current_user;
    
    if( $wp_query->get( 'post_type' ) == 'attachment' )
    {
        $roles = get_userdata( $current_user->ID )->roles;
        $contributor_option = get_option('personal_library_contributor');
        $author_option = get_option('personal_library_author');
        $editor_option = get_option('personal_library_editor');
        if( in_array('contributor', $roles) && empty( $contributor_option ) || 
            in_array('author', $roles) && empty( $author_option ) ||
            in_array('editor', $roles) && empty( $editor_option ) )
        {
            $wp_query->set( 'author', wp_get_current_user()->ID );
        }
    }
}
add_filter('parse_query', 'restrict_media_to_user' );

function personal_library_options_page( ) {
    echo '<form method="post" action="options.php">';
    settings_fields( 'roles_group' );
    do_settings_sections( 'personal_library_options_page' );
    submit_button( );
    echo '</form>';
}

//Add our settings page settings submenu
function personal_library_options_menu() {
	add_submenu_page( 'options-general.php', 'Personal Library', 'Personal Library', 'manage_options', 'personal-library', 'personal_library_options_page' );    
}
add_action( 'admin_menu', 'personal_library_options_menu' );

//Settings callback functions that echo the required HTML
function personal_library_settings_callback( ) {
    echo '<p>User roles with check marks will see all attachments</p>';
}

function contributor_callback() {
 	echo '<input type="checkbox" name="personal_library_contributor" id="personal_library_contributor" '.checked( get_option('personal_library_contributor'), 'on', false ).' />';
}

function author_callback() {
 	echo '<input type="checkbox" name="personal_library_author" id="personal_library_author" '.checked( get_option('personal_library_author'), 'on', false ).' />';
}
 
function editor_callback() {
 	echo '<input type="checkbox" name="personal_library_editor" id="personal_library_editor" '.checked( get_option('personal_library_editor'), 'on', false ).' />';
}
    
//All required initialization for our settings page
function settings_init() {
    //Create settings group
 	add_settings_section( 'roles_group', 'Personal Library Options', 'personal_library_settings_callback', 'personal_library_options_page' );
 	
 	//Create all the settings
 	add_settings_field( 'personal_library_contributor', 'Contributor', 'contributor_callback', 'personal_library_options_page', 'roles_group' );
    add_settings_field( 'personal_library_author', 'Author', 'author_callback', 'personal_library_options_page', 'roles_group' );
    add_settings_field( 'personal_library_editor', 'Editor', 'editor_callback', 'personal_library_options_page', 'roles_group' );
    
    
    //Now register all the settings
    register_setting( 'roles_group', 'personal_library_contributor' );
    register_setting( 'roles_group', 'personal_library_author' );
	register_setting( 'roles_group', 'personal_library_editor' );
}
add_action( 'admin_init', 'settings_init' );

?>