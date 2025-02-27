<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( '_WP_Editors' ) ) {
	require ABSPATH . WPINC . '/class-wp-editor.php';
}

function artabr_ivs_button_translation() {

	$strings = array(
		'ivs_title'                                   => __( 'Add video this microdata', 'insert-video-with-schemaorg-ivws' ),
		'ivs_title_section_video'                     => __( 'Add video', 'insert-video-with-schemaorg-ivws' ),
		'ivs_add_video_id'                            => __( 'URL video', 'insert-video-with-schemaorg-ivws' ),
		'ivs_add_video_id_tooltip'                    => __( 'Add a link to the video in the format https://www.youtube.com/watch?v=Rt0nIManqrQ', 'insert-video-with-schemaorg-ivws' ),
		'ivs_add_video_width'                         => __( 'Width player', 'insert-video-with-schemaorg-ivws' ),
		'ivs_add_video_width_tooltip'                 => __( 'Specify the width of the window video player', 'insert-video-with-schemaorg-ivws' ),
		'ivs_add_video_height'                        => __( 'Height player', 'insert-video-with-schemaorg-ivws' ),
		'ivs_add_video_height_tooltip'                => __( 'Specify the height of the window video player', 'insert-video-with-schemaorg-ivws' ),
		'ivs_add_video_align'                         => __( 'Alignment video', 'insert-video-with-schemaorg-ivws' ),
		'ivs_add_video_align_tooltip'                 => __( 'Alignment on the page video player window: left, center, right on the edge.', 'insert-video-with-schemaorg-ivws' ),
		'ivs_add_video_align_center'                  => __( 'Align center', 'insert-video-with-schemaorg-ivws' ),
		'ivs_add_video_align_left'                    => __( 'Align left', 'insert-video-with-schemaorg-ivws' ),
		'ivs_add_video_align_right'                   => __( 'Align right', 'insert-video-with-schemaorg-ivws' ),
		'ivs_title_section_schema'                    => __( 'Add microdata', 'insert-video-with-schemaorg-ivws' ),
		'ivs_title_add_schema_url'                    => __( 'Url video', 'insert-video-with-schemaorg-ivws' ),
		'ivs_title_add_schema_url_tooltip'            => __( 'Add url video. eg https://www.youtube.com/watch?v=HPwH0yS1c44', 'insert-video-with-schemaorg-ivws' ),
		'ivs_title_add_schema_name'                   => __( 'Video title', 'insert-video-with-schemaorg-ivws' ),
		'ivs_title_add_schema_name_tooltip'           => __( 'Specify the video title', 'insert-video-with-schemaorg-ivws' ),
		'ivs_title_add_schema_desc'                   => __( 'Description of video', 'insert-video-with-schemaorg-ivws' ),
		'ivs_title_add_schema_desc_tooltip'           => __( 'Specify the video description of movie', 'insert-video-with-schemaorg-ivws' ),
		'ivs_title_add_schema_duration_label'         => __( 'Video duration', 'insert-video-with-schemaorg-ivws' ),
		'ivs_title_add_schema_duration_label_tooltip' => __( 'Specify the duration of the video in ISO 8601 format', 'insert-video-with-schemaorg-ivws' ),
		'ivs_title_add_schema_duration_min'           => __( 'Minutes', 'insert-video-with-schemaorg-ivws' ),
		'ivs_title_add_schema_duration_sec'           => __( 'Seconds', 'insert-video-with-schemaorg-ivws' ),
		'ivs_title_add_schema_download'               => __( 'Download date video', 'insert-video-with-schemaorg-ivws' ),
		'ivs_title_add_schema_download_tooltip'       => __( 'Move the cursor to select the date, and download video clips. The desired format will be installed automatically.', 'insert-video-with-schemaorg-ivws' ),
		'ivs_title_add_schema_thumb'                  => __( 'Link to the thumbnail', 'insert-video-with-schemaorg-ivws' ),
		'ivs_title_add_schema_thumb_tooltip'          => __( 'Enter a link to a thumbnail from the video.', 'insert-video-with-schemaorg-ivws' ),
		'ivs_title_add_schema_thumb_width'            => __( 'Width thumbnail', 'insert-video-with-schemaorg-ivws' ),
		'ivs_title_add_schema_thumb_width_tooltip'    => __( 'Enter the width of a thumbnail from the video', 'insert-video-with-schemaorg-ivws' ),
		'ivs_title_add_schema_thumb_height'           => __( 'Height thumbnail', 'insert-video-with-schemaorg-ivws' ),
		'ivs_title_add_schema_thumb_height_tooltip'   => __( 'Enter the height of a thumbnail from the video', 'insert-video-with-schemaorg-ivws' ),
		'ivs_add_related'                             => __( 'Show similar videos', 'insert-video-with-schemaorg-ivws' ),
		'ivs_add_control'                             => __( 'Show player controls', 'insert-video-with-schemaorg-ivws' ),
		'ivs_add_showinfo'                            => __( 'Show video title and action bar', 'insert-video-with-schemaorg-ivws' ),
		'ivs_video_id_alert'                          => __( 'Paste a link to the video', 'insert-video-with-schemaorg-ivws' ),
	);

	$locale = _WP_Editors::$mce_locale;

	$translated = 'tinyMCE.addI18n("' . $locale . '.art_insert_yt", ' . wp_json_encode( $strings ) . ");\n";

	return $translated;
}

$strings = artabr_ivs_button_translation();
