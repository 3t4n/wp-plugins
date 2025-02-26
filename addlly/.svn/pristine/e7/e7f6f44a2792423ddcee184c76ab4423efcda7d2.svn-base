<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$query_args = array(
    'post_type' => 'post',
    'posts_per_page' => 10,
    'paged' => 1,
    'post_status' => 'publish',
    'meta_query' => array(
        array(
            'key' => 'article_id',
            'value' => 0,
            'compare' => '>'
        ),
        array(
            'relation'   => 'OR',
            array(
                'key' => 'isDeletedArticle',
                'value' => 1,
                'compare' => '!='
            ),
            array(
                'key' => 'isDeletedArticle',
                'compare' => 'NOT EXISTS'
            )
        ),
        array(
            'key' => 'user_id',
            'value' => get_current_user_id(),
            'compare' => '='
        )
    )
);
$the_query = new WP_Query($query_args);
?>
<div class=" d-flex justify-content-between tableHeading">
    <span><?php esc_html_e('Recent History', 'addlly'); ?></span>
</div>
<div class="profile-page w-100 articles-list mb-4">
    <div class="accountCardContainer">
        <div class="accountCard padding-0 border-0">
            <div class="cardBody">
                <?php addlly_get_template_part('one-click-blog-writer/list/articles-filters'); ?>
                <div class="historyTableBlock mt-2 articles-list">
                    <div class="custom-data-table">
                        <div class="tableBlock no-checkbox">
                            <div class="tableHead">
                                <div class="tableRow">
                                    <div class="tableColumn">
                                        <div class="px-3 title"><?php esc_html_e('Title', 'addlly'); ?></div>
                                    </div>
                                    <div class="tableColumn">
                                        <p class="px-3"><?php esc_html_e('Created On', 'addlly'); ?></p>
                                    </div>
                                    <div class="tableColumn">
                                        <p class="px-3"><?php esc_html_e('AI Type', 'addlly'); ?></p>
                                    </div>
                                    <div class="tableColumn">
                                        <p class="px-3"><?php esc_html_e('Status', 'addlly'); ?></p>
                                    </div>
                                    <div class="tableColumn">
                                        <p class="px-3"><?php esc_html_e('Refund Request', 'addlly'); ?></p>
                                    </div>
                                    <div class="tableColumn">
                                        <p><?php esc_html_e('Action', 'addlly'); ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="tableBody articles-body">
                                <?php
                                if ($the_query->have_posts()) {
                                    while ($the_query->have_posts()): $the_query->the_post();
                                        set_query_var('articles_type', 'all');
                                        addlly_get_template_part('one-click-blog-writer/list/article-content');
                                    endwhile;
                                } 
                                ?>
                            </div>
                        </div>
                        <div class="pagenation listing-pagination">
                            <?php echo wp_kses_post(addlly_pagination( array( 'total_posts' => $the_query->found_posts, 'posts_per_page' => 10 ) )); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>