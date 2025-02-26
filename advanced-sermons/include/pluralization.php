<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Disable auto pluralization for sermons, topics, speakers, and books labels. Added version 2.6.
function asp_sermon_plural($singular = "", $plural = "s") {
    $asp_general_disable_plural = get_option('asp_general_disable_plural');
    global $asp_sermon_label;
    if (!empty($asp_general_disable_plural)) {
        return $singular;
    }
    return "$asp_sermon_label" . "$plural";
}

function asp_topic_plural($singular = "", $plural = "s") {
    $asp_general_disable_plural = get_option('asp_general_disable_plural');
    global $asp_topic_label;
    if (!empty($asp_general_disable_plural)) {
        return $singular;
    }
    return "$asp_topic_label" . "$plural";
}

function asp_speaker_plural($singular = "", $plural = "s") {
    $asp_general_disable_plural = get_option('asp_general_disable_plural');
    global $asp_speaker_label;
    if (!empty($asp_general_disable_plural)) {
        return $singular;
    }
    return "$asp_speaker_label" . "$plural";
}

function asp_book_plural($singular = "", $plural = "s") {
    $asp_general_disable_plural = get_option('asp_general_disable_plural');
    global $asp_book_label;
    if (!empty($asp_general_disable_plural)) {
        return $singular;
    }
    return "$asp_book_label" . "$plural";
}