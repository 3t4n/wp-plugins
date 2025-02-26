<?php

/****************
*
* AJAX get data functions
*
******************/

// It is not ideal that I need a separate function for each schema, but for now it will do


function aps_get_load_schema() {
	
//query the database for the BOOK table
global $wpdb; // this is how you get access to the database

$wpdb->aps_book = "{$wpdb->prefix}aps_book";
//$sql = $wpdb->prepare("SELECT * FROM {$wpdb->aps_book}");
//$logs = $wpdb->get_results($sql);
$logs = $wpdb->get_results("SELECT * FROM {$wpdb->aps_book}");

// Get the load dropdown selection
$needle = $_POST['aps_load_book_selection'];

// Loop through the multidimensional array to find the right sub array based on the drop down menu (its looking for the book save name)
//http://stackoverflow.com/questions/8102221/php-multidimensional-array-searching-find-key-by-specific-value   
   foreach($logs as $key => $product)
   {
      if ( $product->book_save_name === $needle ) {
         //echo $key;
		 $deanskey = $key;
	  }
   }


$aps_get_correct_array = $logs[$deanskey];


// this will convert database date format, to human readable
$dd = $aps_get_correct_array->book_pub_date;
$aps_human_date = date_i18n( get_option('date_format'), strtotime($dd) );
$aps_get_correct_array->book_pub_date = $aps_human_date;
//var_dump($tt);
//die();
// end date conversion

	//convert to array so can stripslashes
	$logs[$deanskey] = (array)$logs[$deanskey];
	
	//strip slashes
	foreach ($logs[$deanskey] as $key=>$value) {
	$logs[$deanskey][$key] = stripslashes($value);
	}
	//convert back to object as cant be arsed going through the code and swapping the ouputs to array versions
	$logs[$deanskey] = (object)$logs[$deanskey];

$post_data = json_encode(array('item' => $logs[$deanskey]));
echo $post_data;

	die(); // this is required to return a proper result
}
add_action('wp_ajax_aps_get_load_schema', 'aps_get_load_schema');




function aps_get_load_schema_event() {

//query the database for the event table
global $wpdb; // this is how you get access to the database

$wpdb->aps_event = "{$wpdb->prefix}aps_event";
//$sql = $wpdb->prepare("SELECT * FROM {$wpdb->aps_event}", get_the_ID());
//$logs = $wpdb->get_results($sql);
$logs = $wpdb->get_results("SELECT * FROM {$wpdb->aps_event}");


// Get the load dropdown selection
$needle = $_POST['aps_load_event_selection'];

// Loop through the multidimensional array to find the right sub array based on the drop down menu (its looking for the event save name)
//http://stackoverflow.com/questions/8102221/php-multidimensional-array-searching-find-key-by-specific-value   
   foreach($logs as $key => $product)
   {
      if ( $product->event_save_name === $needle ) {
         //echo $key;
		 $deanskey = $key;
	  }
   }

// need to stripslashes formt he database output.

	//convert to array so can stripslashes
	$logs[$deanskey] = (array)$logs[$deanskey];
	
	//strip slashes
	foreach ($logs[$deanskey] as $key=>$value) {
	$logs[$deanskey][$key] = stripslashes($value);
	}
	
	
		
	//sort the dates out back into human readbale format.
	$aps_current_wp_date_format = get_option( 'date_format' );
	
	$parsed_start_date = date($aps_current_wp_date_format, strtotime($logs[$deanskey]['event_start_date']));
	$parsed_end_date = date($aps_current_wp_date_format, strtotime($logs[$deanskey]['event_end_date']));
	
	$logs[$deanskey]['event_start_date'] = $parsed_start_date;
	$logs[$deanskey]['event_end_date'] = $parsed_end_date;
	
	
	
	//convert back to object as cant be arsed going through the code and swapping the ouputs to array versions
	$logs[$deanskey] = (object)$logs[$deanskey];

$post_data = json_encode(array('item' => $logs[$deanskey]));
echo $post_data;

	die(); // this is required to return a proper result
}
add_action('wp_ajax_aps_get_load_schema_event', 'aps_get_load_schema_event');



function aps_get_load_schema_movie() {

//query the database for the movie table
global $wpdb; // this is how you get access to the database

$wpdb->aps_movie = "{$wpdb->prefix}aps_movie";
//$sql = $wpdb->prepare("SELECT * FROM {$wpdb->aps_movie}", get_the_ID());
//$logs = $wpdb->get_results($sql);
$logs = $wpdb->get_results("SELECT * FROM {$wpdb->aps_movie}");


// Get the load dropdown selection
$needle = $_POST['aps_load_movie_selection'];

// Loop through the multidimensional array to find the right sub array based on the drop down menu (its looking for the movie save name)
//http://stackoverflow.com/questions/8102221/php-multidimensional-array-searching-find-key-by-specific-value   
   foreach($logs as $key => $product)
   {
      if ( $product->movie_save_name === $needle ) {
         //echo $key;
		 $deanskey = $key;
	  }
   }

$aps_unserialized_actors = unserialize($logs[$deanskey]->movie_actors);


//$post_data = json_encode(array('item' => $logs[$deanskey]));

$main_data = array('item' => $logs[$deanskey]);
$aps_unserialized_actors = (array) $aps_unserialized_actors;

$post_data = json_encode($main_data +$aps_unserialized_actors);



echo $post_data;

	exit(); // this is required to return a proper result
}
add_action('wp_ajax_aps_get_load_schema_movie', 'aps_get_load_schema_movie');





function aps_get_load_schema_organisation() {

//query the database for the organisation table
global $wpdb; // this is how you get access to the database

$wpdb->aps_organisation = "{$wpdb->prefix}aps_organisation";
//$sql = $wpdb->prepare("SELECT * FROM {$wpdb->aps_organisation}", get_the_ID());
//$logs = $wpdb->get_results($sql);
$logs = $wpdb->get_results("SELECT * FROM {$wpdb->aps_organisation}");


// Get the load dropdown selection
$needle = $_POST['aps_load_organisation_selection'];

// Loop through the multidimensional array to find the right sub array based on the drop down menu (its looking for the organisation save name)
//http://stackoverflow.com/questions/8102221/php-multidimensional-array-searching-find-key-by-specific-value   
   foreach($logs as $key => $product)
   {
      if ( $product->organisation_save_name === $needle ) {
         //echo $key;
		 $deanskey = $key;
	  }
   }

// need to stripslashes formt he database output.

	//convert to array so can stripslashes
	$logs[$deanskey] = (array)$logs[$deanskey];
	
	//strip slashes
	foreach ($logs[$deanskey] as $key=>$value) {
	$logs[$deanskey][$key] = stripslashes($value);
	}
	
	
	//convert back to object as cant be arsed going through the code and swapping the ouputs to array versions
	$logs[$deanskey] = (object)$logs[$deanskey];

$post_data = json_encode(array('item' => $logs[$deanskey]));
echo $post_data;

	die(); // this is required to return a proper result
}
add_action('wp_ajax_aps_get_load_schema_organisation', 'aps_get_load_schema_organisation');




function aps_get_load_schema_person() {
	
//query the database for the person table
global $wpdb; // this is how you get access to the database

$wpdb->aps_person = "{$wpdb->prefix}aps_person";
//$sql = $wpdb->prepare("SELECT * FROM {$wpdb->aps_person}");
//$logs = $wpdb->get_results($sql);
$logs = $wpdb->get_results("SELECT * FROM {$wpdb->aps_person}");

// Get the load dropdown selection
$needle = $_POST['aps_load_person_selection'];

// Loop through the multidimensional array to find the right sub array based on the drop down menu (its looking for the person save name)
//http://stackoverflow.com/questions/8102221/php-multidimensional-array-searching-find-key-by-specific-value   
   foreach($logs as $key => $product)
   {
      if ( $product->person_save_name === $needle ) {
         //echo $key;
		 $deanskey = $key;
	  }
   }


$aps_get_correct_array = $logs[$deanskey];


// this will convert database date format, to human readable
$dd = $aps_get_correct_array->person_birthday;
$aps_human_date = date_i18n( get_option('date_format'), strtotime($dd) );
$aps_get_correct_array->person_birthday = $aps_human_date;
//var_dump($tt);
//die();
// end date conversion

	//convert to array so can stripslashes
	$logs[$deanskey] = (array)$logs[$deanskey];
	
	//strip slashes
	foreach ($logs[$deanskey] as $key=>$value) {
	$logs[$deanskey][$key] = stripslashes($value);
	}
	//convert back to object as cant be arsed going through the code and swapping the ouputs to array versions
	$logs[$deanskey] = (object)$logs[$deanskey];

$post_data = json_encode(array('item' => $logs[$deanskey]));
echo $post_data;

	die(); // this is required to return a proper result
}
add_action('wp_ajax_aps_get_load_schema_person', 'aps_get_load_schema_person');





function aps_get_load_schema_product() {
	
//query the database for the product table
global $wpdb; // this is how you get access to the database

$wpdb->aps_product = "{$wpdb->prefix}aps_product";
//$sql = $wpdb->prepare("SELECT * FROM {$wpdb->aps_product}");
//$logs = $wpdb->get_results($sql);
$logs = $wpdb->get_results("SELECT * FROM {$wpdb->aps_product}");

// Get the load dropdown selection
$needle = $_POST['aps_load_product_selection'];

// Loop through the multidimensional array to find the right sub array based on the drop down menu (its looking for the product save name)
//http://stackoverflow.com/questions/8102221/php-multidimensional-array-searching-find-key-by-specific-value   
   foreach($logs as $key => $product)
   {
      if ( $product->product_save_name === $needle ) {
         //echo $key;
		 $deanskey = $key;
	  }
   }


$aps_get_correct_array = $logs[$deanskey];

	//convert to array so can stripslashes
	$logs[$deanskey] = (array)$logs[$deanskey];
	
	//strip slashes
	foreach ($logs[$deanskey] as $key=>$value) {
	$logs[$deanskey][$key] = stripslashes($value);
	}
	//convert back to object as cant be arsed going through the code and swapping the ouputs to array versions
	$logs[$deanskey] = (object)$logs[$deanskey];

$post_data = json_encode(array('item' => $logs[$deanskey]));
echo $post_data;

	die(); // this is required to return a proper result
}
add_action('wp_ajax_aps_get_load_schema_product', 'aps_get_load_schema_product');





function aps_get_load_schema_recipe() {
	
//query the database for the recipe table
global $wpdb; // this is how you get access to the database

$wpdb->aps_recipe = "{$wpdb->prefix}aps_recipe";
//$sql = $wpdb->prepare("SELECT * FROM {$wpdb->aps_recipe}");
//$logs = $wpdb->get_results($sql);
$logs = $wpdb->get_results("SELECT * FROM {$wpdb->aps_recipe}");

// Get the load dropdown selection
$needle = $_POST['aps_load_recipe_selection'];

// Loop through the multidimensional array to find the right sub array based on the drop down menu (its looking for the recipe save name)
//http://stackoverflow.com/questions/8102221/php-multidimensional-array-searching-find-key-by-specific-value   
   foreach($logs as $key => $recipe)
   {
      if ( $recipe->recipe_save_name === $needle ) {
         //echo $key;
		 $deanskey = $key;
	  }
   }


$aps_unserialized_ingredients = unserialize($logs[$deanskey]->recipe_ingredients);


$aps_get_correct_array = $logs[$deanskey];


// this will convert database date format, to human readable
$dd = $aps_get_correct_array->recipe_pub_date;
$aps_human_date = date_i18n( get_option('date_format'), strtotime($dd) );
$aps_get_correct_array->recipe_pub_date = $aps_human_date;
//var_dump($tt);
//die();
// end date conversion

	//convert to array so can stripslashes
	$logs[$deanskey] = (array)$logs[$deanskey];
	
	//strip slashes
	foreach ($logs[$deanskey] as $key=>$value) {
	$logs[$deanskey][$key] = stripslashes($value);
	}
	//convert back to object as cant be arsed going through the code and swapping the ouputs to array versions
	$logs[$deanskey] = (object)$logs[$deanskey];







//$post_data = json_encode(array('item' => $logs[$deanskey]));

$main_data = array('item' => $logs[$deanskey]);
$aps_unserialized_ingredients = (array) $aps_unserialized_ingredients;

$post_data = json_encode($main_data +$aps_unserialized_ingredients);





//$post_data = json_encode(array('item' => $logs[$deanskey]));
echo $post_data;

	die(); // this is required to return a proper result
}
add_action('wp_ajax_aps_get_load_schema_recipe', 'aps_get_load_schema_recipe');






function aps_get_load_schema_review() {
	
//query the database for the review table
global $wpdb; // this is how you get access to the database

$wpdb->aps_review = "{$wpdb->prefix}aps_review";
//$sql = $wpdb->prepare("SELECT * FROM {$wpdb->aps_review}");
//$logs = $wpdb->get_results($sql);
$logs = $wpdb->get_results("SELECT * FROM {$wpdb->aps_review}");

// Get the load dropdown selection
$needle = $_POST['aps_load_review_selection'];

// Loop through the multidimensional array to find the right sub array based on the drop down menu (its looking for the review save name)
//http://stackoverflow.com/questions/8102221/php-multidimensional-array-searching-find-key-by-specific-value   
   foreach($logs as $key => $product)
   {
      if ( $product->review_save_name === $needle ) {
         //echo $key;
		 $deanskey = $key;
	  }
   }


$aps_get_correct_array = $logs[$deanskey];


// this will convert database date format, to human readable
$dd = $aps_get_correct_array->review_pub_date;
$aps_human_date = date_i18n( get_option('date_format'), strtotime($dd) );
$aps_get_correct_array->review_pub_date = $aps_human_date;
//var_dump($tt);
//die();
// end date conversion

	//convert to array so can stripslashes
	$logs[$deanskey] = (array)$logs[$deanskey];
	
	//strip slashes
	foreach ($logs[$deanskey] as $key=>$value) {
	$logs[$deanskey][$key] = stripslashes($value);
	}
	//convert back to object as cant be arsed going through the code and swapping the ouputs to array versions
	$logs[$deanskey] = (object)$logs[$deanskey];

$post_data = json_encode(array('item' => $logs[$deanskey]));
echo $post_data;

	die(); // this is required to return a proper result
}
add_action('wp_ajax_aps_get_load_schema_review', 'aps_get_load_schema_review');




// END OF LOAD SCHEMAS

