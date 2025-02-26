<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$query_args = array(
    'post_type' => 'post',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'meta_query' => array(
        'relation' => 'AND',
        array(
            'key'     => 'article_id',
            'value'   => 0,
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
            'key'     => 'istrainArticle',
            'value'   => 1,
            'compare' => '='
        ),
        array(
            'key' => 'user_id',
            'value' => get_current_user_id(),
            'compare' => '='
        )
    )
);
$the_query = new WP_Query($query_args);
if( $the_query->have_posts()){ ?>
    <div class="trainArticles">
        <div class=" d-flex justify-content-between mb-4 mt-2 tableHeading">
            <span>
                <?php 
                // translators: %s is the name of the location
                printf( esc_html__("Trained Article History ( %s / 4 Articles used for training )", 'addlly'), absint($the_query->found_posts));
                ?>
            </span>
        </div>
        <div class="profile-page w-100 articles-list">
            <div class="accountCardContainer">
                <div class="accountCard padding-0 border-0">
                    <div class="cardBody">
                        <div class="historyTableBlock mt-2">
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
                                                <p class="px-3"><?php esc_html_e('Trained Status', 'addlly'); ?></p>
                                            </div>
                                            <div class="tableColumn">
                                                <p class="px-3"><?php esc_html_e('Action', 'addlly'); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tableBody articles-body">
                                        <?php
                                        if ($the_query->have_posts()) {
                                            while ($the_query->have_posts()): $the_query->the_post();
                                                set_query_var('articles_type', 'train');
                                                addlly_get_template_part('one-click-blog-writer/list/article-content');
                                            endwhile; 
                                        } 
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>