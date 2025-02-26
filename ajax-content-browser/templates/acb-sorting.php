<?php
/**
 * Sort Items bar.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $show_sortby != 'no' ) :
?>

<div class="acb-sorting">

	<div>&nbsp;</div>

	<div class="acb-sorting-select">
		<label class="acb-sorting-title" for="acb-sortby-<?php echo esc_attr( $id ); ?>"><?php esc_html_e( 'Sort results by:', 'acb' ); ?></label>
		<select name="acb-sortby-<?php echo esc_attr( $id ); ?>" id="acb-sortby-<?php echo esc_attr( $id ); ?>" data-filter="sortby" data-value="" data-label="">
			<?php foreach( acb_get_sort_options( $post_type ) as $key => $value ) : ?>
			<option value="<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $value ); ?></option>
			<?php endforeach; ?>
		</select>
		<?php echo acb_svg( 'chevron-down' ); ?>
	</div>

</div>
<?php endif; ?>