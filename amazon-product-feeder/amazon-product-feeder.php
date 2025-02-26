<?php
/*
Plugin Name: Amazon Product Feeder
Version: 1.2
Plugin URI: http://susantaslab.com/
Description: Simple and easiest way to display Amazon products on your website just by using a shortcode and your favorite keyword. It also adds your Amazon Associate Tag to product links to generate affiliate income from sales. It also integrate proper schemas (http://schema.org/) for better on-page SEO.
Author: Susanta K Beura
Author URI: http://susantaslab.com/
License: GPL v2
Usages: [apf domain="com|au|br|ca|cn|fr|de|in|it|jp|mx|es|uk" kw="Keyword" type="new|popular|recent" tag="AssociateTag-20" length="20" details="true|false" target="_blank|_self|_top"]
*/

function SLB_Amazon_Product_Feeder( $atts ) {
	extract(shortcode_atts(array(
		"domain"	=> 'com',
	   	"kw" 		=> get_the_title(),  
		"type" 		=> 'popular',  
		"tag" 		=> 'susantaslab-20',
		"length"	=> '20',
		"details"	=> true,
		"target"	=> '_blank'
	), $atts));

	switch ($domain) {
		case 'com': //Amazon.com
			$dom = "com";
			break;
		case 'au': //Amazon Australia
			$dom = "com.au";
			break;
		case 'br': //Amazon Brazil
			$dom = "com.br";
			break;
		case 'ca':  //Amazon Canada
			$dom = "ca";
			break;
		case 'cn':  //Amazon China
			$dom = "cn";
			break;
		case 'fr': //Amazon France
			$dom = "fr";
			break;
		case 'de': //Amazon Germany
			$dom = "de";
			break;
		case 'in': //Amazon India
			$dom = "in";
			break;
		case 'it': //Amazon Italy
			$dom = "it";
			break;
		case 'jp': //Amazon Japan
			$dom = "co.jp";
			break;
		case 'mx': //Amazon Mexico
			$dom = "com.mx";
			break;
		case 'es': //Amazon Spain
			$dom = "es";
			break;
		case 'uk': //Amazon United Kingdom
			$dom = "co.uk";
			break;
		default: //Amazon USA
			$dom = "com";
			break;
	}

	$rss = "http://www.amazon.$dom/rss/tag/$kw/$type/ref=tag_rsh_hl_ersn?tag=$tag&length=$length";

	$rssFeed = get_rss_feed( $rss ); //Get the feed
	
	if ( $rss != "" && $rssFeed ) {

		//$rssFeed->enable_order_by_date(false);
		$maxitems = $rssFeed->get_item_quantity( $length ); 
		if ($maxitems == 0) 
			return '<ul><li>Content not available at'.$rss .'.</li></ul>';

		$rss_items = $rssFeed->get_items( 0, $maxitems );

		$content = '<ul>';
		$itmNum = 1;

		foreach ( $rss_items as $item ) {
			$tagPos = stripos($item->get_title(), 'tagged');
			$titlen = strlen($item->get_title());
			$title = '# '. $itmNum++ . ' ' . substr($item->get_title(), 0, $tagPos );
			$content .= '<li itemscope itemtype="http://schema.org/Product">';
			if ($target != '_self'){
				$content .= '<h3 itemprop="name"><a href="';
				$content .= trim($item->get_permalink()); //."?tag=$tag"
				$content .= '" target="';
				$content .= $target;
				$content .= '" rel="external" itemprop="url">';
				$content .=  $title;
				$content .= '</a></h3>'; 
			}

			else {
				$content .= '<h3 itemprop="name"><a href="';
				$content .= trim($item->get_permalink()); //."?tag=$tag";
				$content .= '" rel="external" itemprop="url">';
				$content .= $title;
				$content .= '</a></h3>';
			}
			if ( $details != false && $details != "false") {
				$itmDesc = $item->get_description();
				$itmDesc = str_replace('class="photo"','class="photo" itemprop="image"',str_replace('<span class="tgRssReviews">', '<span class="tgRssReviews" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">', str_replace('<span class="tgProductPriceLine">', '<span class="tgProductPriceLine" itemprop="price">', $itmDesc))); // str_replace('">Buy new</a>', '?tag='.$tag.'" target="_blank">Buy new</a>',);
				$content .= '<br/><span class="rss_excerpt" itemprop="description">';
				$content .= $itmDesc;
				$content .= '</span>';
			}
			$content .= '</li>';
		} 
		$content .= '</ul>';
	}
	return $content;

}

add_shortcode( 'apf', 'SLB_Amazon_Product_Feeder' );

function Custom_APF_Plugin_Links( $links, $file ) {

  if ( strpos( $file, 'amazon-product-feeder.php' ) !== false ) {
      $new_links = array(
               '<a href="http://wordpress.org/support/view/plugin-reviews/amazon-product-feeder?rate=5#postform" target="_blank">' . __( 'Rate us' ) . '</a>',
               '<a href="http://support.susantaslab.com/" target="_blank"><span style="font-size:9pt;">' . __( 'Contact support' ) . '</span></a>',
               '<a href="http://susantaslab.com/20-popular-laptops-and-accessories-at-amazon/" target="_blank"><span style="font-size:9pt;">'.__('Demo page #1').'</span></a>',
               '<a href="http://susantaslab.com/20-popular-wifi-routers-at-amazon/" target="_blank"><span style="font-size:9pt;">'.__('Demo page #2').'</span></a> ',
               '<a href="http://susantaslab.com/20-all-time-most-popular-chromebooks/" target="_blank"><span style="font-size:9pt;">'.__('Demo page #3').'</span></a>',
               '<a href="http://susantaslab.com/20-all-time-most-popular-lcd-projectors/" target="_blank"><span style="font-size:9pt;">'.__('Demo page #4').'</span></a>',
               '<a href="http://susantaslab.com/20-most-popular-laser-printers-at-amazon/" target="_blank"><span style="font-size:9pt;">'.__('Demo page #5').'</span></a>'
            );
       
      $links = array_merge( $links, $new_links );
   }
    
   return $links;
}
add_filter( 'plugin_row_meta', 'Custom_APF_Plugin_Links', 10, 2 );

if (!function_exists('get_rss_feed')){
	function get_rss_feed( $url ) {
		include_once( ABSPATH . WPINC . '/class-feed.php' );

		$feed = new SimplePie();

		$feed->set_sanitize_class( 'WP_SimplePie_Sanitize_KSES' );
		$feed->sanitize = new WP_SimplePie_Sanitize_KSES();
		$feed->set_useragent('Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.120 Safari/537.36');

		$feed->set_cache_class( 'WP_Feed_Cache' );
		$feed->set_file_class( 'WP_SimplePie_File' );

		$feed->set_feed_url( $url );
		$feed->set_cache_duration( apply_filters( 'wp_feed_cache_transient_lifetime', 12 * HOUR_IN_SECONDS, $url ) );

		do_action_ref_array( 'wp_feed_options', array( &$feed, $url ) );

		$feed->enable_order_by_date(false);

		$feed->init();
		$feed->handle_content_type();

		if ( $feed->error() )
			return new WP_Error( 'simplepie-error', $feed->error() );
		return $feed;
	}
}
?>