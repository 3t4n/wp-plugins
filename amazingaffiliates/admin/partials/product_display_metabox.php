<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<?php 
$entry = $entries[0];

$creation_date	= sanitize_text_field( get_post_meta( $entry, 'creation_date', true) );
$last_update	= sanitize_text_field( get_post_meta( $entry, 'last_update', true) );
$now			= time();
$delta			= $now - intval($last_update);
$delta_create	= $now - intval($creation_date);

$asin			= sanitize_text_field( get_post_meta( $entry, 'asin', true) );

$default = array(
	'shortcoded'                    => 0,
	'productid' 					=> '',
	'search'						=> '',
	'customtitle' 					=> '',
	'customcontentbefore' 		    => '',
	'showdetails'					=> 3,
	'showdescription'				=> 0,
	'showtable'					    => 0,
	'customcontentafter' 			=> '',	
	'noprice' 						=> false,
	'nobuybutton' 				    => false,
	'wrappertitle' 				    => '',
	'wrappercolor' 				    => '',
	'rating' 						=> 0,
);

$atts = array(
	'shortcoded'                    => 0,
	'productid' 					=> $entry,
	'search'                        => '',
	'showdetails'					=> -1,
	'showdescription'				=> -1,
	'showtable'					    => -1,
	'rating' 						=> -1,
	'wrappercolor' 				    => 'limegreen',
	'wrappertitle' 				    => 'Added: ' . intval( $delta_create / 60 / 60 / 24 ) . ' days ago - Updated: ' . intval( $delta / 60 ) . ' minutes ago',
);

$inputs = shortcode_atts($default, $atts);

?>

<?php require( AMAZINGAFFILIATES_PLUGIN_URI . '/public/blocks/product/product_block.php' );	?>

