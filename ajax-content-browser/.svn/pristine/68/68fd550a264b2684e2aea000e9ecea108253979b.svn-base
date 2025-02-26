<?php
/**
 * The item terms.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$terms = acb_get_terms();
if ( $terms && $show_item_tags === 'yes' ) :

?>

<div class="acb-terms">

	<?php foreach( $terms as $term ) : ?>

		<a href="#" class="acb-term acb-add-filter" data-filter="<?php echo esc_attr( $term->taxonomy ); ?>" data-value="<?php echo absint( $term->term_id ); ?>" data-label="<?php echo esc_attr( $term->name ); ?>">#<?php echo esc_html( $term->slug ); ?></a>

	<?php endforeach; ?>

</div>

<?php endif; ?>