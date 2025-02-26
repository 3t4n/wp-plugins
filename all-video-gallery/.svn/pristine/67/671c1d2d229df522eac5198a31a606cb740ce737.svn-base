<?php

/******************************************************************
/* Build Player
******************************************************************/
class Videos {
	
	public function remove_qs_key($url, $key) {
		return preg_replace('/(?:&|(\?))' . $key . '=[^&]*(?(1)&|)?/i', "$1", $url);
	}

	public function buildGallery( $profileid = 1, $catid = 0, $sort = '', $count = 0 ) {
		global $wpdb;
		global $allvideogallery_plugin_dir;	
		
		$profile = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."allvideogallery_profiles WHERE id=".$profileid);		
		$query   = "SELECT * FROM ".$wpdb->prefix."allvideogallery_videos WHERE published=1";
		if( isset($_GET['slg']) ) {
			$slug   = $_GET['slg'];
			$query .= " AND slug!='$slug'";
		}
		
		if($catid) {
			$gallery = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."allvideogallery_categories WHERE id=".$catid);	
			$query  .= " AND category='$gallery->name'";
			$arr_params['catid'] = $gallery->slug;
		}
				
		$arr_params['sort'] = $sort;
		switch($sort) {
		 	case 'latest' :
		 		$query  .= ' ORDER BY id DESC';
				break;
			case 'popular' :
				$query  .= ' ORDER BY hits DESC';
				break;				
			case 'random' :
				$query  .= ' ORDER BY RAND()';
				break;
			case 'featured' :
				$query  .= ' AND featured=1 ORDER BY ordering';
				break;
			default :
				$query  .= ' ORDER BY ordering';
				unset( $arr_params['sort'] );
				break;
		 }
		
		$videos  = $wpdb->get_results($query); 	
			
		$custid     = ( $profile->custom_gallery_id ) ? $profile->custom_gallery_id : 'avs_gallery';
		$custpage   = ( $profile->custom_page_url ) ? $profile->custom_page_url : '';
		$limit      = $profile->rows * $profile->cols;
		$count      = ( $count != 0 && $count < count($videos) ) ? $count : count($videos);
		$total      = ceil( $count / $limit );
		$start      = isset( $_GET['start'] ) ? $_GET['start'] : 1;
		$limitstart = ($start - 1) * $limit;
		$limitend   = $start * $limit;
		if($count < $limitend) $limitend = $count;
		
		$output  = '<style type="text/css">';
		$output .= $profile->gallery_css;
		$output .= '</style>';
		$output .= '<div id="' . $custid . '">';
		
		$column = 0;
		$row    = 0;
  		for ($i=$limitstart, $n=$limitend; $i < $n; $i++) {
			$clear = ''; 
    		if($column >= $profile->cols) {
				$clear  = '<div style="clear:both;"></div>';
				$column = 0;
				$row++;		
			}
			$column++;
			$output .= $clear;
			$output .= '<div class="avs_thumb" style="width:' . $profile->thumb_width . 'px;">';
			$arr_params['slg'] = $videos[$i]->slug;
    		$custhref = $custpage ? @add_query_arg($arr_params, $custpage) : @add_query_arg($arr_params);
    		$output .= '<a href="' . $custhref . '">';
    		$output .= '<div class="left">';
            $output .= '<img class="arrow" src="' . get_option('siteurl') . '/wp-content/plugins/' . $allvideogallery_plugin_dir . '/assets/play.gif" style="margin-left:' . ($profile->thumb_width - 30) / 2 . 'px; margin-top:' . ($profile->thumb_height - 26) / 2 . 'px" border="0" />';
            $output .= '<img class="image" src="' . $videos[$i]->thumb . '" width="' . $profile->thumb_width . '" height="' . $profile->thumb_height . '" title="' . $videos[$i]->title . '" border="0" />';
            $output .= '</div>';
    		$output .= '<div class="right">';
            $output .= '<span class="title">' . $videos[$i]->title . '</span>';
            $output .= '<span class="hits"><strong>No. of Hits : </strong>' . $videos[$i]->hits . '</span>';
            $output .= '</div>';
    		$output .= '</a>';
			$output .= '</div>';
  		}
		
  		$output .= '<div style="clear:both"></div>';
		$output .= '</div>';
		
		$args = array(
    		'base'      => $this->remove_qs_key(@add_query_arg('start', '%#%'), "slg"),
    		'format'    => '',
    		'total'     => $total,
    		'current'   => $start,
    		'end_size'  => 3,
    		'prev_text' => __('prev'),
    		'next_text' => __('next'),
			'type'      => 'list'
		);
		
		$output .= paginate_links( $args );
		
		return $output;
	}
}

?>