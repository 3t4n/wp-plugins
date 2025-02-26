<?php

/***************************
*
* Date and Time Functions
*
*
***************************/



/*********************
*
* aps_convert_date
* Function to convert dates to the correct mysql format for database insertion
*
*********************/

function aps_convert_date ($apsdate) {
	$aps_current_wp_date_format = get_option( 'date_format' );

	$aps_db_date = $apsdate;

	//this will only work with php 5.3 or higher :(
	$parsed = date_parse_from_format($aps_current_wp_date_format, $aps_db_date);

  
  
  
	$aps_db_safe_date = $parsed['year'] . '-' . $parsed['month']  . '-' . $parsed['day'];


	return $aps_db_safe_date;

}


// Will need time conversion
// also will need to convert back to correct format on databse retrieval 


/**********************
*
* Shosrt Save Success Message
*
**********************/

function aps_save_success() {
	echo '<div class="aps_message"><p>Your Schema Shortcode was successfully saved.</p></div>'; 
	return;
}