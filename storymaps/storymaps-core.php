<?php 

if ( ! defined( 'ABSPATH' ) ) exit;

//spit out the storymap div from shortcode 
function storymap_block($atts) {

	$storymap = get_page_by_path($atts['name'],OBJECT,'storymap');

	$settings = false;
	$slides = false;

	if(isset($storymap->ID) && is_numeric($storymap->ID)) {

		if(isset($atts['fullscreen']) && $atts['fullscreen'] == 'true') {
			$width = '100%';
			$height = '800px';
		} else {

			$width = get_field('sm_width', $storymap->ID);
			if($width == null) {
				$width = '100%';
			}
			if(isset($atts['width'])) {
				$width = $atts['width'];
			}

			$height = get_field('sm_height', $storymap->ID);
			if($height == null) {
				$height = '500px';
			}
			if(isset($atts['height'])) {
				$width = $atts['height'];
			}

		}
		
		$font = get_field('sm_font', $storymap->ID);
		if($font == null) {
			$font = 'default';
		}

		$language = get_field('sm_language', $storymap->ID);

		$calculate_zoom = get_field('sm_calculate_field', $storymap->ID);
		$calculate_zoom = ($calculate_zoom != null) ? $calculate_zoom : false;

		$map_type = get_field('sm_map_type', $storymap->ID);

		$map_as_image = get_field('sm_map_as_image', $storymap->ID);
		$map_as_image = ($map_as_image != null) ? $map_as_image : false;

		$bg_colour = get_field('sm_background_colour', $storymap->ID);
		$bg_colour = ($bg_colour != null) ? $bg_colour : '#ffffff';

		$settings = array(
			'width'				=>	$width,
			'height'			=>	$height,
			'calculate_zoom'	=>	$calculate_zoom,
			'language'			=>	$language,
			'font'				=>	$font,
			'map_type'			=>	$map_type,
			'map_as_image'		=>	$map_as_image,
			'map_background_color'	=>	$bg_colour,
			);

		//get slides
		$slides = get_field('sm_storymap_slides', $storymap->ID);

		if(!empty($slides)) {
			$slides = get_storymap_slides($slides);

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

add_shortcode( 'storymap', 'storymap_block' );

function get_storymap_archive_overview_slide($category) {

	$has_overview_slide = get_field('smsc_optional_category_cover_slide', 'slide-category_'.$category->term_id);

	if($has_overview_slide != true) {
		return false;
	}

	$image = get_field('smsc_cover_slide_media_image', 'slide-category_'.$category->term_id);
	$image = ($image != null) ? wp_get_attachment_image_src($image) : false;

	$external = get_field('smsc_cover_slide_media_external_content', 'slide-category_'.$category->term_id);
	$external = ($external != null) ? $external : '';

	$media_url = ($image != false) ? $image : $external;

	$media_credit = get_field('smsc_cover_slide_media_credit', 'slide-category_'.$category->term_id);
	$media_credit = ($media_credit != null) ? $media_credit : false;

	$media_caption = get_field('smsc_cover_slide_media_caption', 'slide-category_'.$category->term_id);
	$media_caption = ($media_caption != null) ? $media_caption : false;

	$overview_slide = array(
		'text'		=>	array(
			'headline'	=>	$category->name,
			'text'		=>	$category->description,
			),
		'media'		=>	array(
			'url'		=>	$media_url,
			'credit'	=>	$media_credit,
			'caption'	=>	$media_caption
			),
		'type'	=> 'overview',
		);

	return $overview_slide;

}

//spit out the storymap archive div from shortcode 
function storymap_archive_block($atts) {

	global $wpdb;

	$category = get_term_by('name',$atts['slide_category'],'slide-category');

	$overview_slide = get_storymap_archive_overview_slide($category);

	$settings = false;
	$slides = false;

	if(isset($atts['fullscreen']) && $atts['fullscreen'] == 'true') {
		$width = '100%';
		$height = '800px';
	} else {
		$width = get_field('smsc_width', 'slide-category_'.$category->term_id);
		$height = get_field('smsc_height', 'slide-category_'.$category->term_id);
	}

	$font = get_field('smsc_font', 'slide-category_'.$category->term_id);
	$font = ($font != null) ? $font : 'default';

	$language = get_field('smsc_language', 'slide-category_'.$category->term_id);

	$calculate_zoom = get_field('smsc_calculate_field', 'slide-category_'.$category->term_id);
	$calculate_zoom = ($calculate_zoom != null) ? $calculate_zoom : false;

	$map_type = get_field('smsc_map_type', 'slide-category_'.$category->term_id);

	$map_as_image = get_field('smsc_map_as_image', 'slide-category_'.$category->term_id);
	$map_as_image = ($map_as_image != null) ? $map_as_image : false;

	$bg_colour = get_field('smsc_background_colour', $category->term_id);
	$bg_colour = ($bg_colour != null) ? $bg_colour : '#ffffff';

	$settings = array(
		'width'				=>	$width,
		'height'			=>	$height,
		'calculate_zoom'	=>	$calculate_zoom,
		'language'			=>	$language,
		'font'				=>	$font,
		'map_type'			=>	$map_type,
		'map_as_image'		=>	$map_as_image,
		'map_background_color'	=>	$bg_colour,
		);

	//get slides
	$args = array(
		'post_type'		=>	'storymap-slide',
		'tax_query' => array(
				array(
					'taxonomy' => 'slide-category',
					'field' => 'id',
					'terms' => $category->term_id
				)
			)
		);

	$slides = get_posts($args);

	if(!empty($slides)) {
		$slides = get_storymap_slides($slides);

		if($overview_slide != false) {
			array_unshift($slides, $overview_slide);
		}

		$slides = array(
			'storymap'	=> array('slides'	=>	$slides)
		);

		$div_id = 'storymap_x';

		if(isset($atts['id'])) {
			$div_id = $atts['id'];
		}

		echo '<link rel="stylesheet" type="text/css" href="//cdn.knightlab.com/libs/storymapjs/latest/css/fonts/font.'.$font.'.css" />';
		echo '<div id="'.$div_id.'" style="width:'.$settings['width'].'; height:'.$settings['height'].';"></div>';
		spit_storymap_javascript($settings, $slides, $div_id);

	} else {
		echo '<p>No Slides for Story Map</p>';

	}
	

}

add_shortcode( 'storymap_archive', 'storymap_archive_block' );


function get_storymap_slides($slides) {

	//get meta for slides
	foreach($slides as $post) {
		$meta = get_metadata('post', $post->ID);
		$post->meta = $meta;
	}

	//build slides object
	$object = array();
	foreach($slides as $key=>$slide) {

		$date = '';
		$date = get_field('sms_date', $slide->ID);
		$date = ($date != '') ? $date : '';

		$image = get_field('sms_media_image', $slide->ID);
		$image = ($image != null) ? wp_get_attachment_image_src($image) : false;

		$external = get_field('sms_media_external_content', $slide->ID);
		$external = ($external != null) ? $external : '';

		$media_url = ($image != false) ? $image : $external;

		$media_credit = get_field('sms_media_credit', $slide->ID);
		$media_credit = ($media_credit != null) ? $media_credit : false;

		$media_caption = get_field('sms_media_caption', $slide->ID);
		$media_caption = ($media_caption != null) ? $media_caption : false;

		$location = get_field('sms_location', $slide->ID);
		$longitude = ($location != null) ? $location['lng'] : '';
		$latitude = ($location != null) ? $location['lat'] : '';

		$location_name = get_field('sms_location_name', $slide->ID);
		$location_name = ($location_name != null) ? $location_name : false;

		$zoom_level = get_field('sms_zoom_level', $slide->ID);
		$zoom_level = ($zoom_level != null) ? $zoom_level : 14;

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

		$overview = get_field('sms_overview_slide', $slide->ID);
		if($overview == '1') {
			$object[$key]['type'] = 'overview';
		}

	}
	
	return $object;

}

//spit out the storymap init object
function spit_storymap_javascript($settings, $slides, $id='storymap_x') {
	$slides = json_encode($slides);
	$settings = json_encode($settings);
	include 'templates/storymap-javascript-template.php';
}

//load storymap library and styles
function storymap_external_resources() {
	wp_enqueue_style( 'storymap-stylesheet', 'https://cdn.knightlab.com/libs/storymapjs/latest/css/storymap.css' );
	wp_enqueue_script( 'storymap-javascript', 'https://cdn.knightlab.com/libs/storymapjs/latest/js/storymap-min.js', array(), '1.0.0', false );
}
add_action( 'wp_enqueue_scripts', 'storymap_external_resources' );

?>