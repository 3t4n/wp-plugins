<?php

// If nothing is posted, just get data from DB table.
if ( count( $_POST ) === 0 ) {
	// Get the record.
	$ad = ZumiFixedAd::get( $id );

		$name        = $ad->name ?? '';
		$content     = $ad->content ?? '';
		$position    = $ad->position ?? '';
		$description = $ad->description ?? '';
} else {
	// If somthing is posted, try to save input data.
	try {

		$input_keys = array( 'id', 'name', 'content', 'position', 'description' );

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

		// Save the record to the DB.
		$ad = new ZumiFixedAd();

		// Put values.
		if ( '' !== $id ) {
			$ad->id = $id;
		} else {
			// If $id is empty, put null and let DB to use auto increments.
			$ad->id = null;
		}

		$ad->name        = $name;
		$ad->content     = $content;
		$ad->position    = $position;
		$ad->description = $description;
		$ad->save();

		// Show a complete message.
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

<input type="hidden" name="id" value="<?php echo esc_textarea( $id ); ?>">

<table>
<tr>
	<th><?php echo esc_html( $lan->name ); ?></th>
	<td>
		<input type="text" value="<?php echo esc_textarea( $name ); ?>" name="name">
	</td>
</tr>

<tr>
	<th><?php echo esc_html( $lan->content ); ?></th>
	<td>
		<textarea name="content" cols="100" rows="10"><?php echo esc_html( $content ) ?? ''; ?></textarea>
	</td>
</tr>

<tr>
	<th><?php echo esc_html( $lan->position ); ?></th>
	<td>
		<select name="position">
			<option value="before_content"><?php echo esc_textarea( $lan->before_content ); ?></option>
			<option value="after_content"><?php echo esc_textarea( $lan->after_content ); ?></option>
			<option value="widget"><?php echo esc_textarea( $lan->widget ); ?></option>
		</select>
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
<span class="dashicons dashicons-arrow-left-alt"></span>
<a href="?page=zumi-fixed-ads"><?php echo esc_html( $lan->back_to_manage_ads ); ?></a>

