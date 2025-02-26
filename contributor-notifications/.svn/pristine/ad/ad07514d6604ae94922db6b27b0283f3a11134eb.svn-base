<?php
/*
Plugin Name: Contributor Notifications
Description: An incredibly simple and lightweight solution for alerting you of new pending posts from contributors and alerting contributors when their submissions are either approved or declined.
Version: 0.5
Requires at least: 5.0
Author: Bryan Hadaway
Author URI: https://calmestghost.com/
License: Public Domain
License URI: https://wikipedia.org/wiki/Public_domain
Text Domain: contributor-notifications
*/

// block direct access
if ( !defined( 'ABSPATH' ) ) {
	http_response_code( 404 );
	die();
}

// settings menu link
add_action( 'admin_menu', 'contributor_menu_link' );
function contributor_menu_link() {
	add_options_page( __( 'Contributor Notifications', 'contributor-notifications' ), __( 'Contributor Notifications', 'contributor-notifications' ), 'manage_options', 'contributor-notifications', 'contributor_options_page' );
}

// settings page setup
add_action( 'admin_init', 'contributor_admin_init' );
function contributor_admin_init() {
	add_settings_section( 'contributor-section', __( '', 'contributor-notifications' ), 'contributor_section_callback', 'contributor-notifications' );
	add_settings_field( 'contributor-field', __( '', 'contributor-notifications' ), 'contributor_field_callback', 'contributor-notifications', 'contributor-section' );
	register_setting( 'contributor-options', 'contributor_editor_email', 'sanitize_email' );
}

// settings page setup
function contributor_section_callback() {
	echo __( '', 'contributor-notifications' );
}

// settings page setup
function contributor_field_callback() {
	$editemail = get_option( 'contributor_editor_email' );
	echo '<input type="email" size="15" name="contributor_editor_email" value="' . esc_attr( $editemail ) . '" placeholder="email@example.com">';
}

// settings page
function contributor_options_page() {
	?>
	<div id="contributor" class="wrap">
		<style>
		#contributor th{display:none}
		#contributor td{padding:15px 0}
		</style>
		<h1><?php _e( 'Contributor Notifications', 'contributor-notifications' ); ?></h1>
		<p><?php _e( 'Where would you like "New Pending Post" notifications to be sent? (leave blank for default admin email)', 'contributor-notifications' ); ?></p>
		<form action="options.php" method="post">
			<?php settings_fields( 'contributor-options' ); ?>
			<?php do_settings_sections( 'contributor-notifications' ); ?>
			<?php submit_button(); ?>
		</form>
	</div>
	<?php
}

// set emails to HTML
add_filter( 'wp_mail_content_type', 'contributor_email_html' );
function contributor_email_html() {
	return 'text/html';
}

// email admin
add_action( 'future_to_pending', 'contributor_pending_email' );
add_action( 'new_to_pending', 'contributor_pending_email' );
add_action( 'draft_to_pending', 'contributor_pending_email' );
add_action( 'auto-draft_to_pending', 'contributor_pending_email' );
function contributor_pending_email( $post ) {
	if ( get_option( 'contributor_editor_email' ) ) {
		$email = get_option( 'contributor_editor_email' );
	} else {
		$email = get_option( 'admin_email' );
	}
	$title   = wp_strip_all_tags( get_the_title( $post->ID ) );
	$url 	 = get_permalink( $post->ID );
	$custom  = '<p>' . __( '<!--email-admin-->', 'contributor-notifications' ) . '</p>';
	$defined = '<p>' . __( "{$url}", 'contributor-notifications' ) . '</p>';
	$message = $custom . $defined;
	wp_mail( $email, __( 'New Pending Post', 'contributor-notifications' ) . __( ' | ', 'contributor-notifications' ) . $title, $message );
}

// email contributor (approved)
add_action( 'pending_to_publish', 'contributor_pending_approved' );
function contributor_pending_approved( $post ) {
	if ( current_user_can( 'edit_others_posts' ) ) {
		$author  = get_userdata( $post->post_author );
		$email   = $author->user_email;
		$title   = wp_strip_all_tags( get_the_title( $post->ID ) );
		$url 	 = get_permalink( $post->ID );
		$custom  = '<p>' . __( '<!--email-contributor-approved-->', 'contributor-notifications' ) . '</p>';
		$defined = '<p>' . __( "{$url}", 'contributor-notifications' ) . '</p>';
		$message = $custom . $defined;
		wp_mail( $email, __( 'Your Post Has Been Approved', 'contributor-notifications' ) . __( ' | ', 'contributor-notifications' ) . $title, $message );
	}
}

// email contributor (declined)
add_action( 'pending_to_trash', 'contributor_pending_declined' );
add_action( 'pending_to_draft', 'contributor_pending_declined' );
function contributor_pending_declined( $post ) {
	if ( current_user_can( 'edit_others_posts' ) ) {
		$author  = get_userdata( $post->post_author );
		$email   = $author->user_email;
		$title   = wp_strip_all_tags( get_the_title( $post->ID ) );
		$custom  = '<p>' . __( '<!--email-contributor-declined-->', 'contributor-notifications' ) . '</p>';
		$defined = '<p>' . __( 'Sorry, your post has been declined.', 'contributor-notifications' ) . '</p>';
		$message = $custom . $defined;
		wp_mail( $email, __( 'Your Post Has Been Declined', 'contributor-notifications' ) . __( ' | ', 'contributor-notifications' ) . $title, $message );
	}
}