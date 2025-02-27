<?php
/**
 * Shortcode file.
 *
 * @author Kushang Tailor
 * @package Product Category
 * @version 1.5.0
 */

/**
 * Shortcode function.
 *
 * @param array $atts Attributes.
 * @return $atts
 * @since 1.0.0
 */
function product_categories_widget( $atts ) {

	global $woocommerce_loop, $wpdb;

	$atts = shortcode_atts(
		array(
			'number'         => null,
			'orderby'        => 'name',
			'order'          => 'ASC',
			'columns'        => '4',
			'hide_empty'     => 1,
			'parent'         => '',
			'ids'            => '',
			'description'    => true,
			'cat_image'      => true,
			'font-size'      => '',
			'font-weight'    => '',
			'font-family'    => '',
			'letter-spacing' => '',
			'color'          => '',
			'style'          => '',
			'pagination'     => '',
		),
		$atts
	);

	if ( isset( $atts['ids'] ) ) {
		$ids = explode( ',', $atts['ids'] );
		$ids = array_map( 'trim', $ids );
	} else {
		$ids = array();
	}

	$page     = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
	$per_page = $atts['number'];
	$offset   = ( $page > 0 ) ? $per_page * ( $page - 1 ) : 1;

	$hide_empty = ( $atts['hide_empty'] == true || $atts['hide_empty'] == 1 ) ? 1 : 0;

	$args = array(
		'number'     => $per_page,
		'offset'     => $offset,
		'orderby'    => $atts['orderby'],
		'order'      => $atts['order'],
		'hide_empty' => $hide_empty,
		'include'    => $ids,
		'pad_counts' => true,
		'child_of'   => $atts['parent'],
	);

	$product_categories = get_terms( 'product_cat', $args );
	if ( '' !== $atts['parent'] ) {
		$product_categories = wp_list_filter( $product_categories, array( 'parent' => $atts['parent'] ) );
	}

	if ( $hide_empty ) {
		foreach ( $product_categories as $key => $category ) {
			if ( $category->count == 0 ) {
				unset( $product_categories[ $key ] );
			}
		}
	}

	if ( $atts['number'] ) {
		$product_categories = array_slice( $product_categories, 0, $atts['number'] );
	}

	$columns                     = absint( $atts['columns'] );
	$woocommerce_loop['columns'] = $columns;

	ob_start();

	if ( $product_categories ) {
		?>
		<div class="product-container <?php echo esc_attr( $atts['style'] ); ?> columns-<?php echo esc_attr( $columns ); ?>">
		<?php
		foreach ( $product_categories as $category ) {
			?>
			<div class="product-cats">
				<?php
				if ( $atts['cat_image'] == 'true' ) {
					?>
					<div class="pro-img">
						<a href="<?php echo esc_url( get_category_link( $category ) ); ?>">
							<?php
							$thumbnail_id           = get_term_meta( $category->term_id, 'thumbnail_id', true );
							$empty_shop_catalog_img = plugins_url( 'product-category\admin\images\placeholder.png' );
							$image                  = wp_get_attachment_url( $thumbnail_id );

							if ( $image ) {
								echo '<img src="' . esc_url( $image ) . '" alt="' . esc_attr( get_the_title( $thumbnail_id ) ) . '" />';
							} else {
								echo '<img src="' . esc_url( $empty_shop_catalog_img ) . '" alt="' . esc_attr( get_the_title( $thumbnail_id ) ) . '" class="pcw-placeholder"/>';
							}
							?>
							</a>
					</div>
					<?php
				}
				?>
				<div class="pro-info" style="letter-spacing: <?php echo esc_attr( $atts['letter-spacing'] ); ?>;">

					<?php
					$desc = $atts['description'];
					echo '<div class="pro_name">' . esc_attr( $category->name ) . ' (' . esc_attr( $category->count ) . ') </div>';
					if ( $desc == 'true' ) {
						echo '<div class="pro_desc">' . esc_attr( $category->description ) . '</div>';
					}
					?>
				</div>
			</div>
			<?php
		}
		?>
		</div>
		<style type="text/css">
			.pro_name{
				font-size: <?php echo esc_attr( $atts['font-size'] ); ?>;
				font-weight: <?php echo esc_attr( $atts['font-weight'] ); ?>;
				font-family: <?php echo esc_attr( $atts['font-family'] ); ?>;
				color: <?php echo esc_attr( $atts['color'] ); ?>;
			}
		</style>
		<?php
		if ( 'hide' !== $atts['pagination'] ) {
			?>
			<nav class="woocommerce-pagination pcw-product-cat">
				<?php
				$big   = 999999999;
				$total = wp_count_terms( 'product_cat' );
				echo wp_kses_post(
					paginate_links(
						array(
							'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
							'format'    => '',
							'prev_text' => __( '&#x2190;' ),
							'next_text' => __( '&#x2192;' ),
							'type'      => 'list',
							'total'     => ceil( $total / $per_page ),
							'current'   => max( 1, get_query_var( 'paged' ) ),
						)
					)
				);
				?>
			</nav>
			<?php
		}
		woocommerce_product_loop_end();
	}

	wc_reset_loop();

	return '<div class="woocommerce columns-' . $columns . '">' . ob_get_clean() . '</div>';
}
add_shortcode( 'PCW', 'product_categories_widget' );
