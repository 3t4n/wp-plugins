<?php 

if ( ! defined( 'ABSPATH' ) ) exit;

//spit out the storymap div from shortcode 
function gigapixel_storymap_block($atts) {

	$storymap = get_page_by_path($atts['name'],OBJECT,'gigapixel-storymap');

	$settings = false;
	$slides = false;

	if(isset($storymap->ID) && is_numeric($storymap->ID)) {

		if(isset($atts['fullscreen']) && $atts['fullscreen'] == 'true') {
			$width = '100%';
			$height = '800px';
		} else {

			$width = '100%';
			if(isset($atts['width'])) {
				$width = $atts['width'];
			}
			$height = '500px';
			if(isset($atts['height'])) {
				$width = $atts['height'];
			}
		}

		$gigapixel_width = get_field('gpsm_width', $storymap->ID);
		$gigapixel_width = ($gigapixel_width != null) ? $gigapixel_width : '';

		$gigapixel_height = get_field('gpsm_height', $storymap->ID);
		$gigapixel_height = ($gigapixel_height != null) ? $gigapixel_height : '';

		$gigapixel_path = get_field('gpsm_gigapixel_url_path', $storymap->ID);
		$gigapixel_path = ($gigapixel_path != null) ? $gigapixel_path : '';
		
		$font = get_field('gpsm_font', $storymap->ID);
		$font = ($font != null) ? $font : 'default';

		$language = get_field('gpsm_language', $storymap->ID);

		$calculate_zoom = get_field('gpsm_calculate_field', $storymap->ID);
		$calculate_zoom = ($calculate_zoom != null) ? $calculate_zoom : false;

		$map_type = get_field('gpsm_map_type', $storymap->ID);

		$map_as_image = get_field('gpsm_map_as_image', $storymap->ID);
		$map_as_image = ($map_as_image != null) ? $map_as_image : false;

		$bg_colour = get_field('gpsm_background_colour', $storymap->ID);
		$bg_colour = ($bg_colour != null) ? $bg_colour : '#ffffff';

		$settings = array(
			'width'				=>	$width,
			'height'			=>	$height,
			'calculate_zoom'	=>	$calculate_zoom,
			'language'			=>	$language,
			'font'				=>	$font,
			'map_type'			=>	'zoomify',
			'map_as_image'		=>	$map_as_image,
			'map_background_color'	=>	$bg_colour,
			'zoomify'	=>	array(
					'path'		=>	$gigapixel_path,
					'width'		=>	$gigapixel_width,
					'height'	=>	$gigapixel_height,
					'tolerance'	=>	.8
				)
			);

		//get slides
		$slides = get_field('gpsm_storymap_slides', $storymap->ID);

		

		if(!empty($slides)) {
			$slides = get_gigapixel_storymap_slides($slides);

			$slides = array(
				'storymap'	=> array('slides'	=>	$slides)
			);

			$div_id = 'storymap_x';
			if(isset($atts['id'])) {
				$div_id = $atts['id'];
			}

			echo '<link rel="stylesheet" type="text/css" href="//cdn.knightlab.com/libs/storymapjs/latest/css/fonts/font.'.$font.'.css" />';
			echo '<div id="'.$div_id.'" style="width:'.$settings['width'].';height:'.$settings['height'].';"></div>';
			spit_storymap_javascript($settings, $slides, $div_id);

		} else {

			echo '<p>No Slides for Story Map</p>';

		}
		
	}
	

}

add_shortcode( 'gigapixel_storymap', 'gigapixel_storymap_block' );


function get_gigapixel_storymap_slides($slides) {

	//get meta for slides
	foreach($slides as $post) {
		$meta = get_metadata('post', $post->ID);
		$post->meta = $meta;
	}

	//build slides object
	$object = array();
	foreach($slides as $key=>$slide) {

		$date = get_field('gps_date', $slide->ID);
		$date = ($date != null) ? $date : '';

		$image = get_field('gps_media_image', $slide->ID);
		$image = ($image != null) ? wp_get_attachment_image_src($image) : false;

		$external = get_field('gps_media_external_content', $slide->ID);
		$external = ($external != null) ? $external : '';

		$media_url = ($image != false) ? $image : $external;

		$latitude = get_field('gigapixel_storymap_latitude', $slide->ID);
		$longitude = get_field('gigapixel_storymap_longitude', $slide->ID);

		$location_name = get_field('gps_location_name', $slide->ID);
		$location_name = ($location_name != null) ? $location_name : false;

		$zoom_level = get_field('gigapixel_storymap_zoom', $slide->ID);
		$zoom_level = ($zoom_level != null) ? $zoom_level : 1;

		$media_credit = get_field('gps_media_credit', $slide->ID);
		$media_credit = ($media_credit != null) ? $media_credit : false;

		$media_caption = get_field('gps_media_caption', $slide->ID);
		$media_caption = ($media_caption != null) ? $media_caption : false;

		$object[$key] = array(
			'date'		=>	$date,
			'text'		=>	array(
				'headline'	=>	$slide->post_title,
				'text'		=>	$slide->post_content,
				),
			'media'		=>	array(
				'url'		=>	$media_url,
				'credit'	=>	$media_credit,
				'caption'	=>	$media_caption
				),
			'location'	=> array(
				'name'	=>	$location_name,
				'lat'	=>	$latitude,
				'lon'	=>	$longitude,
				'zoom'	=>	$zoom_level,
				'line'	=>	true
				)
			);

		$overview = get_field('gps_overview_slide', $slide->ID);
		if($overview == '1') {
			$object[$key]['type'] = 'overview';
		}

	}
	
	return $object;

}

//metaboxes & admin screen

function gigapixel_slide_metaboxes( ) {
   global $wp_meta_boxes;
   add_meta_box('gigapixel_location', __('Location'), 'gigapixel_slide_metaboxes_html', 'gigapixel-slide', 'normal', 'high');
}
add_action( 'add_meta_boxes_gigapixel-slide', 'gigapixel_slide_metaboxes' );


function get_all_gigapixel_storymaps() {
	//get storymaps
	$args = array(
		'post_type'		=>	'gigapixel-storymap',
		);

	$gigapixel_storymaps = get_posts($args);

	return $gigapixel_storymaps;
}

function gigapixel_slide_metaboxes_html() {
    global $post;
    $custom = get_post_custom($post->ID);
    $gigapixel_storymaps = get_all_gigapixel_storymaps();

    $gigapixel_storymaps_object = false;
    if(!empty($gigapixel_storymaps)) {
    	$gigapixel_storymaps_object = get_gigapixel_storymap_dimensions_object($gigapixel_storymaps);
    }

    $gigapixel_storymap_id = get_post_meta( $post->ID, 'gigapixel_storymap_id', true);

    $storymap_url = false;
    if(isset($gigapixel_storymap_id)) {
    	$storymap_url = get_post_meta( $gigapixel_storymap_id, 'gpsm_gigapixel_url_path', true);
    }

    $longitude = get_post_meta ( $post->ID, 'gigapixel_storymap_longitude', true);;
    $latitude = get_post_meta ( $post->ID, 'gigapixel_storymap_latitude', true);;
    $zoom = get_post_meta ( $post->ID, 'gigapixel_storymap_zoom', true);;

    include 'templates/admin/gigapixel-location-block-template.php';
}


function gigapixel_slide_save_post() {
    if(empty($_POST)) return;

    global $post;

    if(isset($_POST["gigapixel_storymap_id"]) && is_numeric($_POST["gigapixel_storymap_id"])) {
    	update_post_meta($post->ID, "gigapixel_storymap_id", $_POST["gigapixel_storymap_id"]);
    }

    if(isset($_POST["gigapixel_storymap_longitude"]) && is_numeric($_POST["gigapixel_storymap_longitude"])) {
    	update_post_meta($post->ID, "gigapixel_storymap_longitude", $_POST["gigapixel_storymap_longitude"]);
    }

    if(isset($_POST["gigapixel_storymap_latitude"]) && is_numeric($_POST["gigapixel_storymap_latitude"])) {
    	update_post_meta($post->ID, "gigapixel_storymap_latitude", $_POST["gigapixel_storymap_latitude"]);
    }

    if(isset($_POST["gigapixel_storymap_zoom"]) && is_numeric($_POST["gigapixel_storymap_zoom"])) {
    	update_post_meta($post->ID, "gigapixel_storymap_zoom", $_POST["gigapixel_storymap_zoom"]);
    }

}   
add_action( 'save_post_gigapixel-slide', 'gigapixel_slide_save_post' );


//change google drive directory to final location
function my_acf_save_post( $post_id ) {

	global $post;
    
    if($post->post_type == 'gigapixel-storymap') {
    	$url = get_field('gpsm_gigapixel_url_path', $post_id);
    	$url = get_google_drive_directory_from_share_url($url);
    	update_field("field_55e30dbe93d5a", $url, $post->ID);
    }
    
}
add_action('acf/save_post', 'my_acf_save_post', 20);


function get_gigapixel_storymap_dimensions_object($gigapixel_storymaps) {

	$object = array();
	foreach($gigapixel_storymaps as $storymap) {

		$url = get_field('gpsm_gigapixel_url_path', $storymap->ID);
		if($url == null) {
			$url = 'https://fbad7ec112bffdf6400afd76cd98bccd35864e2e.googledrive.com/host/0B4iQJGTUIcL8fkZ3X3hmR0tUZDhYQ19MU1VFNzlOWHc2TFhHNHlMWTJHOEtzRkRPS0pVRjg/';
		}

		$width = get_field('gpsm_width', $storymap->ID);
		if($width == null) {
			$width = '500';
		}

		$height	= get_field('gpsm_height', $storymap->ID);
		if($height == null) {
			$height = '500';
		}

		$object[$storymap->ID] = array(
			'url'		=>	$url,
			'map_width'		=>	$width,
			'map_height'	=>	$height,
			);

	}

	return json_encode($object);

}   


function get_google_drive_directory_from_share_url($share_url) {

	$google_host = 'https://googledrive.com/host/';

	$query_str = parse_url($share_url, PHP_URL_QUERY);
	parse_str($query_str, $query_params);
	if(isset($query_params['id'])) {
		$drive_id = $query_params['id'];

		$google_host .= $drive_id;

		$ch = curl_init($google_host);
	    curl_setopt($ch, CURLOPT_NOBODY, 1);
	    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // follow redirects
	    curl_setopt($ch, CURLOPT_AUTOREFERER, 1); // set referer on redirect
	    curl_exec($ch);
	    $target = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
	    curl_close($ch);
	    if ($target)
	        return $target;
	    return false;
	}

	return $share_url;

}

function add_gigapixel_storymap_admin_scripts( $hook ) {

    global $post;

    if ( $hook == 'post-new.php' || $hook == 'post.php' ) {
        if ( 'gigapixel-slide' === $post->post_type ) {
        	wp_enqueue_style( 'leaflet', plugin_dir_url( __FILE__ ) . '/css/leaflet.css' );     
            wp_enqueue_script(  'leaflet', plugin_dir_url( __FILE__ ) . '/js/leaflet.min.js' );
            wp_enqueue_script(  'zoomify', plugin_dir_url( __FILE__ ) . '/js/zoomify.js' );
            // wp_enqueue_script(  'gigapixel_storymap', plugin_dir_url( __FILE__ ) . '/js/gigapixel-storymap-admin.js' );
            
        }
    }
}
add_action( 'admin_enqueue_scripts', 'add_gigapixel_storymap_admin_scripts', 10, 1 );

 ?>