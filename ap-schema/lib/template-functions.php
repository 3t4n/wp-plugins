<?php

/**

 * Template functions for this plugin

 * 

 * Place all functions that may be usable in theme template files here.

 * 

 * @package AP Schema

 * 

 * @author dean robinson

 * @version 1.1.0

 * @since 1.1.0

 */





$aps_style_option_all = get_option( '_ap-schema--options' );

if(isset($aps_style_option_all['allowshortcodes'])) {
$aps_shortcode_option = $aps_style_option_all['allowshortcodes'];
} else {
$aps_shortcode_option = FALSE;	
}
	

/*

* allow shortcodes in text widgets

*

*******************************************************************/

if (!is_admin() && $aps_shortcode_option != FALSE) {
	add_filter('widget_text', 'do_shortcode');

}


/*****************

*

* load the front end css 

*

******************/



function aps_load_front_end_css() {

	



		$aps_style_option_all = get_option( '_ap-schema--options' );

		$aps_style_option = $aps_style_option_all['styles'];

		

		

		if($aps_style_option == 'basic') {

			wp_enqueue_style( 'aps-front-default', APSCHEMA_URLPATH . "/css/aps_frontend_default.css" );

		} elseif ($aps_style_option == 'green') {

			wp_enqueue_style( 'aps-front-green', APSCHEMA_URLPATH . "/css/aps_frontend_green.css" );

		} elseif ($aps_style_option == 'lightblue') {

			wp_enqueue_style( 'aps-front-lightblue', APSCHEMA_URLPATH . "/css/aps_frontend_lightblue.css" );

		} elseif ($aps_style_option == 'orange') {

			wp_enqueue_style( 'aps-front-orange', APSCHEMA_URLPATH . "/css/aps_frontend_orange.css" );

		} elseif ($aps_style_option == 'paleyellow') {

			wp_enqueue_style( 'aps-front-paleyellow', APSCHEMA_URLPATH . "/css/aps_frontend_paleyellow.css" );

		} elseif ($aps_style_option == 'redpink') {

			wp_enqueue_style( 'aps-front-redpink', APSCHEMA_URLPATH . "/css/aps_frontend_redpink.css" );

		} elseif ($aps_style_option == 'silvergrey') {

			wp_enqueue_style( 'aps-front-silvergrey', APSCHEMA_URLPATH . "/css/aps_frontend_silvergrey.css" );

		} elseif ($aps_style_option == 'turquoise') {

			wp_enqueue_style( 'aps-front-turquoise', APSCHEMA_URLPATH . "/css/aps_frontend_turquoise.css" );

		} else {

			echo "Error - no front end stylesheet defined.";

		}



}

add_action('wp_head', 'aps_load_front_end_css', 10, 1 );







/*

* Supposedly adding itemscope and type, but type wont work.

*

*********************************************************************/



function aps_add_itemscope_body($classes) {

	$classes[] = 'itemscope';

	$classes[] = 'itemtype="http://schema.org/WebPage"';

	return $classes;

	// itemtype="http://schema.org/WebPage"

}

add_filter('body_class','aps_add_itemscope_body');





/**

*

* Add float

*

*********/

function aps_float_func() {



$aps_float_option_all = get_option( '_ap-schema--options' );

$aps_float_option = $aps_float_option_all['aps_float'];



	if ($aps_float_option == 'left') {

		

		echo '<style>#content .aps_container { float: left; }</style>';

		

	} elseif ($aps_float_option == 'center') {

		

		echo '<style>#content .aps_container { margin:0 auto; }</style>';

		

	} elseif ($aps_float_option == 'right') {

		

		echo '<style>#content .aps_container { float: right; }</style>';

		

	} else {

	}



}

add_action('wp_head', 'aps_float_func', 10, 1);

/**

*

* Add width

*

*********/

function aps_width_func() {



$aps_width_option_all = get_option( '_ap-schema--options' );

$aps_width_option = $aps_width_option_all['aps_width'];



	if ($aps_width_option !== '') {

		

		echo '<style>#content .aps_container { width: ' . $aps_width_option . ' }</style>';

		

	} 



}

add_action('wp_head', 'aps_width_func', 10, 1);






/*

* shortcodes

*

******************************************************************/

function aps_pretty_date($date) {

	$aps_users_date_format = get_option('date_format');
	
	$newDate = date($aps_users_date_format, strtotime($date));

	return $newDate;
}



function aps_schema_shortcodes( $atts, $content = null)	{

	$aps_style_option_all = get_option( '_ap-schema--options' );
	
	$aps_google_id = $aps_style_option_all['aps_google_id'];
	
	global $wpdb;
	
	extract( shortcode_atts( array(								 
	
					'type' => '',
	
					'name' => ''
	
	
				), $atts 
	
			) 
	
		);


	$tablename = $wpdb->prefix . "aps_" . "$type";
	
	$save_name = $type . "_save_name";

$name = addslashes($name);

	//$aps_get_schema_data = $wpdb->get_row("SELECT * FROM $tablename WHERE $save_name = '$name'");
	
	$aps_get_schema_data = $wpdb->get_row(
										  $wpdb->prepare(
														 "
														 SELECT * 
														 FROM $tablename 
														 WHERE $save_name = %s
														 ",
														 $name
														 )
										  );


	//convert to array so can stripslashes
	$aps_get_schema_data = (array)$aps_get_schema_data;
	
	//strip slashes
	foreach ($aps_get_schema_data as $key=>$value) {
	$aps_get_schema_data[$key] = stripslashes($value);
	}
	//convert back to object as cant be arsed going through the code and swapping the ouputs to array versions
	$aps_get_schema_data = (object)$aps_get_schema_data;
	
	//var_dump($aps_get_schema_data);

	

	if ($type == "book") {
	
			$originalDate = $aps_get_schema_data->book_pub_date;
			$aps_new_pretty_date = aps_pretty_date($originalDate); 


			$aps_book_return = '<div class="aps_book_container aps_container" itemscope itemtype="http://schema.org/Book">';
			
			$aps_book_return .= '<h1 class="aps_book_name" itemprop="name">' . $aps_get_schema_data->book_name . '</h1>';
			
			$aps_book_return .= '<h2 class="aps_book_author" itemprop="author">' . $aps_get_schema_data->book_author . '</h2>';
			
			$aps_book_return .= '<p class="aps_book_genreformat"><span class="aps_book_genre" itemprop="genre">' . $aps_get_schema_data->book_genre .'</span> <span class="aps_book_format" itemprop="bookFormat">' . $aps_get_schema_data->book_format . '</span></p>';
			
			$aps_book_return .=	'<p class="aps_book_website" itemprop="url"><a href="' . $aps_get_schema_data->book_url . '" />' . $aps_get_schema_data->book_url . '</a></p>';
			
			$aps_book_return .= '<p class="aps_book_description" itemprop="description">' . $aps_get_schema_data->book_desc . '</p>';
			
			$aps_book_return .= '<p class="aps_book_meta"><span class="aps_book_publisher aps_book_separator" itemprop="publisher">' . $aps_get_schema_data->book_publisher .'</span><span class="aps_book_pubdate aps_book_separator" itemprop="datePublished" content="' . $originalDate . '">' . $aps_new_pretty_date . '</span><span class="aps_book_isbn aps_book_separator" itemprop="isbn">' . $aps_get_schema_data->book_isbn .'</span><span class="aps_book_edition aps_book_separator" itemprop="bookEdition">' . $aps_get_schema_data->book_edition . '</span>';
			
			$aps_book_return .= '<a href="http://plus.google.com/' . $aps_google_id . '?rel=author"><p class="aps_book_review_by itemprop="author"">' . $aps_get_schema_data->book_review_by . '</p></a>';
			
			$aps_book_return .= '</div>';
			
			return $aps_book_return;
	
	} // end if book
	 

	if ($type == "event") {


			$aps_new_pretty_date_start = aps_pretty_date($aps_get_schema_data->event_start_date); 
			$aps_new_pretty_date_end = aps_pretty_date($aps_get_schema_data->event_end_date); 


			$aps_event_type_header = str_replace(' ', '', $aps_get_schema_data->event_type);
		
			$aps_event_return = '<div class="aps_event_container aps_container" itemscope itemtype="http://schema.org/' . $aps_event_type_header . 'Event">';
		
			$aps_event_return .= '<h1 class="aps_event_name " itemprop="name">' . $aps_get_schema_data->event_name . '</h1>';
		
			$aps_event_return .= '<h2 class="aps_event_website " itemprop="url"><a href="' . $aps_get_schema_data->event_url . '">' . $aps_get_schema_data->event_url . '</a></h2>';
		
			$aps_event_return .= '<p class="aps_event_meta">Type: <span class="aps_event_type aps_event_separator" >' . $aps_get_schema_data->event_type .'</span>Date: <span class="aps_event_start_date aps_event_separator" itemprop="startDate">' . $aps_new_pretty_date_start .'</span><span class="aps_event_end_date aps_event_separator" itemprop="endDate">' . $aps_new_pretty_date_end . '</span> Time: <span class="aps_event_start_time " >' . $aps_get_schema_data->event_start_time . '</span> - <span class="aps_event_end_time aps_event_separator" >' . $aps_get_schema_data->event_end_time . '</span> Duration: <span class="aps_event_duration " itemprop="duration" >' . $aps_get_schema_data->event_duration . '</p>';
		
			$aps_event_return .= '<p class="aps_event_description" itemprop="description">' . $aps_get_schema_data->event_desc . '</p>';
		
			$aps_event_return .= '<span itemscope itemtype="http://schema.org/Place"><p class="aps_event_address_p " itemprop="" ><span class="aps_event_address " itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress"><span itemprop="streetAddress">' . $aps_get_schema_data->event_address .'</span>, <span itemprop="postOfficeBoxNumber">'. $aps_get_schema_data->event_pobox .'</span>, <span itemprop="addressLocality">'. $aps_get_schema_data->event_city .'</span>, <span itemprop="addressRegion">'. $aps_get_schema_data->event_region .'</span>, <span itemprop="postalCode">'. $aps_get_schema_data->event_postalcode .'</span>, <span itemprop="addressCountry">'. $aps_get_schema_data->event_country .'</span> '. '</span></p>';
		
			$aps_event_return .= '<p class="aps_event_contact" itemscope itemtype="http://schema.org/ContactPoint"><span class="aps_event_email " itemprop="email">' . $aps_get_schema_data->event_email . '</span> <span class="aps_event_telephone " itemprop="telephone">' . $aps_get_schema_data->event_phone . '</span></p><span>';
		
			$aps_event_return .= '<a href="http://plus.google.com/' . $aps_google_id . '?rel=author"><p class="aps_event_review_by">' . $aps_get_schema_data->event_review_by . '</p></a>';
		
			$aps_event_return .= '</div>';
		
			return $aps_event_return;
	
		
	} //end if event
	
	
	
	if ($type == "movie") {
	
			//$aps_movie_actors = explode(',', $aps_movie_actors);
		
			$aps_show_actors = "";
			$aps_show_actors_get_data = unserialize($aps_get_schema_data->movie_actors);
						
			
			foreach ($aps_show_actors_get_data as $actors) {
				if($actors['value'] != '') {
					$aps_show_actors .= '<span itemprop="actor" itemscope itemtype="http://schema.org/Person"><span itemprop="name">' . $actors['value'] . '</span></span><br />';
				}
			}
			
			
			$aps_movie_return = '<div class="aps_movie_container aps_container" itemscope itemtype="http://schema.org/Movie">';
			$aps_movie_return .= '<h1 class="aps_movie_name " itemprop="name">' . $aps_get_schema_data->movie_name . '</h1>';
			//add in genre?
			$aps_movie_return .= '<p class="aps_movie_website " itemprop="url"><a href="' . $aps_get_schema_data->movie_url . '">' . $aps_get_schema_data->movie_url . '</a></p>';
			$aps_movie_return .= '<p class="aps_movie_description " itemprop="description">' . $aps_get_schema_data->movie_desc . '</p>';
			$aps_movie_return .= '<span class="aps_movie_meta"><p><span class="aps_movie_director aps_movie_separator" itemprop="director" itemscope itemtype="http://schema.org/Person" ><span class="aps_movie_director_label">' . __('Director:', 'ap-schema') . ' </span><span itemprop="name" >' . $aps_get_schema_data->movie_director .'</span></span><span class="aps_movie_producer  " itemprop="producer"  itemscope itemtype="http://schema.org/Person"><span class="aps_movie_producer_label">' . __("Producer:", "ap-schema") . ' </span><span itemprop="name">' . $aps_get_schema_data->movie_producer . '</span></span></p>';
			$aps_movie_return .= '<p class="aps_movie_actors "><span class="aps_movie_actors_label">' . __("Actors", "ap-schema") . '<br /></span>' . $aps_show_actors . '</p></span>';
			$aps_movie_return .= '<p class="aps_movie_review_by"><a href="http://plus.google.com/' . $aps_google_id . '?rel=author">' . $aps_get_schema_data->movie_review_by . '</a></p>';
			$aps_movie_return .= '</div>';
		
			return $aps_movie_return;
		
	} //end if movie



	if ($type == "organisation") {

	$aps_org_type_header = str_replace(' ', '', $aps_get_schema_data->organisation_type);

	$aps_organisation_return = '<div class="aps_organisation_container aps_container" itemscope itemtype="http://schema.org/' . $aps_org_type_header . 'Organization">';
	$aps_organisation_return .= '<h1 class="aps_organisation_name " itemprop="name">' . $aps_get_schema_data->organisation_name . '</h1>';
	$aps_organisation_return .= '<h2 class="aps_organisation_website " itemprop="url"><a href="' . $aps_get_schema_data->organisation_url . '">' . $aps_get_schema_data->organisation_url . '</a></h2>';
	$aps_organisation_return .= '<a href="' . $aps_get_schema_data->organisation_url . '"><img class="aps_organisation_logo" itemprop="logo" src="' . $aps_get_schema_data->organisation_logo . '" /></a>';
	$aps_organisation_return .= '<p class="aps_organisation_type " itemprop="type">' . $aps_get_schema_data->organisation_type . '</p>';
	$aps_organisation_return .= '<p class="aps_organisation_description " itemprop="description">' . $aps_get_schema_data->organisation_desc . '</p>';

	$aps_organisation_return .= '<p class="aps_organisation_location" itemprop="PostalAddress" class="aps_organisation_address "><span itemprop="streetAddress">' . $aps_get_schema_data->organisation_address .'</span>, <span itemprop="postOfficeBoxNumber">'. $aps_get_schema_data->organisation_pobox .'</span>, <span itemprop="addressLocality">'. $aps_get_schema_data->organisation_city .'</span>, <span itemprop="addressRegion">'. $aps_get_schema_data->organisation_region .'</span>, <span itemprop="postalCode">'. $aps_get_schema_data->organisation_postalcode .'</span>, <span itemprop="addressCountry">'. $aps_get_schema_data->organisation_country .'</span></p>';

	$aps_organisation_return .= '<p class="aps_organisation_contact"><span class="aps_organization_email_label">' . __("Email:", "ap-schema") . ' </span><span class="aps_organisation_email aps_organisation_separator" itemprop="email">' . $aps_get_schema_data->organisation_email . '</span> <span class="aps_organization_phone_label">' . __("Phone:", "ap-schema") . ' </span><span class="aps_organisation_telephone aps_organisation_separator" itemprop="telephone">' . $aps_get_schema_data->organisation_phone . '</span> <span class="aps_organization_fax_label">' . __("Fax:", "ap-schema") . ' </span><span class="aps_organisation_fax " itemprop="faxNumber">' . $aps_get_schema_data->organisation_fax . '</span></p>';

			$aps_organisation_return .= '<a href="http://plus.google.com/' . $aps_google_id . '?rel=author"><p class="aps_organisation_review_by">' . $aps_get_schema_data->organisation_review_by . '</p></a>';
	$aps_organisation_return .= '</div>';
	return $aps_organisation_return;



	} // end if organisation



	if ($type == "person") {


	$aps_person_return = '<div class="aps_person_container aps_container" itemscope itemtype="http://schema.org/Person">';

	// create a default image, in case neither email nor url are added - in this case a 1x1 px transparent png
	//get image location

	$aps_gravatar_default = APSCHEMA_URLPATH . "/images/gravatar_dot.png";
	$aps_gravatar_default =  urlencode( $aps_gravatar_default );

				
	$aps_new_pretty_date_birth = aps_pretty_date($aps_get_schema_data->person_birthday); 


	// only one can rule! in this case url trumps email

	if($aps_get_schema_data->person_photo_url != '' && $aps_get_schema_data->person_email != '')  {
		$aps_get_schema_data->person_email = "";
	} else  { $aps_get_schema_data->person_email = $aps_get_schema_data->person_email; }
	

	//now depending on what source we have show that as image or if no source, show nothing.

	if($aps_get_schema_data->person_photo_url != '' && $aps_get_schema_data->person_email == '') { 

			$aps_person_return .= '<img class="aps_person_image" itemprop="image" src="' . $aps_get_schema_data->person_photo_url . '" />';

	} elseif ($aps_get_schema_data->person_email != '' && $aps_get_schema_data->person_photo_url == '') { 
			$aps_gravatar_email = md5( strtolower( trim( $aps_get_schema_data->person_email ) ) );

			$aps_person_return .= '<img class="aps_person_image" itemprop="image" src="http://www.gravatar.com/avatar/' . $aps_gravatar_email . '?d=' . $aps_gravatar_default . '" />';

	} else { echo ''; }

	$aps_person_return .= '<h1 class="aps_person_name" itemprop="name">' . $aps_get_schema_data->person_name . '</h1>';
	$aps_person_return .= '<h2 class="aps_person_organisation" itemscope itemtype="http://schema.org/Organization"><span class="aps_person_works_for_label">' . __("Works for:", "ap-schema") . ' </span><span itemprop="name">' . $aps_get_schema_data->person_org . '</span></h2>';
	$aps_person_return .= '<p class="aps_person_job_title" itemprop="jobtitle"><span class="aps_person_job_title_label">' . __("Role:", "ap-schema") . ' </span>' . $aps_get_schema_data->person_job_title . '</p>';
	$aps_person_return .= '<p class="aps_person_website" itemprop="url"><a href="' . $aps_get_schema_data->person_url . '">' . $aps_get_schema_data->person_url . '</a></p>';
	$aps_person_return .= '<p class="aps_person_description" itemprop="description">' . sanitize_text_field($aps_get_schema_data->person_desc) . '</p>';
	$aps_person_return .= '<p class="aps_person_birthday" itemprop="birthDate"><span class="aps_person_birthday_label">' . __("Birthday:", "ap-schema") . ' </span>' . $aps_new_pretty_date_birth . '</p>';
	$aps_person_return .= '<p class=".aps_person_location" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress"><span class="aps_person_address" itemprop="streetAddress">' . $aps_get_schema_data->person_address .'</span>, <span itemprop="postOfficeBoxNumber">'. $aps_get_schema_data->person_pobox .'</span>, <span itemprop="addressLocality">'. $aps_get_schema_data->person_city .'</span>, <span itemprop="addressRegion">'. $aps_get_schema_data->person_region .'</span>, <span itemprop="postalCode">'. $aps_get_schema_data->person_postalcode .'</span>, <span itemprop="addressCountry">'. $aps_get_schema_data->person_country .'</span>, '. '</span></p>';

	$aps_person_return .= '<p class="aps_person_contact"><span class="aps_person_email_label">' . __("Email:", "ap-schema") . ' </span><span class="aps_person_email aps_person_separator" itemprop="email">' . $aps_get_schema_data->person_email . '</span> <span class="aps_person_phone_label">' . __("Phone:", "ap-schema") . ' </span><span class="aps_person_telephone aps_person_separator" itemprop="telephone">' . $aps_get_schema_data->person_phone . '</span><span class="aps_person_fax_label">' . __("Fax:", "ap-schema") . ' </span><span class="aps_person_fax" itemprop="faxNumber">' . $aps_get_schema_data->person_fax . '</span></p>';
		$aps_person_return .= '<a href="http://plus.google.com/' . $aps_google_id . '?rel=author"><p class="aps_person_review_by">' . $aps_get_schema_data->person_review_by . '</p></a>';
	$aps_person_return .= '</div>';

	return $aps_person_return;



	} // end if person




	if ($type == "product") {
	

	//get the star option

	$aps_star_option = get_option( '_ap-schema--options' );

	$aps_star_option = $aps_star_option['reviewicons'];

	if($aps_get_schema_data->product_startype == '') { $aps_get_schema_data->product_startype = $aps_star_option;}

	

	//get the currency symbol

	$aps_price_option = get_option( '_ap-schema--options' );

	$aps_price_option = $aps_price_option['aps_price'];



	//get the star size

	$aps_starsize_option = get_option( '_ap-schema--options' );

	$aps_starsize_option = $aps_starsize_option['reviewicons_size'];

	

	if ($aps_starsize_option == '') {$aps_starsize_option = '32';}





/***********************

*

* Star generation

*

**********************/



	//set defaults

	$aps_product_avg_rating = $aps_get_schema_data->product_avg_rating;

	$aps_nearest_half = '';

	$aps_decimal = '';

	
	//round to neareast half

	//https://forums.digitalpoint.com/threads/round-number-to-nearest-half.943055/

	if($aps_product_avg_rating >= ($half = ($ceil = ceil($aps_product_avg_rating))- 0.5) + 0.25) {

		$aps_nearest_half = $ceil;

	} else if($aps_product_avg_rating < $half - 0.25) {

		$aps_nearest_half = floor($aps_product_avg_rating); }

	 else {$aps_nearest_half = $half; }

	

	//get the decimal check variable set

	$aps_decimal = $aps_nearest_half;

	

	//floor the nearest half variable

	$aps_floored_nearest_half = floor($aps_nearest_half);

	

	//generate stars based on floored value

	$star_list = ""; //set variable

	$star_url = '<img width="' . $aps_starsize_option . 'px" src="' . APSCHEMA_URLPATH . '/images/icons/' . $aps_get_schema_data->product_startype . '.png" />';

	$i = 0;

	$max_count = $aps_floored_nearest_half;
	
	//// Lets max the count out at 100 so people dont add in stupid numbers and crash their site ////
	if ( $max_count > 100 ) { $max_count = 100; }
	/////////////////////////////////////////////////////////////////////////////////////////////////
	
		while ($i < $max_count ) {

		   $star_list .= $star_url . '';

		   ++$i;

		}

	//check if there is a decimal place - not that fucking easy as the ceil/floor return a float, even if the actual number is a whole number!

	//http://stackoverflow.com/questions/11041590/whole-number-or-decimal-number

	if ( is_numeric( $aps_decimal ) && strpos( $aps_decimal, '.' ) === false ) { $aps_decimal = "false";} else { $aps_decimal = "true";}

	if($aps_decimal === "true") { $star_list .= '<img width="' . $aps_starsize_option . 'px" src="' . APSCHEMA_URLPATH . '/images/icons/' . $aps_get_schema_data->product_startype . '_half.png" />'; }	

	//top score possible
	//need a new setting for products i think!
	$aps_product_top_score = $aps_get_schema_data->product_max_score;

	//get the empty star count
	$aps_empty_starcount = $aps_product_top_score - $aps_nearest_half;

	$aps_empty_starcount = floor($aps_empty_starcount);


	//// Lets max the count out at 100 so people dont add in stupid numbers and crash their site ////
	if ( $aps_empty_starcount > 100 ) { $aps_empty_starcount = 100; }
	/////////////////////////////////////////////////////////////////////////////////////////////////



	//add emtpy stars

		$empty_star_url = '<img width="' . $aps_starsize_option . 'px" src="' . APSCHEMA_URLPATH . '/images/icons/' . $aps_get_schema_data->product_startype . '_empty.png" />';

		$i = 0;

		$empty_max_count = $aps_empty_starcount;

			while ($i < $empty_max_count ) {

			   $star_list .= $empty_star_url . '';

			   ++$i;

			}


// END OF STAR GENERATION


	$aps_product_return = '<div class="aps_product_container aps_container" itemscope itemtype="http://schema.org/Product">';
	$aps_product_return .= '<a href="' . $aps_get_schema_data->product_affiliate_url . '"><h1 class="aps_product_name"><span itemprop="name">' . $aps_get_schema_data->product_name . '</span> <span class="aps_product_model" itemprop="model">' . $aps_get_schema_data->product_model . '</span></h1></a>';
	$aps_product_return .= '<h2 class="aps_product_brand"><span itemprop="brand"><span itemprop="name">' . $aps_get_schema_data->product_brand . '</span></span> <span class="aps_product_manufacturer" itemprop="manufacturer" itemscope itemtype="http://schema.org/Organization"><span itemprop="name">' . $aps_get_schema_data->product_manufacturer . '</span></span></h2>';
	$aps_product_return .= '<p class="aps_product_website" itemprop="url"><a href="' . $aps_get_schema_data->product_url . '">' . $aps_get_schema_data->product_url . '</a></p>';
	$aps_product_return .= '<a href="' . $aps_get_schema_data->product_affiliate_url . '"><img class="aps_product_image_url" itemprop="image" src="' . $aps_get_schema_data->product_image_url . '" /></a>';
	$aps_product_return .= '<p class="aps_product_description" itemprop="description" itemprop="review" >' . $aps_get_schema_data->product_desc . '</p>';

	//if number show number wording, else images
	if($aps_get_schema_data->product_startype == 'numeric') {

		$aps_product_return .= '<p class="aps_product_startype" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating"><span itemprop="ratingValue"><span class="aps_product_avg_rating_label">' . __("Rating:", "ap-schema") . ' </span>' . $aps_get_schema_data->product_avg_rating . '</span> <span itemprop="reviewCount">' . $aps_get_schema_data->product_no_reviews . '</span> <span class="aps_product_number_ratings_label">' . __(" votes cast", "ap-schema") . '</span></p>';		

	} else {

		$aps_product_return .= '<p class="aps_product_startype" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">' . $star_list . ' <span itemprop="ratingValue" class="aps_rating_value" ><span class="aps_product_avg_rating_label">' . __("Rating:", "ap-schema") . ' </span>' . $aps_get_schema_data->product_avg_rating . ' </span> <span itemprop="reviewCount" title="Rating: ' . $aps_get_schema_data->product_avg_rating . ' from '. $aps_get_schema_data->product_no_reviews .' reviews"><span class="aps_product_avg_rating_label">' . __("Reviews:", "ap-schema") . ' </span>' . $aps_get_schema_data->product_no_reviews . ' </span></p>';

	}

	$aps_product_return .= '<p class="aps_product_price" itemscope itemtype="http://schema.org/Offer" ><label class="aps_product_price_label">' . __("Price:", "ap-schema") . ' </label><span itemprop="price">' . $aps_price_option . $aps_get_schema_data->product_price . '</span></p>';
	$aps_product_return .= '<p class="aps_product_meta"><span class="aps_product_condition aps_product_separator" itemprop=""><label class="aps_product_condition_label">' . __("Condition:", "ap-schema") . ' </label><span itemprop="itemCondition">' . $aps_get_schema_data->product_condition . '</span></span> <label class="aps_product_productid_label">' . __("Product ID:", "ap-schema") . ' </label><span class="aps_product_product_id" itemprop="productID">' . $aps_get_schema_data->product_prod_id . '</span></p>';
		$aps_product_return .= '<a href="http://plus.google.com/' . $aps_google_id . '?rel=author"><p class="aps_product_review_by">' . $aps_get_schema_data->product_review_by . '</p></a>';
	$aps_product_return .= '</div>';

	

	return $aps_product_return;
	
	} // end if product



	if ($type == "recipe") {
	


	$aps_new_pretty_date_recipe_pub_date = aps_pretty_date($aps_get_schema_data->recipe_pub_date); 

		//get the star option

	$aps_star_option = get_option( '_ap-schema--options' );

	$aps_star_option = $aps_star_option['reviewicons'];

	if($aps_get_schema_data->recipe_startype == '') { $aps_get_schema_data->recipe_startype = $aps_star_option;}


	//get the star size

	$aps_starsize_option = get_option( '_ap-schema--options' );

	$aps_starsize_option = $aps_starsize_option['reviewicons_size'];

	if ($aps_starsize_option == '') {$aps_starsize_option = '32';}



	/***********************
		
	* Star generation
	
	**********************/

	//set defaults

	$aps_recipe_rating = $aps_get_schema_data->recipe_rating;

	$aps_nearest_half = '';

	$aps_decimal = '';

	

	//round to neareast half

	//https://forums.digitalpoint.com/threads/round-number-to-nearest-half.943055/

	if($aps_recipe_rating >= ($half = ($ceil = ceil($aps_recipe_rating))- 0.5) + 0.25) {

		$aps_nearest_half = $ceil;

	} else if($aps_recipe_rating < $half - 0.25) {

		$aps_nearest_half = floor($aps_recipe_rating); }

	 else {$aps_nearest_half = $half; }

	 

	//get the decimal check variable set

	$aps_decimal = $aps_nearest_half;

	

	//floor the nearest half variable

	$aps_floored_nearest_half = floor($aps_nearest_half);

	
	
	//generate stars based on floored value

	$star_list = ""; //set variable

	$star_url = '<img width="' . $aps_starsize_option . 'px" src="' . APSCHEMA_URLPATH . '/images/icons/' . $aps_get_schema_data->recipe_startype . '.png" />';

	$i = 0;

	$max_count = $aps_floored_nearest_half;

	//// Lets max the count out at 100 so people dont add in stupid numbers and crash their site ////
	if ( $max_count > 100 ) { $max_count = 100; }
	/////////////////////////////////////////////////////////////////////////////////////////////////
	

		while ($i < $max_count ) {

		   $star_list .= $star_url . '';

		   ++$i;

		}

	//check if there is a decimal place - not that fucking easy as the ceil/floor return a float, even if the actual number is a whole number!
	//http://stackoverflow.com/questions/11041590/whole-number-or-decimal-number
	if ( is_numeric( $aps_decimal ) && strpos( $aps_decimal, '.' ) === false ) { $aps_decimal = "false";} else { $aps_decimal = "true";}
	if($aps_decimal === "true") { $star_list .= '<img width="' . $aps_starsize_option . 'px" src="' . APSCHEMA_URLPATH . '/images/icons/' . $aps_get_schema_data->recipe_startype . '_half.png" />'; }

	//top score possible
	//need a new setting for recipes i think!
	$aps_recipe_top_score = $aps_get_schema_data->recipe_rating_max;
	

	//get the empty star count
	$aps_empty_starcount = $aps_recipe_top_score - $aps_nearest_half;

	$aps_empty_starcount = floor($aps_empty_starcount);

//add emtpy stars

		$empty_star_url = '<img width="' . $aps_starsize_option . 'px" src="' . APSCHEMA_URLPATH . '/images/icons/' . $aps_get_schema_data->recipe_startype . '_empty.png" />';

		$i = 0;

		$empty_max_count = $aps_empty_starcount;


	//// Lets max the count out at 100 so people dont add in stupid numbers and crash their site ////
	if ( $empty_max_count > 100 ) { $empty_max_count = 100; }
	/////////////////////////////////////////////////////////////////////////////////////////////////
	
	
			while ($i < $empty_max_count ) {

			   $star_list .= $empty_star_url . '';

			   ++$i;

			}

// END OF STAR GENERATION


		//variable is comma separated string, grab it, explode and list each via for each.

	//$aps_recipe_ingredients = explode(',', $aps_get_schema_data->recipe_ingredients);
	
	$aps_recipe_ingredients = unserialize($aps_get_schema_data->recipe_ingredients);


	$aps_show_ingredients = "";

	foreach ($aps_recipe_ingredients as $ingredients) {

if($ingredients['value'] != '' ) {
		$aps_show_ingredients .= '<li itemprop="ingredients">' . $ingredients['value'] . '</li>';
}

	}

	$aps_recipe_return = '<div class="aps_recipe_container aps_container" itemscope itemtype="http://schema.org/Recipe">';

		$aps_recipe_return .= '<h1 class="aps_recipe_name " itemprop="name">' . $aps_get_schema_data->recipe_name . '</h1>';


/* RECIPE rating */
if($aps_get_schema_data->recipe_startype == 'numeric') {

		$aps_recipe_return .= '<p class="aps_recipe_startype" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating"><span itemprop="ratingValue"><span class="aps_recipe_avg_rating_label">' . __("Rating:", "ap-schema") . ' </span>' . $aps_get_schema_data->recipe_avg_rating . '</span> <span itemprop="reviewCount">' . $aps_get_schema_data->recipe_number_recipes . '</span> <span class="aps_recipe_number_ratings_label">' . __(" votes cast", "ap-schema") . '</span></p>';		

	} else {

$aps_recipe_return .= '<div class="aps_recipe_rating_container"><span itemprop="recipeRating" itemscope itemtype="http://schema.org/Rating" class="aps_recipe_rating"><span>' . $star_list . '<meta itemprop="ratingValue" content="' . $aps_get_schema_data->recipe_rating . '" /></span><span itemprop="worstRating" style="display:none;">' . $aps_get_schema_data->recipe_rating_min . '</span><span class="aps_recipe_text_rating"><span>' . $aps_get_schema_data->recipe_rating . '</span> out of <span itemprop="bestRating">'. $aps_get_schema_data->recipe_rating_max .'</span></span></span></div>';

	}
/* end recipe rating */
	

		$aps_recipe_return .= '<p><span class="aps_recipe_author" itemprop="author">' . $aps_get_schema_data->recipe_author . '</span> ';
		$aps_recipe_return .= '<span class="aps_recipe_pub_date" itemprop="datePublished">' . $aps_new_pretty_date_recipe_pub_date . '</span></p>';
		$aps_recipe_return .= '<img class="aps_recipe_image_url" itemprop="image" src="' . $aps_get_schema_data->recipe_image_url . '" />';
		$aps_recipe_return .= '<p class="aps_recipe_description " itemprop="description">' . $aps_get_schema_data->recipe_desc . '</p>';

		$aps_recipe_return .= '<div class="aps_recipe_prep_container">';

			$aps_recipe_return .= '<p class="aps_recipe_prep" itemprop="prepTime">' . __("Prep Time:", "ap-schema");

			$aps_recipe_return .= '<span class="aps_recipe_prep_hours aps_recipe_separator" >' . $aps_get_schema_data->recipe_prep_hours .'' . __(" hours", "ap-schema") . '</span>';
			$aps_recipe_return .= '<span class="aps_recipe_prep_minutes aps_recipe_separator" >' . $aps_get_schema_data->recipe_prep_mins . '' . __(" minutes", "ap-schema") . '</span>';

			$aps_recipe_return .= '<p class="aps_recipe_cook" itemprop="cookTime">' . __("Cook Time:", "ap-schema");

			$aps_recipe_return .= '<span class="aps_recipe_cook_hours aps_recipe_separator" itemprop="">' . $aps_get_schema_data->recipe_cook_hours . '' . __(" hours", "ap-schema") . '</span>';

			$aps_recipe_return .= '<span class="aps_recipe_cook_minutes aps_recipe_separator" itemprop="">' . $aps_get_schema_data->recipe_cook_mins . '' . __(" minutes", "ap-schema") . '</span>';

		$aps_recipe_return .= '</div>';

		$aps_recipe_return .= '<div class="aps_recipe_nutrition_container">';
		$aps_recipe_return .= '<p class="aps_recipe_cook"><span class="aps_recipe_ingredients_yield_title">' . __("Yield:", "ap-schema") . '</span><br/><span class="aps_recipe_yield aps_recipe_separator" itemprop="recipeYield">' . $aps_get_schema_data->recipe_yield . '' . __(" portions", "ap-schema") . '</span>';
				$aps_recipe_return .= '<p class="aps_recipe_nutrition" itemscope itemtype="http://schema.org/NutritionInformation"><span class="aps_recipe_ingredients_nutrition_title">' . __("Nutrition:", "ap-schema") . '</span><br/>

		<span class="aps_recipe_calories aps_recipe_separator"><span>' . __("Calories:", "ap-schema") . ' </span><span itemprop="calories">' . $aps_get_schema_data->recipe_calories . '</span></span><br/>
		<span class="aps_recipe_fat aps_recipe_separator"><span>' . __("Fat:", "ap-schema") . ' </span><span itemprop="fatContent">' . $aps_get_schema_data->recipe_fat . '</span></span><br/>
		<span class="aps_recipe_sugar aps_recipe_separator"><span>' . __("Sugar:", "ap-schema") . ' </span><span itemprop="sugarContent">' . $aps_get_schema_data->recipe_sugar . '</span></span><br/>
		<span class="aps_recipe_salt aps_recipe_separator"><span>' . __("Salt:", "ap-schema") . ' </span><span itemprop="sodiumContent">' . $aps_get_schema_data->recipe_salt . '</span></span>';
		$aps_recipe_return .= '</div>';

		$aps_recipe_return .= '<div class="aps_recipe_ingredients_container">';		
		$aps_recipe_return .= '<span class="aps_recipe_ingredients_ingredients_title">' . __("Ingredients:", "ap-schema") . '</span>';		
		$aps_recipe_return .= '<ul class="aps_recipe_ingredients" itemprop="">' . $aps_show_ingredients . '</ul>';
		$aps_recipe_return .= '</div>';

		$aps_recipe_return .= '<p class="aps_recipe_instructions" itemprop="recipeInstructions"><span class="aps_recipe_ingredients_instructions_title">' . __("Instructions:", "ap-schema") . '</span><br/>' . $aps_get_schema_data->recipe_instructions . '</p>';

		$aps_recipe_return .= '<a href="http://plus.google.com/' . $aps_google_id . '?rel=author"><p class="aps_recipe_review_by">' . $aps_get_schema_data->recipe_review_by . '</p></a>';
		$aps_recipe_return .= '</div>';
		return $aps_recipe_return;

	
	} // end if recipe







	if ($type == "review") {


	$aps_new_pretty_date_review = aps_pretty_date($aps_get_schema_data->review_pub_date); 

		//get the star option
	$aps_star_option = get_option( '_ap-schema--options' );
	$aps_star_option = $aps_star_option['reviewicons'];
	if($aps_get_schema_data->review_startype == '') { $aps_get_schema_data->review_startype = $aps_star_option;}

	
	//get the currency symbol
	$aps_price_option = get_option( '_ap-schema--options' );
	$aps_price_option = $aps_price_option['aps_price'];



	//get the star size
	$aps_starsize_option = get_option( '_ap-schema--options' );
	$aps_starsize_option = $aps_starsize_option['reviewicons_size'];
	if ($aps_starsize_option == '') {$aps_starsize_option = '32';}


	//get the Google ID
	$aps_googleid_option = get_option( '_ap-schema--options' );
	$aps_googleid_option = $aps_googleid_option['aps_google_id'];


/***********************
* Star generation
**********************/

	//set defaults

	$aps_review_rating = $aps_get_schema_data->review_rating;
	$aps_nearest_half = '';
	$aps_decimal = '';


	//round to neareast half
	//https://forums.digitalpoint.com/threads/round-number-to-nearest-half.943055/

	if($aps_review_rating >= ($half = ($ceil = ceil($aps_review_rating))- 0.5) + 0.25) {

		$aps_nearest_half = $ceil;

	} else if($aps_review_rating < $half - 0.25) {

		$aps_nearest_half = floor($aps_review_rating); }

	 else {$aps_nearest_half = $half; }

	 

	//get the decimal check variable set
	$aps_decimal = $aps_nearest_half;


	//floor the nearest half variable
	$aps_floored_nearest_half = floor($aps_nearest_half);
	

	//generate stars based on floored value
	$star_list = ""; //set variable
	$star_url = '<img width="' . $aps_starsize_option . 'px" src="' . APSCHEMA_URLPATH . '/images/icons/' . $aps_get_schema_data->review_startype . '.png" />';
	$i = 0;
	$max_count = $aps_floored_nearest_half;	


	//// Lets max the count out at 100 so people dont add in stupid numbers and crash their site ////
	if ( $max_count > 100 ) { $max_count = 100; }
	/////////////////////////////////////////////////////////////////////////////////////////////////
	
	
		while ($i < $max_count ) {

		   $star_list .= $star_url . '';

		   ++$i;

		}



	//check if there is a decimal place - not that fucking easy as the ceil/floor return a float, even if the actual number is a whole number!
	//http://stackoverflow.com/questions/11041590/whole-number-or-decimal-number
	if ( is_numeric( $aps_decimal ) && strpos( $aps_decimal, '.' ) === false ) { $aps_decimal = "false";} else { $aps_decimal = "true";}

	if($aps_decimal === "true") { $star_list .= '<img width="' . $aps_starsize_option . 'px" src="' . APSCHEMA_URLPATH . '/images/icons/' . $aps_get_schema_data->review_startype . '_half.png" />'; }

	

	//top score possible
	//need a new setting for reviews i think!
	$aps_review_top_score = $aps_get_schema_data->review_rating_max;

	

	//get the empty star count
	$aps_empty_starcount = $aps_review_top_score - $aps_nearest_half;

	$aps_empty_starcount = floor($aps_empty_starcount);


	//add emtpy stars

		$empty_star_url = '<img width="' . $aps_starsize_option . 'px" src="' . APSCHEMA_URLPATH . '/images/icons/' . $aps_get_schema_data->review_startype . '_empty.png" />';

		$i = 0;

		$empty_max_count = $aps_empty_starcount;

	//// Lets max the count out at 100 so people dont add in stupid numbers and crash their site ////
	if ( $empty_max_count > 100 ) { $empty_max_count = 100; }
	/////////////////////////////////////////////////////////////////////////////////////////////////		

			while ($i < $empty_max_count ) {

			   $star_list .= $empty_star_url . '';

			   ++$i;

			}

// END OF STAR GENERATION



	$aps_review_return = '<div class="aps_review_container aps_container" itemscope itemtype="http://schema.org/Review">';
	$aps_review_return .= '<a href="' . $aps_get_schema_data->review_affiliate_url . '"><h1 class="aps_review_name" itemprop="name">' . $aps_get_schema_data->review_name . '</h1></a>';	
	//$aps_review_return .= '<a href="' . $aps_get_schema_data->review_url . '"><p class="aps_review_website" itemprop="url">' . $aps_get_schema_data->review_url . '</p></a>';
			$aps_review_return .= '<a href="' . $aps_get_schema_data->review_affiliate_url . '" itemprop="url"><img class="aps_review_image_url" itemprop="image" src="' . $aps_get_schema_data->review_image_url . '" /></a>';

	$aps_review_return .= '<p class="aps_review_meta">';
	$aps_review_return .= '<span class="aps_review_author" itemprop="author" itemscope itemtype="http://schema.org/Person"><a href="https://plus.google.com/' . $aps_googleid_option . '?rel=author"><span itemprop="name">' . $aps_get_schema_data->review_author . '</span></a></span> ';
	$aps_review_return .= '<span class="aps_review_pub_date" itemprop="datePublished">' . $aps_new_pretty_date_review . '</span></p>';
	$aps_review_return .= '<p class="aps_review_description" itemprop="description" itemprop="review" >' . $aps_get_schema_data->review_desc . '</p>';
	$aps_review_return .= '<p class="aps_review_item_name" itemprop="itemReviewed" itemscope itemtype="http://schema.org/Product"><span itemprop="name">' . $aps_get_schema_data->review_item_name . '</span></p>';
	$aps_review_return .= '<p class="aps_review_item_review" itemprop="reviewBody">' . $aps_get_schema_data->review_item_review . '</p>';



//if number show number wording, else images

	if($aps_get_schema_data->review_startype == 'numeric') {

		$aps_review_return .= '<p class="aps_review_startype" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating"><span itemprop="ratingValue"><span class="aps_review_avg_rating_label">' . __("Rating:", "ap-schema") . ' </span>' . $aps_get_schema_data->review_avg_rating . '</span> <span itemprop="reviewCount">' . $aps_get_schema_data->review_number_reviews . '</span> <span class="aps_review_number_ratings_label">' . __(" votes cast", "ap-schema") . '</span></p>';		

	} else {
		
/*
$aps_review_return .= '<p class="aps_review_startype" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">' . $star_list . '<span class="aps_rating_value" ><span itemprop="ratingValue" >' . $aps_review_rating . ' </span></span> / <span itemprop="bestRating">'. $aps_review_rating_max .'</span><span itemprop="reviewCount">1000</span>Out of s reviews</span><span style="" itemprop="worstRating">' . $aps_review_rating_min . '</span></p>';
*/

$aps_review_return .= '<span itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating" class="aps_review_rating"><span>' . $star_list . '<meta itemprop="ratingValue" content="' . $aps_get_schema_data->review_rating . '" /></span><span itemprop="worstRating" style="display:none;">' . $aps_get_schema_data->review_rating_min . '</span><span class="aps_review_text_rating"><span>' . $aps_get_schema_data->review_rating . '</span> out of <span itemprop="bestRating">'. $aps_get_schema_data->review_rating_max .'</span></span></span>';

	}

	$aps_review_return .= '</div>';

	return $aps_review_return;


	} // end if review



}

add_shortcode('ap_schema', 'aps_schema_shortcodes');

