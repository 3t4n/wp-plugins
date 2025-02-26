<?php


// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;


// Archive Slug
$asp_archive_slug = get_option( 'asp_general_archive_slug' );
if ( !empty( $asp_archive_slug ) ) {
		$asp_archive_slug = $asp_archive_slug;
		$asp_archive_slug = strtolower("$asp_archive_slug");
} else {
		$asp_archive_slug = 'sermons';
}

// Speaker Label
$asp_speaker_label = get_option( 'asp_general_speaker_label' );
if ( !empty( $asp_speaker_label ) ) {
		$asp_speaker_label = $asp_speaker_label;
		$asp_speaker_label_slug = strtolower($asp_speaker_label);
} else {
		$asp_speaker_label = 'Speaker';
		$asp_speaker_label_slug = strtolower("Speaker");
}

// Topic Label
$asp_topic_label = get_option( 'asp_general_topic_label' );
if ( !empty( $asp_topic_label ) ) {
		$asp_topic_label = $asp_topic_label;
		$asp_topic_label_slug = strtolower("$asp_topic_label");
} else {
		$asp_topic_label = 'Topic';
		$asp_topic_label_slug = strtolower("Topic");
}

// Book Label
$asp_book_label = get_option( 'asp_general_book_label' );
if ( !empty( $asp_book_label ) ) {
		$asp_book_label = $asp_book_label;
		$asp_book_label_slug = strtolower("$asp_book_label");
} else {
		$asp_book_label = 'Book';
		$asp_book_label_slug = strtolower("Book");
}

// Sermon Label
$asp_sermon_label = get_option( 'asp_general_sermon_label' );
if ( !empty( $asp_sermon_label ) ) {
		$asp_sermon_label = $asp_sermon_label;
		$asp_sermon_label_slug = strtolower("$asp_sermon_label");
} else {
		$asp_sermon_label = 'Sermon';
		$asp_sermon_label_slug = strtolower("Sermon");
}

// Sermon Date Format
$asp_date_format = get_option( 'asp_general_date_format' );

// Link Target Control
$asp_target_control = get_option( 'asp_archive_target_control' );
if ( empty( $asp_sermon_label ) ) {
		$asp_target_control = '_self';
} else {
		$asp_target_control = $asp_target_control;
}

global $asp_archive_slug, $asp_speaker_label, $asp_speaker_label_slug, $asp_topic_label, $asp_topic_label_slug, $asp_book_label, $asp_book_label_slug, $asp_sermon_label, $asp_sermon_label_slug, $asp_date_format, $asp_target_control;
