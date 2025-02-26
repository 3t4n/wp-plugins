<?php
// WP Smart TV - by Rovidx Media
// @v2.0

class Wp_Smart_Tv_Toolkit {
    
    public function do_excerpt($content, $limit=50, $ending=null) {
        $out = wp_strip_all_tags( wp_trim_words($content, $limit, $ending) );
        //$out = html_entity_decode($out, ENT_QUOTES | ENT_XML1, 'UTF-8');
        
        return $out;
    }
    
    public function do_clean_tags($content) {
        $out = wp_strip_all_tags($content, true);
        $out = html_entity_decode($out, ENT_QUOTES | ENT_XML1, 'UTF-8');
        return $out;
    }
    
    public function get_the_category_id($pid, $post_type) {
        $catID = get_the_terms( $pid, $post_type);

        if ($catID->errors || $catID == null) {
            return 0;
        } else {
            return $catID[0]->id;
        }
    }
    
    public function get_the_category_name($pid, $tax_type) {
        $out = array();
        $catID = get_the_terms( $pid, $tax_type);
        if ($catID == null) {
            $catID = get_the_terms( $pid, 'post_tag');
        }

        if ($catID == null) {
            $out = array('No Category');
        }

        if (isset($catID->errors)) {
            $out = $catID->errors;
        } else if(isset($catID[0]->name)){
            foreach ($catID as $cat) {
                $out[] = $cat->name;
            }
        } else if (is_array($catID)) {
            foreach ($catID as $cat) {
                $out[] = $cat;
            }
        }

        return $out;
    }
    
    public function get_the_post_type() {
        $args = array(
           'public'   => true,
           '_builtin' => false
        );

        $output = 'objects'; // 'names' or 'objects' (default: 'names')
        $operator = 'and'; // 'and' or 'or' (default: 'and')

        $post_types = get_post_types( $args, $output, $operator );
        $postTypeOut = array();
        if ( $post_types ) { // If there are any custom public post types.
            foreach ( $post_types  as $post_type ) {
                $postTypeOut[$post_type->name] = $post_type->label;
            }
        }
    
        return $postTypeOut;
    }
    
    public function get_resume_time($id) {
        $userHistoryJson =	get_user_meta(get_current_user_id(), '_iptv_user_viewer_history_json', true);
        $userHistory = json_decode($userHistoryJson, true);
        
        $isCodeFound = tv_search_for_resume_position($id, $userHistory);

        return $isCodeFound;

    }
    
    public function auth_check() {
        if (is_user_logged_in()){
            $posts_arr = array(
                'func' => 'AuthCheck',
                'result' => 'true',
                'data' => array(
                    'ErrorMessage' => 'No Errors'	
                ),
                'userid' => get_current_user_id(),
                'role'	 => tv_get_user_role(get_current_user_id()) 
            );	
        } else {
            $posts_arr = array(
                'func' => 'error',
                    'result' => 'false',
                    'data' => array(
                        'ErrorMessage' => 'Invalid Authentication.'	
                    )
            );
        }

        return $posts_arr;
    }
    
    public function get_user_role( $user = null ) {
        $user = $user ? new WP_User( $user ) : wp_get_current_user();
        return $user->roles ? $user->roles[0] : false;
    }
    
    public function check_for_rental($item) {	
        $userPurchasesJson =	get_user_meta(get_current_user_id(), '_iptv_user_purchase_history_json', true);
        $userPurchases = json_decode($userPurchasesJson, true);

        $timeCheck= tv_check_rental_time($item, $userPurchases);

        if ($timeCheck) {
            return true;
        } else {
            return false;
        }
    }
    
    public function get_meta($id, $field) {
        $out = get_post_meta($id, $field, true); 	
        if ($out <> '') {
            return $out;
        } else {
            return '';	
        }
    }

    public function search_multiarray($id, $array, $dimension=1) {
        if ($dimension == 1) {
            foreach ($array as $key => $val) {

               if ($val['vid'] === $id) {
                   return true;
               }
            }
        } else if ($dimension == 2) {
            foreach ($array as $key => $val) {
              foreach ($val as $node) { 

                  if ($val['vid'] == $id) {

                    return true;
                }
              }
            }
        } else {
            return false;
        }

       //return false;
    }

    public function get_meta_array($id, $field) {
        $out = get_post_meta($id, $field, true); 	
        if ($out <> '') {
            return $out;
        } else {
            return '{}';	
        }
    }

    public function build_genres($obj) {
            $out = '';
            foreach($obj as $genre) {
                $out .= '"' . $genre . '",';
            }
            $out = rtrim($out, ',');
            return $out;
    }

    public function remove_ssl ($url) {
        if (strpos($url, 'https://') == 0) {
            $url = 'http:/' . substr($url, 7);
        }
        return $url;
    }

    public function featured_img_url($id, $rovidx_featured_img_size) {
        $rovidx_image_id  = get_post_thumbnail_id($id);
        $rovidx_image_url = wp_get_attachment_image_src($rovidx_image_id, $rovidx_featured_img_size);
        
        if (!$rovidx_image_url) {
            return "";	
        } else {
            $rovidx_image_url = $rovidx_image_url[0];	
            return $rovidx_image_url;
        }
    }

    public function get_tax_list() {
        $args = array(
          'public'   => true,
          '_builtin' => true

        ); 
        $output = 'objects'; // or objects
        $operator = 'and'; // 'and' or 'or'
        $taxOut = array();
        $taxonomies = get_taxonomies( $args, $output, $operator ); 

        //print_r($taxonomies);

        if ( $taxonomies ) {
          foreach ( $taxonomies  as $taxonomy ) {
            $taxOut[$taxonomy->name] = $taxonomy->label;

          }
        }
        return $taxOut;
    }

    public function get_terms_array() {
        $retArr = array();
        $term = get_terms( array(
            'taxonomy' => array('post_tag'),
            'hide_empty' => false,
        ) );

        foreach ($term as $item) {
            $out = array(
                $item->name => $item->name
            );
            $retArr = array_merge($retArr, $out);
        }

        return $retArr;
    }

    public function get_enabled_post_types() {
        $tv_settings = get_option('rovidx_smart_tv_options');

        $ret = array();
        if (isset($tv_settings['rovidx_smart_tv_movie_post_type_enabled'])) {
            array_push($ret, 'movies');
        }
        if (isset($tv_settings['rovidx_smart_tv_shortform_video_post_type_enabled'])) {
            array_push($ret, 'videos');
        }
        if (isset($tv_settings['rovidx_smart_tv_series_post_type_enabled'])) {
            array_push($ret, 'episodes');
        }
        if (isset($tv_settings['rovidx_smart_tv_tvspecials_post_type_enabled'])) {
            array_push($ret, 'specials');
        }
        //array_push($ret, 'live');
        $out = apply_filters('wpstv_post_types', $ret);
        return $out;
    }

    public function get_recipe_ops() {

        $out = array(
            'AND' => 'AND',
            'OR' => 'OR',
        );

//        if (function_exists('rovidx_wpstv_roku_build_playlists')) {
//            $out['playlist'] = 'Playlist';
//        } 

        return $out;
    }

    public function get_recipe_order() {
        $out = array(
        'most_recent' => 'Most Recent',
        'chronological' => 'Chronological',
        'most_popular' => 'Most Popular',
        );

        if (function_exists('rovidx_wpstv_roku_build_playlists')) {
            $out['manual'] = 'Manual (Playlists Only!)';
        } 

        return $out;
    }

    public function alert_system($priority, $errMsg, $error) {
        $class = 'error notice notice-error';
        $message = $errMsg;
        $fullError = $error;

        printf( '<div class="%1$s"><p><strong>Error:</strong> <em>%2$s</em></p><div style="overflow: hidden"><code>%3$s</code></div></div>', esc_attr( $class ), esc_html( $message ), esc_html($error) ); 
    }

    public function wpstv_die($errorTitle, $errorMessage, $fullError=null) {
        $err = '<h1>'.$errorTitle.'</h1>
        <div style="padding-top:20px;">' . $errorMessage . '</div>
        <p><em>If you do not understand this error, please open a support ticket and send the link to this page in your message.</em></p>
        <p><a href="https://rovidx.com/submit-ticket/" target="_blank" class="button button-primary">Open Support Ticket</a></p>
        <div style="overflow: hidden"><p><strong>Full Error:</strong><pre style="font-size: 10px;"><code>'. $fullError . '</code></pre></p></div>
        ';

        wp_die($err);
    }
    
    public function get_last_update() {
        $date = get_lastpostdate();
        $time = strtotime($date);
        
        return date('c', $time);
    }
    
    public function get_genre_list() {
        return array(
                'action' 		=> 'Action',
                'adventure' 	=> 'Adventure',
                'animals'		=> 'Animals',
                'animated'		=> 'Animated',
                'anime'			=> 'Anime',
                'children'		=> 'Children',
                'comedy'		=> 'Comedy',
                'crime'			=> 'Crime',
                'documentary'	=> 'Documentary',
                'drama'			=> 'Drama',
                'educational'	=> 'Educational',
                'fantasy'		=> 'Fantasy',
                'faith'			=> 'Faith',
                'food'			=> 'Food',
                'fashion'		=> 'Fashion',
                'gaming'		=> 'Gaming',
                'health'		=> 'Health',
                'history'		=> 'History',
                'horror'		=> 'Horror',
                'miniseries'	=> 'Mini Series',
                'mystery'		=> 'Mystery',
                'nature'		=> 'Nature',
                'news'			=> 'News',
                'reality'		=> 'Reality',
                'romance'		=> 'Romance',
                'science'		=> 'Science',
                'science fiction' => 'Science Fiction',
                'sitcom'		=> 'Sitcom',
                'special'		=> 'Special',
                'sports'		=> 'Sports',
                'thriller'		=> 'Thriller',
                'technology'	=> 'Technology',
            );
    }
    
    public function get_parental_ratings() {
        return array(
                'UNRATED' => 'UNRATED',
                '12' =>'12',
                '12A' => '12A',
                '14+' => '14+',
                '15' => '15',
                '18' => '18',
                '18+' => '18+',
                '18A' => '18A',
                'A' => 'A',
                'AA' => 'AA',
                'C' => 'C',
                'C8' => 'C8',
                'E' => 'E',
                'G' => 'G',
                'NC17' => 'NC17',
                'PG' => 'PG',
                'PG13' => 'PG13',
                'R' => 'R',
                'R18' => 'R18',
                'TV14' => 'TV14',
                'TVG' => 'TVG',
                'TVMA' => 'TVMA',
                'TVPG' => 'TVPG',
                'TVY' => 'TVY',
                'TVY14' => 'TVY14',
                'TVY7' => 'TVY7',
                'U' => 'U',
                'Uc' => 'Uc',
            );
    }
    
    public function multiexplode ($delimiters,$string) {
        $ready = str_replace($delimiters, $delimiters[0], $string);
        $launch = explode($delimiters[0], $ready);
        return  $launch;
    }
    
    public function build_language_opt() {
        return array(
            'en' => esc_html__('English', 'wp-smart-tv'),
            'es-mx' => esc_html__('Spanish (Mexico)', 'wp-smart-tv'),
            'fr' => esc_html__('French', 'wp-smart-tv'),
            'gre' => esc_html__('Greek', 'wp-smart-tv')
        );
    }
    
    public function get_content_url($id) {
        $baseUrl = get_post_meta($id, 'rovidx_smarttv_URL', true);
        return apply_filters( 'rovidx_wpstv_video_url', $baseUrl );
    }
}
global $wpstv_tools;
$wpstv_tools = new Wp_Smart_Tv_Toolkit();