<?php
/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */
?>
<?php
	$title = $attributes['fileTitle'];
	$url = $attributes['fileUrl'];

	$path = str_replace( site_url('/'), ABSPATH, strip_tags( $url ) );

	if ( is_file( $path ) ){
		$filesize = size_format( filesize( $path ) );
?>
<p <?php echo get_block_wrapper_attributes(); ?>>
	<?php echo sprintf(
		'<a href="%1$s" target="_blank">%2$s</a> <span>[%3$s]</span>',
		esc_url($url),
		esc_html($title),
		esc_html($filesize)
	); ?>
</p>
<?php
	} else {
		$filesize = __( 'File not found!', 'get_filesize_shortcode');
?>
<p <?php echo get_block_wrapper_attributes(); ?>>
	<?php echo sprintf(
		'<span>%1$s</span> <span>[%2$s]</span>',
		esc_html($title),
		esc_html($filesize)
	); ?>
</p>
<?php
	}

