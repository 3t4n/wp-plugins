<?php
defined('ABSPATH') or die('No script kiddies please!!');
$artl_settings = get_option('artl_settings');
/**
 * Filters settings before rendering Article Read Time Block
 * 
 * @param array $artl_settings
 * @since 1.0.0
 */
$artl_settings = apply_filters('artl_frontend_settings', $artl_settings);


$word_per_minute = $artl_settings['basic']['word_per_minute'];
$image_per_minute = $artl_settings['basic']['image_per_minute'];
$image_include = $artl_settings['basic']['image_include'];

$comment_include = $artl_settings['basic']['comment_include'];
if($comment_include == 1) {
// Fetch approved comments for the current post
$comments = get_comments(array(
    'post_id' => get_the_ID(),
    'status'  => 'approve',
));

// Initialize the total word count for comments
$comment_word_count = 0;

// Calculate the word count for each comment
foreach ($comments as $comment) {
    $comment_word_count += str_word_count(strip_tags($comment->comment_content));
}

// Calculate reading time for comments
$reading_time_comments = ceil($comment_word_count / $word_per_minute);
}
else{
    $reading_time_comments = 0;
}


if ($artl_settings['layout']['display_type'] == 'paragraph') {
    include(ARTL_PATH . '/includes/cores/artl-paragraph.php');
} else {
    include(ARTL_PATH . '/includes/cores/artl-block.php');
}
