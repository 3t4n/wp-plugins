<?php

function gemar_customizer_header_output() {

	//header styling
	$single_video_title       	= get_option( 'single_video_title', '#000000' );
	$single_border_color       	= get_option( 'single_border_color', '#3a3a3a' );
	$single_video_share_text       	= get_option( 'single_video_share_text', '#000000' );
	$single_video_share_icon_bg_color       	= get_option( 'single_video_share_icon_bg_color', '#575757' );
	$single_video_share_icon_color       	= get_option( 'single_video_share_icon_color', '#ffffff' );
	$single_video_share_icon_bg_color_hover       	= get_option( 'single_video_share_icon_bg_color_hover', '#595edc' );
	$single_video_share_icon_color_hover       	= get_option( 'single_video_share_icon_color_hover', '#ffffff' );
	$single_video_name_author       	= get_option( 'single_video_name_author', '#000000' );
	$single_video_date_time       	= get_option( 'single_video_date_time', '#000000' );
	$single_video_content_color       	= get_option( 'single_video_content_color', '#000000' );
	$single_video_tag_color       	= get_option( 'single_video_tag_color', '#595edc' );
	$single_video_tag_color_hover       	= get_option( 'single_video_tag_color_hover', '#4d4ea0' );
	$single_video_content_show       	= get_option( 'single_video_content_show', '#000000' );
	$single_related_title       	= get_option( 'single_related_title', '#000000' );
	$single_related_title_hover       	= get_option( 'single_related_title_hover', '#595edc' );
	$single_related_author       	= get_option( 'single_related_author', '#000000' );
	$single_related_date       	= get_option( 'single_related_date', '#000000' );
	$single_related_icon_hover       	= get_option( 'single_related_icon_hover', '#000000' );
	$single_related_icon_bg_hover       	= get_option( 'single_related_icon_bg_hover', '#4c4fa0b5' );
	$single_related_overlay_bg_hover       	= get_option( 'single_related_overlay_bg_hover', '#00000033' );
	
	$category_page_title       = get_option( 'category_page_title', '#000000' );
	$category_page_desc        = get_option( 'category_page_desc', '#000000' );
	$category_post_title       = get_option( 'category_post_title', '#000000' );
	$category_post_author      = get_option( 'category_post_author', '#a9a9a9' );
	$category_post_meta        = get_option( 'category_post_meta', '#000000' );
	$category_widget_title     = get_option( 'category_widget_title', '#000000' );
	$author_text_detail        = get_option( 'author_text_detail', '#000000' );
	$already_login_title       = get_option( 'already_login_title', '#000000' );
	
	$mytube_author_name        = get_option( 'mytube_author_name', '#000000' );
	$mytube_table_name        = get_option( 'mytube_table_name', '#000000' );

	echo '<style type="text/css">';

		//=========GENERAL STYLING======//
		echo '.single-video-wrap .video-meta .title a {color:' . esc_html( $single_video_title ) . '}';
		echo '.single-video-wrap .video-meta .title a {border-top-color:' . esc_html( $single_border_color ) . '}';
		echo '.single-video-wrap.blog-single .video-content-bottom .share-video span, .single-video-wrap .cat-wrapper {color:' . esc_html( $single_video_share_text ) . '}';
		echo '.share-video ul li a {background:' . esc_html( $single_video_share_icon_bg_color ) . '}';
		echo '.share-video ul li a {color:' . esc_html( $single_video_share_icon_color ) . '}';
		echo '.share-video ul li a:hover {background:' . esc_html( $single_video_share_icon_bg_color_hover ) . '}';
		echo '.share-video ul li a:hover {color:' . esc_html( $single_video_share_icon_color_hover ) . '}';
		echo '.single-video-wrap .video-author-info .vcard a {color:' . esc_html( $single_video_name_author ) . '}';
		echo '.single-video-wrap .video-meta .time {color:' . esc_html( $single_video_date_time ) . '}';
		echo '.single-video-wrap .inner-content-video p {color:' . esc_html( $single_video_content_color ) . '}';
		echo '.single-video-wrap .cat-wrapper a {color:' . esc_html( $single_video_tag_color ) . '}';
		echo '.single-video-wrap .cat-wrapper a:hover {color:' . esc_html( $single_video_tag_color_hover ) . '}';
		echo '.single-video-wrap .show-more-btn {color:' . esc_html( $single_video_content_show ) . '!important}';

		echo '.single-video-wrap.blog-single .vidio-style2-wrap .bottom-item .item-wrap h4 a {color:' . esc_html( $single_related_title ) . '}';
		echo '.single-video-wrap.blog-single .vidio-style2-wrap .bottom-item:hover h4 a {color:' . esc_html( $single_related_title_hover ) . '}';
		echo '.single-video-wrap.blog-single .vidio-style2-wrap .bottom-item span.vcard a {color:' . esc_html( $single_related_author ) . '}';
		echo '.single-video-wrap .views-video span {color:' . esc_html( $single_related_date ) . '}';
		echo '.views-video span svg {fill:' . esc_html( $single_related_date ) . '}';
		echo '.single-video-wrap.single-style-3 .video-meta .views-video>span:nth-child(1):before {background-color:' . esc_html( $single_related_date ) . '}';
		echo '.single-video-wrap.blog-single .vidio-style2 .button-hover i {color:' . esc_html( $single_related_icon_hover ) . '!important}';
		echo '.single-video-wrap.blog-single .vidio-style2 .button-hover i {background:' . esc_html( $single_related_icon_bg_hover ) . '}';
		echo '.single-video-wrap.blog-single .overlay-vidio-style2 {background-color:' . esc_html( $single_related_overlay_bg_hover ) . '}';
		
		echo '.single-category-page .about-category h1 {color:' . esc_html( $category_page_title ) . '}';
		echo '.about-category p {color:' . esc_html( $category_page_desc ) . '}';
		echo '.video-wrap.ele .video-item h4 a {color:' . esc_html( $category_post_title ) . '}';
		echo '.video-wrap.ele span.vcard a {color:' . esc_html( $category_post_author ) . '}';
		echo '.views-video span {color:' . esc_html( $category_post_meta ) . '}';
		echo '.video-wrap.ele.style-1 .views-video span:first-child:after, .single-category-page .video-wrap.ele .views-video span:nth-child(1):before {background-color:' . esc_html( $category_post_meta ) . '}';
		echo '.videos-category-main .sidebar h4.title-sidebar-vid {color:' . esc_html( $category_widget_title ) . '}';
		echo '.author-page .author-profile .about-category.author h1, .author-page .author-profile .about-category.author p {color:' . esc_html( $author_text_detail ) . '}';
		echo '.already-login-page h1 {color:' . esc_html( $already_login_title ) . '}';

		echo '.profile-page .profile-account .profile-author .name-user, .profile-page .profile-account .profile-author .name-user~span {color:' . esc_html( $mytube_author_name ) . '}';
		echo '.tables-videos table.dataTable thead th, .tables-videos table.dataTable thead td, .tables-videos table.dataTable tbody th, .tables-videos table.dataTable tbody td {color:' . esc_html( $mytube_table_name ) . '}';

	echo '</style> ';

}

add_action( 'wp_head', 'gemar_customizer_header_output' );
