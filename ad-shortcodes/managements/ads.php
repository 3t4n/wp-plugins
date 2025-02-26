<?php

// When user set up ad tag, save it.
$ad_tag = Sanitize::get( 'zumi_ad_tag', 'post', false );

// If sanitizing is failed, show error.
if ( false === $ad_tag ) {
	echo '<span class="red">Ad tag is invalid.</span>';
} elseif ( ! is_null( $ad_tag ) ) {
	// If $ad_tag is not null, save the value.
	update_option( 'zumi_ad_tag', $ad_tag );

	// Show a complete message.
	echo '<span class="red">' . esc_html( $lan->saved ) . '</span>';
}

// When user delete a record.
$delete_id = Sanitize::get( 'delete', 'get', false );

// If sanitizing is failed, show error.
if ( false === $delete_id ) {
	echo '<span class="red">ID for deleting is invalid.</span>';
} elseif ( ! is_null( $delete_id ) ) {
	// If $delete_idis not null, delete the record.
	ZumiAd::delete( $delete_id );
}

// Get all records.
$ads = ZumiAd::all();

$disabled = '';
if ( count( $ads ) >= $limit ) {
	$disabled = 'disabled';
}

// Create nounce.
$nonce = wp_create_nonce( 'zumi-nonce' );

?>

<div class="box">
<form action="<?php echo esc_url( $page ); ?>&_wpnonce=<?php echo esc_html( $nonce ); ?>" method="post">
<?php echo esc_html( $lan->shortcode_tag ); ?>&nbsp;<input type="text" name="zumi_ad_tag" value="<?php echo esc_html( get_option( 'zumi_ad_tag', 'ad' ) ); ?>">
<input type="submit" value="<?php echo esc_html( $lan->save ); ?>">
<br>
<small>
<span class="dashicons dashicons-editor-help"></span>
<?php
	echo esc_html( $lan->getModified( 'shortcode_tag_explain', array( 'tag' => get_option( 'zumi_ad_tag', 'ad' ) ) ) );
?>
</small>
</div>
</form>

<a href="?page=zumi-ads&ad_id=&_wpnonce=<?php echo esc_html( $nonce ); ?>" class="button button-primary <?php echo esc_html( $disabled ); ?>"><?php echo esc_html( $lan->make_new ); ?></a>

<span style="vertical-align:bottom;">
<?php if ( count( $ads ) >= $limit ) : ?>
	<?php echo esc_html( $lan->getModified( 'exceed_max', array( '[number]' => $limit ) ) ); ?>
<?php else : ?>
	<?php echo esc_html( $lan->getModified( 'max_explain', array( '[number]' => $limit ) ) ); ?>
<?php endif; ?>
</span>


<table class="zumi-ad-list">
<thead>
<tr>
	<th><?php echo esc_html( $lan->ad_id ); ?></th>
	<th><?php echo esc_html( $lan->code ); ?></th>
	<th><?php echo esc_html( $lan->description ); ?></th>
	<th><?php echo esc_html( $lan->edit ); ?></th>
	<th><?php echo esc_html( $lan->delete ); ?></th></tr>
</thead>

<tobyd>
<?php


// Show all records.
foreach ( $ads as $ad ) :
	?>
	<tr>
		<td><?php echo esc_html( $ad->ad_id ); ?></td>
		<td><?php echo esc_html( $ad->code ); ?></td>
		<td><?php echo esc_html( $ad->description ); ?></td>
		<td><span class="dashicons dashicons-edit"></span><a href="<?php echo esc_url( get_pagenum_link() ); ?>&ad_id=<?php echo esc_html( $ad->ad_id ); ?>&_wpnonce=<?php echo esc_html( $nonce ); ?>" class="zumi-edit"><?php echo esc_html( $lan->edit ); ?></a></td>
		<td>
			<span class="dashicons dashicons-trash"></span>
			<a href="javascript:location_confirm('<?php echo esc_url( get_pagenum_link() ); ?>&delete=<?php echo esc_html( $ad->ad_id ); ?>&_wpnonce=<?php echo esc_html( $nonce ); ?>', '<?php echo esc_html( $lan->getModified( 'delete_confirm', array( '[id]' => $ad->ad_id, '<br>' => '\n' ) ) ); ?>' )">
				<?php echo esc_html( $lan->delete ); ?>
			</a>
		</td>
	</tr>

<?php endforeach; ?>

</tbody>
</table>
