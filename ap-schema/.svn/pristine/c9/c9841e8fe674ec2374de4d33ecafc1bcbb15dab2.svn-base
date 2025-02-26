<?php
/**
 * Functions for displaying post meta boxes etc in the posts and pages.
 * 
 * 
 * @package AP Schema
 * 
 * @author dean robinson
 * @version 1.1.0
 * @since 1.1.0
 */
 

//Load misc functions
include( APSCHEMA_DIRNAME . "/inc/misc_functions.php" );
include( APSCHEMA_DIRNAME . "/inc/ajax_functions.php" );


// This is to deal with LEGACY data from the old version
function aps_old_meta() {
	$aps_old_meta_values = get_post_meta( get_the_ID() );
	
	global $aps_old_title_now_name; 
	global $aps_old_custom_date;
	global $aps_old_affiliate_link;
	global $aps_old_producturl_now_image_url;
	global $aps_old_rating;
	global $aps_old_desc;
	
//if($aps_old_meta_values['aps_meta_transfer'][0] = "done") { return; ) ;


if(!empty ($aps_old_meta_values['my_meta_box_keyword'][0]) || !empty($aps_old_meta_values['my_meta_box_custom_date'][0]) || !empty ($aps_old_meta_values['my_meta_box_afflink'][0]) || !empty ($aps_old_meta_values['my_meta_box_producturl'][0]) || !empty ($aps_old_meta_values['my_meta_box_rating'][0]) || !empty ($aps_old_meta_values['my_meta_box_display'][0]) || !empty ($aps_old_meta_values['my_meta_box_bottom'][0]) || !empty ($aps_old_meta_values['my_meta_box_todays_date'][0]) || !empty ($aps_old_meta_values['my_meta_box_productdesc'][0])) {
	
$aps_old_title_now_name = $aps_old_meta_values['my_meta_box_keyword'][0];
$aps_old_custom_date = $aps_old_meta_values['my_meta_box_custom_date'][0];
$aps_old_affiliate_link = $aps_old_meta_values['my_meta_box_afflink'][0];
$aps_old_producturl_now_image_url = $aps_old_meta_values['my_meta_box_producturl'][0];
$aps_old_rating = $aps_old_meta_values['my_meta_box_rating'][0];
//$aps_old_display = $aps_old_meta_values['my_meta_box_display'][0];
//$aps_old_display_bottom = $aps_old_meta_values['my_meta_box_bottom'][0];
//$aps_old_date = $aps_old_meta_values['my_meta_box_todays_date'][0];
$aps_old_desc = $aps_old_meta_values['my_meta_box_productdesc'][0];

}

// NEED TO ADD A FUNCTION to add a meta field with a value of true, once the conversion is done, to say that this has been converted, otherwise it will add the details every time - therefore need a check for that as well.

}
add_action( 'add_meta_boxes', 'aps_old_meta' );



/*****************
*
* Meta boxes
*
******************/

function aps_display_meta_boxes() {
	
	add_meta_box( 'aps-post-meta-box', 'AP Schema - <strong>IMPORTANT:</strong> Please make sure you are using the Visual tab', 'aps_create_meta_boxes', 'post', 'normal', 'high' );
	add_meta_box( 'aps-page-meta-box', 'AP Schema - <strong>IMPORTANT:</strong> Please make sure you are using the Visual tab', 'aps_create_meta_boxes', 'page', 'normal', 'high' );
		
} //end function aps_display_meta_boxes

add_action( 'add_meta_boxes', 'aps_display_meta_boxes' );


/*****************
*
* load the admin css 
*
******************/
function aps_load_admin_css_on_posts_pages($hook) {
	if ( $hook == 'post-new.php' || $hook == 'post.php' ) {
		wp_enqueue_style( 'aps-admin', APSCHEMA_URLPATH . "/css/aps_admin.css" );
		wp_enqueue_script( 'aps-admin', APSCHEMA_URLPATH . "/js/aps_admin.js" );
		wp_enqueue_style( 'zebra', APSCHEMA_URLPATH . "/css/zebra_dialog.css" );
		wp_enqueue_script( 'zebra', APSCHEMA_URLPATH . "/js/zebra_dialog.js" );
		
				wp_enqueue_script( 'aps-core-validate', APSCHEMA_URLPATH . "/js/jquery.validate.min.js" );
				wp_enqueue_script( 'aps-validate', APSCHEMA_URLPATH . "/js/aps_validation.js" );
		wp_enqueue_script('jquery-ui-datepicker');
		wp_enqueue_style('jquery-style', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css');
		
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
			//echo "Error - no front end stylesheet defined.";
		}

		
		
		
		
		
		

	}
}
add_action('admin_enqueue_scripts', 'aps_load_admin_css_on_posts_pages', 10, 1 );

/****************************
*
* LOAD saved schemas. USes AJAX
*
******************************/

// It is not ideal that I need a separate function for each schema, but for now it will do


/****************
*
* book load button 
*
******************/

function aps_book_load() {
    global $wpdb;
    $wpdb->aps_book = "{$wpdb->prefix}aps_book";
    //$wpdb->aps_event = "{$wpdb->prefix}aps_event";
    //$wpdb->aps_movie = "{$wpdb->prefix}aps_movie";
    //$wpdb->aps_organisation = "{$wpdb->prefix}aps_organisation";
    //$wpdb->aps_person = "{$wpdb->prefix}aps_person";
   // $wpdb->aps_product = "{$wpdb->prefix}aps_product";
   // $wpdb->aps_recipe = "{$wpdb->prefix}aps_recipe";
   // $wpdb->aps_review = "{$wpdb->prefix}aps_review";

//$sql = $wpdb->prepare("SELECT * FROM {$wpdb->aps_book}");
//$logs = $wpdb->get_results($sql);
$logs = $wpdb->get_results("SELECT * FROM {$wpdb->aps_book}");


//print_r($logs);

echo '<div class="aps_book_load_and_preview" style="border-left:#eee thin solid; margin-left: 30px; padding-left: 30px;">';
echo '<label>' . _e("Load an Existing Schema", "ap-schema") . '</label><br />';
echo '<select id="aps_book_load_selection">';

foreach ($logs as $log) {
	//echo '<option>' . $log->book_save_name . '</option>';
	echo '<option>' . stripslashes($log->book_save_name) . '</option>';
}

echo '</select>';

echo '<div><br />';
echo '<input type="button" class="button-primary"  value="' . __("Load Book Shortcode", "ap-schema") . '" name="aps_book_load_button" id="aps_book_load_button" />';
echo '<img src="' . admin_url('/images/wpspin_light.gif') . '" class="waiting" id="aps_book_loading_image" style="display:none" />';
echo '<br />';
echo '<input type="button" class="aps_delete_button"  value="' . __("DELETE Shortcode", "ap-schema") . '" name="aps_book_delete_button" id="aps_book_delete_button" />';
echo '</div>';

echo '</div>';
?>
<div id="aps_book_loaded"></div>

<?php

}



/****************
*
* Event load button 
*
******************/

function aps_event_load() {
    global $wpdb;
    $wpdb->aps_event = "{$wpdb->prefix}aps_event";

$logs = $wpdb->get_results("SELECT * FROM {$wpdb->aps_event}");

echo '<div class="aps_event_load_and_preview" style="border-left:#eee thin solid; margin-left: 30px; padding-left: 30px;">';
echo '<label>' . _e("Load an Existing Schema", "ap-schema") . '</label><br />';
echo '<select id="aps_event_load_selection">';

foreach ($logs as $log) {
	echo '<option>' . stripslashes($log->event_save_name) . '</option>';
}
echo '</select>';

echo '<div><br />';
echo '<input type="button" class="button-primary"  value="' . __("Load Event Shortcode", "ap-schema") . '" name="aps_event_load_button" id="aps_event_load_button" />';
echo '<img src="' . admin_url('/images/wpspin_light.gif') . '" class="waiting" id="aps_event_loading_image" style="display:none" />';
echo '<br />';
echo '<input type="button" class="aps_delete_button"  value="' . __("DELETE Shortcode", "ap-schema") . '" name="aps_event_delete_button" id="aps_event_delete_button" />';
echo '</div>';

echo '</div>';
?>
<div id="aps_event_loaded"></div>

<?php

}


/****************
*
* movie load button 
*
******************/

function aps_movie_load() {
    global $wpdb;
    $wpdb->aps_movie = "{$wpdb->prefix}aps_movie";

$logs = $wpdb->get_results("SELECT * FROM {$wpdb->aps_movie}");

echo '<div class="aps_movie_load_and_preview" style="border-left:#eee thin solid; margin-left: 30px; padding-left: 30px;">';
echo '<label>' . _e("Load an Existing Schema", "ap-schema") . '</label><br />';
echo '<select id="aps_movie_load_selection">';

foreach ($logs as $log) {
	echo '<option>' . stripslashes($log->movie_save_name) . '</option>';
}

echo '</select>';

echo '<div><br />';
echo '<input type="button" class="button-primary"  value="' . __("Load Movie Shortcode", "ap-schema") . '" name="aps_movie_load_button" id="aps_movie_load_button" />';
echo '<img src="' . admin_url('/images/wpspin_light.gif') . '" class="waiting" id="aps_movie_loading_image" style="display:none" />';
echo '<br />';
echo '<input type="button" class="aps_delete_button"  value="' . __("DELETE Shortcode", "ap-schema") . '" name="aps_movie_delete_button" id="aps_movie_delete_button" />';
echo '</div>';


echo '</div>';
?>
<div id="aps_movie_loaded"></div>

<?php

}


/****************
*
* organisation load button 
*
******************/

function aps_organisation_load() {
    global $wpdb;
    $wpdb->aps_organisation = "{$wpdb->prefix}aps_organisation";

$logs = $wpdb->get_results("SELECT * FROM {$wpdb->aps_organisation}");

echo '<div class="aps_organisation_load_and_preview" style="border-left:#eee thin solid; margin-left: 30px; padding-left: 30px;">';
echo '<label>' . _e("Load an Existing Schema", "ap-schema") . '</label><br />';
echo '<select id="aps_organisation_load_selection">';

foreach ($logs as $log) {
	echo '<option>' . stripslashes($log->organisation_save_name) . '</option>';
}
echo '</select>';

echo '<div><br />';
echo '<input type="button" class="button-primary"  value="' . __("Load Org. Shortcode", "ap-schema") . '" name="aps_organisation_load_button" id="aps_organisation_load_button" />';
echo '<img src="' . admin_url('/images/wpspin_light.gif') . '" class="waiting" id="aps_organisation_loading_image" style="display:none" />';
echo '<br />';
echo '<input type="button" class="aps_delete_button"  value="' . __("DELETE Shortcode", "ap-schema") . '" name="aps_organisation_delete_button" id="aps_organisation_delete_button" />';
echo '</div>';


echo '</div>';
?>
<div id="aps_organisation_loaded"></div>

<?php

}



/****************
*
* person load button 
*
******************/

function aps_person_load() {
    global $wpdb;
    $wpdb->aps_person = "{$wpdb->prefix}aps_person";

$logs = $wpdb->get_results("SELECT * FROM {$wpdb->aps_person}");

echo '<div class="aps_person_load_and_preview" style="border-left:#eee thin solid; margin-left: 30px; padding-left: 30px;">';
echo '<label>' . _e("Load an Existing Schema", "ap-schema") . '</label><br />';
echo '<select id="aps_person_load_selection">';

foreach ($logs as $log) {
	echo '<option>' . stripslashes($log->person_save_name) . '</option>';
}
echo '</select>';

echo '<div><br />';
echo '<input type="button" class="button-primary"  value="' . __("Load Person Shortcode", "ap-schema") . '" name="aps_person_load_button" id="aps_person_load_button" />';
echo '<img src="' . admin_url('/images/wpspin_light.gif') . '" class="waiting" id="aps_person_loading_image" style="display:none" />';
echo '<br />';
echo '<input type="button" class="aps_delete_button"  value="' . __("DELETE Shortcode", "ap-schema") . '" name="aps_person_delete_button" id="aps_person_delete_button" />';
echo '</div>';


echo '</div>';
?>
<div id="aps_person_loaded"></div>

<?php

}




/****************
*
* product load button 
*
******************/

function aps_product_load() {
    global $wpdb;
    $wpdb->aps_product = "{$wpdb->prefix}aps_product";

$logs = $wpdb->get_results("SELECT * FROM {$wpdb->aps_product}");

echo '<div class="aps_product_load_and_preview" style="border-left:#eee thin solid; margin-left: 30px; padding-left: 30px;">';
echo '<label>' . _e("Load an Existing Schema", "ap-schema") . '</label><br />';
echo '<select id="aps_product_load_selection">';

foreach ($logs as $log) {
	echo '<option>' . stripslashes($log->product_save_name) . '</option>';
}
echo '</select>';

echo '<div><br />';
echo '<input type="button" class="button-primary"  value="' . __("Load product Shortcode", "ap-schema") . '" name="aps_product_load_button" id="aps_product_load_button" />';
echo '<img src="' . admin_url('/images/wpspin_light.gif') . '" class="waiting" id="aps_product_loading_image" style="display:none" />';
echo '<br />';
echo '<input type="button" class="aps_delete_button"  value="' . __("DELETE Shortcode", "ap-schema") . '" name="aps_product_delete_button" id="aps_product_delete_button" />';
echo '</div>';


echo '</div>';
?>
<div id="aps_product_loaded"></div>

<?php

}





/****************
*
* recipe load button 
*
******************/

function aps_recipe_load() {
    global $wpdb;
    $wpdb->aps_recipe = "{$wpdb->prefix}aps_recipe";

$logs = $wpdb->get_results("SELECT * FROM {$wpdb->aps_recipe}");

echo '<div class="aps_recipe_load_and_preview" style="border-left:#eee thin solid; margin-left: 30px; padding-left: 30px;">';
echo '<label>' . _e("Load an Existing Schema", "ap-schema") . '</label><br />';
echo '<select id="aps_recipe_load_selection">';

foreach ($logs as $log) {
	echo '<option>' . stripslashes($log->recipe_save_name) . '</option>';
}
echo '</select>';

echo '<div><br />';
echo '<input type="button" class="button-primary"  value="' . __("Load recipe Shortcode", "ap-schema") . '" name="aps_recipe_load_button" id="aps_recipe_load_button" />';
echo '<img src="' . admin_url('/images/wpspin_light.gif') . '" class="waiting" id="aps_recipe_loading_image" style="display:none" />';
echo '<br />';
echo '<input type="button" class="aps_delete_button"  value="' . __("DELETE Shortcode", "ap-schema") . '" name="aps_recipe_delete_button" id="aps_recipe_delete_button" />';
echo '</div>';


echo '</div>';
?>
<div id="aps_recipe_loaded"></div>

<?php

}



/****************
*
* review load button 
*
******************/

function aps_review_load() {
    global $wpdb;
    $wpdb->aps_review = "{$wpdb->prefix}aps_review";

$logs = $wpdb->get_results("SELECT * FROM {$wpdb->aps_review}");

echo '<div class="aps_review_load_and_preview" style="border-left:#eee thin solid; margin-left: 30px; padding-left: 30px;">';
echo '<label>' . _e("Load an Existing Schema", "ap-schema") . '</label><br />';
echo '<select id="aps_review_load_selection">';

foreach ($logs as $log) {
	echo '<option>' . stripslashes($log->review_save_name) . '</option>';
}
echo '</select>';

echo '<div><br />';
echo '<input type="button" class="button-primary"  value="' . __("Load review Shortcode", "ap-schema") . '" name="aps_review_load_button" id="aps_review_load_button" />';
echo '<img src="' . admin_url('/images/wpspin_light.gif') . '" class="waiting" id="aps_review_loading_image" style="display:none" />';
echo '<br />';
echo '<input type="button" class="aps_delete_button"  value="' . __("DELETE Shortcode", "ap-schema") . '" name="aps_review_delete_button" id="aps_review_delete_button" />';
echo '</div>';


echo '</div>';
?>
<div id="aps_review_loaded"></div>

<?php

}




/*****************
*
* meta box structure
*
******************/
function aps_create_meta_boxes() { 


//get the WP dateformat. Used in aps_admin.js to swap the datepicker dateformat over. 
$aps_date_option = get_option('date_format');


//will create separate forms for each schema type. using a dropdown, css and js can hide show the forms
// see here for rough idea http://www.webmasterworld.com/html/4329372.htm

//require_once(  APSCHEMA_DIRNAME . '/views/post_preview.php' ); //TODO fix the previews so they look reasonable.


?>
<div id="aps_post_overall_container">

<div id="aps_post_form_preview_container">
<?php
//echo aps_post_preview_box();         //TODO fix the previews so they look reasonable.
?> 

</div>

<div id="aps_post_form_container">

<div id="aps_schema_messages"></div>

<!-- DROPDOWN BOX -->
<div id="aps_schema_dropdown" class="">
<h4><?php _e("Choose A Schema Type", "ap-schema"); ?></h4>
<form id="aps_schema_select">
    <select id="form_selector" >
		<option value="pleaseselect"><?php _e("Please Select...", "ap-schema"); ?></option>
        <option value="book"><?php _e("Book", "ap-schema"); ?></option>
        <option value="event"><?php _e("Event", "ap-schema"); ?></option>
        <option value="movie"><?php _e("Movie", "ap-schema"); ?></option>
        <option value="organisation"><?php _e("Organisation", "ap-schema"); ?></option>
        <option value="person"><?php _e("Person", "ap-schema"); ?></option>
        <option value="product"><?php _e("Product", "ap-schema"); ?></option>
        <option value="recipe"><?php _e("Recipe", "ap-schema"); ?></option>
        <option value="review"><?php _e("Review", "ap-schema"); ?></option>
    </select>
</form>    
</div>

<!-- get the date option for jquery to use to change date format -->
<input type="hidden" value="<?php echo $aps_date_option; ?>" name="aps_wp_dateformat" />


<!-- Book Schema -->


    <form id="aps_schema_form_book" class="aps_schema_form_div" name="aps_schema_form_book" action="" method="POST">
    <h4><?php _e("Book", "ap-schema"); ?></h4>
<table>
<tr>
<td>
		<label><?php _e("Name", "ap-schema"); ?></label>
            <div><input type="text" class="regular-text required" name="aps_book_name" /></div>
        <label><?php _e("Website", "ap-schema"); ?></label>
            <div><input type="text" class="regular-text" name="aps_book_website" /></div>
        <label><?php _e("Description", "ap-schema"); ?></label>
            <div><textarea cols="55" rows="10"  class="" name="aps_book_description"></textarea></div>
        <label><?php _e("Author", "ap-schema"); ?></label>
            <div><input type="text" class="regular-text" name="aps_book_author" /></div>
        <label><?php _e("Publisher", "ap-schema"); ?></label>
            <div><input type="text" class="regular-text" name="aps_book_publisher" /></div>
        <label><?php _e("Published Date", "ap-schema"); ?></label>
            <div><input type="text" size="10" class="apschema_date_picker aps_book_pub_date_datepicker" name="aps_book_pub_date" /></div>
		<label><?php _e("Edition", "ap-schema"); ?></label>
            <div><input type="text" class="small-text" name="aps_book_edition" /></div>
        <label><?php _e("ISBN", "ap-schema"); ?></label>
            <div><input type="text" size="16" class="" name="aps_book_isbn" /></div>
        <label><?php _e("Format", "ap-schema"); ?></label>
            <div><select id="apschema_book_schema_format" name="apschema_book_schema_format">
                <option name="aps_book_pleaseselect"><?php _e("Please Select...", "ap-schema"); ?></option>
                <!-- removed value="pleaseselect" as the jquery to add the shortcode was picking it up instead of actual option -->
                <option name="aps_book_ebook"><?php _e("Ebook", "ap-schema"); ?></option> <!-- removed  value="ebook"  -->
                <option name="aps_book_paperback"><?php _e("Paperback", "ap-schema"); ?></option> <!-- removed  value="paperback"  -->
                <option name="aps_book_hardback"><?php _e("Hardback", "ap-schema"); ?></option> <!-- removed  value="hardback"  -->
            </select></div>  
        <label><?php _e("Genre"); ?></label>
            <div><select id="apschema_book_schema_genre" name="apschema_book_schema_genre"><!-- name="aps_book_select_genre" removed see above -->
                <option name="aps_book_genre_pleaseselect"><?php _e("Please Select...", "ap-schema"); ?></option>
                <optgroup label="<?php _e("Fiction", "ap-schema"); ?>">
                    <option value="action" name="aps_book_action"><?php _e("Action and Adventure", "ap-schema"); ?></option>
                    <option><?php _e("Chick Lit", "ap-schema"); ?></option>
                    <option><?php _e("Children's", "ap-schema"); ?></option>
                    <option><?php _e("Commercial Fiction", "ap-schema"); ?></option>
                    <option><?php _e("Contemporary", "ap-schema"); ?></option>
                    <option><?php _e("Crime", "ap-schema"); ?></option>
                    <option><?php _e("Erotica", "ap-schema"); ?></option>
                    <option><?php _e("Family Saga", "ap-schema"); ?></option>
                    <option><?php _e("Fantasy", "ap-schema"); ?></option>
                    <option><?php _e("Gay and Lesbian (fiction)", "ap-schema"); ?></option>
                    <option><?php _e("General Fiction", "ap-schema"); ?></option>
                    <option><?php _e("Graphic Novels", "ap-schema"); ?></option>
                    <option><?php _e("Historical Fiction", "ap-schema"); ?></option>
                    <option><?php _e("Horror", "ap-schema"); ?></option>
                    <option><?php _e("Humour", "ap-schema"); ?></option>
                    <option><?php _e("Literary Fiction", "ap-schema"); ?></option>
                    <option><?php _e("Military and Espionage", "ap-schema"); ?></option>
                    <option><?php _e("Multicultural", "ap-schema"); ?></option>
                    <option><?php _e("Mystery", "ap-schema"); ?></option>
                    <option><?php _e("Offbeat or Quirky", "ap-schema"); ?></option>
                    <option><?php _e("Picture Books", "ap-schema"); ?></option>
                    <option><?php _e("Religious and Inspirational", "ap-schema"); ?></option>
                    <option><?php _e("Romance", "ap-schema"); ?></option>
                    <option><?php _e("Science Fiction", "ap-schema"); ?></option>
                    <option><?php _e("Short Story Collections", "ap-schema"); ?></option>
                    <option><?php _e("Thrillers and Suspense", "ap-schema"); ?></option>
                    <option><?php _e("Western", "ap-schema"); ?></option>
                    <option><?php _e("Women's Fiction", "ap-schema"); ?></option>
                    <option><?php _e("Young Adult", "ap-schema"); ?></option>
                </optgroup>
                <optgroup label="<?php _e("Non-Fiction", "ap-schema"); ?>">
                    <option><?php _e("Art & Photography", "ap-schema"); ?></option>
                    <option><?php _e("Biography & Memoirs", "ap-schema"); ?></option>
                    <option><?php _e("Business & Finance", "ap-schema"); ?></option>
                    <option><?php _e("Celebrity & Pop Culture", "ap-schema"); ?></option>
                    <option><?php _e("Music", "ap-schema"); ?></option> 
                    <option><?php _e("Film & Entertainment", "ap-schema"); ?></option>
                    <option><?php _e("Cookbooks", "ap-schema"); ?></option>
                    <option><?php _e("Cultural/Social Issues", "ap-schema"); ?></option>
                    <option><?php _e("Current Affairs & Politics", "ap-schema"); ?></option>
                    <option><?php _e("Food & Lifestyle", "ap-schema"); ?></option>
                    <option><?php _e("Gardening", "ap-schema"); ?></option>
                    <option><?php _e("Gay & Lesbian (non-fiction)", "ap-schema"); ?></option>
                    <option><?php _e("General Non-Fiction", "ap-schema"); ?></option>
                    <option><?php _e("History & Military", "ap-schema"); ?></option>
                    <option><?php _e("Home Decorating & Design", "ap-schema"); ?></option>
                    <option><?php _e("How To", "ap-schema"); ?></option>
                    <option><?php _e("Humour & Gift Books", "ap-schema"); ?></option>
                    <option><?php _e("Journalism", "ap-schema"); ?></option>
                    <option><?php _e("Juvenile", "ap-schema"); ?></option>
                    <option><?php _e("Medical", "ap-schema"); ?></option> 
                    <option><?php _e("Health & Fitness", "ap-schema"); ?></option>
                    <option><?php _e("Multicultural", "ap-schema"); ?></option>
                    <option><?php _e("Narrative", "ap-schema"); ?></option>
                    <option><?php _e("Nature & Ecology", "ap-schema"); ?></option>
                    <option><?php _e("Parenting", "ap-schema"); ?></option>
                    <option><?php _e("Pets", "ap-schema"); ?></option>
                    <option><?php _e("Psychology", "ap-schema"); ?></option>
                    <option><?php _e("Reference", "ap-schema"); ?></option>
                    <option><?php _e("Relationship & Dating", "ap-schema"); ?></option>
                    <option><?php _e("Religion & Spirituality", "ap-schema"); ?></option>
                    <option><?php _e("Science & Technology", "ap-schema"); ?></option>
                    <option><?php _e("Self-Help", "ap-schema"); ?></option>
                    <option><?php _e("Sports", "ap-schema"); ?></option>
                    <option><?php _e("Travel", "ap-schema"); ?></option>
                    <option><?php _e("True Adventure & True Crime", "ap-schema"); ?></option>
                    <option><?php _e("Women's Issues", "ap-schema"); ?></option>
                </optgroup>
                
            </select>   </div>
 
 			<br />
			<label><?php _e("Add a 'review by' text? ", "ap-schema"); ?></label><input type="checkbox" id="aps_book_review_by_enable" name="aps_book_review_by_enable" /><br />
            <div id="aps_book_review_by_container">
            <label><em><?php _e("Add your text here, and it will be linked to your Google Plus <br /> account. E.g type 'Review by YourName'", "ap-schema"); ?></em></label>
            <div><input type="text" class="" name="aps_book_review_by" /></div>
			</div>


			<br />
            <label><?php _e("Save Name - provide a name for this schema", "ap-schema"); ?> - <span style="font-weight:bold; font-style:italic; font-size:9px;" title="Any double quotes ( &quot; ) in the name will be converted to single quotes ( ' ) in the save name. If you manually add double qutoes to the save name, the shortcode will break and your information will not be shown.">(Hover Here)</span></label>
            <div><input type="text" class="regular-text required aps_save_names" name="aps_book_save_name" /></div>
            <div><br />
            <input type="submit" class="button-primary"  value="<?php _e("Save &amp; Insert", "ap-schema"); ?>" name="aps_book_save" id="aps_book_save" /><input type="submit" class="button-primary aps_update_button"  value="<?php _e("Save Only", "ap-schema"); ?>" name="aps_book_update" id="aps_book_update" />
			<div class="aps_quote_error"></div>
			</div>
            
</td>
<td valign="top">
<?php echo aps_book_load(); ?>
</td>
</tr>
</table>
    </form>
<?php
if(isset($_POST['aps_book_save'])) {

global $wpdb;
$tblname = $wpdb->prefix . "aps_book";

//make sure there is a save name, if not create one from book name and rand, if no book name create one from word book_ and random.
$aps_savename_name = $_POST['aps_book_save_name'];
$aps_savenname_bookname = $_POST['aps_book_name'];
if( $aps_savename_name == '' && $aps_savenname_bookname !== '' ) { $aps_savename_check = $aps_savenname_bookname . '_' . rand(); }
elseif( $aps_savename_name == '' && $aps_savenname_bookname == '' ) { $aps_savename_check = 'book_' . rand(); }
else { $aps_savename_check = $aps_savename_name;}


$aps_convert_datez = $_POST['aps_book_pub_date'];

$aps_convert_datez = aps_convert_date($aps_convert_datez);

$aps_does_schema_exist = $wpdb->get_row("SELECT * FROM $tblname WHERE book_save_name = '$aps_savename_check'");

//var_dump($aps_does_schema_exist);

$aps_book_data = array (
		//'book_id' => $_POST['aps_book_id'], // this inst needed
		'book_name' => $_POST['aps_book_name'],
		'book_url' => $_POST['aps_book_website'],
		'book_desc' => $_POST['aps_book_description'],
		'book_author' => $_POST['aps_book_author'],
		'book_publisher' => $_POST['aps_book_publisher'],
		'book_pub_date' => $aps_convert_datez,
		//'book_pub_date' => $_POST['aps_book_pub_date'],
		'book_edition' => $_POST['aps_book_edition'],
		'book_isbn' => $_POST['aps_book_isbn'],
		'book_format' => $_POST['apschema_book_schema_format'],
		'book_genre' => $_POST['apschema_book_schema_genre'],
		'book_review_by' => $_POST['aps_book_review_by'],
		'book_save_name' => $aps_savename_check 
		);
		
//if the savename exists - update the row
if($aps_does_schema_exist !== NULL ) {
	$wpdb->update( 
				$tblname, 
				$aps_book_data,
				array(
					 'book_save_name' => $aps_savename_check 
				  )); 
}
//if it doesnt exist add a new row.
elseif ($aps_does_schema_exist == NULL ) {
$wpdb->insert( $tblname, 
			   $aps_book_data
			  );

}

echo aps_save_success();


} else {  }





function aps_save_update_schema2222222($tblname, $schema_data, $schema_name) {

		$aps_the_data = $_POST['schema_data'];
		$aps_the_data = json_decode($aps_the_data, true);
		
		
		
		$aps_data_array = array();
		foreach ($aps_the_data as $itemz) {
			$aps_data_array = json_decode($itemz, true);
		}
		
		$aps_the_table_name = $wpdb->prefix . $_POST['table_name'];		
		
		$aps_convert_datez = $_POST['aps_book_pub_date'];
		
		$aps_convert_datez = aps_convert_date($aps_convert_datez);
		
		$aps_does_schema_exist = $wpdb->get_row("SELECT * FROM $tblname WHERE book_save_name = '$aps_savename_check'");
		
		//var_dump($aps_does_schema_exist);
		
		$aps_book_data = array (
				//'book_id' => $_POST['aps_book_id'], // this inst needed
				'book_name' => $_POST['aps_book_name'],
				'book_url' => $_POST['aps_book_website'],
				'book_desc' => $_POST['aps_book_description'],
				'book_author' => $_POST['aps_book_author'],
				'book_publisher' => $_POST['aps_book_publisher'],
				'book_pub_date' => $aps_convert_datez,
				//'book_pub_date' => $_POST['aps_book_pub_date'],
				'book_edition' => $_POST['aps_book_edition'],
				'book_isbn' => $_POST['aps_book_isbn'],
				'book_format' => $_POST['apschema_book_schema_format'],
				'book_genre' => $_POST['apschema_book_schema_genre'],
				'book_review_by' => $_POST['aps_book_review_by'],
				'book_save_name' => $aps_savename_check 
				);
				
		//if the savename exists - update the row
		if($aps_does_schema_exist !== NULL ) {
			$wpdb->update( 
						$tblname, 
						$aps_book_data,
						array(
							 'book_save_name' => $aps_savename_check 
						  )); 
		}
		//if it doesnt exist add a new row.
		elseif ($aps_does_schema_exist == NULL ) {
		$wpdb->insert( $tblname, 
					   $aps_book_data
					  );
		
		}
		
		//echo aps_save_success();
		
		
		 else {  }

} // end function aps_save_update_schema


?>

<!-- Event Schema -->
    <form id="aps_schema_form_event" class="aps_schema_form_div" name="aps_schema_form_event" action="" method="POST">
    <h4><?php _e("Event", "ap-schema"); ?></h4>
<table>
<tr>
<td>
    
    	<label><?php _e("Event Type", "ap-schema"); ?></label>
        <div>
        <select id="aps_event_schema_event_type" name="aps_event_schema_event_type">
            <option><?php _e("Please Select...", "ap-schema"); ?></option>
            <option><?php _e("Business", "ap-schema"); ?></option>
            <option><?php _e("Childrens", "ap-schema"); ?></option>
            <option><?php _e("Comedy", "ap-schema"); ?></option>
            <option><?php _e("Dance", "ap-schema"); ?></option>
            <option><?php _e("Education", "ap-schema"); ?></option>
            <option><?php _e("Festival", "ap-schema"); ?></option>
			<option><?php _e("Food", "ap-schema"); ?></option>
            <option><?php _e("Literary", "ap-schema"); ?></option>
            <option><?php _e("Music", "ap-schema"); ?></option>
            <option><?php _e("Sale", "ap-schema"); ?></option>
            <option><?php _e("Social", "ap-schema"); ?></option>
            <option><?php _e("Sports", "ap-schema"); ?></option>
            <option><?php _e("Theater", "ap-schema"); ?></option>
            <option><?php _e("User Interaction", "ap-schema"); ?></option>
            <option><?php _e("Visual Arts", "ap-schema"); ?></option>
		</select>
        </div>
		<label><?php _e("Name:", "ap-schema"); ?></label><div><input type="text" class="regular-text required" name="aps_event_name" /></div>
        <label><?php _e("Website:", "ap-schema"); ?></label><div><input type="text" class="regular-text" name="aps_event_website" /></div>
        <label><?php _e("Description:", "ap-schema"); ?></label><div><textarea cols="55" rows="10"  class="" name="aps_event_description"></textarea></div>
        <label><?php _e("Start Date:", "ap-schema"); ?></label><div><input type="text" size="10" class="apschema_date_picker aps_event_start_date_datepicker" name="aps_event_start_date" /></div>
		<label><?php _e("Start Time:", "ap-schema"); ?></label><div><input type="text" class="small-text" name="aps_event_start_time"/></div>
        <label><?php _e("End Date:", "ap-schema"); ?></label><div><input type="text" size="10" class="apschema_date_picker aps_event_end_date_datepicker" name="aps_event_end_date" /></div>
		<label><?php _e("End Time:", "ap-schema"); ?></label><div><input type="text" class="small-text" name="aps_event_end_time" /></div>
        <label><?php _e("Duration:", "ap-schema"); ?></label><div><input type="text" class="small-text" name="aps_event_duration" /></div>
        <label><?php _e("Address:", "ap-schema"); ?></label><div><input type="text" class="regular-text" name="aps_event_address" /></div>
        <label><?php _e("PO Box:", "ap-schema"); ?></label><div><input type="text" class="regular-text" name="aps_event_pobox" /></div>
        <label><?php _e("City:", "ap-schema"); ?></label><div><input type="text" class="regular-text" name="aps_event_city" /></div>
        <label><?php _e("State/Region:", "ap-schema"); ?></label><div><input type="text" class="regular-text" name="aps_event_state_region" /></div>
        <label><?php _e("Postal Code:", "ap-schema"); ?></label><div><input type="text" class="regular-text" name="aps_event_postal_code" /></div>
        
        <label><?php _e("Country:", "ap-schema"); ?></label><div><input type="text" class="regular-text" name="aps_event_country" /></div>
        <label><?php _e("Email:", "ap-schema"); ?></label><div><input type="text" class="regular-text" name="aps_event_email" /></div> <!-- not part of schema but useful to leave in -->
        <label><?php _e("Telephone:", "ap-schema"); ?></label><div><input type="text" class="regular-text"  name="aps_event_telephone" /></div> <!-- not part of schema but useful to leave in -->

 			<br />
			<label><?php _e("Add a 'review by' text? ", "ap-schema"); ?></label><input type="checkbox" id="aps_event_review_by_enable" name="aps_event_review_by_enable" /><br />
            <div id="aps_event_review_by_container">
            <label><em><?php _e("Add your text here, and it will be linked to your Google Plus <br /> account. E.g type 'Review by YourName'", "ap-schema"); ?></em></label>
            <div><input type="text" class="" name="aps_event_review_by" /></div>
			</div>
           
			<br />
            <label><?php _e("Save Name - provide a name for this schema", "ap-schema"); ?> - <span style="font-weight:bold; font-style:italic; font-size:9px;" title="Any double quotes ( &quot; ) in the name will be converted to single quotes ( ' ) in the save name. If you manually add double qutoes to the save name, the shortcode will break and your information will not be shown.">(Hover Here)</span></label>
            <div><input type="text" class="regular-text required aps_save_names" name="aps_event_save_name" /></div>
			<div class="aps_quote_error"></div>

            <div><br />
            <input type="submit" class="button-primary"  value="<?php _e("Save &amp; Insert", "ap-schema"); ?>" name="aps_event_save" id="aps_event_save" /><input type="submit" class="button-primary aps_update_button"  value="<?php _e("Save Only", "ap-schema"); ?>" name="aps_event_update" id="aps_event_update" />

			</div>
</td>
<td valign="top">
<?php echo aps_event_load(); ?>
</td>
</tr>
</table>
    </form>
<?php
if(isset($_POST['aps_event_save'])) {

global $wpdb;
$tblname = $wpdb->prefix . "aps_event";

//make sure there is a save name, if not create one from event name and rand, if no event name create one from word event_ and random.
$aps_savename_name = $_POST['aps_event_save_name'];
$aps_savenname_eventname = $_POST['aps_event_name'];
if( $aps_savename_name == '' && $aps_savenname_eventname !== '' ) { $aps_savename_check = $aps_savenname_eventname . '_' . rand(); }
elseif( $aps_savename_name == '' && $aps_savenname_eventname == '' ) { $aps_savename_check = 'event_' . rand(); }
else { $aps_savename_check = $aps_savename_name;}

$aps_does_schema_exist = $wpdb->get_row("SELECT * FROM $tblname WHERE event_save_name = '$aps_savename_check'");

//var_dump($aps_does_schema_exist);

//if the savename exists - update the row
if($aps_does_schema_exist !== NULL ) {
	$wpdb->update( 
				  $tblname, 
				  array(
					'event_id' => $_POST['aps_event_id'],
					'event_type' => $_POST['aps_event_schema_event_type'],
					'event_name' => $_POST['aps_event_name'],
					'event_url' => $_POST['aps_event_website'],
					'event_desc' => $_POST['aps_event_description'],
					'event_start_date' => $_POST['aps_event_start_date'],
					'event_end_date' => $_POST['aps_event_end_date'],
					'event_start_time' => $_POST['aps_event_start_time'],
					'event_end_time' => $_POST['aps_event_end_time'],
					'event_duration' => $_POST['aps_event_duration'],
					'event_address' => $_POST['aps_event_address'],
					'event_pobox' => $_POST['aps_event_pobox'],
					'event_city' => $_POST['aps_event_city'],
					'event_region' => $_POST['aps_event_state_region'],
					'event_postalcode' => $_POST['aps_event_postal_code'],
					'event_country' => $_POST['aps_event_country'],
					'event_email' => $_POST['aps_event_email'],
					'event_phone' => $_POST['aps_event_telephone'],
			
					'event_review_by' => $_POST['aps_event_review_by'],
					'event_save_name' => $aps_savename_check ), 
				  array(
						'event_save_name' => $aps_savename_check 
				  ));	
}
//if it doesnt exist add a new row.
elseif ($aps_does_schema_exist == NULL ) {
	$wpdb->insert( $tblname, array(
			'event_id' => $_POST['aps_event_id'],
			'event_type' => $_POST['aps_event_schema_event_type'],
			'event_name' => $_POST['aps_event_name'],
			'event_url' => $_POST['aps_event_website'],
			'event_desc' => $_POST['aps_event_description'],
			'event_start_date' => $_POST['aps_event_start_date'],
			'event_end_date' => $_POST['aps_event_end_date'],
			'event_start_time' => $_POST['aps_event_start_time'],
			'event_end_time' => $_POST['aps_event_end_time'],
			'event_duration' => $_POST['aps_event_duration'],
			'event_address' => $_POST['aps_event_address'],
			'event_pobox' => $_POST['aps_event_pobox'],
			'event_city' => $_POST['aps_event_city'],
			'event_region' => $_POST['aps_event_state_region'],
			'event_postalcode' => $_POST['aps_event_postal_code'],
			'event_country' => $_POST['aps_event_country'],
			'event_email' => $_POST['aps_event_email'],
			'event_phone' => $_POST['aps_event_telephone'],
	
			'event_review_by' => $_POST['aps_event_review_by'],
			'event_save_name' => $aps_savename_check ));
}

echo aps_save_success();


} else {  }
?>





<!-- Movie Schema -->
    <form id="aps_schema_form_movie" class="aps_schema_form_div" name="aps_schema_form_movie" action="" method="POST">
    <h4><?php _e("Movie", "ap-schema"); ?></h4>
    <table>
	<tr>
	<td>
		<label><?php _e("Name:", "ap-schema"); ?></label><div><input type="text" class="regular-text required" name="aps_movie_name"  /></div>
        <label><?php _e("Website:", "ap-schema"); ?></label><div><input type="text" class="regular-text" name="aps_movie_website"  /></div>
        <label><?php _e("Description:", "ap-schema"); ?></label><div><textarea cols="55" rows="10"  class="" name="aps_movie_description" ></textarea></div>
        <label><?php _e("Director:", "ap-schema"); ?></label><div><input type="text" class="regular-text" name="aps_movie_director"  /></div>
        <label><?php _e("Producer:", "ap-schema"); ?></label><div><input type="text" class="regular-text" name="aps_movie_producer"  /></div>
        <label><?php _e("Actor:", "ap-schema"); ?></label><div id="aps_add_actors_wrapper"><input type="text" class="regular-text aps_movie_actors" name="aps_movie_actors"  />

<input type="button" class="button-primary"  value="<?php _e("Add More Actors", "ap-schema"); ?>" name="aps_movie_add_actors" id="aps_movie_add_actors" />
 	</div>
    
    
        <br />
        <label><?php _e("Add a 'review by' text? ", "ap-schema"); ?></label><input type="checkbox" id="aps_movie_review_by_enable" name="aps_movie_review_by_enable" /><br />
        <div id="aps_movie_review_by_container">
        <label><em><?php _e("Add your text here, and it will be linked to your Google Plus <br /> account. E.g type 'Review by YourName'", "ap-schema"); ?></em></label>
        <div><input type="text" class="" name="aps_movie_review_by" /></div>
        </div>
        
        <br />
        
            <label><?php _e("Save Name - provide a name for this schema", "ap-schema"); ?> - <span style="font-weight:bold; font-style:italic; font-size:9px;" title="Any double quotes ( &quot; ) in the name will be converted to single quotes ( ' ) in the save name. If you manually add double qutoes to the save name, the shortcode will break and your information will not be shown.">(Hover Here)</span></label>
        <div><input type="text" class="regular-text required aps_save_names" name="aps_movie_save_name" /></div>
			<div class="aps_quote_error"></div>
       
        <div><br />
        <input type="submit" class="button-primary"  value="<?php _e("Save &amp; Insert", "ap-schema"); ?>" name="aps_movie_save" id="aps_movie_save" /><input type="submit" class="button-primary aps_update_button"  value="<?php _e("Save Only", "ap-schema"); ?>" name="aps_movie_update" id="aps_movie_update" />
	</div>
</td>
<td valign="top">
<?php echo aps_movie_load(); ?>
</td>
</tr>
</table>

    </form>
    
<?php
 if(isset($_POST['aps_movie_save'])) {

global $wpdb;
$tblname = $wpdb->prefix . "aps_movie";

//make sure there is a save name, if not create one from movie name and rand, if no movie name create one from word movie_ and random.
$aps_savename_name = $_POST['aps_movie_save_name'];
$aps_savename_moviename = $_POST['aps_movie_name'];
if( $aps_savename_name == '' && $aps_savename_moviename !== '' ) { $aps_savename_check = $aps_savename_moviename . '_' . rand(); }
elseif( $aps_savename_name == '' && $aps_savename_moviename == '' ) { $aps_savename_check = 'movie_' . rand(); }
else { $aps_savename_check = $aps_savename_name;}


$wpdb->insert( $tblname, array(
		'movie_id' => $_POST['aps_movie_id'],
		'movie_name' => $_POST['aps_movie_name'],
		'movie_url' => $_POST['aps_movie_website'],
		'movie_desc' => $_POST['aps_movie_description'],
		'movie_director' => $_POST['aps_movie_director'],
		'movie_producer' => $_POST['aps_movie_producer'],
		'movie_actors' => $_POST['aps_movie_actors'],
		'movie_review_by' => $_POST['aps_movie_review_by'],
		'movie_save_name' => $aps_savename_check ));

echo aps_save_success();


} else {  }
?>
  

<!-- ------------------------------------------------ END OF MOVIE ------------------------------------------------------------------------------- -->


<!-- Organisation Schema -->
    <form id="aps_schema_form_organisation" class="aps_schema_form_div"  name="aps_schema_form_organisation" action="" method="POST">
    <h4><?php _e("Organisation", "ap-schema"); ?></h4>
    <table>
<tr>
<td>

    	<label><?php _e("Organisation Type", "ap-schema"); ?></label>
        <div>
        <select id="aps_organisation_schema_organisation_type" name="aps_organisation_schema_organisation_type">
            <option><?php _e("Please Select...", "ap-schema"); ?></option>
            <option><?php _e("Corporation", "ap-schema"); ?></option>
            <option><?php _e("Educational", "ap-schema"); ?></option>
            <option><?php _e("Government", "ap-schema"); ?></option>
            <option><?php _e("Local Business", "ap-schema"); ?></option>
            	<!-- add in more local business types??? -->
            <option><?php _e("NGO", "ap-schema"); ?></option>
            <option><?php _e("Performing Group", "ap-schema"); ?></option>
			<option><?php _e("Sports Team", "ap-schema"); ?></option>
		</select>
        </div>    
		<label><?php _e("Name:", "ap-schema"); ?></label><div><input type="text" class="regular-text required" name="aps_organisation_name" /></div>
        <label><?php _e("Website:", "ap-schema"); ?></label><div><input type="text" class="regular-text" name="aps_organisation_website" /></div>
        <label><?php _e("Description:", "ap-schema"); ?></label><div><textarea cols="55" rows="10"  class="" name="aps_organisation_description"></textarea></div>
        <label><?php _e("Address:", "ap-schema"); ?></label><div><input type="text" class="regular-text" name="aps_organisation_address" /></div>
        <label><?php _e("PO Box:", "ap-schema"); ?></label><div><input type="text" class="regular-text" name="aps_organisation_pobox" /></div>
        <label><?php _e("City:", "ap-schema"); ?></label><div><input type="text" class="regular-text" name="aps_organisation_city" /></div>
        <label><?php _e("State/Region:", "ap-schema"); ?></label><div><input type="text" class="regular-text" name="aps_organisation_state_region" /></div>
        <label><?php _e("Postal Code:", "ap-schema"); ?></label><div><input type="text" class="regular-text" name="aps_organisation_postal_code" /></div>
        <label><?php _e("Country:", "ap-schema"); ?></label><div><input type="text" class="regular-text" name="aps_organisation_country" /></div>
        <label><?php _e("Email:", "ap-schema"); ?></label><div><input type="text" class="regular-text" name="aps_organisation_email" /></div> 
        <label><?php _e("Telephone:", "ap-schema"); ?></label><div><input type="text" class="regular-text" name="aps_organisation_telephone" /></div> 
		<label><?php _e("Fax:", "ap-schema"); ?></label><div><input type="text" class="regular-text" name="aps_organisation_fax" /></div> 
		<label><?php _e("Logo Image:", "ap-schema"); ?></label><div id="aps_org_image_url_field"><input type="text" class="short-text aps_org_image_url_field" name="aps_organisation_logo" /><input class="upload_image_button" class="button" type="button" value="Upload Image" /></div>
        
        
        <br />
        <label><?php _e("Add a 'review by' text? ", "ap-schema"); ?></label><input type="checkbox" id="aps_organisation_review_by_enable" name="aps_organisation_review_by_enable" /><br />
        <div id="aps_organisation_review_by_container">
        <label><em><?php _e("Add your text here, and it will be linked to your Google Plus <br /> account. E.g type 'Review by YourName'", "ap-schema"); ?></em></label>
        <div><input type="text" class="" name="aps_organisation_review_by" /></div>
        </div>

			<br />
            <label><?php _e("Save Name - provide a name for this schema", "ap-schema"); ?> - <span style="font-weight:bold; font-style:italic; font-size:9px;" title="Any double quotes ( &quot; ) in the name will be converted to single quotes ( ' ) in the save name. If you manually add double qutoes to the save name, the shortcode will break and your information will not be shown.">(Hover Here)</span></label>
            <div><input type="text" class="regular-text required aps_save_names" name="aps_organisation_save_name" /></div>
			<div class="aps_quote_error"></div>

            <div><br />
            <input type="submit" class="button-primary"  value="<?php _e("Save &amp; Insert", "ap-schema"); ?>" name="aps_organisation_save" id="aps_organisation_save" /><input type="submit" class="button-primary aps_update_button"  value="<?php _e("Save Only", "ap-schema"); ?>" name="aps_organisation_update" id="aps_organisation_update" />

			</div>
            
</td>
<td valign="top">
<?php echo aps_organisation_load(); ?>
</td>
</tr>
</table>
    </form>

<!--------------------- end of Orgaisation --------------------------------->





<!-- person Schema -->
    <form id="aps_schema_form_person" class="aps_schema_form_div"  name="aps_schema_form_person" action="" method="POST">
    <h4><?php _e("Person", "ap-schema"); ?></h4>
    <table>
<tr>
<td>

		<label><?php _e("Name:", "ap-schema"); ?></label><div><input type="text" class="regular-text required" name="aps_person_name" /></div>
        <label><?php _e("Organisation:", "ap-schema"); ?></label><div><input type="text" class="regular-text" name="aps_person_org" /></div> 
		<label><?php _e("Job Title:", "ap-schema"); ?></label><div><input type="text" class="regular-text" name="aps_person_job_title" /></div> 
        <label><?php _e("Website:", "ap-schema"); ?></label><div><input type="text" class="regular-text" name="aps_person_url" /></div>
		<label><?php _e("Birthday:", "ap-schema"); ?></label><div><input type="text" class="regular-text apschema_date_picker" name="aps_person_birthday" /></div> 
        <label><?php _e("Description:", "ap-schema"); ?></label><div><textarea cols="55" rows="10"  class="" name="aps_person_desc"></textarea></div>
        <label><?php _e("Address:", "ap-schema"); ?></label><div><input type="text" class="regular-text" name="aps_person_address" /></div>
        <label><?php _e("PO Box:", "ap-schema"); ?></label><div><input type="text" class="regular-text" name="aps_person_pobox" /></div>
        <label><?php _e("City:", "ap-schema"); ?></label><div><input type="text" class="regular-text" name="aps_person_city" /></div>
        <label><?php _e("State/Region:", "ap-schema"); ?></label><div><input type="text" class="regular-text" name="aps_person_region" /></div>
        <label><?php _e("Postal Code:", "ap-schema"); ?></label><div><input type="text" class="regular-text" name="aps_person_postalcode" /></div>
        <label><?php _e("Country:", "ap-schema"); ?></label><div><input type="text" class="regular-text" name="aps_person_country" /></div>
        <label><?php _e("Email:", "ap-schema"); ?></label><div><input type="text" class="regular-text" name="aps_person_email" /></div> 
        <label><?php _e("Telephone:", "ap-schema"); ?></label><div><input type="text" class="regular-text" name="aps_person_telephone" /></div> 
		<label><?php _e("Fax:", "ap-schema"); ?></label><div><input type="text" class="regular-text" name="aps_person_fax" /></div> 
		<label><?php _e("Photo URL:", "ap-schema"); ?></label>
        <div id="aps_person_image_url_field"><input type="text" class="short-text aps_person_image_url_field" name="aps_person_photo" /><input class="upload_image_button" class="button" type="button" value="Upload Image" /></div>
        
        <br />
        <label><?php _e("Add a 'review by' text? ", "ap-schema"); ?></label><input type="checkbox" id="aps_person_review_by_enable" name="aps_person_review_by_enable" /><br />
        <div id="aps_person_review_by_container">
        <label><em><?php _e("Add your text here, and it will be linked to your Google Plus <br /> account. E.g type 'Review by YourName'", "ap-schema"); ?></em></label>
        <div><input type="text" class="" name="aps_person_review_by" /></div>
        </div>

			<br />
            <label><?php _e("Save Name - provide a name for this schema", "ap-schema"); ?> - <span style="font-weight:bold; font-style:italic; font-size:9px;" title="Any double quotes ( &quot; ) in the name will be converted to single quotes ( ' ) in the save name. If you manually add double qutoes to the save name, the shortcode will break and your information will not be shown.">(Hover Here)</span></label>
            <div><input type="text" class="regular-text required aps_save_names" name="aps_person_save_name" /></div>
			<div class="aps_quote_error"></div>

            <div><br />
            <input type="submit" class="button-primary"  value="<?php _e("Save &amp; Insert", "ap-schema"); ?>" name="aps_person_save" id="aps_person_save" /><input type="submit" class="button-primary aps_update_button"  value="<?php _e("Save Only", "ap-schema"); ?>" name="aps_person_update" id="aps_person_update" />

			</div>
            
</td>
<td valign="top">
<?php echo aps_person_load(); ?>
</td>
</tr>
</table>
    </form>

<!--------------------- end of Person --------------------------------->












<!-- Product Schema -->
    <form id="aps_schema_form_product" class="aps_schema_form_div" action="" method="POST">
    <h4><?php _e("Products", "ap-schema"); ?></h4>
    <table>
<tr>
<td>

        <label><?php _e("Name:", "ap-schema"); ?></label><div><input type="text" class="regular-text required" name="aps_product_name" /></div>
        <label><?php _e("Website:", "ap-schema"); ?></label><div><input type="text" class="regular-text" name="aps_product_website"  /></div>
        <label><?php _e("Description:", "ap-schema"); ?></label><div><textarea cols="55" rows="10"  name="aps_product_description"  class=""></textarea></div>
        <label><?php _e("Brand:", "ap-schema"); ?></label><div><input type="text" class="regular-text" name="aps_product_brand"  /></div>
        <label><?php _e("Manufacturer:", "ap-schema"); ?></label><div><input type="text" class="regular-text" name="aps_product_manufacturer"  /></div>
        <label><?php _e("Model:", "ap-schema"); ?></label><div><input type="text" class="regular-text" name="aps_product_model"  /></div>
        <label><?php _e("Product ID:", "ap-schema"); ?></label><div><input type="text" class="regular-text" name="aps_product_product_id"  /></div>
        <label><?php _e("Max Score:", "ap-schema"); ?></label><div><input type="text" class="small-text" name="aps_product_max_score"  /></div>
        <label><?php _e("Avg. Rating:", "ap-schema"); ?></label><div><input type="text" class="small-text" name="aps_product_avg_rating"  /></div>
        <label><?php _e("No. of Reviews:", "ap-schema"); ?></label><div><input type="text" class="small-text" name="aps_product_number_reviews"  /></div>
        <label><?php _e("Price:", "ap-schema"); ?></label><div><input type="text" class="small-text" name="aps_product_price"  /></div>
        <label><?php _e("Condition:", "ap-schema"); ?></label>
        <div>
        <select id="aps_product_condition" name="aps_product_condition">
			<option name="aps_product_condition_pleaseselect"><?php _e("Please Select...", "ap-schema"); ?></option>
            <option><?php _e("New", "ap-schema"); ?></option>
            <option><?php _e("Used", "ap-schema"); ?></option>
            <option><?php _e("Refurbished", "ap-schema"); ?></option>
            <option><?php _e("Damaged", "ap-schema"); ?></option>
        </select>
        </div>
		<label><?php _e("Image URL:", "ap-schema"); ?></label><div id="aps_product_image_url_field"><input type="text" class="short-text aps_product_image_url_field" name="aps_product_image_url"  /><input class="upload_image_button" class="button" type="button" value="Upload Image" /></div>
        

		<label><?php _e("Affiliate URL:", "ap-schema"); ?></label><div><input type="text" class="regular-text" name="aps_product_affiliate_url"  /></div>
        <br />
        
        <label><?php _e("Override Default Star Type? ", "ap-schema"); ?></label><input type="checkbox" id="aps_product_startype_enable" name="aps_product_startype_enable" /><br />
        
		<div id="aps_product_startype_container">        
		<label><input type="radio" name="aps_product_startype" value="yellowstar"><img id="yellowstar" class="aps_star" src="<?php echo APSCHEMA_URLPATH . '/images/icons/yellowstar.png'; ?>" /></label>
		<label><input type="radio" name="aps_product_startype" value="greenstar"><img id="greenstar" class="aps_star" src="<?php echo APSCHEMA_URLPATH . '/images/icons/greenstar.png'; ?>" /></label>
		<label><input type="radio" name="aps_product_startype" value="bluestar"><img id="bluestar" class="aps_star" src="<?php echo APSCHEMA_URLPATH . '/images/icons/bluestar.png'; ?>" /></label>

		<label><input type="radio" name="aps_product_startype" value="heart"><img id="heart" class="aps_star" src="<?php echo APSCHEMA_URLPATH . '/images/icons/heart.png'; ?>" /></label>
		<label><input type="radio" name="aps_product_startype" value="lightning"><img id="lightning" class="aps_star" src="<?php echo APSCHEMA_URLPATH . '/images/icons/lightning.png'; ?>" /></label>
		<label><input type="radio" name="aps_product_startype" value="skulllight"><img id="skulllight" class="aps_star" src="<?php echo APSCHEMA_URLPATH . '/images/icons/skulllight.png'; ?>" /></label>
		<label><input type="radio" name="aps_product_startype" value="skulldark"><img id="skulldark" class="aps_star" src="<?php echo APSCHEMA_URLPATH . '/images/icons/skulldark.png'; ?>" /></label>
		<label><input type="radio" name="aps_product_startype" value="tick"><img id="tick" class="aps_star" src="<?php echo APSCHEMA_URLPATH . '/images/icons/tick.png'; ?>" /></label>
        
        <label><input type="radio" name="aps_product_startype" value="numeric"><?php _e("Number", "ap-schema"); ?></label>
        </div>
        
        
        <br />
        <label><?php _e("Add a 'review by' text? ", "ap-schema"); ?></label><input type="checkbox" id="aps_product_review_by_enable" name="aps_product_review_by_enable" /><br />
        <div id="aps_product_review_by_container">
        <label><em><?php _e("Add your text here, and it will be linked to your Google Plus <br /> account. E.g type 'Review by YourName'", "ap-schema"); ?></em></label>
        <div><input type="text" class="" name="aps_product_review_by" /></div>
        </div>

			<br />
            <label><?php _e("Save Name - provide a name for this schema", "ap-schema"); ?> - <span style="font-weight:bold; font-style:italic; font-size:9px;" title="Any double quotes ( &quot; ) in the name will be converted to single quotes ( ' ) in the save name. If you manually add double qutoes to the save name, the shortcode will break and your information will not be shown.">(Hover Here)</span></label>
            <div><input type="text" class="regular-text required aps_save_names" name="aps_product_save_name" /></div>
			<div class="aps_quote_error"></div>

            <div><br />
            <input type="submit" class="button-primary"  value="<?php _e("Save &amp; Insert", "ap-schema"); ?>" name="aps_product_save" id="aps_product_save" /><input type="submit" class="button-primary aps_update_button"  value="<?php _e("Save Only", "ap-schema"); ?>" name="aps_product_update" id="aps_product_update" />

			</div>

</td>
<td valign="top">
<?php echo aps_product_load(); ?>
</td>
</tr>
</table>
    </form>

	


<!-- Recipe Schema -->
    <form id="aps_schema_form_recipe" class="aps_schema_form_div" action="" method="POST">
    <h4><?php _e("Recipe", "ap-schema"); ?></h4>
    <table>
<tr>
<td>

        <label><?php _e("Name:", "ap-schema"); ?></label><div><input type="text" class="regular-text required" name="aps_recipe_name"  /></div>
        <label><?php _e("Image URL:", "ap-schema"); ?></label><div><input type="text" class="regular-text" name="aps_recipe_image_url"  /></div>
        <label><?php _e("Description:", "ap-schema"); ?></label><div><textarea cols="55" rows="10"  class="" name="aps_recipe_description" ></textarea></div>
        <label><?php _e("Author:", "ap-schema"); ?></label><div><input type="text" class="regular-text" name="aps_recipe_author" /></div>
        <label><?php _e("Published Date:", "ap-schema"); ?></label><div><input type="text" size="10" class="apschema_date_picker" name="aps_recipe_pub_date"  /></div>
        <label><?php _e("Prep Time", "ap-schema"); ?></label><br />
        <label><?php _e("Hours:", "ap-schema"); ?></label><div><input type="text" class="small-text" name="aps_recipe_prep_hours"  /></div>
        <label><?php _e("Minutes:", "ap-schema"); ?></label><div><input type="text" class="small-text" name="aps_recipe_prep_minutes"  /></div>
		<label><?php _e("Cooking Time", "ap-schema"); ?></label><br />
        <label><?php _e("Hours:", "ap-schema"); ?></label><div><input type="text" class="small-text" name="aps_recipe_cook_minutes"  /></div>
        <label><?php _e("Minutes:", "ap-schema"); ?></label><div><input type="text" class="small-text" name="aps_recipe_cook_hours"  /></div>
        <label><?php _e("Yield (serving size):", "ap-schema"); ?></label><div><input type="text" class="small-text" name="aps_recipe_yield"  /></div>
        <label><?php _e("Calories:", "ap-schema"); ?></label><div><input type="text" class="small-text" name="aps_recipe_calories"  /></div>
        <label><?php _e("Fat:", "ap-schema"); ?></label><div><input type="text" class="small-text" name="aps_recipe_fat"  /></div>
        <label><?php _e("Sugar:", "ap-schema"); ?></label><div><input type="text" class="small-text" name="aps_recipe_sugar"  /></div>    
		<label><?php _e("Sodium/Salt:", "ap-schema"); ?></label><div><input type="text" class="small-text"  name="aps_recipe_salt" /></div>    
        <label><?php _e("Ingredients (include type and amount):", "ap-schema"); ?></label><div id="aps_add_ingredients_wrapper"><input type="text" class="regular-text aps_recipe_ingredients" name="aps_recipe_ingredients"  />    


<input type="button" class="button-primary"  value="<?php _e("Add More Ingredients", "ap-schema"); ?>" name="aps_recipe_add_ingredients" id="aps_recipe_add_ingredients" />
 	</div>

 
        <label><?php _e("Instructions:", "ap-schema"); ?></label><div><textarea cols="55" rows="10"  class="" name="aps_recipe_instructions" ></textarea></div>
        
        <br />
        <label><?php _e("Add a 'review by' text? ", "ap-schema"); ?></label><input type="checkbox" id="aps_recipe_review_by_enable" name="aps_recipe_review_by_enable" /><br />
        <div id="aps_recipe_review_by_container">
        <label><em><?php _e("Add your text here, and it will be linked to your Google Plus <br /> account. E.g type 'Review by YourName'", "ap-schema"); ?></em></label>
        <div><input type="text" class="" name="aps_recipe_review_by" /></div>
        </div>

        <label><?php _e("Your Rating", "ap-schema"); ?></label><div><input type="text" class="small-text" name="aps_recipe_rating"  /></div>
		<label><?php _e("Minimum:", "ap-schema"); ?></label><div><input type="text" class="small-text"  name="aps_recipe_rating_min" /></div>
        <label><?php _e("Maximum:", "ap-schema"); ?></label><div><input type="text" class="small-text" name="aps_recipe_rating_max"  /></div>

        <br />
        
        <label><?php _e("Override Default Star Type? ", "ap-schema"); ?></label><input type="checkbox" id="aps_recipe_startype_enable" name="aps_recipe_startype_enable" /><br />
        
		<div id="aps_recipe_startype_container">        
		<label><input type="radio" name="aps_recipe_startype" value="yellowstar"><img id="yellowstar" class="aps_star" src="<?php echo APSCHEMA_URLPATH . '/images/icons/yellowstar.png'; ?>" /></label>
		<label><input type="radio" name="aps_recipe_startype" value="greenstar"><img id="greenstar" class="aps_star" src="<?php echo APSCHEMA_URLPATH . '/images/icons/greenstar.png'; ?>" /></label>
		<label><input type="radio" name="aps_recipe_startype" value="bluestar"><img id="bluestar" class="aps_star" src="<?php echo APSCHEMA_URLPATH . '/images/icons/bluestar.png'; ?>" /></label>

		<label><input type="radio" name="aps_recipe_startype" value="heart"><img id="heart" class="aps_star" src="<?php echo APSCHEMA_URLPATH . '/images/icons/heart.png'; ?>" /></label>
		<label><input type="radio" name="aps_recipe_startype" value="lightning"><img id="lightning" class="aps_star" src="<?php echo APSCHEMA_URLPATH . '/images/icons/lightning.png'; ?>" /></label>
		<label><input type="radio" name="aps_recipe_startype" value="skulllight"><img id="skulllight" class="aps_star" src="<?php echo APSCHEMA_URLPATH . '/images/icons/skulllight.png'; ?>" /></label>
		<label><input type="radio" name="aps_recipe_startype" value="skulldark"><img id="skulldark" class="aps_star" src="<?php echo APSCHEMA_URLPATH . '/images/icons/skulldark.png'; ?>" /></label>
		<label><input type="radio" name="aps_recipe_startype" value="tick"><img id="tick" class="aps_star" src="<?php echo APSCHEMA_URLPATH . '/images/icons/tick.png'; ?>" /></label>
        
        <label><input type="radio" name="aps_recipe_startype" value="numeric"><?php _e("Number", "ap-schema"); ?></label>
        </div>

			<br />
            <label><?php _e("Save Name - provide a name for this schema", "ap-schema"); ?> - <span style="font-weight:bold; font-style:italic; font-size:9px;" title="Any double quotes ( &quot; ) in the name will be converted to single quotes ( ' ) in the save name. If you manually add double qutoes to the save name, the shortcode will break and your information will not be shown.">(Hover Here)</span></label>
            <div><input type="text" class="regular-text required aps_save_names" name="aps_recipe_save_name" /></div>
			<div class="aps_quote_error"></div>

            <div><br />
            <input type="submit" class="button-primary"  value="<?php _e("Save &amp; Insert", "ap-schema"); ?>" name="aps_recipe_save" id="aps_recipe_save" /><input type="submit" class="button-primary aps_update_button"  value="<?php _e("Save Only", "ap-schema"); ?>" name="aps_recipe_update" id="aps_recipe_update" />

			</div>

</td>
<td valign="top">
<?php echo aps_recipe_load(); ?>
</td>
</tr>
</table>
    </form>


<!-- Review Schema -->


    <form id="aps_schema_form_review" class="aps_schema_form_div" action="" method="POST">
    
    
 <!-- this lot is for the LEGACY data -->   
	<?php 
	global $aps_old_title_now_name; 
	global $aps_old_custom_date;
	global $aps_old_affiliate_link;
	global $aps_old_producturl_now_image_url;
	global $aps_old_rating;
	global $aps_old_desc;
	
	//only show if vital info is available (risky but unlikely there wont be a title or a description.
	if(!empty($aps_old_desc) || !empty($aps_old_title_now_name)) { ?>
    
<!-- need to add the php stuff here so jquery can grab it, but hide this shit -->    
<input type="hidden" value="<?php echo $aps_old_title_now_name; ?>" name="aps_old_title_now_name" />
<input type="hidden" value="<?php echo $aps_old_custom_date; ?>" name="aps_old_custom_date" />
<input type="hidden" value="<?php echo $aps_old_affiliate_link; ?>" name="aps_old_affiliate_link" />
<input type="hidden" value="<?php echo $aps_old_producturl_now_image_url; ?>" name="aps_old_producturl_now_image_url" />
<input type="hidden" value="<?php echo $aps_old_rating; ?>" name="aps_old_rating" />
<input type="hidden" value="<?php echo $aps_old_desc; ?>" name="aps_old_desc" />

    
        <p class="insert_old_data_button"><?php _e("This button will add the data from previous versions of AP Schema to a new shortcde. You will still need to press the 'Insert Review Shortcode' button below after adding any additional details.", "ap-schema"); ?><br />
        <br />
<input type="button" class="button-primary"  value="<?php _e("Insert Old Details", "ap-schema"); ?>" name="aps_insert_old" id="aps_insert_old" />
     </p>   
	<?php	
        
        }
    
    ?>

 <!-- end LEGACY data stuff -->   


    <h4><?php _e("Review", "ap-schema"); ?></h4>
    <table>
<tr>
<td>
		<label><?php _e("Name:", "ap-schema"); ?></label><div><input type="text" class="regular-text" name="aps_review_name"  /></div>
        <!-- <label><?php //_e("Affiliate URL:", "ap-schema"); ?></label><div><input type="text" class="regular-text" name="aps_review_affiliate_url"  /></div>-->
        <label><?php _e("Website or Affiliate URL:", "ap-schema"); ?></label><div><input type="text" class="regular-text" name="aps_review_website"  /></div>
        <label><?php _e("Description:", "ap-schema"); ?></label><div><textarea cols="55" rows="10"  class="" name="aps_review_description" ></textarea></div>
        
        <label><?php _e("Image URL:", "ap-schema"); ?></label><div id="aps_review_image_url_field"><input type="text" class="short-text aps_review_image_url_field" name="aps_review_image_url"  /><input class="upload_image_button" class="button" type="button" value="Upload Image" /></div>
        
        <label><?php _e("Item Name:", "ap-schema"); ?></label><div><input type="text" class="regular-text" name="aps_review_item_name"  /></div>
        <label><?php _e("Item Review:", "ap-schema"); ?></label><div><textarea cols="55" rows="10" class="regular-text" name="aps_review_item_review"  /></textarea></div>
        
        <!-- <label><em><?php //_e("Rating", "ap-schema"); ?></em></label><br /> -->
        <label><?php _e("Your Rating", "ap-schema"); ?></label><div><input type="text" class="small-text" name="aps_review_rating"  /></div>
		<label><?php _e("Minimum:", "ap-schema"); ?></label><div><input type="text" class="small-text"  name="aps_review_rating_min" /></div>
        <label><?php _e("Maximum:", "ap-schema"); ?></label><div><input type="text" class="small-text" name="aps_review_rating_max"  /></div>
        
		<label><?php _e("Author:", "ap-schema"); ?></label><div><input type="text" class="regular-text" name="aps_review_author"  /></div>
		<label><?php _e("Published Date:", "ap-schema"); ?></label><div><input type="text" size="10" class="apschema_date_picker" name="aps_review_pub_date"  /></div>
        
        
                <label><?php _e("Override Default Star Type? ", "ap-schema"); ?></label><input type="checkbox" id="aps_review_startype_enable" name="aps_review_startype_enable" /><br />
        
		<div id="aps_review_startype_container">        
		<label><input type="radio" name="aps_review_startype" value="yellowstar"><img id="yellowstar" class="aps_star" src="<?php echo APSCHEMA_URLPATH . '/images/icons/yellowstar.png'; ?>" /></label>
		<label><input type="radio" name="aps_review_startype" value="greenstar"><img id="greenstar" class="aps_star" src="<?php echo APSCHEMA_URLPATH . '/images/icons/greenstar.png'; ?>" /></label>
		<label><input type="radio" name="aps_review_startype" value="bluestar"><img id="bluestar" class="aps_star" src="<?php echo APSCHEMA_URLPATH . '/images/icons/bluestar.png'; ?>" /></label>

		<label><input type="radio" name="aps_review_startype" value="heart"><img id="heart" class="aps_star" src="<?php echo APSCHEMA_URLPATH . '/images/icons/heart.png'; ?>" /></label>
		<label><input type="radio" name="aps_review_startype" value="lightning"><img id="lightning" class="aps_star" src="<?php echo APSCHEMA_URLPATH . '/images/icons/lightning.png'; ?>" /></label>
		<label><input type="radio" name="aps_review_startype" value="skulllight"><img id="skulllight" class="aps_star" src="<?php echo APSCHEMA_URLPATH . '/images/icons/skulllight.png'; ?>" /></label>
		<label><input type="radio" name="aps_review_startype" value="skulldark"><img id="skulldark" class="aps_star" src="<?php echo APSCHEMA_URLPATH . '/images/icons/skulldark.png'; ?>" /></label>
		<label><input type="radio" name="aps_review_startype" value="tick"><img id="tick" class="aps_star" src="<?php echo APSCHEMA_URLPATH . '/images/icons/tick.png'; ?>" /></label>
        
        <label><input type="radio" name="aps_review_startype" value="numeric"><?php _e("Number", "ap-schema"); ?></label>
        </div>
        

		<?php // no review by button needed, the author is the review author ?>
        
<br />
            <label><?php _e("Save Name - provide a name for this schema", "ap-schema"); ?> - <span style="font-weight:bold; font-style:italic; font-size:9px;" title="Any double quotes ( &quot; ) in the name will be converted to single quotes ( ' ) in the save name. If you manually add double qutoes to the save name, the shortcode will break and your information will not be shown.">(Hover Here)</span></label>
            <div><input type="text" class="regular-text required aps_save_names" name="aps_review_save_name" /></div>
			<div class="aps_quote_error"></div>

            <div><br />
            <input type="submit" class="button-primary"  value="<?php _e("Save &amp; Insert", "ap-schema"); ?>" name="aps_review_save" id="aps_review_save" /><input type="submit" class="button-primary aps_update_button"  value="<?php _e("Save Only", "ap-schema"); ?>" name="aps_review_update" id="aps_review_update" />

			</div>
            
</td>
<td valign="top">
<?php echo aps_review_load(); ?>
</td>
</tr>
</table>
    </form>
    
    
</div>
</div>


  
<?php }  // end function aps_create_meta_boxes



