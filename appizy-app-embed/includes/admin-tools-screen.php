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

	$args = array(
		'order'          => 'ASC',
		'order_by'       => 'publish_date',
		'posts_per_page' => - 1,
		'post_status'    => null,
		'post_parent'    => null,
		'default_styles' => true,
		'date_format'    => 'Y/m/d',
		'post_type'      => 'attachment',
		'post_mime_type' => 'text/html',
	);

	$attachments = get_posts( $args );

	?>
	<?php if ( count( $attachments ) > 0 ) : ?>
		<h2><?php _e( 'Short code generator', 'appizy' ); ?></h2>
		<p>
			<?php _e( 'Use the form below the generate the shortcode for your post.', 'appizy' ); ?>
			<?php _e( 'Copy the shortcode into your post to display the corresponding file.', 'appizy' ); ?>
		</p>
		<form id="appizy-short-code-generator">
			<table class="form-table">
				<tr>
					<th><?php _e( 'Application' ); ?></th>
					<td>
						<select name="app-id">
							<option value="">-</option>
							<?php foreach ( $attachments as $attachment ) : ?>
								<?php $attachment_id = $attachment->ID; ?>
								<option name="app-id"
										value="<?php echo $attachment_id; ?>"><?php echo get_the_title( $attachment_id ); ?></option>
							<?php endforeach; ?>
						</select>
					</td>
				</tr>
				<tr>
					<th><?php _e( 'Save data' ); ?></th>
					<td>
						<label>
							<input name="enable-save" type="checkbox" value="true">
							<?php _e( 'Any logged in user can save application state.' ); ?>
						</label>
						<p class="description"><?php _e( 'Each user will be able to save the state of the application and reopen it for later use.' ); ?></p>
					</td>
				</tr>
				<tr>
					<th><?php _e( 'Print button' ); ?></th>
					<td>
						<label>
							<input name="enable-print" type="checkbox" value="true">
							<?php _e( 'Allow user to print the current view of the application.' ); ?>
						</label>
					</td>
				</tr>
				<tr>
					<th><?php _e( 'Reset button' ); ?></th>
					<td>
						<label>
							<input name="enable-reset" type="checkbox" value="true">
							<?php _e( 'Allow user to reset the application to initial state.' ); ?>
						</label>
						<p class="description"><?php _e( 'This only works with compatible Appizy apps, generated as of May 2024.' ); ?></p>
					</td>
				</tr>
				<tr>
					<th><?php _e( 'Manual height' ); ?></th>
					<td>
						<input name="height" type="number" value="" placeholder="" size="4"> px
						<p class="description"><?php _e( 'Leave empty for auto height.' ); ?></p>
					</td>
				</tr>
				<tr>
					<th><?php _e( 'Shortcode' ); ?></th>
					<td>
						<textarea cols="60" name="shortcode"></textarea>
					</td>
				</tr>
			</table>
		</form>
		<h2><?php _e( 'Available files in Media library', 'appizy' ); ?></h2>
		<p><?php _e( 'The table bellow lists the HTML files in your media library that you can embed into your posts.', 'appizy' ); ?></p>
		<table class="striped widefat">
			<thead>
			<tr>
				<th><?php _e( 'Title' ); ?></th>
				<th><?php _e( 'Caption' ); ?></th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ( $attachments as $attachment ) : ?>
				<?php $attachment_id = $attachment->ID; ?>
				<tr>
					<td><?php echo get_the_title( $attachment_id ); ?></td>
					<td><?php echo wp_get_attachment_caption( $attachment_id ); ?></td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	<?php else : ?>
		<p><?php _e( 'No web-calculator found in the media library', 'appizy' ); ?></p>
	<?php endif; ?>
</div>
