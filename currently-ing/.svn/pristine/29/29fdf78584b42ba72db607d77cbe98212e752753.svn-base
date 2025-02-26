<?php

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

/* define script wide global constants */
define('CR_VERSION', '0.1a'); // Version of Currently Reading
define('ASID', '1V6WDEGMC1VDQX7Z5302'); // amazon web services id ... please do not steal this ID and do bad stuff
define('AZ_BASE_URL', 'http://www.amazon.com/exec/obidos/ASIN/'); // base URL to an item on amazon
define('CR_TABLE', $table_prefix.'currently_reading'); // table name to store entries
define('PLUGIN_DIR', basename(dirname(__FILE__))); // The filename used when referring to admin page URL's

class currentlyReading {
	var $query; // query to execute on the database
	var $options; // this scripts options pulled from the wp database
	var $error; // Contains any error that may or may not occur
	var $notice; // Feedback notification messages on user actions

	function currentlyReading() {
		$this->query = "SHOW TABLES LIKE '".CR_TABLE."'";
		if (CR_TABLE != ($this->queryDB('var'))) {
			$this->setup();
		}
		$this->options = get_option('cr_options');
	}

	function setup() {
		if (1 == $this->options['setup']) {
			// This plugin is already setup! No need to do anything
			$this->error = "This plugin is already setup, if it is not setup you can click here to reset the plugin(WARNING: THIS WILL ERASE ANY DATA YOU HAVE INPUT). If it is setup you can click here to go to the administration section";
			return;
		}
		$this->options = array();
		$this->options['setup'] = 1;
		$this->options['version'] = "0.1a";
		$this->options['aff_id'] = "httpmyeurorg-20";
		$this->options['access_opt'] = "file";
		$this->options['postspp'] = 10;
		$this->query = "CREATE TABLE ".CR_TABLE." ("
			."`id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY" // The Entry ID
			.", `asin` INT(10) NOT NULL" // The items Amazon Standard ID Number
			.", `date` INT(16) NOT NULL" // Date the item was written
			.", `type` VARCHAR(255) NOT NULL" // The entry type
			.", `title` VARCHAR(255) NOT NULL" // The entry title
			.", `author` VARCHAR(255) NOT NULL" // The entry author
			.", `url` TEXT NOT NULL" // The URL to the amazon page
			.", `image_s` TEXT NOT NULL" // URL to the small image
			.", `image_m` TEXT NOT NULL" // URL to the medium image
			.", `image_l` TEXT NOT NULL" // URL to the large image
			.", `rating` VARCHAR(255) NOT NULL" // The amazon user rating
			.", `price` VARCHAR(255) NOT NULL" // The amazon price
			.", `total_pages` INT(11) NOT NULL" // Total number of pages in book
			.", `current_page` INT(11) NOT NULL" // Current page of the book you are on
			.", `read` VARCHAR(255) NOT NULL" // Done reading the book or not
			.", `comments` TEXT NOT NULL" // User comments on the item
			.");";
		require_once(ABSPATH . 'wp-admin/upgrade-functions.php');
		$this->queryDB('create');
		add_option('cr_options', $this->options, 'The options array for the Currently Reading Plugin');
		$this->notice = "Currently Reading is now setup! Use this page to add new items.";
	}

	function reset() {

	}

	function storeOptions() {
		update_option('cr_options', $this->options);
		$this->notice = "Currently Reading options have been saved";
	}

	function queryDB($method, $string = FALSE) {
		global $wpdb;
		if ('escape' == $method && $string) {
			$return_value = $wpdb->escape($string);
		}
		if ('insert' == $method || 'delete' == $type || 'create' == $method) {
			$return_value = $wpdb->query($this->query);
		} elseif ('var' == $method) {
			$return_value = $wpdb->get_var($this->query);
		} elseif ('row' == $method) {
			$return_value = $wpdb->get_row($this->query);
		} elseif ('results' == $method) {
			$return_value = $wpdb->get_results($this->query);
		}
		if ($return_value) {
			return $return_value;
		} else {
			$this->error = "There was an error retrieving your information from the database";
			// return the database error from $wpdb
			// $return_value = $wpdb->error;
		}
	}

	function getLatest() {
		$this->query = "SELECT * FROM ".CR_TABLE." ORDER BY cr_date DESC LIMIT 1";
		$return_value = $this->queryDB('row');
		return $return_value;
	}

	function getPage($page = 1) {
		$start = ($page * $this->options['postspp']) - $this->options['postspp'];
		$end = $page * $this->options['postspp'];
		$this->query = "SELECT * FROM ".CR_TABLE." ORDER BY date DESC LIMIT $start, $end";
		$return_value = $this->queryDB('results');
		return $return_value;
	}

	function queryAmazon($asin) {
		$url = "http://webservices.amazon.com/onca/xml/";
		$url .= "?Service=AWSECommerceService"
		."&SubscriptionId=".ASID
		."&Operation=ItemLookup"
		."&ItemId=$asin"
		."&ResponseGroup=Large";
		if ($this->options['access_opt'] == 'curl') {
			$amazon_c = curl_init($url);
			curl_setopt($amazon_c, CURLOPT_RETURNTRANSFER, 1);
			$amazon_result = curl_exec($amazon_c);
			curl_close($amazon_c);
		} elseif ($this->options['access_opt'] == 'file') {
			$amazon_result = file_get_contents($url);
		} else {
			return;
		}
		if ($amazon_result) {
			$values = array();
			$index = array();
			$parser = xml_parser_create();
			xml_parse_into_struct($parser, $amazon_result, $values, $index);
			xml_parser_free($parser);
			// Determine what type of product it is
			$type = $index[PRODUCTGROUP][0];
			$this->item['type'] = $values[$type][value];
			// Based on the product type, parse the data into variables
			if ('Book' == $this->item['type']) {
				// Set the title value
				$title = $index[TITLE][0];
				$this->item['title'] = $values[$title][value];
				// Initialize the num_authors variable
				$num_authors = FALSE;
				// Parse through each author value and set accordingly
				foreach ($index[AUTHOR] as $author) {
					// If this is the first author, start the $author variable
					if (!$num_authors) {
						$this->item['author'] = $values[$tauthor][value];
						$num_authors = 1;
					// If its not, add ", author name" to the variable
					} else {
						$this->item['author'] .= ", ".$values[$tauthor][value];
						$num_authors++;
					}
				}
				// Set the detailed info URL based on ASIN and affiliate ID
				$url = AZ_BASE_URL.$asin.'/'.$this->options['aff_id'];
				// Grab the image URL's for the title
				$image_s = ($index[SMALLIMAGE][0] + 1);
				$this->item['image_s'] = $values[$image_s][value];
				$image_m = ($index[MEDIUMIMAGE][0] +1);
				$this->item['image_m'] = $values[$image_m][value];
				$image_l = ($index[LARGEIMAGE][0] + 1);
				$this->item['image_l'] = $values[$image_l][value];
				// The average review rating for the item
				$rating = $index[AVERAGERATING][0];
				$this->item['rating'] = $values[$rating][value];
				// The current amazon price for the new product
				$price = ((($index[LISTPRICE][1] - $index[LISTPRICE][0]) -1) + $index[LISTPRICE][0]);
				$this->item['price'] = $values[$price][value];
				$total_pages = $index['NUMBEROFPAGES'][0];
				$this->item['total_pages'] = $values[$total_pages][value];
			} else {
				// They put in an ASIN that is not a book
				$this->error = "The ASIN you entered contained an invalid product type";
			} // if ($type = 'Book') {}
		} else {
			// The amazon query returned nothing
			$this->error = "The Amazon Server is unavailable at this time";
		} // if ($amazon_result) {}
		return "test";
	} // function queryAmazon() {}

	function storeItem($item) {
		foreach ($item as $key => $value) {
			// Escape the values into DB safe strings
			$this->item[$key] = $this->queryDB('escape', $value);
		}
		$this->query = "INSERT INTO ".CR_TABLE
			." (asin, date, type, title, author, url, image_s, image_m, image_l, rating, price, total_pages, current_page, done, comments) "
			."VALUES($item->asin, $item->date, $item->type, $item->title, $item->author, $item->url, $item->image_s, $item->image_m, $item->image_l, $item->rating, $item->price, $item->total_pages, $item->current_page, $item->done, $item->comments)";
		$this->queryDB('insert');
	}

	function writePage() {
		if ($_GET['queryaz'] && $_GET['asin']) {
			$output =  "Test";
			echo $output;
			exit();
		}
?>
		<script type="text/javascript">testing('open')</script>
		<form name="addBook" id="post" action="post.php?page=<?php echo ACTION_FILE; ?>" method="post">
		<div class="wrap">
			<h2>Add A Book</h2>
			<div id="poststuff">
				<div id="moremeta">
					<div id="currentlyReading" class="dbx-group" style="width: 188px;">
						<fieldset class="dbx-box">
							<h3 class="dbx-handle" id="query">Query Amazon:</h3>
							<div class="dbx-content">
								ASIN:<br /><input type="text" name="asin" id="asin" value="<?php if ($edit) { echo $this->item['asin']; } ?>" />
								<br />
								<input type="button" value="Query" onclick="queryAmazon();" />&nbsp;&nbsp;<img id="spinner" src="<?php echo bloginfo('siteurl').'/wp-content/plugins/'.PLUGIN_DIR; ?>/img/spinner.gif"  alt="Activity spinner" />
							</div>
						</fieldset>
						<fieldset class="dbx-box" id="cover">
							<h3 class="dbx-handle">Cover:</h3>
							<div class="dbx-content">
								<?php if ($edit) { ?>
								<img src="<?php echo $this->item['image_s']; ?>" alt="<?php echo $this->item['title']; ?>" />
								<?php } ?>
							</div>
						</fieldset>
						<fieldset class="dbx-box" id="timestamp">
							<h3 class="dbx-handle">Timestamp:</h3>
							<div class="dbx-content">
								<!-- form to modify the date -->
							</div>
						</fieldset>
						<fieldset class="dbx-box" id="pages">
							<h3 class="dbx-handle">Pages:</h3>
							<div class="dbx-content">
								<label for="done" class="selectit"><input id="done" type="checkbox" name="done" <?php if ($done) { echo "selected='selected'"; } ?> /> Done reading?</label>
								<br />
								<input type="text" name="current_page" size="3" value="<?php if ($edit)  { echo $this->item['current_page']; } else { echo "0"; } ?>"> / <?php if ($edit) { echo $this->item['total_pages']; } else { echo "N/A"; } ?> Pages
								<br />
								Percent Done: <?php if ($edit) { echo round($this->item['current_page'] / $this->item['total_pages']); } else { echo "N/A"; } ?>
							</div>
						</fieldset>
					</div>
				</div>
				<fieldset id="titlediv">
					<legend>Title</legend>
					<div><input id="title" type="text" name="title" size="30" value="<?php if ($edit) { echo $this->item['title']; } ?>" /></div>
				</fieldset>
				<fieldset id="postdiv">
					<legend>Comments</legend>
					<div><textarea rows="10" cols="40" name="comments" id="content"><?php if ($edit) { echo $this->item['comments']; } ?></textarea></div>
				</fieldset>
				<p class="submit">
					<input type="submit" value="Add Book" />
				</p>
				<div id="advancedstuff">
					<div id="crMore" class="dbx-group">
						<fieldset class="dbx-box">
							<h3 class="dbx-handle">Author(s)</h3>
							<div class="dbx-content">
								A comma seperated list of the authors
								<div><input type="text" size="60" name="author" value="<?php if ($edit) { echo $this->item['author']; } ?>" /></div>
							</div>
						</fieldset>
						<fieldset class="dbx-box">
							<h3 class="dbx-handle">Amazon URL</h3>
							<div class="dbx-content">
								The URL to this item at Amazon
								<div><input type="text" size="60" name="url" value="<?php if ($edit) { echo $this->item['url']; } ?>" /></div>
							</div>
						</fieldset>
					</div>
				</div>
			</div>
		</div>
		</form>

<?php
	} // function writePage()

	function managePage() {
		// Return page of results
		if ($_GET['crpage']) {
			$results = $this->getPage($_GET['crpage']);
		} else {
			$results = $this->getPage();
		}

		// Generate previous/next page links for paging
		if (1 >= $_GET['crpage']) {
			$newerpage = "";
		} elseif (1 < $_GET['crpage']) {
			$newerpage = "<a href='edit.php?page=".ACTION_FILE."&crpage=".$_GET['crpage']--."'>Next Entries &raquo;</a>";
		}
		$this->query = "SELECT count(*) FROM ".CR_TABLE;
		$total_pages = $this->queryDB('var');
		$total_pages = ceil($total_pages / $this->options['postspp']);
		if ($total_pages <= $_GET['crpage']) {
			$olderpage = "";
		} elseif ($total_pages > $_GET['crpage']) {
			$olderpage = "<a href='edit.php?page=".ACTION_FILE."&crpage=".$_GET['crpage']++."'>$laquo; Previous Entries</a>";
		}
?>
		<div class="wrap">
			<h2>Last <?php echo $this->options['postspp']; ?> Books</h2>
			<table id="currently_reading" width="100%" cellpadding="3" cellspacing="3">
				<tr>
					<th scope="col">ASIN</th>
					<th scope="row">Date</th>
					<th scope="col">Title</th>
					<th scope="col">Author(s)</th>
					<th scope="col">Read</th>
					<th scope="col"></th>
					<th scope="col"></th>
				</tr>
<?php
		if ($results) {
			foreach ($results as $result) {
				if ($class) {
					$class = FALSE;
				} else {
					$class = 'alternate';
				}
				echo "<tr id='book-<?php echo $result->id; ?>' class='$class'>";
				echo "<td>$result->asin</td>"; // Items ASIN
				echo "<td>$result->date</td>"; // Date item was posted
				echo "<td>$result->title</td>"; // Item title
				echo "<td>$result->author</td>"; // Item Author(s)
				echo "<td>$result->read</td>"; // percent of book that is done
				echo "<td><form action='post.php?page=".ACTION_FILE."' method='post'>";
				echo "<input type='hidden' name='craction' value='edit' />";
				echo "<input type='hidden' name='crid' value='$result->id' />";
				echo "<input type='submit' value='Edit' /></form></td>"; // Edit the item
				echo "<td><form action='post.php?page=".ACTION_FILE."' method='post'>";
				echo "<input type='hidden' name='craction' value='delete' />";
				echo "<input type='hidden' name='crid' value='$result->id' />";
				echo "<input type='submit' value='Delete' /></form></td>"; // Delete the item
				echo "</tr>";
			}
		}
?>
			</table>
<?php
		if (!$results) {
			echo "<p>You have not posted any books yet, care to <a href='post.php?page=".ACTION_FILE."'>do so</a>?</p>";
		}
?>
			<div style="float: left;"><?php echo $olderpage; ?></div><div style="float: right;"><?php echo $newerpage; ?></div>
		</div>
<?php
	} // function managePage()

	function optionsPage() {

		if ($_POST['cr_action'] == 'store_options') {
			if ('file' == $_POST['access_opt'] || 'curl' ==  $_POST['access_opt']) {
				$this->options['access_opt'] = $_POST['access_opt'];
			}
			if ($_POST['postspp'] && is_numeric($_POST['postspp'])) {
				$this->options['postspp'] = $_POST['postspp'];
			}
			if ($_POST['aff_id']) {
				$this->options['aff_id'] = $_POST['aff_id'];
			}
			$this->storeOptions();
?>
		<div class="updated">
			<p>The Currently Reading options have been updated</p>
		</div>
<?php
		}
?>
		<div  class="wrap">
			<h2>Currently Reading Options</h2>
			<form action="options-general.php?page=<?php echo ACTION_FILE; ?>" method="post">
				<table width="700px" cellspacing="2" cellpadding="5" class="editform">
					<tr valign="top">
						<th scope="row">Amazon Access Option</th>
						<td>
							<select name="access_opt">
								<option value="file" <?php if ('file' == $this->options['access_opt']) { echo "selected='selected'"; } ?>>file (default)</option>
								<option value="curl" <?php if ('curl' == $this->options['access_opt']) { echo "selected='selected'"; } ?>>curl</option>
							</select>
							<p><small>file() used by default, if your webhost does not have allow_url_fopen enabled you can use the curl option. Most web hosts have curl compiled into PHP</small></p>
						</td>
					</tr>
					<tr>
						<th scope="row">Amazon Affiliate ID</th>
						<td>
							<input type="text" size="24" name="aff_id" value="<?php echo $this->options['aff_id']; ?>" />
							<p><small>This affiliate ID will be used when generating the Amazon link to each item. By default it is set to mine, but feel free to change it</small></p>
						</td>
					</tr>
					<tr>
						<th scope="row">Posts Per Page</th>
						<td>
							<input type="text" size="8" name="postspp" value="<?php echo $this->options['postspp']; ?>" />
							<p><small>Chose how many posts to display per page. Option used for admin page and for display page</small></p>
						</td>
					</tr>
				</table>
				<p class="submit">
					<input type="hidden" name="cr_action" value="store_options" />
					<input type="submit" value="Update Options &raquo;" />
				</p>
			</form>
		</div>
<?php
	} // function optionsPage()
	
	
	function adminHeaderDBX() {
		$dbxurl = get_settings('siteurl').'/wp-includes/js/dbx.js';
		$output = "<script type='text/javascript' src='$dbxurl'></script>\n";
		$protourl = get_settings('siteurl').'/wp-content/plugins/'.PLUGIN_DIR.'/js/prototype.js';
		$output .= "<script type='text/javascript' src='$protourl'></script>\n";
		$url = get_settings('siteurl').'/wp-content/plugins/'.PLUGIN_DIR.'/js/currently-reading.js.php';
		$output .= "<script type='text/javascript' src='$url'></script>\n";
		$output .= "<style type='text/css'>#spinner { display: none; }</style>\n";
		echo $output;
	}

}

?>
