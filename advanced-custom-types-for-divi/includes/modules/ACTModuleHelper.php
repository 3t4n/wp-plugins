<?php


abstract class ACTModuleHelper {

    static function get_props(){

    }

    static function get_wp_query_args($args){
        $tax_query = false;
        if (isset($args['has_tax_query']) && $args['has_tax_query']){
            if (strpos($args['tax_query'],'__')){
                $tax_explode = explode('__', $args['tax_query']);
                $tax_query = array(
                    array(
                        'taxonomy' => $tax_explode[0],
                        'field'    => 'slug',
                        'terms'    => $tax_explode[1],
                    ),
                );
            }
        }

        $meta_query = false;
        if (isset($args['has_meta_query']) && $args['has_meta_query'] && $args['meta_query_key'] && $args['meta_query_value']){
            $meta_query = array(
                array(
                    'key'     => $args['meta_query_key'],
                    'value'   => $args['meta_query_value'],
                    'compare' => '=',
                ),
            );
        }

        $post_type = ($args['post_type']) ? $args['post_type'] : 'post';
        $posts_limit = ($args['posts_limit']) ? $args['posts_limit'] : -1;
        $posts_offset = ($args['posts_offset']) ? $args['posts_offset'] : false;
        $order_by = ($args['order_by']) ? $args['order_by'] : 'date';
        $order = ($args['order']) ? $args['order'] : 'DESC';
        $query_args = array(
            'post_type' => $post_type,
            'posts_per_page' => $posts_limit,
            'offset' => $posts_offset,
            'orderby' => $order_by,
            'order' => $order,
            'tax_query' => $tax_query,
            'meta_query' => $meta_query,
        );
        return $query_args;
    }


    static function if_show_prop($prop){
        if (isset($prop) && !empty($prop)){
            return ($prop == 'on') ? true : false;
        }else{
            return true;
        }
    }

    static function get_columns_class($props){

        //Set columns
        $columns_device = array('columns','columns_tablet','columns_phone');
        $columns_desktop = 'col-lg-4';
        $columns_tablet = 'col-md-12';
        $columns_phone = 'col-sm-12';
        foreach ($columns_device as $device){
            $columns_class = false;
            if (strpos($device, '_phone')){
                $breakpoint = 'sm';
            }else if (strpos($device, '_table')){
                $breakpoint = 'md';
            }else{
                $breakpoint = 'lg';
            }
            if ($props[$device]){
                switch ($props[$device]){
                    case 1:
                        $columns_class = "col-{$breakpoint}-12";
                        break;
                    case 2:
                        $columns_class = "col-{$breakpoint}-6";
                        break;
                    case 3:
                        $columns_class = "col-{$breakpoint}-4";
                        break;
                    case 4:
                        $columns_class = "col-{$breakpoint}-3";
                        break;
                    case 5:
                        $columns_class = "col-{$breakpoint}-2";
                        break;
                    case 6:
                        $columns_class = "col-{$breakpoint}-2";
                        break;
                }
                if (strpos($device, '_phone')){
                    $columns_phone = $columns_class;
                }else if (strpos($device, '_table')){
                    $columns_tablet = $columns_class;
                }else{
                    $columns_desktop = $columns_class;
                }
            }
        }
        return $columns_classes = [
            'phone' => $columns_phone,
            'tablet' => $columns_tablet,
            'desktop' => $columns_desktop,
        ];
    }

    static function get_image_position_class($prop){
        $default = 'order-0';
        if (isset($prop) && !empty($prop)){
            return ($prop == 'right') ? 'order-2' : $default;
        }else{
            return $default;
        }
    }

    static function get_post_classes($prop){
        $module_classes = "act-post mb-4";
        $post_classes = $module_classes . " layout-". strtolower('ACTPostCard');
        if (isset($prop) && is_string($prop)){
            $post_classes = $module_classes . " layout-".strtolower($prop);
        }
        return $post_classes;
    }

    static function get_thumbnail_size($prop){
        $default = 'et-pb-post-main-image';
        return (isset($prop) && !empty($prop)) ? $prop : $default;

    }



    static function get_post_types() {
        $post_types = get_post_types();
        $exceptions = array('attachment', 'revision', 'nav_menu_item', 'custom_css', 'customize_changeset', 'et_pb_layout', 'wp_block', 'oembed_cache', 'user_request');
        return array_diff($post_types, $exceptions);
    }

    static function get_taxonomies() {
        $taxs = [null => 'Select tax'];
        $taxonomies = get_taxonomies(false, 'objects');
        foreach ( $taxonomies as $taxonomy ) {
            $taxs[$taxonomy->name] = $taxonomy->labels->name;
        }
        return $taxs;
    }

    static function get_terms($args = array()) {
        $ts = [null => 'Select term'];
        $taxonomies = self::get_taxonomies();
        foreach ( $taxonomies as $tax_slug => $tax_name ) {
            if ($tax_slug){
                $terms = get_terms( array(
                    'taxonomy' => $tax_slug,
                ));
                if ($terms){
                    $ts['tax-'.$tax_slug] = '---- '.$tax_name.' ----';
                    foreach ( $terms as $term ) {
                        $ts[$tax_slug.'__'.$term->slug] = $term->name;
                    }
                }
            }
        }
        return $ts;
    }

    static function get_acf_metas() {
        $posts = [null => 'Select meta'];
        $acf_metas = get_posts(['post_type' => 'acf-field']);
        foreach ( $acf_metas as $meta ) {
            $posts[$meta->post_excerpt] = $meta->post_title;
        }
        return $posts;
    }


}