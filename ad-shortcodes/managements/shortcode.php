<?php

$tag = $id;

// If nothing is posted, just get data from DB table.
if ( count( $_POST ) === 0 ) {
	// Get the record.
	$shortcode = ZumiAdShortcode::get( $tag );

		$old_tag     = $tag;
		$content     = $shortcode->content ?? '';
		$description = $shortcode->description ?? '';
} else {
	// If somthing is posted, try to save input data.
	$input_keys = array( 'tag', 'old_tag', 'content', 'description' );
	try {
		// Loop all input keys and sanitize and verify them.
		foreach ( $input_keys as $key ) {
			$html_allowed = false;
			if ( 'content' === $key ) {
				$html_allowed = true;
			}
			${$key} = Sanitize::get( $key, 'post', $html_allowed );

			// If input value is false, throw an error.
			if ( false === ${$key} ) {
				throw new Exception( ${$key} . 'has invalid characters' );
			}
		}

		// Check $ad_id and $old_ad_id, if $ad_id is already exists in DB table.
		$validate = new ValidateID( $tag, $old_tag, 'tag', 'ZumiAdShortcode' );
		$validate->exe();

		// Show Error.
		if ( $validate->doesErrorOccur() ) {
			throw new Exception( $validate->getMessage() );
		}

		$shortcodes = ZumiAdShortcode::all();

		if ( count( $shortcodes ) >= $limit ) {
			throw new Exception( $lan->getModified( 'exceed_max', array( '[number]' => $limit ) ) );
		}

		// Save the record to the DB.
		$shortcode = new ZumiAdShortcode();

		// Set values.
		$shortcode->tag         = $tag;
		$shortcode->content     = $content;
		$shortcode->description = $description;
		$shortcode->save();

		// If user change tag, delete old one.
		if ( $tag !== $old_tag ) {
			ZumiAdShortcode::delete( $old_tag );
		}

		// Override old id with ad id for showing the update has been completed to user.
		$old_tag = $tag;

		// Show a message.
		echo '<span class="red">' . esc_html( $lan->saved ) . '</span>';

	} catch ( Exception $e ) {
		// Show an error message.
		echo '<span class="red">' . esc_html( $e->getMessage() ) . '</span>';
	}
}

// Create nounce.
$nonce = wp_create_nonce( 'zumi-nonce' );

?>



<form method="post" action="<?php echo esc_url( get_pagenum_link() ); ?>&_wpnonce=<?php echo esc_html( $nonce ); ?>">

<table>
<tr>
	<th><?php echo esc_html( $lan->shortcode_tag ); ?></th>

	<td>
		<input type="hidden" name="old_tag" value="<?php echo esc_textarea( $old_tag ); ?>">
		<input type="text" name="tag" value="<?php echo esc_textarea( $tag ); ?>">
	</td>
</tr>

<tr>
	<th><?php echo esc_html( $lan->content ); ?></th>
	<td>
		<textarea name="content" cols="100" rows="10"><?php echo esc_html( $content ) ?? ''; ?></textarea>
	</td>
</tr>

<tr>
	<th><?php echo esc_html( $lan->description ); ?></th>
	<td>
		<textarea name="description" cols="100" rows="10"><?php echo esc_textarea( $description ) ?? ''; ?></textarea>
	</td>
</tr>

<tr>

	<td colspan="2"><?php submit_button(); ?></td>
</tr>

</form>
</table>

<span class="dashicons dashicons-arrow-left-alt"></span><a href="?page=zumi-ad-shortcodes"><?php echo esc_html( $lan->back_to_manage_ad_shortcode ); ?></a>

