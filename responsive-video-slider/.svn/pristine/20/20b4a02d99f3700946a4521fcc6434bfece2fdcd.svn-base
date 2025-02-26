<?php

add_filter( 'manage_edit-bs_video_slider_columns', 'bs_video_slider_edit_columns' );

function bs_video_slider_edit_columns( $barrel_columns ) {
	$barrel_columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => __( 'Slider Title', 'bs_video_slider' ),
		'slide-link' => __( 'Video Provider', 'bs_video_slider' ),
		'date' => __( 'Date', 'bs_video_slider' )
	);
	return $barrel_columns;
}

add_action( 'manage_bs_video_slider_posts_custom_column', 'bs_video_slider_custom_columns', 10, 2 );

function bs_video_slider_custom_columns( $barrel_column, $post_id ) {
	global $post;
	//echo "dfsdfsdfs";
	switch ( $barrel_column ) {
		case 'slide-link' :
			if ( get_post_meta( $post_id, 'video_provider', true ) != "" ) {
				//echo "<a href='" . get_post_meta($post->ID, "tj_touch_link", $single = true) . "'>" . get_post_meta($post->ID, "tj_touch_link", $single = true) . "</a>";
				echo get_post_meta( $post_id, 'video_provider', true );
			} else {
				_e( 'No Link', 'bs_video_slider' );
			}
			break;
	}
}

add_action( 'admin_menu', 'barrel_slides_menu' );

function barrel_slides_menu() {
	add_submenu_page( 'edit.php?post_type=bs_video_slider', __( 'Slides Settings', 'bs_video_slider' ), __( 'Settings', 'bs_video_slider' ), 'manage_options', 'slides_settings', 'barrel_settings_page' );
}

function barrel_settings_page() {
	include( 'bs-video-slider-setting.php' );
}

add_action( 'admin_init', 'bs_video_slider_register_settings' );

function bs_video_slider_register_settings() {

	register_setting( 'barrel_video_slider_options', 'barrel_video_slider_options' );

	add_settings_section( 'barrel_video_slider', __( 'Configure Responsive Barrel Video Slider', 'bs_video_slider' ), 'bs_video_section_text', 'barrelslider' );

	add_settings_field( 'slider_speed', __( 'Slider Speed', 'bs_video_slider' ), 'bs_video_slider_speed', 'barrelslider', 'barrel_video_slider' );
	add_settings_field( 'slider_loop', __( 'Loop', 'bs_video_slider' ), 'bs_video_slider_loop', 'barrelslider', 'barrel_video_slider' );
	add_settings_field( 'slider_effect', __( 'Slider Effect', 'bs_video_slider' ), 'bs_video_slider_effect', 'barrelslider', 'barrel_video_slider' );
	add_settings_field( 'slider_arrow', __( 'Show Arrow', 'bs_video_slider' ), 'bs_video_slider_arrow', 'barrelslider', 'barrel_video_slider' );
	add_settings_field( 'slider_random', __( 'Random Slider', 'bs_video_slider' ), 'bs_video_slider_random', 'barrelslider', 'barrel_video_slider' );
	add_settings_field( 'slider_pager', __( 'Show Pager', 'bs_video_slider' ), 'bs_video_slider_pager', 'barrelslider', 'barrel_video_slider' );
}

?>
