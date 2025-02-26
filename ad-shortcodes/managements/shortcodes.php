<?php

// When user delete a record.
$delete_id = Sanitize::get( 'delete', 'get', false );

// If sanitizing is failed, show error.
if ( false === $delete_id ) {
	echo '<span class="red">ID for deleting is invalid.</span>';
} elseif ( ! is_null( $delete_id ) ) {
	// If $delete_idis not null, delete the record.
	ZumiAd::delete( $delete_id );
}

$shortcodes = ZumiAd::all();

$disabled = '';

if ( count( $shortcodes ) >= $limit ) {
	$disabled = 'disabled';
}

// Create nounce.
$nonce = wp_create_nonce( 'zumi-nonce' );

?>
<a href="<?php echo esc_url( get_pagenum_link() ); ?>&tag=&_wpnonce=<?php echo esc_html( $nonce ); ?>" class="button button-primary <?php echo esc_html( $disabled ); ?>"><?php echo esc_html( $lan->make_new ); ?></a>

<span style="vertical-align:bottom;">
<?php if ( count( $shortcodes ) >= $limit ) : ?>
	<?php echo esc_html( $lan->getModified( 'exceed_max', array( '[number]' => $limit ) ) ); ?>
<?php else : ?>
	<?php echo esc_html( $lan->getModified( 'max_explain', array( '[number]' => $limit ) ) ); ?>
<?php endif; ?>
</span>

<table class="zumi-ad-list">
<thead>
<tr>
	<th><?php echo esc_html( $lan->shortcode_tag ); ?></th>
	<th><?php echo esc_html( $lan->content ); ?></th>
	<th><?php echo esc_html( $lan->description ); ?></th>
	<th><?php echo esc_html( $lan->edit ); ?></th>
	<th><?php echo esc_html( $lan->delete ); ?></th>
</tr>
</thead>

<tobyd>
<?php
// Get all records.
$shortcodes = ZumiAdShortcode::all();

// Show all records.
foreach ( $shortcodes as $shortcode ) :
	?>
	<tr>
		<td><?php echo esc_html( $shortcode->tag ); ?></td>
		<td><?php echo esc_html( $shortcode->content ); ?></td>
		<td><?php echo esc_html( $shortcode->description ); ?></td>
		<td>
			<span class="dashicons dashicons-edit"></span>
			<a href="<?php echo esc_url( get_pagenum_link() ); ?>&tag=<?php echo esc_html( $shortcode->tag ); ?>&_wpnonce=<?php echo esc_html( $nonce ); ?>"><?php echo esc_html( $lan->edit ); ?></a></td>
		<td>
			<span class="dashicons dashicons-trash"></span>
			<a href="javascript:location_confirm('<?php echo esc_url( get_pagenum_link() ); ?>&delete=<?php echo esc_html( $shortcode->tag ); ?>&_wpnonce=<?php echo esc_html( $nonce ); ?>,
				'<?php echo esc_html( $lan->getModified( 'delete_confirm', array( '[id]' => $shortcode->tag, '<br>' => '\n' ) ) ); ?>')">
				<?php echo esc_html( $lan->delete ); ?>
			</a>
		</td>
	</tr>

<?php endforeach; ?>

</tbody>
</table>
