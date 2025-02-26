<?php


function futura_activation(){
    if( is_null(get_page_by_path('futura_search', OBJECT, 'page'))){
        $post = array(
        'post_title'    => __( 'search', 'futura' ),
        'post_name'    => 'futura_search',
        'post_status'   => 'publish',
        'post_type'   => 'page',
        'post_content' => '[futura_search_call]'
        );
        wp_insert_post( $post, $wp_error ); 
    }


    if(!get_option('futura_html_posts_wrap_bg_color')){
        update_option('futura_html_posts_wrap_bg_color', '#ffffff');        
    }

    if(!get_option('futura_html_border_color')){
        update_option('futura_html_border_color', '#d3d3d3');        
    }

    if(!get_option('futura_html_border_title_color')){
        update_option('futura_html_border_title_color', '#333');        
    }

    if(!get_option('futura_html_h3_font_size')){
        update_option('futura_html_h3_font_size', '20px');        
    }

    if(!get_option('futura_post_title_font_size')){
        update_option('futura_post_title_font_size', '14px');        
    }

    if(!get_option('futura_summary_font_size')){
        update_option('futura_summary_font_size', '12px');        
    }

    if(!get_option('futura_author_font_size')){
        update_option('futura_author_font_size', '12px');        
    }

    if(!get_option('futura_number_of_posts')){
        update_option('futura_number_of_posts', 3);        
    }

    if(!get_option('futura_content_percentage')){
        update_option('futura_content_percentage', 100);        
    }

    if(!get_option('futura_display')){
        update_option('futura_display', 'footer_fixed');        
    }

    if(!get_option('futura_items_display')){
        update_option('futura_items_display', 'thumbnail_pc,content_pc,title_pc,author_pc,thumbnail_sp,content_sp,title_sp,author_sp');        
    }

}


