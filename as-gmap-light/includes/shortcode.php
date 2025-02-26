<?php 

function AS_google_map_image_generator ($atts) {

	//defining default value
	$options = array(
			'width' => 300, 
			'height' => 300,
			'zoom' => 10,
			'latitude' => 23.900642,
			'longitude' => 89.130103,
			'marker_color' => '1000FF'
		);

	//getting shortcode attr
	$options = shortcode_atts($options, $atts);

	//extracting the value
	$options = extract($options);

	//generating the image 
	$map_image = " <img src='https://maps.googleapis.com/maps/api/staticmap?center=$latitude,$longitude&zoom=$zoom&size=$width"."x"."$height&maptype=roadmap&markers=color:0x$marker_color%7Clabel:A%7C$latitude,$longitude' />";
	
	//returning the image
	return $map_image;
	
}
add_shortcode ('AS_gmap', 'AS_google_map_image_generator');