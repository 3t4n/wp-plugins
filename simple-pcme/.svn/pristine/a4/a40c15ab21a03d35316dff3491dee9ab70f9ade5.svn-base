<?php
function pcme_add_meta_tags() {
    if (is_product_category()) {
        $t_id = get_queried_object()->term_id;
        $meta_title = get_term_meta($t_id, 'pcme_product_category_meta_title', true);
        if ($meta_title) {
            echo '<meta name="title" content="' . $meta_title . '" />'.PHP_EOL;
        }
        $meta_desc = get_term_meta($t_id, 'pcme_product_category_meta_description', true);
        if ($meta_desc) {
            echo '<meta name="description" content="' . $meta_desc . '" />'.PHP_EOL;
        }
    }
}
