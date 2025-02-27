<?php
/**
 * Internationalization
 *
 * @deprecated 1.1
 * @since 1.0
 */
function edd_vpd_textdomain() {
	_edd_deprecated_function( __METHOD__, '1.1' );
	load_plugin_textdomain( 'edd-variable-pricing-descriptions', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}

/**
 * Adds the table header
 *
 * @deprecated 1.1
 * @since 1.0
 */
function edd_vpd_download_price_table_head() {
	_edd_deprecated_function( __METHOD__, '1.1' );
	?>
	<th><?php _e( 'Option Description', 'edd-variable-pricing-descriptions' ); ?></th>
	<?php
}

/**
 * Adds the table cell with description input field
 *
 * @deprecated 1.1
 * @since 1.0
 */
function edd_vpd_download_price_table_row( $post_id, $key, $args ) {
	_edd_deprecated_function( __METHOD__, '1.1' );
	$description = isset($args['description']) ? $args['description'] : null;
?>
	<td>
		<input type="text" class="edd_variable_prices_description" value="<?php echo esc_attr( $description ); ?>" placeholder="<?php _e( 'Option Description', 'edd-variable-pricing-descriptions' ); ?>" name="edd_variable_prices[<?php echo $key; ?>][description]" id="edd_variable_prices[<?php echo $key; ?>][description]" size="20" style="width:100%" />
	</td>
<?php }
