<?php

$words = $instance['option']['words'];
add_filter( 'excerpt_length', function( $length ) use( &$words ) {
	if (is_numeric($words)) {
		return $words;
	} else {
		return 50;
	}
}, 999, 1 );

$more_text = $instance['option']['more_text'];
add_filter( 'excerpt_more', function ( $more )  use( &$more_text ) {
	if ( is_string($more_text) ) {
		return $more_text;
	} else {
		return '[...]';
	}
}, 999, 1 );

?>

<div class="the_excerpt">
	<?php
	
	$old_value = apply_filters('siteorigin_panels_filter_content_enabled', true);
	
	add_filter('siteorigin_panels_filter_content_enabled', function() { return false; });
	
	the_excerpt();
	
	add_filter('siteorigin_panels_filter_content_enabled', function() use ($old_value) { return $old_value; });
	
	?>
</div>

<?php

remove_filter( 'excerpt_length', function ( $length ) {
	return $length;
}, 999 );

remove_filter( 'excerpt_more', function ( $more ) {
	return $more;
}, 999, 1 );
