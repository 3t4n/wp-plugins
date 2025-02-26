<?php
/*
 * Plugin Name: Akismet Spam Count
 * Version: 1.1
 * Plugin URI: http://cavemonkey50.com/code/akismet-spam-count
 * Description: Display the number of comments <a href="http://akismet.com/">Akismet</a> has marked as spam.
 * Author: Ronald Heft, Jr.
 * Author URI: http://cavemonkey50.com/
 */

function akismet_count ($text = false) {

$count = number_format(get_option('akismet_spam_count'));
$name = get_option('blogname');

if (($count) || (function_exists('akismet_stats'))) {

	if ($text != true)
		echo $count;
	else
		echo "<a href='http://akismet.com/'>Akismet</a> has protected " . $name . " from " . $count . " spam comments.";

	}
else
	echo "Error retrieving spam count. Check if you have <a href='http://akismet.com/'>Akismet</a> installed.";

}
 
?>