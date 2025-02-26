<?php
function pushpig_author_track_link( $atts ) {
    extract( shortcode_atts( array(
        'amazon_id' => '',
        'author' => ''
    ), $atts ) );

    if (empty($author)) {
    	return "No author has been configured. Please use the format [author_track author=\"Robin Hobb\" amazon_id=\"pushpig-20\"]";
    } else {
    	return "<a href='http://getpushpig.com/widget/follow?author=".$author."&amazon_id=".$amazon_id."' target='_pp'>Don't miss out! Get notified when ".$author." publishes a new book by clicking here!</a>";
    }   
}
add_shortcode( 'author_track', 'pushpig_author_track_link' );
?>