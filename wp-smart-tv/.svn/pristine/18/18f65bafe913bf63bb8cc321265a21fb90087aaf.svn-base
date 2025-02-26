<?php

class Wp_Smart_Tv_Roku_DP {
    protected $settings;
    
    public function __construct() {
        $settings = get_option('rovidx_smart_tv_options');
        $this->settings = $settings;
        add_action( 'rest_api_init', array($this, 'start_json_feeds'));
    }
	
    public function start_json_feeds() {
        // Build Roku Direct Publisher feed
        register_rest_route( 'tv', '/roku/', array(
            'methods' => 'GET',
            'callback' =>  array($this, 'roku_dp'),
			'permission_callback' => function( $request ) {
					return true; //Change to limit access
				},
        ) );
        
    }
	
	private function roku_dp_check_permissions() {
		return true;
	}
    
    public function roku_dp(WP_REST_Request $request) {
        global $wpstv_tools;
        $wpstv_setting = get_option('rovidx_smart_tv_options');
        
        $attributes = $request->get_attributes();
        $args = $attributes['args'];
        
        if( is_plugin_active( 'rovidx-smart-tv-authorize/rovidx-smart-tv-authorize.php' )) {
            if (isset($wpstv_setting['rovidx_smart_tv_enable_rokudp'])) {
               $auth = rovidx_wpstv_check_auth('roku');
                if (!$auth) {
                    return ['error'=>'Authentication failed.  Please contact system administrator.'];
                }  
            }		
        }
        
        $tv_settings = get_option('rovidx_smart_tv_roku_options');

        $feedArr = array(
            'providerName' => html_entity_decode(get_bloginfo()),
            'lastUpdated' => $wpstv_tools->get_last_update(),//  TO-DO rovidx_wpstv_get_last_update_time(),
            'language' => get_bloginfo('language'),
        );

        if ( isset($tv_settings['rovidx_smart_tv_roku_dfp_movies_enabled'])) {
            $feedArr['movies'] = $this->get_movies();
        }

        if ( isset($tv_settings['rovidx_smart_tv_roku_dfp_shortform_enabled'])) {
            $feedArr['shortFormVideos'] = $this->get_shortform();
        }	

        if ( isset($tv_settings['rovidx_smart_tv_roku_dfp_series_enabled'])) {
            $feedArr['series'] = $this->get_series();
        }

        if ( isset($tv_settings['rovidx_smart_tv_roku_dfp_tvspecials_enabled'])) {
            $feedArr['tvSpecials'] = $this->get_tvspecials();
        }

        if ( isset($tv_settings['rovidx_smart_tv_roku_dfp_recipes_enabled'])) {
            $feedArr['categories'] = $this->build_roku_categories();
        } 

        if (function_exists('rovidx_wpstv_roku_build_playlists')) {
            $feedArr['playlists'] = rovidx_wpstv_roku_build_playlists();
        } 
		
		$feed = apply_filters('wpstv_rdp', $feedArr);
		//var_dump($feed);
		
        return new WP_REST_Response( $feed, 200 );
        
        }
    
    private function get_movies() {
        return $this->get_content('movies');
    }
    
    private function get_shortform() {
        return $this->get_content('videos');
    }
    
    private function get_tvspecials() {
        return $this->get_content('specials');
    }
    
    private function get_series() {
        global $wpstv_tools;
        $tv_settings = get_option('rovidx_smart_tv_options');

        $seriesOut = array();
        $args = array(
            'post_type'        => 'series',
            'post_status'      => 'publish',
            'posts_per_page' => -1,
            'suppress_filters' => true 
        );
        $seriesArr = get_posts($args);

        $i = 0;
        foreach ($seriesArr as $series) {

            $id = $series->ID;
            $attachedImageId = get_post_meta( $id, 'rovidx_smarttv_series_thumb_id', true );
            $seriesTags = $wpstv_tools->get_the_category_name($id,'post_tag');
            $seriesGenre = get_post_meta( $id,'rovidx_smarttv_series_genres', true );
            $seriesRelease = get_post_meta( $id, 'rovidx_smarttv_series_release_date', true );
            $seriesType = get_post_meta($id, 'rovidx_smarttv_series_type', true);

            //print_r($attachedImageId);
            $seriesThumb = wp_get_attachment_image_url( $attachedImageId, 'rokudp' );


            //$seriesOut[] = $series;
            $seriesOutArr = array(
                        'id' => (string)$id,
                        'title' => html_entity_decode($series->post_title),
                        'genres' => $seriesGenre,
                        'releaseDate' => get_the_date('Y-m-d', $id),
                        'thumbnail' => $seriesThumb,
                        'shortDescription' => html_entity_decode($series->post_content),
                        'longDescription' => html_entity_decode($series->post_content),
                        'tags' => $seriesTags,
                        //'seasons' => rovidx_wpstv_build_season($series)
            );

            if ($seriesType == 'miniseries') {
                $args = array(
                    'post_type' => 'episodes',
                    'posts_per_page' => -1,
                    'post__in' => get_post_meta( $id, 'rovidx_smarttv_playlist', true)
                );
                $tM = array('episodes' => $this->build_ep_in_se($args));
                $result = array_merge($seriesOutArr, $tM);
            } else if ($seriesType == 'seasons') {
                $seasons = $this->build_season($series);
                $tM = array('seasons' => $seasons);
                $result = array_merge($seriesOutArr, $tM);

            }

            $seriesOut[] = $result;
            $i++;
        }

        return $seriesOut;
    }
    
    private function build_season($series) {
	    //print_r($series);
		$tv_settings = get_option('rovidx_smart_tv_options');
	    $seriesId = get_post_meta($series->ID, 'rovidx_smarttv_playlist', true);
        //print_r($seriesId);
        
		$args = array(
			'post_type' => 'episodes',
			'posts_per_page' => -1,
			'post__in' => get_post_meta($series->ID, 'rovidx_smarttv_playlist', true)
		);
		$qry = new WP_Query( $args );
        
		$seaCount = array();
		if ( $qry->have_posts() ) {			
			while ( $qry->have_posts() ) {
				$qry->the_post();
				
				$season = get_post_meta(get_the_id(), 'rovidx_smarttv_se_no', true);
				$seaCount[$season] = 'count';
			}
		}
	    wp_reset_postdata();
		$out = array();
		foreach ($seaCount as $key=>$value) {
			$argsA = array(
				'post_type' => 'episodes',
				'posts_per_page' => -1,
				'post__in' => $seriesId,
				'meta_key'   => 'rovidx_smarttv_se_no',
				'meta_value' => (string)$key
			);
            
            // print_r($argsA);
            if ($key) {
                $out[] = array(
                    'seasonNumber' => $key,
                    'episodes' => $this->build_ep_in_se($argsA)
                );
            }
			
		}
	   
            return $out;
    }

    private function build_ep_in_se($args) {
            global $wpstv_tools;
            $tv_settings = get_option('rovidx_smart_tv_options');
            $qry = new WP_Query( $args );
            $movies = [];
            $i = 0;
            if ($qry->have_posts()) {
                while($qry->have_posts()){
                    $qry->the_post();
                    $videos = array();
                    $id = get_the_id();
                    $videos[] = array(
                        'url' => get_post_meta( $id, 'rovidx_smarttv_URL', true ),
                        'quality' => get_post_meta( $id, 'rovidx_smarttv_quality', true ),
                        'videoType' => get_post_meta( $id, 'rovidx_smarttv_format', true ),
                    );

                    $trickPlayObj = array();
                    $bif = get_post_meta($id, 'rovidx_smarttv_bif');
                    if (!empty($bif) && isset($bif[0]['rovidx_smarttv_bif_uri']) && isset($bif[0]['rovidx_smarttv_bif_def'])) {
                        foreach ($bif as $item) {
                            $trickPlayObj[] = $this->get_bif_array($item);
                        }
                    }

                    $vtt = array();
                    $vtt = get_post_meta($id, 'rovidx_smarttv_cc');
                    //print_r($vtt);
                    if (!empty($vtt[0]['rovidx_smarttv_cc_uri'])) {
                        foreach ($vtt as $item) {
                            if (!empty($item)) {
                                $captions[] = $this->get_cc_array($item);
                            }
                        }
                    } else { 
                        $captions = array();
                    }

                    $credits = array();
                    if (function_exists('rovidx_cdb_roku_credits')) {
                        $credits = rovidx_cdb_roku_credits($id);
                    }

                    $duration = get_post_meta($id, 'rovidx_smarttv_Duration', true);
                    $validtyStart = get_post_meta($id,'rovidx_smarttv_start_date', true);
                    $validtyEnd = get_post_meta($id,'rovidx_smarttv_end_date', true);
                    //print_r($validtyStart);
                    
                    //$adBreaks = rovidx_wpstv_build_ad_breaks($duration);
                    $movies[] = array(
                        'id' => (string)$id,
                        'title' => html_entity_decode (get_the_title()),
                        'content' => array(
                            'dateAdded' => get_the_date('c', $id),
                            'videos' => $videos,
                            'duration' => intval ($duration),
                        ), // End Content Section
                        //'credits' => array(),
                        'genres' => get_post_meta($id, 'rovidx_smarttv_genres',true),
                        'tags' => $wpstv_tools->get_the_category_name($id,'post_tag'),
                        'thumbnail' => $wpstv_tools->featured_img_url($id,'rokudp'), // 
                        'releaseDate' => get_the_date('Y-m-d', $id),
                        'episodeNumber' => (int)get_post_meta($id, 'rovidx_smarttv_ep_no',true),
                        'shortDescription' => $wpstv_tools->do_excerpt(get_the_content()),
                        'longDescription' => html_entity_decode (get_the_content())
                    );
                    
                    if ($validtyStart || $validtyEnd) {
                        $movies[$i]['content']['validityPeriodStart'] = $validtyStart;
                        $movies[$i]['content']['validityPeriodEnd'] = $validtyEnd;
                    }
                    
                    if ($captions) {
                        $movies[$i]['content']['captions'] = $captions;
                    }
                    
                    if ($trickPlayObj) {
                        $movies[$i]['content']['trickPLayFiles'] = $trickPlayObj;
                    }

                    if (isset($tv_settings['rovidx_smart_tv_ad_feed_type'])) {
                        $adFeedType = $tv_settings['rovidx_smart_tv_ad_feed_type'];
                        if($adFeedType === '1') {
                            $adBreaks = array('00:00:00');
                        } else if($adFeedType === '2') {
                            $adBreaks = $this->build_ad_breaks($id);	
                        } else if($adFeedType === '3') {
                            $adBreaks = $this->get_ad_breaks($id, false);
                        } else if($adFeedType === '4') {
                            $adBreaks = $this->get_ad_breaks($id, true);
                        }

                        $movies[$i]['content']['adBreaks'] = $adBreaks;
                    }
                    
                    $i++;
                }
            }
            wp_reset_postdata();
            return $movies;
    }
    
    private function get_content_url($id) {
        $baseUrl = get_post_meta($id, 'rovidx_smarttv_URL', true);
        return apply_filters( 'rovidx_wpstv_video_url', $baseUrl );
    }
    
    private function get_cc_array($item) {
        $caption_arr = array();
        if (isset($item['rovidx_smarttv_cc_uri']) && isset($item['rovidx_smarttv_cc_lang']) && isset($item['rovidx_smarttv_cc_type'])) {
            $caption_arr = array(
                'url' => $item['rovidx_smarttv_cc_uri'],
                'language' => $item['rovidx_smarttv_cc_lang'],
                'captionType' => $item['rovidx_smarttv_cc_type']
            );
        }
        return  apply_filters( 'rovidx_wpstv_cc_items', $caption_arr );
    }
    
    private function get_bif_array($item) {
        $bif_arr = array();
        if (isset($item['rovidx_smarttv_bif_uri']) && isset($item['rovidx_smarttv_bif_def'])) {
            $bif_arr = array(
                'url' => $item['rovidx_smarttv_bif_uri'],
                'quality' => $item ['rovidx_smarttv_bif_def']
            );
        }
        return  apply_filters( 'rovidx_wpstv_bif_items', $bif_arr );
    }
    
    private function get_ad_breaks($id, $flag=false) {
        global $tv_settings;
        $adBreaks = get_post_meta($id, 'rovidx_smarttv_ad_breaks');
        if (!empty($adBreaks)) {
            $breakStr = str_replace(' ', '', $adBreaks);
            //print_r($breakStr[0]);
            $breakArray = explode(',', $breakStr[0]);
            
        } else if ($flag === true && empty($adBreaks)) {
            $breakArray = $this->build_ad_breaks($id);
        } else {
            $breakArray = array();
        }

        return $breakArray;

    }
    
    private function build_ad_breaks($id) {
        $break = array();
        
        
        $ad_settings = get_option('rovidx_smart_tv_ad_options');
        $midTimer = get_post_meta($id, 'rovidx_smarttv_custom_midroll_timer');
        $duration = get_post_meta($id, 'rovidx_smarttv_Duration');
        //print_r($ad_settings);
        if (isset($ad_settings['rovidx_smart_tv_roku_midroll_timer']) && empty($midTimer)) {
            $adSpan = intval ($ad_settings['rovidx_smart_tv_roku_midroll_timer']) * 60;
        } else if (isset($ad_settings['rovidx_smart_tv_roku_midroll_timer']) && !empty($midTimer)) {
            $adSpan = intval ($midTimer) * 60;
        } else if (!isset($ad_settings['rovidx_smart_tv_roku_midroll_timer']) && !empty($midTimer)) {
            $adSpan = intval ($midTimer) * 60;
        }
        
        if ( !empty($duration) || !empty($adSpan) ) {
            $totalBreaks = floor($duration[0] / $adSpan);
            
            if ($totalBreaks > 24) {
                $totalBreaks = 24;
            }
            
            $counter = 0;

            $break = array('00:00:00');

            for ($i = 0; $i<$totalBreaks; $i++) {
                $counter = $counter + $adSpan;
                $break[] = gmdate("H:i:s", $counter);
            }
        }
        
        return $break;
    }
    
    private function build_roku_categories() {
        $tv_settings = get_option('rovidx_smart_tv_options');
        $recipe_settings = get_option('wpstv_rdp');
        $out = [];
        if (isset($recipe_settings['rovidx_smart_tv_category_recipe'])) {
            $recipes = $recipe_settings['rovidx_smart_tv_category_recipe'];
        } else {
            $recipes = array();
        }

        $retArr = array();
        if (!empty($recipes)) {
            foreach ($recipes as $recipe){
                $queryOp = $recipe['rovidx_smart_tv_query'];

                if ($queryOp == 'playlist' && function_exists('rovidx_wpstv_build_playlist_recipe')) {

                    $out = rovidx_wpstv_build_playlist_recipe($recipe);

                        array_push($retArr, $out);
                } else if (!empty($recipe['rovidx_smart_tv_cat_tags'])) {
                    $tags = $recipe['rovidx_smart_tv_cat_tags'];

                    if (count($tags) > 1) {
                        $out = array(
                            'name' => $recipe['rovidx_smart_tv_cat_name'],
                            'query' => $this->build_recipe_query($queryOp, $tags),
                            'order' => $recipe['rovidx_smart_tv_order']
                        );
                        array_push($retArr, $out);
                    } else {
                        $out = array(
                            'name' => $recipe['rovidx_smart_tv_cat_name'],
                            'query' => $tags[0],
                            'order' => $recipe['rovidx_smart_tv_order']
                        );
                        array_push($retArr, $out);
                    }
                }
            }
        }
        return $retArr;
    }
    
    private function build_recipe_query($query, $tags) {
        $retStr = '';

        if (count($tags) > 1) {
            foreach ($tags as $tag) {
                $retStr .= $tag . ' ' . $query . ' ';
            }
            $retStr = rtrim($retStr, ' ' . $query . ' ');

        } else {
            $retStr = $tags;
        }
        return $retStr;
    }
    
    private function get_content($type) {
        global $wpstv_tools;
        
        $roku_settings = get_option('rovidx_smart_tv_roku_options');
        $ad_settings = get_option('rovidx_smart_tv_ad_options');
        
        $content = array();

        $args = array (
            'post_type' => $type,
            'posts_per_page' => $roku_settings['rovidx_smart_tv_no_posts']
        );
        
        $i = 0;
        
        // Query Loop Init
        $qry = new WP_Query( $args );
            //print_r($qry);
            if ( $qry->have_posts() ) {			
                while ( $qry->have_posts() ) {

                    $qry->the_post();
                    $videos = array();
                    $id = get_the_id();

                    $videos[] = array(
                        'url' => $this->get_content_url($id),
                        'quality' => get_post_meta($id, 'rovidx_smarttv_quality', true),
                        'videoType' => get_post_meta($id, 'rovidx_smarttv_format', true),
                    );

                    $trickPlayObj = array();
                    $bif = get_post_meta($id, 'rovidx_smarttv_bif', true);
                    if (!empty($bif) && isset($bif[0]['rovidx_smarttv_bif_uri']) && isset($bif[0]['rovidx_smarttv_bif_def'])) {
                        foreach ($bif as $item) {
                            $trickPlayObj[] = $this->get_bif_array($item);
                        }
                    }

                    $vtt = array();
                    $vtt = get_post_meta($id, 'rovidx_smarttv_cc', true);
                    //print_r($vtt);
                    $captions = array();
                    if (!empty($vtt[0]['rovidx_smarttv_cc_uri'])) {
                        foreach ($vtt as $item) {
                            if (!empty($item)) {
                                $captions[] = $this->get_cc_array($item);
                            }
                        }
                    } else { 
                        $captions = array();
                    }
                    
                    $credits = array();

                    $description = get_the_content();
                    $duration = get_post_meta($id, 'rovidx_smarttv_Duration', true);
                    //$adBreaks = rovidx_wpstv_build_ad_breaks($duration);
                    $content[] = array(
                        'id' => ''.$id.'',
                        'title' => html_entity_decode (get_the_title()),
                        'content' => array(
                            'dateAdded' => get_the_date('c', $id),
                            'videos' => $videos,
                            'duration' => intval ($duration),
                            'language' => get_bloginfo("language"),
                           
                        ), // End Content Section
                        'credit' => $credits,
                        'genres' => get_post_meta($id, 'rovidx_smarttv_genres', true),
                        'tags' => $wpstv_tools->get_the_category_name($id,'post_tag'),
                        'thumbnail' => $wpstv_tools->featured_img_url($id,'rokudp'), // 
                        'releaseDate' => get_the_date('Y-m-d', $id),
                        'shortDescription' => $wpstv_tools->do_excerpt($description),
                        'longDescription' => $wpstv_tools->do_clean_tags($description)
                    );
                    
                    $validtyStart = get_post_meta($id,'rovidx_smarttv_start_date', true);
                    $validtyEnd = get_post_meta($id,'rovidx_smarttv_end_date', true);
                    
                    if ($validtyStart || $validtyEnd) {
                        $content[$i]['content']['validityPeriodStart'] = $validtyStart;
                        $content[$i]['content']['validityPeriodEnd'] = $validtyEnd;
                    }
                    
                    if ($captions) {
                        $content[$i]['content']['captions'] = $captions;
                    }
                    
                    if ($trickPlayObj) {
                        $content[$i]['content']['trickPLayFiles'] = $trickPlayObj;
                    }
                    //print_r($this->settings);
                    if ( isset($this->settings['rovidx_smart_tv_ads_enabled']) && isset($ad_settings['rovidx_smart_tv_ad_feed_type']) ) {
                        $adFeedType = $ad_settings['rovidx_smart_tv_ad_feed_type'];
                        if($adFeedType === '1') {
                            $adBreaks = array('00:00:00');
                        } else if($adFeedType === '2') {
                            $adBreaks = $this->build_ad_breaks($id);	
                        } else if($adFeedType === '3') {
                            $adBreaks = $this->get_ad_breaks($id, false);
                        } else if($adFeedType === '4') {
                            $adBreaks = $this->get_ad_breaks($id, true);
                        }

                        $content[$i]['content']['adBreaks'] = $adBreaks;
                    }

                    $i++;
                }
            }
        return $content;
    }
}
