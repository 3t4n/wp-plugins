<div class="wrap">
<h2>All In One Facebook Pack | <?php _e('Special Offers', 'wpc_aiofp'); ?> </h2>
<?php 
require_once (ABSPATH . WPINC . '/rss-functions.php');
define('MAGPIE_CACHE_AGE', 1);
$rss = fetch_rss("http://www.wpcode.net/hosting/host-promo/feed/");
if ( $rss ) {
$i = 1;
foreach ($rss->items as $item) {
$titolo = $item['title'];
$contenuto = $item['content']['encoded'];
$autore = $item['author'];
$data = $item['pubDate'];
$href = $item['link'];
echo "<p><a href=\"$href\" target=\"_blank\">$titolo</a></p>";
if ($i == 5 ) break;
$i = $i + 1;
}}	
?>
<p><?php _e('More', 'wpc_aiofp'); ?> <a href="http://www.wpcode.net/hosting/host-promo" target="_blank"><?php _e('<b>Wordpress Hosting Promotions</b>', 'wpc_aiofp'); ?></a></p>
</div>