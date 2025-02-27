<?php
	$output = '';

	if ( $link_cat == 0 ) {
		$bookmarks = get_bookmarks();
	} else {
		$bookmarks = get_bookmarks(array('category' => $link_cat));
	}

	foreach ($bookmarks as $bookmark) { $output .= '<option value="'.$bookmark->link_url.'">'.$bookmark->link_name.'</option>'; }

	$target = $open_same_window == 1 ? '_self' : '_blank';
?>

<select id="link-dropdown-widget" name="link-dropdown">
	<option value=""><?php echo $default_option ?></option>
	<?php echo $output ?>
</select>

<script type="text/javascript">
	var selectLink = document.getElementById( 'link-dropdown-widget' );
	selectLink.onchange = function() {
		window.open( this.options[ this.selectedIndex ].value , '<?php echo $target ?>');
	};
</script>