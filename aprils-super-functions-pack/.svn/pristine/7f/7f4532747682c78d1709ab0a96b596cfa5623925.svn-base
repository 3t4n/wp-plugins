<?php
require_once( dirname(__FILE__) . '../../../../wp-config.php');
header("Content-type: text/css");
$urlpath = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__));
$w = get_option('asfp_pagewidth'); 

$half = floor($w * .5) - 8; // to account for padding between columns
$third = floor($w * .3);
$twothird = floor($w * .6);
$fourth = floor($w * .25) - 24; // to account for padding between columns
$threefourth = floor($w * .75);

?>
/*
 * These styles were produced dynamically by
 *
 *  APRIL'S SUPER FUNCTIONS PACK
 *  http://wordpress.org/extend/plugins/aprils-super-functions-pack/
 *
 */


/* COLUMN WIDTHS * * * * * * * * * * * * * * * * * * * */
.one_half {	width: <?php echo $half ?>px; }
.one_third {	width: <?php echo $third ?>px; }
.one_fourth {	width: <?php echo $fourth ?>px; }
.two_third {	width: <?php echo $twothird ?>px; }
.three_fourth {	width: <?php echo $threefourth ?>px; }

<?php
if (get_option('asfp_doctypes')==1) {
	$types = split(",[ ]*",get_option('asfp_doctypes_list')); 
	echo "/* DOCUMENT TYPE STYLES * * * * * * * * * * * * * * */\n";
	echo ".link { background-repeat: no-repeat; padding: 2px 0 2px 20px; }\n";
	foreach ($types as $type) {
		if (file_exists(ABSPATH."wp-content/uploads/icon-$type.gif")) $path = site_url()."/wp-content/uploads/icon-$type.gif";
		else $path = $urlpath."images/icons/icon-$type.gif";
		echo ".$type { background-image: url('".$path."'); }\n";	
	}
}
?>