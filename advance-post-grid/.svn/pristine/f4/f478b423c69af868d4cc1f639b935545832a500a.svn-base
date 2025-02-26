<?php
/**
 * The template for displaying block frontend
 *
 * @package Advance Post Grid
 * @since 1.0.0
 */

// exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Example usage.
$wo_apg_url             = WO_APG_Init::get_current_page_url();
$wo_apg_url_page_number = WO_APG_Init::get_page_number_from_url( $wo_apg_url );

$wo_apg_post_grid      = $attributes['postGrid'] ?? null;
$wo_apg_post_type      = $attributes['postType'] ?? null;
$wo_apg_post_per_page  = $attributes['postPerPage'] ?? 12;
$wo_apg_post_order     = $attributes['PostOrder'] ?? 'DESC';
$wo_apg_post_orderby   = $attributes['PostOrderBy'] ?? 'title';
$wo_apg_show_hide_pagi = $attributes['showHidePagi'] ?? true;
$wo_apg_show_hide_link = $attributes['showHideLink'] ?? true;
$wo_apg_show_hide_cat  = $attributes['showHideCat'] ?? true;
$wo_apg_show_hide_rt   = $attributes['showHideRT'] ?? true;

?>

<section <?php echo esc_html( get_block_wrapper_attributes() ); ?>>
<div class="components-grid" style="display:grid; grid-template-columns: repeat(<?php echo esc_attr( $wo_apg_post_grid ); ?>, 1fr);gap: 50px 20px;">
<?php
$wo_apg_args = array(
	'post_type'      => $wo_apg_post_type,
	'posts_per_page' => $wo_apg_post_per_page,
	'paged'          => $wo_apg_url_page_number,
	'order'          => $wo_apg_post_order,
	'orderby'        => $wo_apg_post_orderby,
);

$wo_apg_query = new WP_Query( $wo_apg_args );

if ( $wo_apg_query->have_posts() ) {
	while ( $wo_apg_query->have_posts() ) {
		$wo_apg_query->the_post();
		$wo_apg_image_id  = get_post_thumbnail_id( get_the_ID() );
		$wo_apg_image     = wp_get_attachment_image_url( $wo_apg_image_id, 'full' );
		$wo_apg_image_alt = get_post_meta( $wo_apg_image_id, '_wp_attachment_image_alt', true );
		$wo_apg_read_time = WO_APG_Init::calculate_read_time( get_the_content() );
		?>
		<div key="<?php echo esc_html( get_the_ID() ); ?>" class="wo-advance-post-grid-single">
			<<?php echo ( $wo_apg_show_hide_link ) ? 'a' : 'div'; ?> href="<?php echo esc_url( get_the_permalink() ); ?>" class="wo-advance-post-grid-image">
				<img
					class="featured-image"
					src="<?php echo esc_url( $wo_apg_image ); ?>"
					alt="<?php echo esc_url( $wo_apg_image_alt ); ?>"
					width="150"
					height="150"
				/>
			</<?php echo ( $wo_apg_show_hide_link ) ? 'a' : 'div'; ?>>
			<div class="wo-advance-post-grid-content">
				<?php
				if ( $wo_apg_show_hide_cat ) {
					$wo_apg_categories = get_the_category();

					if ( ! empty( $wo_apg_categories ) ) {
						?>
						<div class="wo-advance-post-grid-single-cats">
						<?php
						foreach ( $wo_apg_categories as $wo_apg_category ) {
							echo '<span class="wo-advance-post-grid-single-cat"><span>' . esc_html( $wo_apg_category->name ) . '</span></span>';
						}
						?>

						</div>
						<?php
					}
				}
				?>
				<<?php echo ( $wo_apg_show_hide_link ) ? 'a' : 'div'; ?> href="<?php echo esc_url( get_the_permalink() ); ?>" class="wo-advance-post-grid-heading">
					<h3><?php echo esc_html( get_the_title() ); ?></h3>
				</<?php echo ( $wo_apg_show_hide_link ) ? 'a' : 'div'; ?>>
				<div class="wo-advance-post-grid-excerpt">
					<?php echo esc_html( get_the_excerpt() ); ?>
				</div>
			</div>

			<div class="wo-advance-post-grid-single-bottom">
				<?php if ( $wo_apg_show_hide_link ) { ?>
					<div class="wo-advance-post-grid-single-button">
						<a href="<?php echo esc_url( get_the_permalink() ); ?>" class="wo-advance-post-grid-button"><?php esc_html_e( 'Read More', 'advance-post-grid' ); ?></a>
					</div>
				<?php } ?>
				<?php if ( $wo_apg_show_hide_rt ) { ?>
					<div class="wo-advance-post-grid-single-date">
						<span class="p3"><?php echo esc_html( get_the_date() ); ?></span>
						<span class="p3"><?php echo esc_html( $wo_apg_read_time ); ?> <?php esc_html_e( 'min read', 'advance-post-grid' ); ?></span> <!-- Output read time -->
					</div>
				<?php } ?>
			</div>

		</div>
		<?php
	} wp_reset_postdata();
}
?>

</div>
<?php
if ( $wo_apg_show_hide_pagi ) {
	// Pagination function call with arguments.
	WO_APG_Init::pagination(
		$wo_apg_query->max_num_pages,
		array(
			'showitems'  => 4,
			'first_last' => true,
			'prev_next'  => true,
			'paged'      => $wo_apg_url_page_number,
			'class_name' => 'custom-pagination',
		)
	);
}
?>
</section>


