<?php
/**
 * A WordPress plugin that strips the #more fragments from the end of Read More teaser links.
 *
 * @author Guy Fisher
 * @copyright Copyright © 2019 Guy M. Fisher
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License
 * @link https://wordpress.org/plugins/striptease/
 * @package StripTease
 * @version 2.2
 *
 * @wordpress-plugin
 * Author: Guy Fisher
 * Author URI: https://profiles.wordpress.org/guyfisher/
 * Description: Strips the #more fragments from the end of Read More teaser links
 * License: GNU General Public License
 * License URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * Plugin Name: StripTease
 * Version: 2.2
 */

/**
 * Filter HTML markup passed from `the_content_more_link` hook in the `get_the_content` function
 *
 * @link https://developer.wordpress.org/reference/hooks/the_content_more_link/
 *
 * @since 2.0
 *
 * @param string $more_link_element HTML markup for Read More link element.
 * @return string
 */
function striptease_more_link( $more_link_element ) {
	$the_id = get_the_ID();
	if ( $the_id ) {
		$more_link_element = str_replace( "#more-$the_id", '', $more_link_element );
	}
	return $more_link_element;
}

add_filter( 'the_content_more_link', 'striptease_more_link', 20 );
