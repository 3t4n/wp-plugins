<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$article_id = get_post_meta($id, 'article_id', true);
$comments = addlly_get_review_article_comments($article_id, 'all', 'Short Article', '1-Click Blog');
?>
<div class="toggle-sidebar">
    <div class="sidebar-comment-header">
        <h3 class="text-start"><?php esc_html_e('Comments', 'addlly'); ?></h3>
        <div class="comment-header-btn">
            <button class="btn active" type="button" data-type="all" data-id="<?php echo absint($id); ?>" data-article_id="<?php echo absint($article_id); ?>"><?php esc_html_e('All', 'addlly'); ?></button>
            <button class="btn" type="button" data-type="resolved" data-id="<?php echo absint($id); ?>" data-article_id="<?php echo absint($article_id); ?>"><?php esc_html_e('Resolved', 'addlly'); ?></button>
            <button class="btn" type="button" data-type="deleted" data-id="<?php echo absint($id); ?>" data-article_id="<?php echo absint($article_id); ?>"><?php esc_html_e('Deleted', 'addlly'); ?></button>
        </div>
    </div>
    <div class="sidebar-comment-wrapper">
        <div class="sidebar-comments-list">
            <?php
            if (isset($comments['data']) && !empty($comments['data'])) {
                foreach ($comments['data'] as $comment) {
                    set_query_var('id', $id);
                    set_query_var('comment', $comment);
                    addlly_get_template_part('one-click-blog-writer/edit/comments-list');
                }
            } else {
                echo '<p class="comment-list d-flex align-items-center justify-content-center">';
                    esc_html_e('Comment history is not available yet', 'addlly');
                echo '</p>';
            }
            ?>
        </div>
        <div class="comment-modal">
            
        </div>
    </div>

</div>