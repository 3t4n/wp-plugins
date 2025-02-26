<?php

function aude_videopage_metaboxes( $videopage_meta_boxes ) {
    $prefix = '_'; // Prefix for all fields
    $videopage_meta_boxes['aude_videopage_meta_box'] = array(
        'id' => 'aude_videopage_meta_box',
        'title' => 'Video Options',
        'pages' => array('page'), // post type
		'show_on' => array( 'key' => 'page-template', 'value' => 'page-home-video.php' ),
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
		  array(
				'name' => 'Self Hosted Video',
				'desc' => '',
				'type' => 'title',
				'id' => $prefix . 'self_hosted_video_title'
			),
           array(
				'name'    => __( 'Video MP4 Format File', 'cmb' ),
				'desc'    => __( 'Upload the video in MP4 Format and copy/paste URL', 'cmb' ),
				'id'      => $prefix . 'video_mp4',
				'type'    => 'text',
			),
		   array(
				'name'    => __( 'Video Webm Format File', 'cmb' ),
				'desc'    => __( 'Upload the video in Webm Format and copy/paste URL', 'cmb' ),
				'id'      => $prefix . 'video_webm',
				'type'    => 'text',
			),
           array(
				'name'    => __( 'Video Ogg Format File', 'cmb' ),
				'desc'    => __( 'Upload the video in Ogg Format and copy/paste URL', 'cmb' ),
				'id'      => $prefix . 'video_ogg',
				'type'    => 'text',
			),
            array(
				'name'    => __( 'Image File Fallback', 'cmb' ),
				'desc'    => __( 'Upload or enter the URL of an image as fallback for browsers do not support HTML5 Video', 'cmb' ),
				'id'      => $prefix . 'video_image_fallback',
				'type'    => 'file',
			),
           array(
				'name' => 'Vimeo or Youtube',
				'desc' => '',
				'type' => 'title',
				'id' => $prefix . 'embed_video_title'
			),
          
            array(
				'name'    => __( 'Embed Code', 'cmb' ),
				'desc'    => __( 'Paste the embed code form Vimeo or Youtube Video', 'cmb' ),
				'id'      => $prefix . 'embed_video',
				'sanitization_cb' => false,
				'type'    => 'textarea_small',
			),
 		   
           array(
				'name' => 'General Settings',
				'desc' => '',
				'type' => 'title',
				'id' => $prefix . 'video_general_settings_title'
			),  				
           array(
				'name'    => __( 'Display Pattern Above Video?', 'cmb' ),
				'desc'    => __( '', 'cmb' ),
				'id'      => $prefix . 'pattern_display',
				'type'    => 'select',
				'options' => array(
					'1' => __( 'Yes', 'cmb' ),
					'0'   => __( 'No', 'cmb' ),
				),
			),	
		  array(
				'name'    => __( 'Title Text', 'cmb' ),
				'desc'    => __( '', 'cmb' ),
				'id'      => $prefix . 'video_title',
				'type'    => 'text',
			),
		  array(
				'name'    => __( 'Title Text Color', 'cmb' ),
				'desc'    => __( '', 'cmb' ),
				'id'      => $prefix . 'video_title_color',
				'type'    => 'colorpicker',
				'default' => '#ffffff'
			),	
          array(
				'name'    => __( 'Subtitle Text', 'cmb' ),
				'desc'    => __( '', 'cmb' ),
				'id'      => $prefix . 'video_subtitle',
				'type'    => 'text',
			),
          array(
				'name'    => __( 'Subitle Text Color', 'cmb' ),
				'desc'    => __( '', 'cmb' ),
				'id'      => $prefix . 'video_subtitle_color',
				'type'    => 'colorpicker',
				'default' => '#ffffff'
			),			
        ),
    );

    return $videopage_meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'aude_videopage_metaboxes' );