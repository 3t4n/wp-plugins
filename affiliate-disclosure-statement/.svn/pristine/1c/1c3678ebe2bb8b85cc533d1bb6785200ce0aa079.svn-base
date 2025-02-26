<?php
/*
Plugin Name: Affiliate disclosure statement
Plugin URI: 
Version: 0.3
Description: A Plugin that provides a standard disclosure statement with dynamic elements.
Author: Jason Keeley, Bryan Nielsen
Author URI: 


Copyright 2011, 2013 Jason Keely, Bryan Nielsen
bnielsen1965@gmail.com

This script is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or
(at your option) any later version.

This script is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.

*/

/*
shortcodes:
[affiliate-disclosure-statement]
Used to display the disclosure statement in a page.
*/

// content filter
add_filter('the_content', 'affiliate_disclosure_statement_filter', 99);

// content filter
function affiliate_disclosure_statement_filter($content) {
  // apply filter only if shortcode exists
  if( preg_match('/\[affiliate-disclosure-statement\]/', $content) ) {
    // get the affiliate disclosure document
    $disclosure = nl2br(file_get_contents(dirname(__FILE__).'/affiliate-disclosure-statement.txt'));

    // load options
    if( ($website = get_option('affiliate_disclosure_website')) === FALSE ) $website = '';
    if( ($affiliate_programs = get_option('affiliate_disclosure_programs')) === FALSE ) $affiliate_programs = '';
    $attribution = get_option('affiliate_disclosure_attribution');

    // replace website values
    $disclosure = preg_replace('/\[website\]/', $website, $disclosure);

    // replace affiliate programs values
    $disclosure = preg_replace('/\[affiliate programs\]/', $affiliate_programs, $disclosure);

    // replace the shortcode in the content
    $content = preg_replace('/\[affiliate-disclosure-statement\]/', $disclosure, $content);

    // show attribution if set
    if( $attribution ) {
      $content .= '<br>Provided by <a href="http://www.easywebsitebuilders.net/">www.easywebsitebuilders.net</a>.<br>';
    }
  }

  return $content;
}



// if an admin is loading the admin menu then call the admin actions function
if( is_admin() ) add_action('admin_menu', 'affiliate_disclosure_admin_actions');

// actions to perform when the admin menu is loaded
function affiliate_disclosure_admin_actions() {
  add_options_page("Affiliate Disclosure", "AffiliateDisclosure", 1, "AffiliateDisclosure", "affiliate_disclosure_admin");
}

// function called when Disclosure is selected from the admin menu
function affiliate_disclosure_admin() {
  include('affiliate-disclosure-statement-options.php');
}


?>
