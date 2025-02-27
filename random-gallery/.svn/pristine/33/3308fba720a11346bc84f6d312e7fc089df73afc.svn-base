<?php
/*
Plugin Name: Random Gallery Test
Description: Random Gallery displays a different subset of your images every time your page is refreshed.
License: GPLv2 or later
Author: David G
Author URI: https://www.greenwold.com/
Version: 00.08
*/
class dgplugins {
	// The random-gallery shortcode calls the function below, which scrambles the input and passes it to the standard gallery shortcode.
	// The standard gallery shortcode can be found in wp-includes/media.php.
	static function random_gallery($attr)  {
		foreach ($attr as &$ele) {
			$ele = sanitize_text_field($ele);
		}

		// create the list of image ids, either from ids or category
		if( isset($attr['ids']) ) {
			$ids_in = explode(",", $attr['ids']); // Split the ids string into an array.
		} else {
			// run a query on the category name to get an array of image objects
		  //  https://tomelliott.com/wordpress/get-posts-custom-taxonomies-terms
      $pics = get_posts(array(
        'post_type' => 'attachment',
				'nopaging' => true,
				'tax_query' => array(
            array(
              'taxonomy' => 'category',
              'field' => 'name',
              'terms' => $attr['category']
            )
          )
        )
			);
			// echo  count($pics);
			// pull the ID from each image object
			$ids_in = array();
			foreach ($pics as $pic) {
				array_push ( $ids_in, $pic->ID);
			}
		}

		$count_in = count($ids_in); // Get the length of the array (the number of ids).
		// Try to account for mistakes the user might make in entering shownum.
		if( !isset($attr['shownum']) || empty($attr['shownum']) || $attr['shownum'] < 1 || $attr['shownum'] > $count_in ) {
			$attr['shownum'] = $count_in;
		}

		// Create an array called $ids_out, which has a length equal to shownum and contains randomly selected values from $ids_in.
		// Use a helper array called $rand, which also has a length equal to shownum. For each index, use the intermediate variable $randi. Only append it to $rand if it has not yet been used.
		$rand[0] = mt_rand(0, $count_in - 1);
		$ids_out[0] = $ids_in[$rand[0]];
		for ($i = 1; $i < $attr['shownum']; $i++) {
			$randi = mt_rand(0, $count_in - 1);
			while (in_array($randi, $rand)) {
				$randi = mt_rand(0, $count_in - 1);
			}
			$rand[$i] = $randi;
			$ids_out[$i] = $ids_in[$rand[$i]];
		}
		// If size isn't defined and Jetpack Tiled Galleries are not enabled, the gallery won't show up.
		if( !isset($attr['size']) || empty($attr['size']) ) {
			$attr['size'] = "thumbnail";
		}

		// Create the chunks of the gallery shortcode
		$ids = 'ids="'.implode(",", $ids_out).'"';
		$columns = !empty($attr['columns']) ? 'columns="'.$attr['columns'].'"' : '';
		$size = !empty($attr['size']) ? 'size="'.$attr['size'].'"' : '';
		$link = !empty($attr['link']) ? 'link="'.$attr['link'].'"' : '';

		// Call the regular gallery shortcode.
		return do_shortcode(
			'[gallery'
			.' '.$ids
			.' '.$columns
			.' '.$size
			.' '.$link
			.' '.'orderby="rand"]'
		);
	}
}

// Create a shortcode that calls the function.
add_shortcode('random-gallery','dgplugins::random_gallery');
