<?php

// When user delete a record.
$delete_id = Sanitize::get( 'delete', 'get', false );

// If sanitizing is failed, show error.
if ( false === $delete_id ) {
	echo '<span class="red">ID for deleting is invalid.</span>';
} elseif ( ! is_null( $delete_id ) ) {
	// If $delete_idis not null, delete the record.
	ZumiFixedAd::delete( $delete_id );
}


// Create nounce.
$nonce = wp_create_nonce( 'zumi-nonce' );

?>

<a href="<?php echo esc_url( get_pagenum_link() ); ?>&id=&_wpnonce=<?php echo esc_html( $nonce ); ?>" class="button button-primary"><?php echo esc_html( $lan->make_new ); ?></a>

<table class="zumi-ad-list">
<thead>
<tr>
	<th><?php echo esc_html( $lan->name ); ?></th>
	<th><?php echo esc_html( $lan->content ); ?></th>
	<th><?php echo esc_html( $lan->position ); ?></th>
	<th><?php echo esc_html( $lan->description ); ?></th>
	<th><?php echo esc_html( $lan->edit ); ?></th>
	<th><?php echo esc_html( $lan->delete ); ?></th>
</tr>
</thead>

<tobyd>
<?php
// Get all records.
$ads = ZumiFixedAd::all();

// Show all records.
foreach ( $ads as $ad ) :
	?>
	<tr>
		<td><?php echo esc_html( $ad->name ); ?></td>
		<td><?php echo esc_html( $ad->content ); ?></td>
		<td>
			<?php
			if ( 'before_content' === $ad->position ) {
				echo esc_html( $lan->before_content );
			} elseif ( 'after_content' === $ad->position ) {
				echo esc_html( $lan->after_content );
			} elseif ( 'widget' === $ad->position ) {
				echo esc_html( $lan->widget );
			}
			?>
		</td>
		<td><?php echo esc_html( $ad->description ); ?></td>
		<td><span class="dashicons dashicons-edit"></span><a href="<?php echo esc_url( get_pagenum_link() ); ?>&id=<?php echo esc_html( $ad->id ); ?>&_wpnonce=<?php echo esc_html( $nonce ); ?>"><?php echo esc_html( $lan->edit ); ?></a></td>
		<td>
			<span class="dashicons dashicons-trash"></span>
			<a href="javascript:location_confirm('<?php echo esc_url( get_pagenum_link() ); ?>&delete=<?php echo esc_html( $ad->id ); ?>&_wpnonce=<?php echo esc_html( $nonce ); ?>', '<?php echo esc_html( $lan->getModified( 'delete_confirm', array( '[id]' => $ad->name, '<br>' => '\n' ) ) ); ?>')">
				<?php echo esc_html( $lan->delete ); ?>
			</a>
		</td>
	</tr>

<?php endforeach; ?>

</tbody>
</table>
