<?php
/**
 * Plugin Name: Nova Dashboard Widget - BBC News - Technology
 * Plugin URI: http://www.novadigitalmedia.com
 * Description: A simple plugin that adds a BBC News Technology RSS feed to your worpress dashboard
 * Version: 1.0
 * Author: Conor Lyons
 * Author URI: http://www.conorlyonsuk.com
 * License: GPL2
 */
 
 /*  Copyright 2013  Conor Lyons  (email : c.lyons@novadigitalmedia.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/************* DASHBOARD WIDGET *****************/

// RSS Dashboard Widget
function nova_rss_dashboard_widget_bbcnews_technology() {
	if ( function_exists( 'fetch_feed' ) ) {
		include_once( ABSPATH . WPINC . '/feed.php' );               
		$feed = fetch_feed( 'http://feeds.bbci.co.uk/news/technology/rss.xml' );        
		$limit = $feed->get_item_quantity(4);                      
		$items = $feed->get_items(0, $limit);                      
	}
	if ($limit == 0) echo '<div>The RSS Feed is either empty or unavailable.</div>';  
	else foreach ($items as $item) { ?>

	<h4 style="margin-bottom: 0;">
		<a href="<?php echo $item->get_permalink(); ?>" title="<?php echo mysql2date( __( 'j F Y @ g:i a', 'bbc-tech' ), $item->get_date( 'Y-m-d H:i:s' ) ); ?>" target="_blank">
			<?php echo $item->get_title(); ?>
		</a>
	</h4>
	<p style="margin-top: 0.5em;">
		<?php echo substr($item->get_description(), 0, 200); ?>
	</p>
	<?php }
}

function nova_custom_dashboard_widgets_bbcnews_technology() {
	wp_add_dashboard_widget( 'nova_rss_dashboard_widget_bbcnews_technology', __( 'Recently From BBC News Technology', 'bbc-tech' ), 'nova_rss_dashboard_widget_bbcnews_technology' );
}

add_action( 'wp_dashboard_setup', 'nova_custom_dashboard_widgets_bbcnews_technology' );

?>