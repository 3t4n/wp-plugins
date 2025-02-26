<?php
/**
 * Date Filter.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<?php if ( $date_filter != 'no' && ! empty( $date_options ) ) : ?>

<div class="acb-filter" data-filter="date">

	<button class="acb-filter-header acb-<?php echo acb_toggle_state( $args, 'date' ); ?>">
		<?php esc_html_e( 'Date Added', 'acb' ); ?>
		<span class="acb-filter-down"><?php echo acb_svg( 'chevron-down' ); ?></span>
		<span class="acb-filter-up"><?php echo acb_svg( 'chevron-up' ); ?></span>
	</button>

	<ul data-simplebar data-simplebar-auto-hide="false" <?php if ( acb_toggle_state( $args, 'date' ) === 'minimized' ) echo 'style="display:none;"'; ?>>
		<li>
			<div class="acb-filter-item acb-sort">
				<a href="#" class="acb-filter-item-link" data-default="true"><span class="acb-check"></span><?php esc_html_e( 'Any date', 'acb' ); ?></a>
			</div>
		</li>
		<?php foreach( $date_options as $period => $name ) : ?>
		<li>
			<div class="acb-filter-item acb-sort">
				<a href="#" class="acb-filter-item-link acb-add-filter" data-add-only="true" data-filter="date" data-value="<?php echo esc_attr( $period ); ?>" data-label="<?php echo esc_attr( $name ); ?>">
					<span class="acb-uncheck"></span><?php echo esc_html( $name ); ?>
				</a>
			</div>
		</li>
		<?php endforeach; ?>
	</ul>

</div>

<?php endif; ?>