<?php
  /* 
    Plugin Name: ACW Lore 
    Plugin URI: http://www.dyulgerova.info/wordpress-plugins
    Description: Plugin for displaying random quotes from the American Civil War in the description under the title
    Author: Stefany Dyulgerova
    Version: 1.0 
    Author URI: http://www.dyulgerova.info 
  */  

  function acwlore_get_quote(){
// Taking all the quotes out of the 
// quotes.txt file as string.
   $file_quotes = plugins_url('acw_lore/acw_lore_quotes.txt');
   $quotes = file_get_contents($file_quotes);
// Put all the quotes into an array
// and use as a delimeter a linebreak "\n"
  $quotes_array = explode("\n", $quotes);
// Count the number of quotes into the $quotes_array
// starting from 0.
      $quotes_length = count($quotes_array);
// Create a random number, minimum 0
// and max is the number of elements
// in the $quotes_array taken with $quotes_length.
// The reason we do this, is that if
// we simply use mt_rand() it might
// generate a number that is not a valid index
// for our quotes array, like 1343 and the
// array would have, for example, only 4
// elements.
  $random_quote = mt_rand(0, $quotes_length);
// Return the random quote.
 return $quotes_array[$random_quote];
  }
// Put the current random quote into a variable.
  $acwlore_get_quote = acwlore_get_quote(); 
// acwlore_add_quote_to_db function will get the
// $acwlore_get_quote variable which holds the current
// random quote and update the wp_options table's
// column that hold the website's description. 
 function acwlore_add_quote_to_db($acwlore_get_quote){
  global $wpdb;
  $wpdb->update(
        'wp_options'
        , array('option_value' => $acwlore_get_quote)
        , array('option_id' => 3)
        );
}
// Calling the function and updating the
// website's description into the DB.
acwlore_add_quote_to_db($acwlore_get_quote);
// This is where the story ends, this is goodbye // 
// EOF //