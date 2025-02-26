<?php

class Wp_Smart_Tv_import_ajax {
    
    public function __construct() {
        add_action( 'wp_ajax_rovidx_wpstv_validate_import', array( $this, 'validate_import' ) );
        add_action( 'wp_ajax_rovidx_wpstv_import_rdp', array( $this, 'process_rdp_json' ) );
        
        // New Importer Functions
        add_action( 'wp_ajax_rovidx_start_json_import', array( $this, 'start_json_import') );
    }
    
    // New Import Functions
    
    public function start_json_import() {
        
        if (isset($_POST['in_url']) && isset($_POST['in_type'])) {
            $in_url = $_POST['in_url'];
            $in_type = $_POST['in_type'];
        } else {
            wp_send_json(array('error'=>'Parameters not present or correct.'));
        }
        
        // Create a stream
        $opts = array(
          'http'=>array(
            'method'=>"GET",
          )
        );

        $context = stream_context_create($opts);
        
        $in_data = json_decode(file_get_contents($in_url, false, $context), true);
        $out = [];
        
        $valid = $this->validate_import($in_data, $in_type);
        
        if ($valid) {
            $imp_check = $this->process_rdp_json($in_data);
            
            wp_send_json($imp_check);
            wp_die();
        } else {
            wp_send_json($in_data);
        }        
    }
        
    
    public function validate_import($in_data, $in_type) {
        $isValid = false;
        if (isset($in_type) && isset($in_data)) {
            $isValid = $this->valid_rokudp_json($in_data);
        }
        return $isValid;
    }

    private function valid_rokudp_json($vData) {
        $found = false;
        if (isset($vData['providerName']) && ( isset($vData['movies']) || isset($vData['series']) || isset($vData['tvSpecials']) || isset($vData['shortFormVideos']) ) ) {
            $found = true;    
        }

        return $found;
    }

    private function process_rdp_json($vData) {
        
        $tv_settings = get_option('rovidx_smart_tv_options');
        $roku_options = get_option('rovidx_smart_tv_roku_options');
        $mImport=array();
        
        if (isset($vData['movies']) && isset($tv_settings['rovidx_smart_tv_movie_post_type_enabled'])) {
            $mImport['movies'] = $this->import_video($vData['movies'], 'movies');
        } 
        
        if (isset($vData['tvSpecials']) && isset($tv_settings['rovidx_smart_tv_tvspecials_post_type_enabled'])) {
            $mImport['tvSpecials'] = $this->import_video($vData['tvSpecials'], 'specials');
        } 
        
        if (isset($vData['shortFormVideos']) && isset($tv_settings['rovidx_smart_tv_shortform_video_post_type_enabled'])) {
            $mImport['shortFormVideos'] = $this->import_video($vData['shortFormVideos'], 'videos');
        } 
        
        if (isset($vData['series']) && isset($tv_settings['rovidx_smart_tv_series_post_type_enabled'])) {
            $mImport['series'] = $this->import_series($vData['series']);
        }
      
        if (isset($vData['categories']) && isset($roku_options['rovidx_smart_tv_roku_dfp_recipes_enabled'])) {
            $mImport['categories'] = $this->import_categories($vData['categories']);
          
        }
        
       return $mImport;
        
    }

    private function import_categories($categories) {
        $optCat = get_option('wpstv_rdp');
        $out = [];
        
        // Empty Category Check
        if (isset($optCat['rovidx_smart_tv_category_recipe'][0]['rovidx_smart_tv_cat_name'])) {
            $noCat = count($optCat);
            $i=$noCat;
        } else {
            $i=0;
        }
        
        // Build recipe array
        foreach ($categories as $category) {        
            $qry = $this->process_rdp_query($category['query']);
            $optCat['rovidx_smart_tv_category_recipe'][$i]['rovidx_smart_tv_query'] = $qry['op'];
            $optCat['rovidx_smart_tv_category_recipe'][$i]['rovidx_smart_tv_cat_tags'] = $qry['tags'];
            $optCat['rovidx_smart_tv_category_recipe'][$i]['rovidx_smart_tv_order'] = $category['order'];
            $optCat['rovidx_smart_tv_category_recipe'][$i]['rovidx_smart_tv_cat_name'] = $category['name'];
            $i++;
        }
        update_option( 'wpstv_rdp', $optCat, true );
        return $optCat;
    }
    
    private function process_rdp_query($dp_query) {
        global $wpstv_tools;
        $out;
        
        if (strstr($dp_query, 'AND')) {
            $out['op'] = 'AND';    
        } else if (strstr($dp_query, 'OR')) {
            $out['op'] = 'OR';
        } else {
            $out['op'] = 'OR';
        }
        
        $dpQueryArr = $wpstv_tools->multiexplode(array(" AND "," OR "),$dp_query);
        $out['tags'] = $dpQueryArr;
        
        
        return $out;
    }
    
    private function import_video($mData, $type) {

        $return = array();
        $i = 0;
        foreach ($mData as $movie) {
            
            if (isset($movie['title']) && isset($movie['shortDescription']) && !empty($type)) {
                //$this->wpstv_import_logger(['id'=>$i, 'title'=>$movie['title'], 'longDesc' => $movie['shortDescription'], 'type' => $type ]);
                $postArray = array(
                    'post_title'    => wp_strip_all_tags( $movie['title'] ),
                    'post_content'  => wp_strip_all_tags( $movie['shortDescription'] ),
                    'post_type'	  => $type,
                    'post_status'   => 'publish',
                    'post_date'     =>   $movie['content']['dateAdded']
                );

                $postId = wp_insert_post($postArray);
                wp_set_post_tags( $postId, $movie['tags'], true );

                $meta = array(
                    'Duration' => $movie['content']['duration'],
                    'format' => $movie['content']['videos'][0]['videoType'],
                    'quality' => $movie['content']['videos'][0]['quality'],
                    'URL' => $movie['content']['videos'][0]['url'],
                    'genres' => $movie['genres'],
                    'bif' => array(),
                    'cc' => array(),
                );

                if (isset($movie['content']['trickPlayFiles'])) {
                    $meta['bif'] = $this->process_bif_array($movie['content']['trickPlayFiles']);
                }

                if (isset($movie['content']['captions'])) {
                    $meta['cc'] = $this->process_cc_array($movie['content']['captions']);
                }

                foreach ($meta as $x => $value) {
                    $return[$x] = update_post_meta( $postId, 'rovidx_smarttv_' . $x, $meta[$x]);
                }

                $return['thumb'] = $this->import_thumbnail($postId, $movie['thumbnail'], $movie['title']);

                $i++;
            }
            
        }
        return $i;
    }

    private function process_cc_array($cc) {

        $out = [];
        $i = 0;
        foreach ($cc as $ccf) {
            $out[$i]['rovidx_smarttv_cc_uri'] = $ccf['url'];
            $out[$i]['rovidx_smarttv_cc_lang'] = $ccf['language'];
            $out[$i]['rovidx_smarttv_cc_type'] = $ccf['captionType'];
            $i++;
        }

        return $out;    
    }

    private function process_bif_array($tpfs) {
        $out = [];
        $i = 0;
        foreach ($tpfs as $tpf) {
            // rovidx_smarttv_bif_1_rovidx_smarttv_bif_uri

            $out[$i]['rovidx_smarttv_bif_uri'] = $tpf['url'];
            $out[$i]['rovidx_smarttv_bif_def'] = $tpf['quality'];
            $i++;
        }

        return $out;
    }

    private function import_thumbnail($postid, $url, $title){
       
        if ($url !== '') {
            $response = wp_remote_get($url);
            if( is_wp_error( $response ) ) {
                $error = $response->get_error_message();
            } else {
                $image_contents = $response['body'];
                $image_type = wp_remote_retrieve_header( $response, 'content-type' );
            }
        } else {
            return array('status'=>'error', 'result'=>'URL not set');
        }
        if (isset($image_contents)) {
            $fileName = html_entity_decode($title) . '.jpg';
            $upload = wp_upload_bits($fileName, null, $image_contents );
            $wp_filetype = wp_check_filetype( basename( $upload['file'] ), null );
            $upload = apply_filters( 'wp_handle_upload', array(
                            'file' => $upload['file'],
                            'url'  => $upload['url'],
                            'type' => $wp_filetype['type']
                        ), 'sideload' );

            // Contstruct the attachment array
            $attachment = array(
                'post_mime_type'	=> $upload['type'],
                'post_title'		=> $title,
                'post_content'		=> '',
                'post_status'		=> 'inherit'
            );
            // Insert the attachment
            $attach_id = wp_insert_attachment( $attachment, $upload['file'], (int)$postid );

            // you must first include the image.php file
            // for the function wp_generate_attachment_metadata() to work
            require_once( ABSPATH . 'wp-admin/includes/image.php' );

            $attach_data = wp_generate_attachment_metadata( $attach_id, $upload['file'] );

            wp_update_attachment_metadata( $attach_id, $attach_data );
            set_post_thumbnail( (int)$postid, $attach_id );
            $data = array( 'status' => 'success', 'imgID' => $attach_id );

            return $data;
        } else {
            return array('status'=>'error', 'result'=>'Image Not Set');
        }
    }

    private function import_series($sData) {
        $return = array();
        $i= 0;
        foreach ($sData as $series) {
            $epArray = [];
            $postArray = array(
                'post_title'    => wp_strip_all_tags( $series['title'] ),
                'post_content'  => wp_strip_all_tags( $series['longDescription'] ),
                'post_type'	  => 'series',
                'post_status'   => 'publish',
                'post_date'     =>   $series['releaseDate']
            );

            $postId = wp_insert_post($postArray);
            wp_set_post_tags( $postId, $series['tags'], true );

            $seriesType = $this->check_series_type($series);

            $meta = array(
                'series_release_date' => $series['releaseDate'],
                'series_type' => $seriesType,
                'series_thumb' => $series['thumbnail'],
                'series_genres' => $series['genres']            
            );

            foreach ($meta as $x => $value) {
                $return[$x] = update_post_meta( $postId, 'rovidx_smarttv_' . $x, $meta[$x]);
            }

            if (isset($series['episodes'])) {
                foreach ($series['episodes'] as $y => $episode) {
                    $epArray[] = $this->import_episode($series['episodes'][$y]);
                }
            } else if (isset($series['seasons'])) {
                $epArray = $this->import_seasons($series['seasons']);
            }

            $addEpisodes = update_post_meta( $postId, 'rovidx_smarttv_playlist', $epArray);
            $i++;
        }

        return $i;
    }

    private function import_seasons($seasons) {
        foreach ($seasons as $season) {
            foreach ($season['episodes'] as $ep) {
                $out[] = $this->import_episode($ep, $season['seasonNumber']);
            }
        }    
        return $out;
    }

    private function import_episode($ep, $seasonNumber=null) {
        $return = array();
        if (!isset($ep['title']) || !isset($ep['longDescription']) || !isset($ep['content'])) {
            return false;
        }
        $postArray = array(
            'post_title'    => wp_strip_all_tags( $ep['title'] ),
            'post_content'  => wp_strip_all_tags( $ep['longDescription'] ),
            'post_type'	  => 'episodes',
            'post_status'   => 'publish',
            'post_date'     =>   $ep['content']['dateAdded']
        );

        $postId = wp_insert_post($postArray);
        wp_set_post_tags( $postId, $ep['tags'], true );

        $meta = array(
            'Duration' => $ep['content']['duration'],
            'format' => $ep['content']['videos'][0]['videoType'],
            'quality' => $ep['content']['videos'][0]['quality'],
            'URL' => $ep['content']['videos'][0]['url'],
            'genres' => $ep['genres'],
            'releaseDate'=> $ep['releaseDate'],
            'ep_no' => $ep['episodeNumber']
        );

        if ($seasonNumber != null) {
            $meta['se_no'] = $seasonNumber;
        } else {
            $meta['se_no'] = '0';
        }

        foreach ($meta as $x => $value) {
            $return[$x] = update_post_meta( $postId, 'rovidx_smarttv_' . $x, $meta[$x]);
        }

        $return['thumb'] = $this->import_thumbnail($postId, $ep['thumbnail'], $ep['title']);

        return $postId;
    }

    private function check_series_type($series) {
        if (isset($series['seasons'])) {
            return 'seasons';
        } else {
            return 'miniseries';
        }
    }
    
    protected function wpstv_import_logger($data) {
        $myfile = fopen(plugin_dir_path( __FILE__ ) . "log-import.txt", "a") or die("Unable to open file!");
        $txt = json_encode($data);
        fwrite($myfile, $txt . PHP_EOL);
        fclose($myfile);
    }
    
}