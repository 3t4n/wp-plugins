<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
if (!function_exists('addlly_convertGoogleADStringToArray')) {
    function addlly_convertGoogleADStringToArray($string) {
        $lines = explode("\n", $string);
        $array = [];
        foreach ($lines as $line) {
            $line = trim($line);
            if (!empty($line)) {
                list($key, $value) = explode(": ", $line, 2);
                if (str_contains($key, 'Headline')) {
                    $array['Headlines'][] = $value;
                }else if (str_contains($key, 'Description')) {
                    $array['Descriptions'][] = $value;
                }else{
                    $array[$key] = $value;
                }
            }
        }
        return $array;
    }
}

if (!function_exists('addlly_get_domain_from_url')) {
    function addlly_get_domain_from_url($url = '' ){
        $pieces = wp_parse_url($url);
        $domain = isset($pieces['host']) ? $pieces['host'] : $pieces['path'];
        if (preg_match('/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i', $domain, $regs)) {
          return $regs['domain'];
        }
        return false;
    }
}

if (!function_exists('addlly_get_current_page')) {
    function addlly_get_current_page(){
        $current_url     = isset($_SERVER['REQUEST_URI']) ? sanitize_text_field(wp_unslash($_SERVER['REQUEST_URI'])) : '';
        $parsed_url      = wp_parse_url($current_url);
        if (isset($parsed_url['query'])) {
            parse_str($parsed_url['query'], $params);
            return isset($params['page']) ? $params['page'] : '';
        }
    }
}

if (!function_exists('addlly_get_query_arg')) {
    function addlly_get_query_arg( $key = ''){
        $current_url     = isset($_SERVER['REQUEST_URI']) ? sanitize_text_field(wp_unslash($_SERVER['REQUEST_URI'])) : '';
        $parsed_url      = wp_parse_url($current_url);
        if (isset($parsed_url['query'])) {
            parse_str($parsed_url['query'], $params);
            return isset($params[$key]) ? $params[$key] : '';
        }
    }
}

if (!function_exists('addlly_generateRandomString')) {
    function addlly_generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[wp_rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}

if (!function_exists('addlly_countHeadings_from_string')) {
    function addlly_countHeadings_from_string($html) {
        $headingCount = [
            'h1' => 0,
            'h2' => 0,
            'h3' => 0,
            'h4' => 0,
            'h5' => 0,
            'h6' => 0
        ];

        foreach ($headingCount as $tag => &$count) {
            preg_match_all("/<{$tag}.*?>.*?<\/{$tag}>/s", $html, $matches);
            $count = count($matches[0]);
        }
        return $headingCount;
    }
}

if (!function_exists('addlly_countWords_from_string')) {
    function addlly_countWords_from_string($html) {
        // Remove HTML tags
        $textOnly = wp_strip_all_tags($html);
        // Count words
        return str_word_count($textOnly);
    }
}

if (!function_exists('addlly_getFirstH1Value_from_string')) {
    function addlly_getFirstH1Value_from_string($htmlString) {
        // Use a regular expression to match the first <h1> tag and its content
        if (preg_match('/<h1>(.*?)<\/h1>/', $htmlString, $matches)) {
            // $matches[1] contains the content of the first <h1> tag
            return $matches[1];
        }
        return null;
    }
}

if (!function_exists('addlly_get_inner_content_from_html_string')) {
    function addlly_get_inner_content_from_html_string( $htmlString = '' ) {
        preg_match('/<body[^>]*>(.*?)<\/body>/s', $htmlString, $matches);
        return isset($matches[1]) ? $matches[1] : '';
    }
}

if (!function_exists('addlly_get_template_part')) {
    function addlly_get_template_part($slug, $name = null) {
        $template = '';

        // Check if a template exists in the theme first
        if ($name) {
            $template = locate_template(array("{$slug}-{$name}.php", "{$slug}.php"));
        } else {
            $template = locate_template("{$slug}.php");
        }

        if (!$template) {
            if ($name && file_exists(ADDLLY_PATH . "templates/{$slug}-{$name}.php")) {
                $template = ADDLLY_PATH . "templates/{$slug}-{$name}.php";
            } elseif (file_exists(ADDLLY_PATH . "templates/{$slug}.php")) {
                $template = ADDLLY_PATH . "templates/{$slug}.php";
            }
        }

        if ($template) {
            load_template($template, false);
        }
    }
}

if (!function_exists('addlly_decodeJsonInArray')) {
    function addlly_decodeJsonInArray($array = array()) {
        foreach ($array as $key => $value) {
            if (is_string($value) && addlly_isValidJson($value)) {
                $array->$key = json_decode($value, true);
            }else{
                $array->$key = $value;
            }
        }
        return $array;
    }
}

if (!function_exists('addlly_isValidJson')) {
    function addlly_isValidJson($string) {
        json_decode($string);
        if (json_last_error() === JSON_ERROR_NONE) {
            return true;
        }else{
            return false;
        }
    }
}

if (!function_exists('addlly_cleanContent')) {
    function addlly_cleanContent( $content = '' ){
        return $content;
    }
}

if (!function_exists('addlly_user_id')) {
    function addlly_user_id() {
        if(is_user_logged_in()){
            $current_user_id = get_current_user_id();
            $addlly_user_id  = get_user_meta($current_user_id, 'addlly_user_id', true);
            return isset($addlly_user_id) && $addlly_user_id > 0 ? $addlly_user_id : 0;
        }
    }
}

if (!function_exists('addlly_user_web_link')) {
    function addlly_user_web_link() {
        if(is_user_logged_in()){
            $current_user_id = get_current_user_id();
            $addlly_user_web_link  = get_user_meta($current_user_id, 'addlly_user_web_link', true);
            return isset($addlly_user_web_link) ? $addlly_user_web_link : '';
        }
    }
}

if (!function_exists('addlly_user_full_name')) {
    function addlly_user_full_name() {
        if(is_user_logged_in()){
            $current_user_id = get_current_user_id();
            $addlly_first_name  = get_user_meta($current_user_id, 'addlly_first_name', true);
            $addlly_last_name  = get_user_meta($current_user_id, 'addlly_last_name', true);
            $full_name = $addlly_first_name;
            if( $addlly_last_name != '' ){
                $full_name = $addlly_first_name.' '.$addlly_last_name;
            }
            return $full_name;
        }
    }
}

if (!function_exists('addlly_user_name')) {
    function addlly_user_name() {
        if(is_user_logged_in()){
            $current_user_id = get_current_user_id();
            return get_user_meta($current_user_id, 'addlly_username', true);
        }
    }
}

if (!function_exists('addlly_post_title_filter')) {
    function addlly_post_title_filter( $where = '', $wp_query ){
        global $wpdb;
        if ( $search_term = $wp_query->get( 'search_post_title' ) ) {
            $where .= ' AND ' . $wpdb->posts . '.post_title LIKE \'%' . esc_sql( $wpdb->esc_like( $search_term ) ) . '%\'';
        }
        return $where;
    }
}

if (!function_exists('addlly_pagination')) {
    function addlly_pagination( $args = array() ) {

        $total_posts     = '';
        $posts_per_page  = '1';
        $page_num        = 1;
        $action          = 'article_list';
        extract($args);

        if ( $total_posts <= $posts_per_page ) {
            return;
        } else {
            $output      = '';
            $dot_pre     = '';
            $dot_more    = '';
            $total_page  = 0;
            if ( $total_posts != 0 ){
                $total_page = ceil($total_posts / $posts_per_page);
            }

            $loop_start = $page_num - 2;
            $loop_end   = $page_num + 2;

            if( $page_num < 3 ){
                $loop_start = 1;
                if ( $total_page < 5 ){
                    $loop_end = $total_page;
                }else{
                    $loop_end = 5;
                }
            } else if( $page_num >= $total_page - 1 ){
                if ( $total_page < 5 ){
                    $loop_start = 1;
                }else{
                    $loop_start = $total_page - 4;
                }
                $loop_end = $total_page;
            }

            $output .= '<div class="pagenationBlock bg-white d-flex justify-content-between align-items-center">';
                $output .= '<div class="tableValuesNo">Drafts ' . $page_num . ' to '. $total_page .' of '. $total_page .'</div>';
                    $output .= '<div class="pagenationCount">';
                        $output .= '<ul class="historyPaginate">';
                            if ( $page_num > 1 ) {
                                $output .= '<li class="previous"><a href="javascript:void(0);" onclick="addlly_pagination_ajax(\'' . ($page_num - 1) . '\', \'' . $action . '\');">';
                                $output .= '<span>'. esc_html__("Prev", "addlly") .'</span></a></li>';
                            }else{
                                $output .= '<li class="previous disabled"><a href="javascript:void(0);">';
                                $output .= '<span>'. esc_html__("Prev", "addlly") .'</span></a></li>';
                            }
                            if( $page_num > 3 && $total_page > 5 ){
                                $output .= '<li><a href="javascript:void(0);" onclick="addlly_pagination_ajax(\'' . (1) . '\', \'' . $action . '\');">';
                                $output .= '1</a></li>';
                            }
                            if ( $page_num > 4 && $total_page > 6 ) {
                                $output .= '<li class="disabled"><span class="dots">. . .</span><li>';
                            }
                            if( $total_page > 1 ){
                                for( $i = $loop_start; $i <= $loop_end; $i ++ ){
                                    if( $i != $page_num ){
                                        $output .= '<li><a href="javascript:void(0);" onclick="addlly_pagination_ajax(\'' . ($i) . '\', \'' . $action . '\');">';
                                        $output .= $i . '</a></li>';
                                    }else{
                                        $output .= '<li class="selected"><span><a class="page-number">' . $i . '</a></span></li>';
                                    }
                                }
                            }
                            if( $loop_end != $total_page && $loop_end != $total_page - 1 ){
                                $output .= '<li><span class="dots">. . .</span></li>';
                            }
                            if( $loop_end != $total_page ) {
                                $output .= '<li><a href="javascript:void(0);" onclick="addlly_pagination_ajax(\'' . ($total_page) . '\', \'' . $action . '\');">';
                                $output .= $total_page . '</a></li>';
                            }
                            if( $total_posts > 0 && $page_num < ($total_posts / $posts_per_page) ){
                                $output .= '<li class="next"><a href="javascript:void(0);" onclick="addlly_pagination_ajax(\'' . ($page_num + 1) . '\', \'' . $action . '\');">';
                                $output .= '<span>'. esc_html__("Next", "addlly") .'</span></a></li>';
                            }else{
                                $output .= '<li class="next disabled"><a href="javascript:void(0);">';
                                $output .= '<span>'. esc_html__("Next", "addlly") .'</span></a></li>';
                            }
                    $output .= "</ul>";
                $output .= "</div>";
            $output .= "</div>";

            return $output;
        }
    }
}

if (!function_exists('addlly_allow_svg_in_wp_kses_post')) {
    function addlly_allow_svg_in_wp_kses_post($allowed_tags) {
        // Define the SVG tags and attributes you want to allow

        $svg_tags = [
            'svg' => [
                'xmlns'          => true,
                'xmlns:xlink'    => true,
                'viewbox'        => true,
                'width'          => true,
                'height'         => true,
                'fill'           => true,
                'stroke'         => true,
                'stroke-width'   => true,
                'class'          => true,
            ],
            'path' => [
                'd'             => true,
                'fill'          => true,
            ],
            'circle' => [
                'cx'            => true,
                'cy'            => true,
                'r'             => true,
                'fill'          => true,
            ],
            'html' => [],
            'head' => [],
            'title' => [],
            'meta' => [
                'charset' => true,
                'name' => true,
                'content' => true,
            ],
            'body' => [
                'class' => true
            ],
            // Add more SVG elements and attributes as needed
        ];

        return array_merge($allowed_tags, $svg_tags);
    }
    add_filter('wp_kses_allowed_html', 'addlly_allow_svg_in_wp_kses_post', 99, 1);
}

if (!function_exists('addlly_sanitize_files_array')) {
    function addlly_sanitize_files_array( $args = array() ) {
            $defaults = array(
                    'name'     => '',
                    'tmp_name' => '',
                    'type'     => '',
                    'size'     => 0,
                    'error'    => '',
            );

            $args = wp_parse_args( $args, $defaults );

            if ( empty( $args['name'] ) ) {
                    return $defaults;
            }

            if ( is_array( $args['name'] ) ) {
                    $files             = array();
                    $files['name']     = addlly_sanitize_files_value_array( $args['name'], 'sanitize_file_name' );
                    $files['tmp_name'] = addlly_sanitize_files_value_array( $args['tmp_name'], 'sanitize_text_field' );
                    $files['type']     = addlly_sanitize_files_value_array( $args['type'], 'sanitize_text_field' );
                    $files['size']     = addlly_sanitize_files_value_array( $args['size'], 'absint' );
                    $files['error']    = addlly_sanitize_files_value_array( $args['error'], 'absint' );
                    return $files;
            }

            $file             = array();
            $file['name']     = sanitize_file_name( $args['name'] );
            $file['tmp_name'] = sanitize_text_field( $args['tmp_name'] );
            $file['type']     = sanitize_text_field( $args['type'] );
            $file['size']     = absint( $args['size'] );
            $file['error']    = absint( $args['error'] );

            return $file;
    }
}

if (!function_exists('addlly_sanitize_files_value_array')) {
    function addlly_sanitize_files_value_array( $array, $sanitize_function ) {
            if ( ! function_exists( $sanitize_function ) ) {
                    return $array;
            }

            if ( ! is_array( $array ) ) {
                    return $sanitize_function( $array );
            }

            foreach ( $array as $key => $value ) {
                    if ( is_array( $value ) ) {
                            $array[ $key ] = addlly_sanitize_files_value_array( $value, $sanitize_function );
                    } else {
                            $array[ $key ] = $sanitize_function( $value );
                    }
            }

            return $array;
    }
}