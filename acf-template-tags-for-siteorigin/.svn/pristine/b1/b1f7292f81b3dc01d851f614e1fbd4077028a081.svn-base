<?php

if ( !function_exists('get_field_object') || !function_exists('get_field') ) {
    return;
}

if (!is_admin() && $query->is_main_query()) {
    
    // author archive
    
    if ( is_author() )  {
        
        $posts = get_posts(array(
            'numberposts'	=> -1,
            'post_type'		=> 'echelonso_layout',
            'meta_key'		=> 'acftt_layout_type',
            'meta_value'	=> 'author_archive'
        ));
        
        if ( !empty($posts) ) {
            $grid = $posts[0]->ID;
            $panels_data = get_post_meta( $grid, 'panels_data', true );
            $i = 0;
            
            if (is_array($panels_data['widgets'])) {
                foreach ($panels_data['widgets'] as $k => $v) {
                    if ($v['option_name'] == 'widget_echelonso-func-the_post') {
                        $i++;
                    }
                }
            }
            
            if ($i == 0) {
                $i++;
            }
            
            $query->set( 'posts_per_page', $i );
            return;
        }
    }
    
    // custom taxonomies
    
    if ( is_tax() ) {
        
        foreach ($query->query as $k => $v) {
            $tax = $k;
        }
        
        if ( !empty(siteorigin_panels_setting( 'echelonso_ppp_binding_' . $tax )) ) {
            
            $post_type = siteorigin_panels_setting( 'echelonso_ppp_binding_' . $tax );
            
            $posts = get_posts(array(
                'numberposts'	=> -1,
                'post_type'		=> 'echelonso_layout',
                'meta_query' => array(
                    array(
                        'key'     => 'acftt_post_type',
                        'value'   => $post_type,
                    ),
                    array(
                        'key'     => 'acftt_layout_type',
                        'value'   => 'archive',
                    ),
                ),
                
            ));
            
            if ( !empty($posts) ) {
                $grid = $posts[0]->ID;
                $panels_data = get_post_meta( $grid, 'panels_data', true );
                $i = 0;
                
                if (is_array($panels_data['widgets'])) {
                    foreach ($panels_data['widgets'] as $k => $v) {
                        if ($v['option_name'] == 'widget_echelonso-func-the_post') {
                            $i++;
                        }
                    }
                }
                
                if ($i == 0) {
                    $i++;
                }
                
                $query->set( 'posts_per_page', $i );
                return;
            }
        }
        
    }
    
    // blog
    
    if ( is_home() || is_tag() || is_category() ) {
        
        $post_type = 'post';
        
        $posts = get_posts(array(
            'numberposts'	=> -1,
            'post_type'		=> 'echelonso_layout',
            'meta_query' => array(
                array(
                    'key'     => 'acftt_post_type',
                    'value'   => $post_type,
                ),
                array(
                    'key'     => 'acftt_layout_type',
                    'value'   => 'archive',
                ),
            ),
            
        ));
        
        if ( !empty($posts) ) {
            $grid = $posts[0]->ID;
            $panels_data = get_post_meta( $grid, 'panels_data', true );
            $i = 0;
            
            if (is_array($panels_data['widgets'])) {
                foreach ($panels_data['widgets'] as $k => $v) {
                    if ($v['option_name'] == 'widget_echelonso-func-the_post') {
                        $i++;
                    }
                }
            }
            
            if ($i == 0) {
                $i++;
            }
            
            $query->set( 'posts_per_page', $i );
            return;
        }
        
    }
    
    // post type archive
    
    if ( is_post_type_archive() ) {
        
        $post_type = $query->query['post_type'];
        
        $posts = get_posts(array(
            'numberposts'	=> -1,
            'post_type'		=> 'echelonso_layout',
            'meta_query' => array(
                array(
                    'key'     => 'acftt_post_type',
                    'value'   => $post_type,
                ),
                array(
                    'key'     => 'acftt_layout_type',
                    'value'   => 'archive',
                ),
            ),
            
        ));
        
        if ( !empty($posts) ) {
            
            $grid = $posts[0]->ID;
            $panels_data = get_post_meta( $grid, 'panels_data', true );
            $i = 0;
            
            if (is_array($panels_data['widgets'])) {
                foreach ($panels_data['widgets'] as $k => $v) {
                    if ($v['option_name'] == 'widget_echelonso-func-the_post') {
                        $i++;
                    }
                }
            }
            
            if ($i == 0) {
                $i++;
            }
            
            $query->set( 'posts_per_page', $i );
            return;
        }
        
    }
    
    // search
    
    if (is_search() ) {
        
        $posts = get_posts(array(
            'numberposts'	=> -1,
            'post_type'		=> 'echelonso_layout',
            'meta_key'		=> 'acftt_layout_type',
            'meta_value'	=> 'search'
        ));
        
        if ( !empty($posts) ) {
            
            $grid = $posts[0]->ID;
            $panels_data = get_post_meta( $grid, 'panels_data', true );
            $i = 0;
            
            if (is_array($panels_data['widgets'])) {
                foreach ($panels_data['widgets'] as $k => $v) {
                    if ($v['option_name'] == 'widget_echelonso-func-the_post') {
                        $i++;
                    }
                }
            }
            
            if ($i == 0) {
                $i++;
            }
            
            $query->set( 'posts_per_page', $i );
            return;
        }
    }
    
}
