<?php 
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$article_id   = get_post_meta($id, 'article_id', true);
?>
<div class="blog-writer-content-block">
    <?php
    set_query_var('id', $id);
    set_query_var('active_tab', $active_tab);
    addlly_get_template_part('one-click-blog-writer/edit/top-navbar');
    addlly_get_template_part('one-click-blog-writer/edit/metadata');
    ?>
    <div class="content-area-block d-flex faqSchema">
        <div class="content-area position-relative">
            <?php
            set_query_var('article_id', $article_id);
            addlly_get_template_part('one-click-blog-writer/edit/refund-requests-list');
            ?>
        </div>
    </div>
</div>