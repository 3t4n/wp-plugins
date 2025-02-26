<?php

	$url = $data['url'];
	$title = $data['title'];
	$secret = uniqid();

	$src = admin_url('admin-ajax.php');
	$src = add_query_arg(['action' => 'embed_extended_iframe', 'url' => $url], $src);
	$src = $src . '#secret=' . $secret;

	$min_max_width = apply_filters('oembed_min_max_width', ['min' => 200, 'max' => 600]);
	$width  = $min_max_width['max'];
	$height = max( ceil( $width / 16 * 9 ), 200 );

?><script src="<?php echo Embed_Extended()->get_js('embed', Embed_Extended::VERSION) ?>"></script>
<iframe class="ee-iframe" sandbox="allow-scripts" security="restricted"
	src="<?php echo esc_url($src); ?>" title="<?php echo esc_attr($title); ?>" data-secret="<?php echo $secret; ?>"
	width="<?php echo $width; ?>" height="<?php echo $height; ?>" frameborder="0" marginwidth="0" marginheight="0" scrolling="no"
	<?php

		// Prevent nested iframe problem on the block editor when previewing the embed block.
		echo 'data-class="wp-embedded-content"';

	?>></iframe>
