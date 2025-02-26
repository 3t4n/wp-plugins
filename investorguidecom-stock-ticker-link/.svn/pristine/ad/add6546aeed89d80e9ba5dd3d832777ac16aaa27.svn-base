<?php
/*
Plugin Name: InvestorGuide.com Stock Ticker Links
Plugin URI: http://www.investorguide.com/article/6100/stock-ticker-link-wordpress-plugin/
Version: 1.4
Author: InvestorGuide.com
Author URI: http://www.investorguide.com/
Description: This plugin automatically looks for ticker symbols like (AAPL) or (GOOG) and link the tickers to research pages at <a href="http://www.investorguide.com/">InvestorGuide.com</a>.
*/


add_action('admin_menu','ig_stock_link_setting_options');
$filterwords = get_option('ig_stock_links_filter_words_list');


function link_ticker ($content) {

   global $filterwords;

   if ($filterwords != "") {
	$filterwords = explode (",",$filterwords);

	foreach ($filterwords as $filterword) {
	   $filterword = trim($filterword);
	   $replaceword = "(<acronym>".$filterword."</acronym>)";
	   $filterword = "(".$filterword.")";

	   $content = str_replace ($filterword, $replaceword, $content);
	}
   }

   $content =
      preg_replace (
         '/ \(((?:[0-9]+(?=[a-z])|(?![0-9\.\:\_\-]))(?:[a-z0-9]|[\_\.\-\:](?![\.\_\.\-\:]))*[a-z0-9]+)\)/i',
         " (<a href=\"http://www.investorguide.com/stock.php?ticker=$1\" class=\"ticker\" target=\"_blank\">$1</a>)",
         $content
         );

     return $content;
}

add_filter ('the_content', 'link_ticker');
add_filter ('the_content_limit', 'link_ticker');
add_filter ('the_content_rss', 'link_ticker');

//add_filter ('the_excerpt_rss', 'link_ticker');
//add_filter ('the_excerpt', 'link_ticker');


function ig_stock_link_setting_options(){
	add_options_page('IG Stock Links', 'IG Stock Links', 5, 'investorguidecom-stock-ticker-link/optionpage.php');
}

?>
