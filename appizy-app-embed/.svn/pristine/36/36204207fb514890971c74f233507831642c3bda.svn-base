<?php
/**
 * Admin > Tools page to list all available web-calculators in the Media library
 *
 * @package Appizy App Embed
 */

?>
<div class="wrap">
	<h1><?php esc_html_e( 'Appizy Embed App', 'appizy' ); ?></h1>

	<?php

	$args = [
		'order'          => 'ASC',
		'order_by'       => 'publish_date',
		'posts_per_page' => - 1,
		'post_status'    => null,
		'post_parent'    => null,
		'default_styles' => true,
		'date_format'    => 'Y/m/d',
		'post_type'      => 'attachment',
		'post_mime_type' => 'text/html',
	];

	$attachments = get_posts( $args );

	?>
	<?php if ( count( $attachments ) > 0 ) : ?>
		<h2><?php _e( 'Available files in Media library', 'appizy' ); ?></h2>
		<p><?php _e( 'The table bellow lists the HTML files in your media library that you can embed into your posts.' ); ?></p>
		<p><?php _e( 'Copy the shortcode into your post to display the corresponding file.', 'appizy' ); ?></p>
		<table class="striped widefat">
			<thead>
			<tr>
				<th><?php _e( 'Title' ); ?></th>
				<th><?php _e( 'Caption' ); ?></th>
				<th><?php _e( 'Shortcode' ); ?></th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ( $attachments as $attachment ) : ?>
				<?php $attachment_id = $attachment->ID; ?>
				<tr>
					<td><?php echo get_the_title( $attachment_id ); ?></td>
					<td><?php echo wp_get_attachment_caption( $attachment_id ); ?></td>
					<td class="inline-edit-row">
						<span class="input-text-wrap">
							<input type="text" value='[appizy id="<?php echo $attachment_id; ?>"]'/>
						</span>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	<?php else : ?>
		<p><?php _e( 'No web-calculator found in the media library', 'appizy' ); ?></p>
	<?php endif; ?>
</div>
