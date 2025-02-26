<?php

if (function_exists('siteorigin_panels_setting')) {
    
    if (!empty(siteorigin_panels_setting( 'eso_activate_acf_widgets' ))) {
        // acf
        $widgets['acf-date'] = true;
        $widgets['acf-email'] = true;
        $widgets['acf-file'] = true;
        $widgets['acf-google-map'] = true;
        $widgets['acf-image'] = true;
        $widgets['acf-image-gallery'] = true;
        $widgets['acf-number'] = true;
        $widgets['acf-repeater'] = true;
        $widgets['acf-text'] = true;
        $widgets['acf-url'] = true;
    }
    
    if (!empty(siteorigin_panels_setting( 'eso_activate_custom_widgets' ))) {
        // eso
        $widgets['eso-count-query-result'] = true;
        $widgets['eso-found-posts'] = true;
        $widgets['eso-js-css'] = true;
        $widgets['eso-loop-layout'] = true;
        $widgets['eso-placeholder-com'] = true;
        $widgets['eso-plain-text'] = true;
        $widgets['eso-post-count'] = true;
        $widgets['eso-taxonomy-search'] = true;
    }
    
    if (!empty(siteorigin_panels_setting( 'eso_activate_function_widgets' ))) {
        //funcs
        $widgets['func-bloginfo'] = true;
        $widgets['func-comments_link'] = true;
        $widgets['func-comments_template'] = true;
        $widgets['func-get_avatar'] = true;
        $widgets['func-get_search_form'] = true;
        $widgets['func-get_term_by'] = true;
        $widgets['func-get_the_date'] = true;
        $widgets['func-next_post_link'] = true;
        $widgets['func-post_type_archive_title'] = true;
        $widgets['func-previous_post_link'] = true;
        $widgets['func-single_term_title'] = true;
        $widgets['func-the_archive_description'] = true;
        $widgets['func-the_archive_title'] = true;
        $widgets['func-the_author_meta'] = true;
        $widgets['func-the_category'] = true;
        $widgets['func-the_content'] = true;
        $widgets['func-the_excerpt'] = true;
        $widgets['func-the_permalink'] = true;
        $widgets['func-the_post'] = true;
        $widgets['func-the_post_thumbnail'] = true;
        $widgets['func-the_posts_pagination'] = true;
        $widgets['func-the_search_query'] = true;
        $widgets['func-the_tags'] = true;
        $widgets['func-the_terms'] = true;
        $widgets['func-the_time'] = true;
        $widgets['func-the_title'] = true;
        $widgets['func-wp_count_comments'] = true;
    }
    
}
