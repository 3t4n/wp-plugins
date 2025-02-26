<?php
/*
	Plugin Name: Banglay Dekhao Date
	Version: 0.4
	Plugin URI: http://www.ideatweaker.com/
	Description: This plugin working itself. It is not related with any other plugin. This is plugin converting Strings to Localization version. Tested with 3.4. Twentyeleven
	Author: Samrat Khan
	Author URI: http://www.ideatweaker.com/
*/ 
function getBanglaDate($date) {

$engArray = array (
1,2,3,4,5,6,7,8,9,0, 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December', 'am', 'pm', 'th', 'st', 'rd', 'th', 'Sat', 'Sun', 'Mon', 'Tue', 'Tues', 'Wed', 'Thurs', 'Thu', 'Fri', 'Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'
);
$bangArray = array (
	'১','২','৩','৪','৫','৬','৭','৮','৯','০',
	'জানুয়ারি', 'ফেব্রুয়ারি', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'আগস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর',
	'সকাল', 'দুপুর', '-এ', '-এ', '-এ', '-এ', 'শনি', 'রবি', 'সোম', 'মঙ্গল', 'মঙ্গল', 'বুধ', 'বৃহস্পতি', 'বৃহস্পতি', 'শুক্র', 'শনিবার', 'রবিবার',
	'সোমবার', 'মঙ্গলবার', 'বুধবার', 'বৃহস্পতিবার', 'শুক্রবার'
);

	$converted = str_replace($engArray, $bangArray, $date);
 	return $converted;
}
add_filter( 'get_date', 'getBanglaDate' );
add_filter( 'get_the_time', 'getBanglaDate' );
add_filter( 'get_the_date', 'getBanglaDate' );
add_filter( 'get_comment_date', 'getBanglaDate' );
add_filter( 'get_comment_time', 'getBanglaDate' );
?>