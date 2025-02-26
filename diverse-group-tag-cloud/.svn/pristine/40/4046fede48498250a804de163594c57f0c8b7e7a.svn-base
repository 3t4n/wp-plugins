<?php
/*
Plugin Name: Diverse Group Tag Cloud
Plugin URI: http://techxplorer.com/projects/diverse-group-tag-cloud/
Description: A plugin to create a tag cloud by using the posts in a list of blogs
Version: 2.0.2
Author: techxplorer
Author URI: http://techxplorer.com
*/
/*
 * Diverse Group Tag Cloud - A plugin to create a tag cloud by using the posts in a list of blogs
 * Copyright (C) 2008 - 2009 Corey Wallis <corey@techxplorer.com>
 * 
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 */

//Debug Code
//error_reporting(E_ALL);
//ini_set('display_errors', 'true');

/**
 * citation-aggregator class contains all of the code for the operation of the plugin
 */
if (!class_exists('diverse_group_tag_cloud')) {

	/* set some constants to define how the plugin works
	 * most user shouldn't need to adjust these, which is why there is no UI
	 */
	if(!defined('DGTC_MIN_FONT_SIZE')) { // minimum font size to use in the cloud
		define('DGTC_MIN_FONT_SIZE', '5');
	}
	
	if(!defined('DGTC_MAX_FONT_SIZE')) { // maximum font size to use in the cloud
		define('DGTC_MAX_FONT_SIZE', '36');
	}
	
	if(!defined('DGTC_CLOUD_LINE_HEIGHT')) { // line height of <p> tag enclosing the cloud
		define('DGTC_CLOUD_LINE_HEIGHT', '200%');
	}
	
	if(!defined('DGTC_MIN_TAG_COUNT')) { // minimum occurance count for a keyword to be included in the cloud
		define('DGTC_MIN_TAG_COUNT', '2');
	}
	
	// define the class the holds all of the code
	class diverse_group_tag_cloud {
	
		// Name of the options variable stored in the database
		var $admin_opt_name = 'diverse-group-tag-cloud';
		
		// Name of the table used to store the keywords
		var $table_name = 'diverse_group_tag_cloud';
		
		// URL for the Yahoo! pipe to use to extract the keywords
		var $yahoo_pipe = 'http://pipes.yahoo.com/pipes/pipe.run?_id=kC3J2aMl3hG_0zSCZMag4A&_render=rss&feedurl='; // append URL of feed to this URL to make it work
		
		/**
		 * Private function to see if the SimplePie class
		 * @returns bool
		 */
		function check_simple_pie() {
			
			// check if the class exists
			if(!class_exists('SimplePie')) {
				// class is missing, so can we load the version included with WordPress?
				
				// build path
				$simplepie_path = ABSPATH . WPINC . '/simplepie.inc';
				
				// check to see it exists
				if(is_file($simplepie_path) && is_readable($simplepie_path)) {
					// include the file
					require_once($simplepie_path);
				} else {
					// it appears to be missing, include our copy
					require_once(dirname(__FILE__) . '/includes/simplepie/simplepie.inc');
				}
			}
			
			// double check to ensure everything is now loaded
			if(!class_exists('SimplePie')) {
				// Class doesn't appear to be here
				return FALSE;
			} else {
				return TRUE;
			}
		} // end simple pie class check
		
		/**
		 * function to check for the existance of the table used to store the terms
		 */
		function check_table() {
			// scope database class appropriately
			global $wpdb;
		
			// build the full name of the table
			$table = $wpdb->prefix . $this->table_name;
			
			// check if the table exists
			// can get more complex if we need to detect table version between upgrades
			if($wpdb->get_var("SHOW TABLES LIKE '$table'") != $table) {
				// table does not exist
				return FALSE;
			} else {
				// table does exist
				return TRUE;
			}
		
		} // end function to check for the table
		
		/**
		 * function to build the table used to store the terms
		 */
		function create_table() {
		
			// scope database class appropriately
			global $wpdb;
		
			// build the full name of the table
			$table = $wpdb->prefix . $this->table_name;
			
			// make sure the table doesn't exist
			if($this->check_table == FALSE) {
				// create the table
				$sql = $wpdb->prepare("CREATE TABLE {$table} (blog_id BIGINT NOT NULL,
															  keyword VARCHAR(100) NOT NULL,
															  post_url VARCHAR(255) NOT NULL,
															  post_title VARCHAR(255) NOT NULL,
															  INDEX(blog_id, keyword),
															  INDEX(keyword))");
															  
				// execute the query
				$result = $wpdb->query($sql);
				
				if($result === FALSE) {
					return FALSE;
				} else {
					return TRUE;
				}
					
			} else {
				// table exists so just return TRUE
				return TRUE;
			}		
		} // end function to create the table
		
		
		/**
		 * Function to build and display the admin page
		 */
		function display_admin_page() {
				
			// Check to ensure the SimplePie class is available
			if($this->check_simple_pie() == FALSE) {
				print '<div id="message" class="error fade"><p><strong>Error: </strong>The SimplePie class is missing, either the version included with WordPress or the one included with this plugin could not be loaded.';
				print '<br/>This class is required for the plugin to work. Please check the necessary files and permissions to see why the class is missing.</p></div>';
			}
			
			// check to ensure the table exists
			if($this->check_table() == FALSE) {
				print '<div id="message" class="error fade"><p><strong>Error: </strong>The database table used to store the terms used to build the tag cloud is missing.<br/>';
				print 'Please reactivate the plugin to create this table. If the problem persists please check your database settings.</p></div>';
			}
			
			// start output of the page
			print '<div class="wrap"><h2>Diverse Group Tag Cloud</h2><form method="post" action="options.php">';
			print '<table class="form-table">';
			
			// output hidden fields
			settings_fields($this->admin_opt_name . '-options');
			
			// collect the email address
			print '<tr valign="top"><th scope="row">Email Address</th><td>';
			print '<input type="text" name="' . $this->admin_opt_name . '_email_address" value="' . get_option($this->admin_opt_name . '_email_address') . '" />';
			print '<br/>Enter an email address that will receive email notifications when things do not work as expected<br/>Leave blank to disable this feature</td></tr>';
			
			// get the default category
			print '<tr valign="top"><th scope="row">Default Link Category</th><td>';
			print $this->get_categories($this->admin_opt_name . '_default_category', get_option($this->admin_opt_name . '_default_category'));
			print '<br/>Select the default category for all links aggregated by the plugin';
			print '<br/>It is recommended that you <a href="/wp-admin/edit-link-categories.php" title="Link Categories Admin page">create a new link category</a> specifically for this purpose</td></tr>';
			
			// display promo link
			print '<tr valign="top"><th scope="row">Display Plugin Link</th><td>';
			
			if(get_option($this->admin_opt_name . '_promo_link') == 'yes') {			
				print '<input type="checkbox" checked="checked" name="' . $this->admin_opt_name . '_promo_link" value="yes"/>';			
			} else {			
				print '<input type="checkbox" name="' . $this->admin_opt_name . '_promo_link" value="yes"/>';			
			}
			
			print '<br/>Tick this box to display a link to the plugin project page at the end of the list of links<br/>(disabled by default)</td></tr>';
								
			// finalise table
			print '</table>';
			
			// finalise page
			if($this->check_simple_pie() != FALSE) {
				print '<p class="submit"> <input type="submit" name="Submit" value="' . __('Save Changes') . '" /> </p> </form>';
			}
			
			// declare helper variables
			$link_category = get_option($this->admin_opt_name . '_default_category');
			
			// get the list of links
			if($link_category != '') {
			
				// output a descriptive text
				print '<p>The table below contains a list of blog that have been added to the Default Link Category, defined above, and will be used as a source of content for the construction of the cloud</p>';
				print '<p>Use the <a href="/wp-admin/link-manager.php" title="Direct link to the Link Manager">Link Manager</a> to manage these links.<br/>Don\'t forget that when adding links for the plugin to use that you must:</p>';
				print '<ol><li>Complete the following fields:<ol><li>Link Name</li><li>Web Address</li><li>Description</li><li>RSS Address</li></ol></li>';
				print '<li>Ensure the link is associated with the Default Link Category, defined above</li></ol>';
				print '<p>&nbsp;</p>';
			
				// output table header & footer
				print '<table class="widefat fixed" cellspacing="0"><thead><tr>';
				print '<th scope="col" id="name" class="manage-column column-name" style="">Blog Name / Description</th>';
				print '<th scope="col" id="url" class="manage-column column-url" style="">Blog Link</th>';
				print '<th scope="col" id="last-updated" class="manage-column column-name" style="">Last New Content Check</th>';
				print '<th scope="col" id="rss-url" class="manage-column column-url" style="">Blog RSS Link</th>';
				print '</tr></thead><tfoot><tr>';
				print '<th scope="col" id="name" class="manage-column column-name" style="">Blog Name / Description</th>';
				print '<th scope="col" id="url" class="manage-column column-url" style="">Blog Link</th>';
				print '<th scope="col" id="last-updated" class="manage-column column-name" style="">Last New Content Check</th>';
				print '<th scope="col" id="rss-url" class="manage-column column-url" style="">Blog RSS Link</th>';
				print '</tfoot><tbody>';
				
				// get the list of bookmarks
				$bookmarks = get_bookmarks('orderby=name&hide_invisible=0&category=' . $link_category);
				
				// check on what was returned
				if(is_array($bookmarks)) {
					foreach($bookmarks as $bookmark) {
						// output one row per bookmark
						print '<tr><td>' . $bookmark->link_name . '<br/>' . $bookmark->link_description . '</td>';
						print '<td><a href="' . $bookmark->link_url . '" title="Visit the blog" target="_blank">Visit the blog</a></td>';
						if($bookmark->link_updated != '0000-00-00 00:00:00') {
							print '<td>' . $bookmark->link_updated . '</td>';
						} else {
							print '<td>Yet to occur</td>';
						}
						print '<td><a href="' . $bookmark->link_rss . '" title="Check the RSS feed" target="_blank">Check the RSS feed</a></td></tr>';
					}
				} else {
					print '<tr><td colspan="3" style="text-align: center"><strong>Unable to load list of bookmarks.</strong>Please add links to the category specified above</td></tr>';
				}
				
				// finish the table body
				print '</tbody></table>';
				
				// debug code
				$result = $this->update_keywords();
				
				print '<p>###';
				var_dump($result);
				print '###</p>';
				
				// finalise the page
				print '</div>';

			}
			
		} // end the display_admin_page function
		
		/**
		 * Private function to get a list of categories and return a select html element
		 * if a category ID matches that provided it is marked as selected
		 */
		private function get_categories($field_name, $cat_id = NULL) {
		
			// get the list of existing link categories
			$categories = get_categories('type=link&hide_empty=0&orderby=name&order=ASC');
			
			// start building the select tag
			$tag = '<select name="' . $field_name . '" size="1">';
			$tag .= '<option value="null">Select a Category</option>';
			
			foreach($categories as $category) {
				if($category->term_id == $cat_id) {
					$tag .= '<option value="' . $category->term_id . '" selected="selected">' . $category->name . '</option>';
				} else {
					$tag .= '<option value="' . $category->term_id . '">' . $category->name . '</option>';
				}
			}
			
			// finalise the tag
			$tag .= '</select>';
			
			return $tag;
		
		} // end function to get the categories
		
		/**
		 * function to update the list of keywords used to build a tag cloud
		 */
		function update_keywords() {
		
			// first see if the link category has been defined
			$link_category = get_option($this->admin_opt_name . '_default_category');
			if($link_category == FALSE) { // link category hasn't been defined
				return FALSE;
			}
			
			// check on the existence of the table
			if($this->check_table() == FALSE) { // table is missing
				return FALSE;
			}
			
			// get a list of blogs with which to work with
			$blogs = get_bookmarks('orderby=name&hide_invisible=0&category=' . $link_category);
			
			if(!is_array($blogs)) { // no blogs listed yet
				return FALSE;
			} 
			
			// next check on the simplepie class
			if($this->check_simple_pie() == FALSE) { // the class is missing
				return FALSE;
			}
			
			// lastly build the stop word list
			$stop_words = dirname(__FILE__) . '/stop-word-list.inc'; // build path to file
			
			// ensure the file is present and readable				
			if(is_file($stop_words) && is_readable($stop_words)) {
				// load the file into the array
				$stop_words = file($stop_words);
			}
			
			// tidy list of stop words by removing comments and EOL characters
			foreach($stop_words as $word) {
				if(strpos($word, '#') === FALSE) {
					$out[] = trim($word);
				}
			}
			
			// put contents of temporary array into properly named array
			$stop_words = $out;
			unset($out); // play nice and tidy up
			
			// scope global variables appropriately
			global $wpdb;
			
			// declare additional helper variables
			// build the full name of the table
			$table = $wpdb->prefix . $this->table_name;
			
			// keep track of those blogs that were updated
			$updated_blogs = array();
						
			/*
			 * Up until now all of the possible errors have other visual indicators
			 * From now on we send an email, if configured to do so, when an error occurs
			 */
			
			// all the parts are in place, so lets build the keywords
			foreach($blogs as $blog) {
			
				// fetch the RSS of this blog & suppress any warnings
				@$rss = new SimplePie($this->yahoo_pipe . $blog->link_rss);
				
				// check to see if it worked
				if($rss == FALSE) {
					// rss failed
					$this->send_email("The plugin was unable to retrieve the following RSS feed:\n" . $this->yahoo_pipe . $blog->link_rss);
					return FALSE;
				} else {
					// fetching of the feed worked
					// delete any existing keywords for this blog
					$sql = $wpdb->prepare("DELETE FROM {$table} WHERE blog_id = %s", $blog->link_id);
					$wpdb->query($sql);					
					
					// loop through the list of items
					foreach($rss->get_items() as $item) {
					
						// build the list of keywords
						$keywords = explode(' ', $item->get_description());
						
						// ensure the keywords list is an array
						if(!is_array($keywords)) {
							$this->send_email("The plugin was unable to build a list of keywords for the following RSS item:\n" . $item->get_title() . "\n" . $item->get_link());
							return FALSE;
						}
						
						// remove any duplicates from the array
						$keywords = array_unique($keywords);
						
						// add each keyword to the table
						foreach($keywords as $keyword) {
							
							// filter out null strings
							// filter out keywords in the stop word list
							// filter out numbers as well
							if($keyword != '' && !in_array($keyword, $stop_words) && !is_numeric($keyword)) {
								// keyword is not in array
								// prepare the sql
								$sql = $wpdb->prepare("INSERT INTO {$table} (blog_id, keyword, post_url, post_title) VALUES
													   (%d, %s, %s, %s)", $blog->link_id, $keyword, $item->get_link(), $item->get_title());
								
								// execute the sql
								$result = $wpdb->query($sql);
								
								// check on the result of the sql
								if($result == FALSE) {
									// send an error email if configured to do so
									$this->send_email("The plugin was unable to execute the following sql:\n" . $wpdb->last_query);
									return FALSE;
								}
							}
						} // end loop through the keywords
						
					} // end loop through the items
					
					// update the link table to show that the rss was retrieved
					$wpdb->query($wpdb->prepare("UPDATE $wpdb->links SET link_updated = NOW()
												 WHERE link_id = %d", $blog->link_id));
												 
					// store name of blog for success email
					$updated_blogs[] = $blog->link_name;
										
				} // end check to see if the RSS got retrieved
				
			} // end loop through the configured blogs
			
			// send success email
			$message = "Successfully retrieved tags from the following blogs / sites:\n"; // start message
			
			// add blogs to message
			foreach($updated_blogs as $blog) {
				$message .= "- {$blog} \n";
			}
			
			// send email
			$this->send_email($message, TRUE);
			
			// everything went ok
			return TRUE;
					
		} // end function to update the list of keywords
		
		// private function to send an email if something bad happens
		private function send_email($message = NULL, $success = NULL) {
			// check on the parameters
			if($message === NULL) {
				return FALSE;
			}
			
			// get the email address to send email to
			$email_address = get_option($this->admin_opt_name . '_email_address');
			
			// get the name this blog
			$blog_name = get_bloginfo('name');
			
			// check to make sure we're allowed to send email
			if($email_address != '' && $email_address != FALSE) {
				// add boilerplate to email
				if($success === NULL) {
					$message .= "\n\nIf this problem persists, please forward this email to corey@techxplorer.com";
					$subject = "[{$blog_name}] Diverse Group Tag Cloud - Error Message";
				} else {
					$subject = "[{$blog_name}] Diverse Group Tag Cloud - Update Message";
				}
											
				// send the message
				wp_mail($email_address, $subject, $message);
			}
		} // end function to send email
		
		// function to add the javascript the options page
		function admin_page_header() {
		
			print "<!-- JavaScript and includes for the citation-aggregator plugin -->\n";
			wp_enqueue_script('diverse-group-tag-cloud', plugins_url('/diverse-group-tag-cloud/diverse-group-tag-cloud.js'), array('jquery'), '1.0');
			wp_print_scripts();
		
		} // end function to add javascript to the options page
		
		// function to create the tag cloud
		function generate_cloud($atts, $content = NULL) {
		
			// process the list of attributes
			// based on idiom at: http://codex.wordpress.org/Shortcode_API
			$options = shortcode_atts(array(
				'listsources' => 'no',
				'cloudstats' => 'no'
				), $atts);
		
			// scope global variables accordingly
			global $wpdb;
			
			// build the full name of the table
			$table = $wpdb->prefix . $this->table_name;
			
			// start a general error message
			$error = '<p><strong>Diverse Group Tag Cloud Error:</strong> ';
			
			// make sure the table is there
			if($this->check_table() == FALSE) {
				$error .= 'Unable to locate the ' . $table . ' table in your MySQL database. Check the plugin configuration and try again.';
				return $error;
			}
			
			// get a list of keywords and their count
			$sql = "SELECT keyword as text, COUNT(keyword) as count 
					FROM {$table}
					GROUP BY keyword
					HAVING COUNT(keyword) > " . DGTC_MIN_TAG_COUNT .'
					ORDER BY rand()';
			
			$keywords = $wpdb->get_results($sql, ARRAY_A);
			
			// check on what was returned
			if(!is_array($keywords) || count($keywords) <= 1) {
				$error .= 'Insufficient keywords found to build a tag cloud. Check the plugin configuration and try again.';
			}
			
			// get the minimum and maximum count
			$max_count = 0;
    		$min_count = 100000000;
    		
    		foreach($keywords as $keyword) {
				if($keyword['count'] > $max_count) {
						$max_count = $keyword['count'];
				}

				if($keyword['count'] < $min_count) {
					$min_count = $keyword['count'];
				}
			}
			
			// get the count range
			$count_range = $max_count - $min_count;
			
			// calculate the logs of the counts
			$max_count_log = log(($max_count));
			$min_count_log = log(($min_count));
			
			// determine the log count range
			if ($max_count_log != $min_count_log) {
				$count_range_log = $max_count_log - $min_count_log;
			} else {
				$count_range_log = 1;
			}
			
			// determine additional variables
			$font_range = DGTC_MAX_FONT_SIZE - DGTC_MIN_FONT_SIZE;
			
			// build the tag cloud
			$cloud = '<div class="dgtc_cloud"><p style="line-height: ' . DGTC_CLOUD_LINE_HEIGHT . '">';
			
			// keep a running total of counts
			$count_total = 0;
			
			foreach($keywords as $keyword) {
				// determine the font size for this keyword
				$font_size = DGTC_MIN_FONT_SIZE + $font_range * (log($keyword['count']) - $min_count_log) / $count_range_log;
        		$font_size = round($font_size);
        		
        		// add the item to the cloud
        		$cloud .= '<a href="#" onclick="dgtc_lookup(\'' . $keyword['text'] . '\'); return false;" title="View items associated with tag: ' . $keyword['text'] . '" style="font-size: ' . $font_size . 'px">';
        		$cloud .= $keyword['text'] . '</a> ';
        		
        		// add to the running total of the counts
        		$count_total += $keyword['count'];
        	}
        	
        	// finalise cloud
        	$cloud .= '</p></div>';
        	
        	// add the div to hold the links associated with a tag
        	$cloud .= '<div id="dgtc_lookup" class="dgtc_lookup_list"></div>';
        	
        	// add stats if we're required
        	if(strtolower($options['cloudstats']) == 'yes') {
	        	$cloud .= '<div class="dgtc_stats"><h3>Cloud Stats</h3>';
	        	$cloud .= '<ul><li>Number of tags in cloud: ' . count($keywords) . '</li>';
	        	$cloud .= '<li>Average Number of Links per tag: ' . round($count_total / count($keywords)) . '</li></ul></div>';
        	}
        	
        	// add the list if sources if necessary
        	if(strtolower($options['listsources']) == 'yes') {
        		// we need to include a list of sources
        		// first see if the link category has been defined
				$link_category = get_option($this->admin_opt_name . '_default_category');
			
				// get a list of blogs with which to work with
				$blogs = get_bookmarks('orderby=name&hide_invisible=0&category=' . $link_category);
				
				// start additional text
				$cloud .= '<div class="dgtc_sources"><h3>Sources use in the tag cloud</h3><ul>';
				
				// loop through blogs and add them to the list
				foreach($blogs as $blog) {
					$cloud .= '<li><a href="' . $blog->link_url . '" title="Direct link to source">' . $blog->link_name . '</a><br/>' . $blog->link_description . '</li>';
				}
				
				// finalise the list
				$cloud .= '</ul></div>';
        	}
        	
        	// add the promo link if we're allowed
        	if(get_option($this->admin_opt_name . '_promo_link') == 'yes') {
        		$cloud .= '<div class="dgtc_promo"><p>This tag cloud generated by the <a href="http://techxplorer.com/projects/diverse-group-tag-cloud/" rel="nofollow" title="More info about the plugin - New Window" target="_blank">Diverse Group Tag Cloud</a> plugin for <a href="http://wordpress.org" title="More info about Wordpress - New Window" target="_blank" rel="nofollow">WordPress</a>.</p></div>';
        	}
        	
        	// return the cloud
        	return $cloud;

			// check to make sure the query worked
		} // end function to generate the tag cloud
		
		// function to lookup the posts associated with a tag
		function lookup_tag($tag = NULL) {
		
			if($tag === NULL || $tag == '') {
				return 'Missing tag parameter';
			}
			
			// declare global variables
			global $wpdb;
			
			// build the full name of the table
			$table = $wpdb->prefix . $this->table_name;
			
			// prepare the SQL to lookup the URLs
			$sql = $wpdb->prepare("SELECT post_title, post_url
								   FROM {$table}
								   WHERE keyword = %s
								   ORDER BY post_title", $tag);
								   
			// get the results
			$links = $wpdb->get_results($sql, ARRAY_A);
			
			// check on what was returned
			if(!is_array($links) || count($links) == 0) {
				return '<p>No posts found matching the selected tag.</p>';
			}
			
			// we have an array of links so build the list
			$output = '<h3>Posts associated with tag: ' . $tag . '</h3><ul>';
			
			foreach($links as $link) {
				$output .= '<li><a href="' . $link['post_url']. '" title="View Original Post - New Window" target="_blank">' . $link['post_title'] . '</a></li>';
			}
			
			// finallise the list
			$output .= '</ul>';
			
			// add statistics
			$output .= '<p>Number of posts associated with tag: ' . count($links) . '</p>';			
			
			// return the output
			return $output;		
		} // end lookup tag function
		
		/**
		 * Functions for dealing with widgets
		 */
		function widget($args) {
		
			// declare global variables
			global $wpdb;
			
			// build the full name of the table
			$table = $wpdb->prefix . $this->table_name;
			
			// extract the individual variables from the $args array
			extract($args);
			
			// get the options for the widget
			$title     = get_option($this->admin_opt_name . '_widget_title');
			$cloud_url = get_option($this->admin_opt_name . '_widget_url');
			
			// double check the options
			if($title == FALSE) {
				$title = 'Top 5 Group Tags';
			}
			
			// output start of the header
			print $before_widget . $before_title . $title . $after_title;
			
			// prepare the SQL to lookup the URLs
			$sql = $wpdb->prepare("SELECT keyword as text, COUNT(keyword) as count 
								   FROM {$table}
								   GROUP BY keyword
								   HAVING COUNT(keyword) > " . DGTC_MIN_TAG_COUNT .'
								   ORDER BY COUNT(keyword) DESC
								   LIMIT 5');
								   
			// get the results
			$keywords = $wpdb->get_results($sql, ARRAY_A);
			
			// check on what was returned
			if(!is_array($keywords) || count($keywords) == 0) {
				print '<p>Error: Unable to load tags</p>';
			} else {
				// output the keywords
				print '<ul>';
				
				foreach($keywords as $keyword) {
					print "<li>{$keyword['text']}</li>";
				}
				
				print '</ul>';
			}
			
			// output the URL to the tag cloud if it is set
			if($cloud_url != FALSE) {
				print '<a href="' . $cloud_url . '" title="">View the Tag Cloud</a>';
			}
			
			print $after_widget;		
		
		} // end widget function
		
		// function to manage the settings for the widget
		function widget_control() {
		
			// deal with the form submission
			if ( $_POST['dgtc_widget_submit'] ) {

				// Remember to sanitize and format use input appropriately.
				$title     = strip_tags(stripslashes($_POST['dgtc_widget_title']));
				$cloud_url = strip_tags(stripslashes($_POST['dgtc_widget_url']));
				
				// save options
				update_option($this->admin_opt_name . '_widget_title', $title);
				update_option($this->admin_opt_name . '_widget_url', $cloud_url);
			}
		
			// get the options
			$title     = get_option($this->admin_opt_name . '_widget_title');
			$cloud_url = get_option($this->admin_opt_name . '_widget_url');
			
			// check on the options
			// double check the options
			if($title == FALSE) {
				$title = 'Top 5 Group Tags';
			}
			
			if($cloud_url == FALSE) {
				$cloud_url = '';
			}
			
			// ensure formatting of options is ok
			$title = htmlspecialchars($title, ENT_QUOTES);
			$cloud_url = htmlspecialchars($cloud_url, ENT_QUOTES);
			
			// output the form
			print '<p style="text-align:left;"><label for="dgtc_widget_title">' . __('Title:') . ' <br/><input style="width: 200px;" id="dgtc_widget_title" name="dgtc_widget_title" type="text" value="'.$title.'" /></label></p>';
			print '<p style="text-align:left;"><label for="dgtc_widget_url">URL to Tag Cloud: <br/><input style="width: 200px;" id="dgtc_widget_url" name="dgtc_widget_url" type="text" value="'.$cloud_url.'" /></label></p>';
			print '<input type="hidden" id="dgtc_widget_submit" name="dgtc_widget_submit" value="1" />';		
		
		} // end function to manage widget settings
		
	} // end class definition for diverse-group-tag-cloud
	
} // end class definition

//Initialise the class
if(class_exists('diverse_group_tag_cloud')) {
	$dgtc = new diverse_group_tag_cloud();
}

// Function to print the admin options panel
if(!function_exists('diverse_group_tag_cloud_options')) {
	function diverse_group_tag_cloud_options() {
		global $dgtc;
		
		if (!isset($dgtc)) {
			// class instance is missing so just return
			return;
		}
		
		if(function_exists('add_options_page')) {
			$page = add_options_page('Diverse Group Tag Cloud', 'Diverse Group Tag Cloud', 9, basename(__FILE__), array(&$dgtc, 'display_admin_page'));
			add_action("admin_head-$page", array(&$dgtc, 'admin_page_header'));
		}
	}
}

// Add an hourly schedule to run updates
if(!function_exists('diverse_group_tag_cloud_update')) {
	function diverse_group_tag_cloud_update() {

		if(class_exists('diverse_group_tag_cloud')) {
			$dgtc_tag_cloud = new diverse_group_tag_cloud();
		}
		
		// update the database table
		$dgtc_tag_cloud->update_keywords();
	}
}

// function to activate the plugin
if(!function_exists('diverse_group_tag_cloud_activate')) {
	function diverse_group_tag_cloud_activate() {
	
		// schedule the update event	
		wp_schedule_event(time(), 'twicedaily', 'diverse_group_tag_cloud_schedule_hook');
		
		// create the database table
		global $dgtc;
		
		if(!isset($dgtc)) {
			$dgtc = new diverse_group_tag_cloud();
		}
		
		$dgtc->create_table();
	}
}

// function to deactivate the plugin
if(!function_exists('diverse_group_tag_cloud_deactivate')) {
	function diverse_group_tag_cloud_deactivate() {
	
		// schedule the update event	
		wp_clear_scheduled_hook('diverse_group_tag_cloud_schedule_hook');
	}
}

// function to register our options
if(!function_exists('diverse_group_tag_cloud_register_options')) {
	function diverse_group_tag_cloud_register_options() {
	
		global $dgtc;
		
		if(!isset($dgtc)) {
			$dgtc = new diverse_group_tag_cloud();
		}
		
		$option_prefix = $dgtc->admin_opt_name;
		
		register_setting($option_prefix . '-options', $option_prefix . '_email_address', 'sanitize_email');
		register_setting($option_prefix . '-options', $option_prefix . '_default_category', 'intval');
		register_setting($option_prefix . '-options', $option_prefix . '_promo_link', 'diverse_group_tag_cloud_options_filter');		
	
	}
} // end function to register options

// function to filter yes/no options
if(!function_exists('diverse_group_tag_cloud_options_filter')) {
	// option values should be only yes / no
	function diverse_group_tag_cloud_options_filter($value) {
		if(strtolower($value) == 'yes') {
			return 'yes';
		} else {
			return 'no';
		}
	}
}

// function to add our JavaScript into page headers
if(!function_exists('diverse_group_tag_cloud_js')) {
	function diverse_group_tag_cloud_js() {
		wp_enqueue_script('diverse-group-tag-cloud-public', plugins_url('/diverse-group-tag-cloud/public-lookup.js'), array('jquery'), '1.0');
	}
}

// function to add our widget code
if(!function_exists('diverse_group_tag_cloud_widgets')) {
	function diverse_group_tag_cloud_widgets() {
		global $dgtc;
		
			if(!isset($dgtc)) {
				$dgtc = new diverse_group_tag_cloud();
			}
			
			if(function_exists('wp_register_sidebar_widget')) {
			wp_register_sidebar_widget('dgtc_tags_widget', 'DGTC - Tag List', array(&$dgtc, 'widget'));
		} else {
			register_sidebar_widget('dgtc_tags_widget', array(&$dgtc, 'widget'));
		}
		
		register_widget_control('dgtc_tags_widget', array(&$dgtc, 'widget_control'));
	}
}	

// Associate with appropriate actions and filters
if(isset($dgtc)) {

	// Actions
	// activation / deactivation hooks	
	register_activation_hook(__FILE__, 'diverse_group_tag_cloud_activate');
	register_deactivation_hook(__FILE__, 'diverse_group_tag_cloud_deactivate');
	
	// add schedule function
	add_action('diverse_group_tag_cloud_schedule_hook', 'diverse_group_tag_cloud_update');
	
	// admin page action
	add_action('admin_menu', 'diverse_group_tag_cloud_options');
	
	// admin init function - register our options
	add_action('admin_init', 'diverse_group_tag_cloud_register_options');
	
	// add action to print our JavaScript include
	add_action( 'wp_print_scripts', 'diverse_group_tag_cloud_js'); 
	
	// Filters
	// add filter for this short code
	if(function_exists('add_shortcode')) {
		add_shortcode('diverse-group-tag-cloud', array(&$dgtc, 'generate_cloud')); 
	}
	
	// Widgets
	add_action('widgets_init', 'diverse_group_tag_cloud_widgets');
}

?>
