<?php
// Template for duplicated posts
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$post_title = get_the_title();
$post_content = get_the_content();
$post_author = get_the_author();
$post_date = get_the_date();

?>

<div class="duplicated-post">
    <h1><?php echo esc_html($post_title); ?> (Duplicate)</h1>
    <div class="post-meta">
        <span class="author"><?php echo esc_html($post_author); ?></span>
        <span class="date"><?php echo esc_html($post_date); ?></span>
    </div>
    <div class="post-content">
        <?php echo wp_kses_post($post_content); ?>
    </div>
</div>
