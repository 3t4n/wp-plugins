<?php
/*
 * Author: Michael Finkenberger
 * @since V2.5.17.0
 * Last change in plugin version: V2.5.21.3 ( html_entity_decode() & sanitize_file_name(html_entity_decode()) & event_url )
 * Date: 12.11.2024
 * Tested with the latest plugin version
*/

if(!defined('ABSPATH')) die(); // no direct access



// Shortcode: create a button to generate an ics file download for storing an event to a calendar
function foodle_create_ics($atts, $content) {

  $event_summary = false;
  $event_start_local = false;
  $event_end_local = false;
  $event_description = false;
  $event_location = false;
  $ics_button_text = false;

  $poll_id = ( isset($atts["id"]) ) ? $atts["id"] : 0;

  if ( ( $poll_id > 0 ) && ( get_option('foodle_dem_categories') ) && ( isset(get_option('foodle_dem_categories')['event_use'][$poll_id]) ) && ( get_option('foodle_dem_categories')['event_use'][$poll_id] ) ) {
    $event_summary = ( ( get_option('foodle_dem_categories') ) && ( isset(get_option('foodle_dem_categories')['event_summary'][$poll_id]) ) && ( ! ( get_option('foodle_dem_categories')['event_summary'][$poll_id] == "" ) ) ) ? get_option('foodle_dem_categories')['event_summary'][$poll_id] : false; // event_summary must not be ""
    $event_start_local = ( ( get_option('foodle_dem_categories') ) && ( isset(get_option('foodle_dem_categories')['event_start'][$poll_id]) ) && ( ! ( get_option('foodle_dem_categories')['event_start'][$poll_id] == "" ) ) ) ? get_option('foodle_dem_categories')['event_start'][$poll_id] : false; // event_start must not be ""
    $event_end_local = ( ( get_option('foodle_dem_categories') ) && ( isset(get_option('foodle_dem_categories')['event_end'][$poll_id]) ) ) ? get_option('foodle_dem_categories')['event_end'][$poll_id] : false;
    $event_description = ( ( get_option('foodle_dem_categories') ) && ( isset(get_option('foodle_dem_categories')['event_description'][$poll_id]) ) ) ? get_option('foodle_dem_categories')['event_description'][$poll_id] : false;
    $event_location = ( ( get_option('foodle_dem_categories') ) && ( isset(get_option('foodle_dem_categories')['event_location'][$poll_id]) ) ) ? get_option('foodle_dem_categories')['event_location'][$poll_id] : false;
    $event_url = ( ( get_option('foodle_dem_categories') ) && ( isset(get_option('foodle_dem_categories')['event_url'][$poll_id]) ) ) ? get_option('foodle_dem_categories')['event_url'][$poll_id] : false;
    $ics_button_text = ( ( get_option('foodle_dem_categories') ) && ( isset(get_option('foodle_dem_categories')['ics_button_text'][$poll_id]) ) ) ? get_option('foodle_dem_categories')['ics_button_text'][$poll_id] : false;
  }

  $event_summary = ( isset($atts["event_summary"]) && ( ! ( $atts["event_summary"] == "" ) ) ) ? $atts["event_summary"] : $event_summary; // usually expected format: text, event_summary must not be overwritten by ""
  $event_start_local = ( ( isset($atts["event_start"]) ) && ( ! ( $atts["event_start"] == "" ) ) ) ? $atts["event_start"] : $event_start_local; // usually expected format: 'yyyy-mm-dd hh:mm', event_start must not be overwritten by !!

  if ( ( $event_summary === false ) || ( $event_start_local === false ) || ( ! ( $timestamp = strtotime($event_start_local) ) ) ) return ''; // incorrect event summary or event start time or parameter missing

  $event_end_local = ( isset($atts["event_end"]) ) ? $atts["event_end"] : $event_end_local; // usually expected format: 'yyyy-mm-dd hh:mm'

  $event_description = ( isset($atts["event_description"]) ) ? $atts["event_description"] : $event_description; // usually expected format: text
  $event_description = ( $event_description === false ) ? __('No event description','foodle-for-democracy-poll') : $event_description; // content missing

  $event_location = ( isset($atts["event_location"]) ) ? $atts["event_location"] : $event_location; // usually expected format: text
  $event_location = ( $event_location === false ) ? __('No event location','foodle-for-democracy-poll') : $event_location; // content missing

  $event_url = ( isset($atts["event_url"]) ) ? $atts["event_url"] : $event_url; // usually expected format: text
  $event_url = ( $event_url === false ) ? '' : $event_url; // content missing

  $ics_button_text = ( ( isset($atts["ics_button_text"]) ) && ( ! ( $atts["ics_button_text"] == "" ) ) ) ? $atts["ics_button_text"] : $ics_button_text; // ics_button_text must not be overwritten by ""
  $ics_button_text = ( ( $ics_button_text === false ) || ( $ics_button_text == "" ) ) ? __('Add to calendar','foodle-for-democracy-poll') : $ics_button_text;

  $current_dt_local = wp_date("Y-m-d H:i");

  if ( ( $event_end_local === false ) || ( $event_end_local == '' ) || ( ! ( $timestamp = strtotime($event_end_local) ) ) )
    $event_end_local = $event_start_local.' + 1 minute'; // incorrect event end time or parameter missing --> set duration to 1 minute

  $wp_timezone_string = wp_timezone_string(); // get the WordPress timezone string
  $wp_timezone = new DateTimeZone($wp_timezone_string); // generate the Wordpress timezone
  $zulu_timezone = new DateTimeZone("UTC"); // generate the UTC timezone for ics

  $current_dtc = new DateTime($current_dt_local, $wp_timezone); // Generate the current dtc in local WP time zone
  $datetime_start = new DateTime($event_start_local, $wp_timezone); // Generate the event start in local WP time zone
  $datetime_end = new DateTime($event_end_local, $wp_timezone); // Generate the event end in local WP time zone

  $current_dtc->setTimezone($zulu_timezone); // Convert to Zulu timezone for ics
  $datetime_start->setTimezone($zulu_timezone); // Convert to Zulu timezone for ics
  $datetime_end->setTimezone($zulu_timezone); // Convert to Zulu timezone for ics

  $DTSTAMP = $current_dtc->format('Ymd\THis\Z');  // Output to ics format
  $DTSTART = $datetime_start->format('Ymd\THis\Z');  // Output to ics format
  $DTEND = $datetime_end->format('Ymd\THis\Z');  // Output to ics format

  $foodle_ics_token_id = mt_rand(1000000000, 1999999999)."-".preg_replace("/[^0-9a-zA-Z]/", "", $event_start_local)."-".$foodle_id;
  $foodle_event_hash = hash('md5',$event_summary.$DTSTART,false); // Unique hash for a given event so that changes to the other event parameters will refer to the same calendar entry

  $ics_button = '
  <button class="ics-button foodle-button" style="display:flex;" id="'.$foodle_ics_token_id.'"><img src="'.plugin_dir_url(__FILE__).'img/calendar-pic.png" style="margin-right:4px;">'.$ics_button_text.'</button>
  <script>
      var $ = jQuery;
      $(document).ready(function() {
          $("#'.$foodle_ics_token_id.'").click(function() {
              var icsContent = "BEGIN:VCALENDAR\n" +
                               "VERSION:2.0\n" + 
                               "PRODID:Foodle\n" +
                               "BEGIN:VEVENT\n" +
                               "UID:'.$foodle_event_hash.'\n" +
                               "DTSTAMP:'.$DTSTAMP.'\n" +
                               "DTSTART:'.$DTSTART.'\n" +
                               "DTEND:'.$DTEND.'\n" +
                               "URL:'.sanitize_url($event_url).'\n" +
                               "SUMMARY:'.html_entity_decode($event_summary).'\n" +
                               "DESCRIPTION:'.html_entity_decode($event_description).'\n" +
                               "LOCATION:'.html_entity_decode($event_location).'\n" +
                               "METHOD:PUBLISH\n" +
                               "END:VEVENT\n" +
                               "END:VCALENDAR";

              var blob = new Blob([icsContent], { type: "text/calendar" });
              var url = window.URL.createObjectURL(blob);
              var a = document.createElement("a");
              a.href = url;
              a.download = "'.sanitize_file_name(html_entity_decode($event_summary)).'.ics";
              a.click();
              window.URL.revokeObjectURL(url); // Release the memory
          });
      });
  </script>
  ';

  return $ics_button;
}
function foodle_init_foodle_create_ics_shortcode(){
  add_shortcode('foodle-create-ics', 'foodle_create_ics');
}
add_action('wp_loaded','foodle_init_foodle_create_ics_shortcode');


