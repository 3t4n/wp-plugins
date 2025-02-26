<?php
/*

Plugin Name: Currently Reading
Version: 0.1a
Plugin URI: http://irgeek.net/projects/currently-reading/
Description: System to manage the books you are reading/have read and display them
Author: Pablo
Author URI: http://irgeek.net

*/

/*  Copyright 2006  Robert Jorgenson  (email : rjorgy@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

/**********************************/
/*********** Change Log ***********/
/**********************************/
/*
 * 0.1a - Initial Release - basic functionality ALPHA QUALITY
 *
 */


/**********************************/
/************* TO DO **************/
/**********************************/
/*

1. Write template tags
2. Write code for admin pages
3. XMLHttpRequest for amazon queries
4. Caching of images from amazon ????

*/

/**********************************/
/************** BUGS **************/
/**********************************/
/*
 * NO KNOWN BUGS - PLEASE REPORT THEM!
 *
 */

/* define script wide global constants */
define('CR_VERSION', '0.1a'); // Version of Currently Reading
define('ASID', '1V6WDEGMC1VDQX7Z5302'); // amazon web services id ... please do not steal this ID and do bad stuff
define('AZ_BASE_URL', 'http://www.amazon.com/exec/obidos/ASIN/'); // base URL to an item on amazon
define('CR_TABLE', $table_prefix.'currently_reading'); // table name to store entries
define('PLUGIN_DIR', basename(dirname(__FILE__))); // The filename used when referring to admin page URL's

if ($_GET['queryaz'] && $_GET['asin']) {
	$output =  "Test";
	echo $output;
	exit();
}

// without the class this plugin is useless
require_once('currently_reading.class.php');

$cr = new currentlyReading;

// The function to display the write dialog
if (!function_exists('cr_write')) {
	function cr_write() {
		// Inport global variables needed in this function
		global $wpdb, $table_prefix;
		$cr_table = $table_prefix."currently_reading";
		// Check to see if the form was submitted
		if ($_REQUEST['a'] == 'query') {
			$cr_asin = $_REQUEST['asin'];
			// Set values to query the amazon server
			$amazon_server = "http://webservices.amazon.com/onca/xml";
			$amazon_query = "?Service=AWSECommerceService"
			."&SubscriptionId=".ASID
			."&Operation=ItemLookup"
			."&ItemId=$cr_asin"
			."&ResponseGroup=Large";
			$url = $amazon_server.$amazon_query;
			// Determine which method to use to query amazon
			$access_opt = get_option('cr_access_opt');
			if ($access_opt == 'curl') {
				$amazon_c = curl_init($url);
				curl_setopt($amazon_c, CURLOPT_RETURNTRANSFER, 1);
				$amazon_result = curl_exec($amazon_c);
				curl_close($amazon_c);
			} elseif ($access_opt == 'file') {
				$amazon_result = file_get_contents($url);
			} elseif ($access_opt == 'soap') {
				// Havent researched the soap API yet, probably not going to come out in earlier versions, sorry!
				$cr_options_page = get_settings('home')."/wp-admin/options-general.php?page=".basename(__FILE__);
				echo "<div class=\"cr_error\">You have chosen to access Amazon with a currently unsupported Access Option, please update this option on the <a href=\"$cr_options_page\">options</a> page.</div>";
				$amazon_result = FALSE;
			} else {
				echo "Query not executed";
			}
			// Parse request into 2 arrays to deal with the data
			if ($amazon_result) {
				$values = array();
				$index = array();
				$parser = xml_parser_create();
				xml_parse_into_struct($parser, $amazon_result, $values, $index);
				xml_parser_free($parser);
				// Determine what type of product it is
				$cr_type = $index[PRODUCTGROUP][0];
				$cr_type = $values[$cr_type][value];
				// Based on the product type, parse the data into variables
				if ($cr_type == 'Book') {
					// Grab the amazon affiliate ID from the database
					$cr_az_aff_id = get_option('cr_az_aff_id');
					// Set the title value
					$cr_title = $index[TITLE][0];
					$cr_title = $values[$cr_title][value];
					// Initialize the num_authors variable
					$num_authors = FALSE;
					// Parse through each author value and set accordingly
					foreach ($index[AUTHOR] as $author) {
						// If this is the first author, start the $cr_author variable
						if (!$num_authors) {
							$cr_author = $values[$author][value];
							$num_authors = 1;
						// If its not, add ", author name" to the variable
						} else {
							$cr_author .= ", ".$values[$author][value];
							$num_authors++;
						}
					}
					// Set the detailed info URL based on ASIN and affiliate ID
					$cr_url = AZ_BASE_URL.$asin."/".$cr_az_aff_id;
					// Grab the image URL's for the title
					$cr_image_s = ($index[SMALLIMAGE][0] + 1);
					$cr_image_s = $values[$cr_image_s][value];
					$cr_image_m = ($index[MEDIUMIMAGE][0] +1);
					$cr_image_m = $values[$cr_image_m][value];
					$cr_image_l = ($index[LARGEIMAGE][0] + 1);
					$cr_image_l = $values[$cr_image_l][value];
					// The average review rating for the item
					$cr_rating = $index[AVERAGERATING][0];
					$cr_rating = $values[$cr_rating][value];
					// The current amazon price for the new product
					$cr_price = ((($index[LISTPRICE][1] - $index[LISTPRICE][0]) -1) + $index[LISTPRICE][0]);
					$cr_price = $values[$cr_price][value];
					$cr_total_pages = $index['NUMBEROFPAGES'][0];
					$cr_total_pages = $values[$cr_total_pages][value];
				} else {
					// They put in an ASIN that does not validate to a book
					echo "<div class=\"cr_error\">That product type is not supported by this plugin, sorry!</div>";
				}
			} else {
				echo "<div class=\"cr_error\">Problems contacting the amazon server at this time</div>";
			}
		}
		// Add the information to the database
		if ($_REQUEST['a'] == 'add') {
			// Grab the information from POST
			$cr_asin = $_REQUEST['cr_asin'];
			$cr_date = time(now);
			$cr_type = $_REQUEST['cr_type'];
			$cr_title = $_REQUEST['cr_title'];
			$cr_author = $_REQUEST['cr_author'];
			$cr_url = $_REQUEST['cr_url'];
			$cr_image_s = $_REQUEST['cr_image_s'];
			$cr_image_m = $_REQUEST['cr_image_m'];
			$cr_image_l = $_REQUEST['cr_image_l'];
			$cr_rating = $_REQUEST['cr_rating'];
			$cr_price = $_REQUEST['cr_price'];
			$cr_total_pages = $_REQUEST['cr_total_pages'];
			if ($_REQUEST['cr_current_page']) {
				$cr_current_page = $_REQUEST['cr_current_page'];
			} else {
				$cr_current_page = "0";
			}
			if ($_REQUEST['cr_done']) {
				$cr_done = "1";
			} else {
				$cr_done = "0";
			}
			$cr_comments = $_REQUEST['cr_comments'];
			// Process all the information into database safe strings
			$wpdb->escape($cr_asin);
			$wpdb->escape($cr_date);
			$wpdb->escape($cr_type);
			$wpdb->escape($cr_title);
			$wpdb->escape($cr_author);
			$wpdb->escape($cr_url);
			$wpdb->escape($cr_image_s);
			$wpdb->escape($cr_image_m);
			$wpdb->escape($cr_image_l);
			$wpdb->escape($cr_rating);
			$wpdb->escape($cr_price);
			$wpdb->escape($cr_total_pages);
			$wpdb->escape($cr_current_page);
			$wpdb->escape($cr_done);
			$wpdb->escape($cr_comments);
			// The query to store everything in the database
			$cr_store_query = "INSERT INTO $cr_table "
				."(cr_asin, cr_date, cr_type, cr_title, cr_author, cr_url, cr_image_s, cr_image_m, cr_image_l, cr_rating, cr_price, cr_total_pages, cr_current_page, cr_done, cr_comments) "
				."VALUES('$cr_asin', '$cr_date',  '$cr_type', '$cr_title', '$cr_author', '$cr_url', '$cr_image_s', '$cr_image_m', '$cr_image_l', '$cr_rating', '$cr_price', '$cr_total_pages', '$cr_current_page', '$cr_done', '$cr_comments')";
			// Store the information in the database
			$wpdb->query($cr_store_query);
		}
		// If they want to edit an earlier post, display the form to change the contents
		if ($_REQUEST['a'] == 'edit' && isset($_REQUEST['cr_id'])) {
			// Grab the ID for use in the script
			$cr_id = $_REQUEST['cr_id'];
			// Query to pull the item from the database
			$cr_grab_query = "SELECT * FROM $cr_table WHERE id='$cr_id'";
			// Run the query ...
			$cr_result = $wpdb->get_row($cr_grab_query);
			$cr_asin = $wpdb->cr_asin;
			$cr_date = $wpdb->cr_date;
			$cr_type = $cr_result->cr_type;
			$cr_title = $cr_result->cr_title;
			$cr_author = $cr_result->cr_author;
			$cr_url = $wpdb->cr_url;
			$cr_image_s = $wpdb->cr_image_s;
			$cr_image_m = $wpdb->cr_image_m;
			$cr_image_l = $wpdb->cr_image_l;
			$cr_rating = $cr_result->cr_rating;
			$cr_price = $cr_result->cr_price;
			$cr_total_pages = $wpdb->total_pages;
			$cr_read = $wpdb->cr_read;
			$cr_comments = $cr_result->cr_comments;
		}
// Display the write page
?>
<div class="wrap">
	<h2>Currently *ing</h2>
		<div id="query-form">
			<form name="query_item" action="post.php?page=<?php echo basename(__FILE__); ?>" method="post">
				<fieldset id="ASIN-Q">
					<legend>ASIN</legend>
					<input type="text" size="16" name="asin" value="<?php echo $cr_asin; ?>" />
					<input type="hidden" name="a" value="query" />
					<input type="submit" value="Query" />
				</fieldset>
			</form>
			<form name="add_item" action="post.php?page=<?php echo basename(__FILE__); ?>" method="post">
			    <fieldset id="cr-current-page">
				    <legend>Current Page</legend>
				    <input type="text" name="cr_current_page" value="<?php echo $cr_current_page; ?>" />
				</fieldset>
				<fieldset id="cr-options">
					<legend>Options</legend>
					<input type="checkbox" name="cr_done" /> Done Reading?
				</fieldset>
		</div>
		<? if ($cr_image_m) { ?>
			<div id="book-image">
				<img src="<?php echo $cr_image_m; ?>" alt="<?php echo "$cr_title: $cr_author"; ?>" />
			</div>
		<? } ?>
			<ul id="cr-list">
				<li><strong>Type:</strong><?php echo $cr_type; ?></li>
				<li><strong>Title:</strong><?php echo $cr_title; ?></li>
				<li><strong>Author(s):</strong><?php echo $cr_author; ?></li>
				<li><strong>Total Pages:</strong><?php echo $cr_total_pages; ?></li>
				<li><strong>Rating:</strong><?php echo $cr_rating; ?></li>
				<li><strong>Price:</strong><?php echo $cr_price; ?></li>
				<li><strong>URL:</strong><?php echo $cr_url; ?></li>
			</ul>
			<input type="hidden" name="cr-asin" value="<?php echo $cr_asin; ?>" />
			<input type="hidden" name="cr_type" value="<?php echo $cr_type; ?>" />
			<input type="hidden" name="cr_title" value="<?php echo $cr_title; ?>" />
			<input type="hidden" name="cr_author" value="<?php echo $cr_author; ?>" />
			<input type="hidden" name="cr_rating" value="<?php echo $cr_rating; ?>" />
			<input type="hidden" name="cr_price" value="<?php echo $cr_price; ?>" />
			<input type="hidden" name="cr_url" value="<?php echo $cr_url; ?>" />
			<input type="hidden" name="cr_image_s" value="<?php echo $cr_image_s; ?>" />
			<input type="hidden" name="cr_image_m" value="<?php echo $cr_image_m; ?>" />
			<input type="hidden" name="cr_image_l" value="<?php echo $cr_image_l; ?>" />
			<input type="hidden" name="cr_total_pages" value="<?php echo $cr_total_pages; ?>" />
			<input type="hidden" name="a" value="<?php if ($a == 'edit') { echo "update"; } else { echo "add"; } ?>" />
			<fieldset id="cr-comments">
				<legend>Comments</legend>
				<textarea id="comments-box" rows="9" cols="40" name="cr_comments" value="<?php echo $cr_comments; ?>"></textarea>
			</fieldset>
			<p class="submit">
				<input type="submit" value="Add Item &raquo;" />
			</p>
		</form>
	</div>
</div>
<?
	}
}


function addMenus() {
	global $cr;
	add_submenu_page('post.php', 'Add A Book', 'Currently Reading', 9, basename(__FILE__), array(&$cr, 'writePage'));
	add_management_page('All Books', 'Currently Reading', 9, basename(__FILE__), array(&$cr, 'managePage'));
	add_options_page('Currently Reading Options', 'Currently Reading', 9, basename(__FILE__), array(&$cr, 'optionsPage'));
}

if (function_exists('add_action')) {
	add_action('admin_head', array(&$cr, 'adminHeaderDBX'));
	add_action('admin_menu', 'addMenus');
}

?>
