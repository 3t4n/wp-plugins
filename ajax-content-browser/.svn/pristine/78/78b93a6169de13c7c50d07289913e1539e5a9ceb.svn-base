<?php
/**
 * Taxonomy Filters.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<?php foreach( $taxonomies as $taxonomy ) : ?>	
	<?php
		$terms = get_terms( 'taxonomy=' . $taxonomy . '&orderby=count&order=desc' );
		if ( $terms ) :
			$tax = get_taxonomy( $taxonomy );
			if ( ! isset( $tax->name ) ) {
				continue;
			}
			$tax_labels = get_taxonomy_labels( get_taxonomy( $taxonomy ) );
	?>
	<div class="acb-filter" data-filter="<?php echo esc_attr( $taxonomy ); ?>">
		<button class="acb-filter-header acb-<?php echo acb_toggle_state( $args, $taxonomy ); ?>">
			<?php echo isset( $tax_labels ) ? esc_html( $tax_labels->name ) : null; ?>
			<span class="acb-filter-down"><?php echo acb_svg( 'chevron-down' ); ?></span>
			<span class="acb-filter-up"><?php echo acb_svg( 'chevron-up' ); ?></span>
		</button>
		<ul data-simplebar data-simplebar-auto-hide="false" <?php if ( acb_toggle_state( $args, $taxonomy ) === 'minimized' ) echo 'style="display:none;"'; ?>>
			<?php foreach( $terms as $term ) : ?>
			<li>
				<div class="acb-filter-item">
					<a href="#" class="acb-filter-item-link acb-add-filter" data-filter="<?php echo esc_attr( $taxonomy ); ?>" data-value="<?php echo absint( $term->term_id ); ?>" data-label="<?php echo esc_attr( $term->name ); ?>">
						<span class="acb-uncheck"></span><?php echo esc_html( $term->name ); ?>
					</a>
				</div>
				<?php if ( $show_counts != 'no' ) : ?>
				<div class="acb-filter-count <?php if ( count( $terms ) <= 5 ) echo 'acb-filter-count-noscroll'; ?>"><?php echo esc_html( number_format_i18n( $term->count ) ); ?></div>
				<?php endif; ?>
			</li>
			<?php endforeach; ?>
		</ul>
	</div>
	<?php endif; ?>
<?php endforeach; ?>