<?php
/**
 * Show the edit page of one of registered ad.
 */

	$ad_id = $id;

// If nothing is posted, just get data from DB table.
if ( count( $_POST ) === 0 ) {
	// Get the record.
	$ad = ZumiAd::get( $ad_id );

	$old_ad_id   = $ad_id;
	$code        = $ad->code ?? '';
	$description = $ad->description ?? '';
} else {
	// If somthing is posted, try to save input data.

	$input_keys = array( 'ad_id', 'old_ad_id', 'code', 'description' );
	try {
		// Loop all input keys and sanitize and verify them.
		foreach ( $input_keys as $key ) {
			$html_allowed = false;
			if ( 'code' === $key ) {
				$html_allowed = true;
			}
			${$key} = Sanitize::get( $key, 'post', $html_allowed );

			// If input value is false, throw an error.
			if ( false === ${$key} ) {
				throw new Exception( ${$key} . 'has invalid characters' );
			}
		}

		// Check $ad_id and $old_ad_id, if $ad_id is already exists in DB table.
		$validate = new ValidateID( $ad_id, $old_ad_id, 'ad_id', 'ZumiAd' );
		$validate->exe();

		// Show Error.
		if ( $validate->doesErrorOccur() ) {
			throw new Exception( $validate->getMessage() );
		}
		$ads = ZumiAd::all();

		if ( count( $ads ) >= $limit ) {
			throw new Exception( $lan->getModified( 'exceed_max', array( '[number]' => $limit ) ) );
		}
		// Save the record to the DB.
		$ad = new ZumiAd();

		$ad->ad_id       = $ad_id;
		$ad->code        = $code;
		$ad->description = $description;
		$ad->save();

		// If user change ad id, delete old one.
		if ( $ad_id !== $old_ad_id ) {
			ZumiAd::delete( $old_ad_id );
		}

		// Override old id with ad id for showing the update has been completed to user.
		$old_ad_id = $ad_id;

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
	<th><?php echo esc_html( $lan->ad_id ); ?></th>

	<td>
		<input type="hidden" name="old_ad_id" value="<?php echo esc_textarea( $old_ad_id ); ?>">
		<input type="text" name="ad_id" value="<?php echo esc_textarea( $ad_id ); ?>">
	</td>
</tr>

<tr>
	<th><?php echo esc_html( $lan->code ); ?></th>
	<td>
		<textarea name="code" cols="100" rows="10"><?php echo esc_html( $code ) ?? ''; ?></textarea>
	</td>
</tr>

<tr>
	<th><?php echo esc_html( $lan->description ); ?></th>
	<td>
		<textarea name="description" cols="100" rows="10"><?php echo esc_textarea( $description ) ?? ''; ?></textarea>
	</td>
</tr>

<tr>
<td colspan="2">
	<?php submit_button(); ?>
</td>
</tr>

</form>
</table>

<span class="dashicons dashicons-arrow-left-alt"></span><a href="?page=zumi-ads"><?php echo esc_html( $lan->back_to_manage_ads ); ?></a>

