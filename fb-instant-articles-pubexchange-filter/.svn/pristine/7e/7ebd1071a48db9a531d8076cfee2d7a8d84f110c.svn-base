<?php
/**
 * Plugin Name: Instant Articles for WP (PubExchange Filter)
 * Description: Add PubExchange click tracking to Wordpress' official Instant Articles for Facebook plugin.
 * Author: PubExchange
 * Author URI: https://welcome.pubexchange.com/
 * Version: 0.2
 * Text Domain: instant-articles
 * License: GPLv2
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

function add_pubexchange_code( $content ) {
	$content .= '<figure class="op-tracker"><iframe><script>';
	$content .= '(function(l,d) {
  if (l.search.length){
    var m, u = {}, s = /([^&=]+)=?([^&]*)/g, q = l.search.substring(1);
    while (m = s.exec(q)) u[m[1]] = m[2];
    if (("pefbs" in u) && ("pefba" in u) && ("pefbt" in u)) {
      var pe = d.createElement("script"); pe.type = "text/javascript"; pe.async = true;
      pe.src = "//traffic.pubexchange.com/click/" + u.pefbt + "/" + u.pefbs + "/" + u.pefba;
      var t = d.getElementsByTagName("script")[0]; t.parentNode.insertBefore(pe, t);
    }
  }
}(window.location, document));';
	$content .= '</script></iframe></figure>';
	return $content;
}

add_filter( 'instant_articles_content', 'add_pubexchange_code' );
?>