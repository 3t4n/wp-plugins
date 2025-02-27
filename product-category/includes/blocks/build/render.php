<?php
/**
 * Block render file.
 *
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 *
 * @author Kushang Tailor
 * @package Product Category
 * @version 1.5.0
 */

$post_main_class = 'wp-block-product-cat__main ';
$pcb_page        = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$pcb_per_page    = $attributes['numberOfCat'];
$offset          = ( $pcb_page > 0 ) ? $pcb_per_page * ( $pcb_page - 1 ) : 1;
$categories      = $attributes['categories'];
$categories      = str_replace( '"', '', $categories );
$categories      = str_replace( '[', '', $categories );
$categories      = str_replace( ']', '', $categories );
$categories      = explode( ',', $categories );
$title_items     = ! empty( $attributes['titleListItems'] ) ? $attributes['titleListItems'] : array();
$image_height    = ! empty( $attributes['imageEqualHeight'] ) && ! empty( $attributes['heightVal'] ) ? $attributes['heightVal'] : 150;
$image_border    = ! empty( $attributes['imageBorder'] ) ? $attributes['imageBorder'] : array();
$cat_border      = ! empty( $attributes['catBoxBorder'] ) ? $attributes['catBoxBorder'] : array();
$box_margin      = ! empty( $attributes['boxMargin'] ) ? $attributes['boxMargin'] : array();
$box_padding     = ! empty( $attributes['boxPadding'] ) ? $attributes['boxPadding'] : array();
$placeholder_img = pcb_get_attachment_by_filename( 'woocommerce-placeholder' ) ? pcb_get_attachment_by_filename( 'woocommerce-placeholder' ) : '';
?>

<div class="<?php echo esc_attr( $post_main_class ); ?>">
	<?php if ( $attributes['showCatTitle'] ) : ?>
		<style>
			.wp-block-product-cat__main .wp-block-product-cat__container .wp-block-product-cat__inner .cat-info .cat_name {
				<?php if( ! empty( $attributes['fontColor'] ) ) : ?> color: <?php echo esc_attr( $attributes['fontColor'] ) ?>; <?php endif; ?>
				<?php if( ! empty( $attributes['fontSize'] ) ) : ?> font-size: <?php echo esc_attr( $attributes['fontSize'] ) ?>; <?php endif; ?>
				<?php if( ! empty( $attributes['fontWeight'] ) ) : ?> font-weight: <?php echo esc_attr( $attributes['fontWeight'] ) ?>; <?php endif; ?>
				<?php if( ! empty( $attributes['fontStyle'] ) ) : ?> font-style: <?php echo esc_attr( $attributes['fontStyle'] ) ?>; <?php endif; ?>
				<?php if( ! empty( $attributes['fontTransform'] ) ) : ?> text-transform: <?php echo esc_attr( $attributes['fontTransform'] ) ?>; <?php endif; ?>
				<?php if( ! empty( $attributes['fontLineHeight'] ) ) : ?> line-height: <?php echo esc_attr( $attributes['fontLineHeight'] ) . "px" ?>; <?php endif; ?>
				<?php if( ! empty( $attributes['fontLetterSpacing'] ) ) : ?> letter-spacing: <?php echo esc_attr( $attributes['fontLetterSpacing'] ) . "px" ?>; <?php endif; ?>
				<?php if( ! empty( $attributes['fontDecoration'] ) ) : ?> text-decoration: <?php echo esc_attr( $attributes['fontDecoration'] ) ?>; <?php endif; ?>
			}
			.wp-block-product-cat__main .wp-block-product-cat__container .wp-block-product-cat__inner {
				<?php if( ! empty( $attributes['bgColor'] ) ) : ?> background-color: <?php echo esc_attr( $attributes['bgColor'] ) ?>; <?php endif; ?>
				<?php if( ! empty( $attributes['catBoxRadius'] ) ): ?> border-radius: <?php echo esc_attr( $attributes['catBoxRadius'] ) . "px" ?>; <?php endif; ?>
				<?php if( ! empty( $box_margin['top'] ) ): ?> margin-top: <?php echo esc_attr( $box_margin['top'] ) ?>; <?php endif; ?>
				<?php if( ! empty( $box_margin['right'] ) ): ?> margin-right: <?php echo esc_attr( $box_margin['right'] ) ?>; <?php endif; ?>
				<?php if( ! empty( $box_margin['bottom'] ) ): ?> margin-bottom: <?php echo esc_attr( $box_margin['bottom'] ) ?>; <?php endif; ?>
				<?php if( ! empty( $box_margin['left'] ) ): ?> margin-left: <?php echo esc_attr( $box_margin['left'] ) ?>; <?php endif; ?>
				<?php if( ! empty( $box_padding['top'] ) ): ?> padding-top: <?php echo esc_attr( $box_padding['top'] ) ?>; <?php endif; ?>
				<?php if( ! empty( $box_padding['right'] ) ): ?> padding-right: <?php echo esc_attr( $box_padding['right'] ) ?>; <?php endif; ?>
				<?php if( ! empty( $box_padding['bottom'] ) ): ?> padding-bottom: <?php echo esc_attr( $box_padding['bottom'] ) ?>; <?php endif; ?>
				<?php if( ! empty( $box_padding['left'] ) ): ?> padding-left: <?php echo esc_attr( $box_padding['left'] ) ?>; <?php endif; ?>
			}
			<?php if ( count($cat_border) > 3 ){ ?>
				.wp-block-product-cat__main .wp-block-product-cat__container .wp-block-product-cat__inner {
					<?php if( ! empty( $cat_border['top']['color'] ) ) : ?> border-top-color: <?php echo esc_attr( $cat_border['top']['color'] ) ?>; <?php endif; ?>
					<?php if( ! empty( $cat_border['right']['color'] ) ) : ?> border-right-color: <?php echo esc_attr( $cat_border['right']['color'] ) ?>; <?php endif; ?>
					<?php if( ! empty( $cat_border['bottom']['color'] ) ) : ?> border-bottom-color: <?php echo esc_attr( $cat_border['bottom']['color'] ) ?>; <?php endif; ?>
					<?php if( ! empty( $cat_border['left']['color'] ) ) : ?> border-left-color: <?php echo esc_attr( $cat_border['left']['color'] ) ?>; <?php endif; ?>
					<?php if( ! empty( $cat_border['top']['width'] ) ) : ?> border-top-width: <?php echo esc_attr( $cat_border['top']['width'] ) ?>; <?php endif; ?>
					<?php if( ! empty( $cat_border['right']['width'] ) ) : ?> border-right-width: <?php echo esc_attr( $cat_border['right']['width'] ) ?>; <?php endif; ?>
					<?php if( ! empty( $cat_border['bottom']['width'] ) ) : ?> border-bottom-width: <?php echo esc_attr( $cat_border['bottom']['width'] ) ?>; <?php endif; ?>
					<?php if( ! empty( $cat_border['left']['width'] ) ) : ?> border-left-width: <?php echo esc_attr( $cat_border['left']['width'] ) ?>; <?php endif; ?>
					<?php if( ! empty( $cat_border['top']['style'] ) ) : ?> border-top-style: <?php echo esc_attr( $cat_border['top']['style'] ) ?>; <?php endif; ?>
					<?php if( ! empty( $cat_border['right']['style'] ) ) : ?> border-right-style: <?php echo esc_attr( $cat_border['right']['style'] ) ?>; <?php endif; ?>
					<?php if( ! empty( $cat_border['bottom']['style'] ) ) : ?> border-bottom-style: <?php echo esc_attr( $cat_border['bottom']['style'] ) ?>; <?php endif; ?>
					<?php if( ! empty( $cat_border['left']['style'] ) ) : ?> border-left-style: <?php echo esc_attr( $cat_border['left']['style'] ) ?>; <?php endif; ?>
				}
			<?php } else { ?>
				.wp-block-product-cat__main .wp-block-product-cat__container .wp-block-product-cat__inner {
					<?php if( ! empty( $cat_border['width'] ) ) : ?> border-width: <?php echo esc_attr( $cat_border['width'] ) ?>; <?php endif; ?>
					<?php if( ! empty( $cat_border['color'] ) ) : ?> border-color: <?php echo esc_attr( $cat_border['color'] ) ?>; <?php endif; ?>
					<?php if( ! empty( $cat_border['style'] ) ) : ?> border-style: <?php echo esc_attr( $cat_border['style'] ) ?>; <?php endif; ?>
				}
			<?php } ?>
			.wp-block-product-cat__main .wp-block-product-cat__container .wp-block-product-cat__inner .cat-info .cat_desc {
				<?php if( ! empty( $attributes['fontDescColor'] ) ) : ?> color: <?php echo esc_attr( $attributes['fontDescColor'] ) ?>; <?php endif; ?>
				<?php if( ! empty( $attributes['descFontSize'] ) ) : ?> font-size: <?php echo esc_attr( $attributes['descFontSize'] ) ?>; <?php endif; ?>
				<?php if( ! empty( $attributes['descFontWeight'] ) ) : ?> font-weight: <?php echo esc_attr( $attributes['descFontWeight'] ) ?>; <?php endif; ?>
				<?php if( ! empty( $attributes['descFontStyle'] ) ) : ?> font-style: <?php echo esc_attr( $attributes['descFontStyle'] ) ?>; <?php endif; ?>
				<?php if( ! empty( $attributes['descFontTransform'] ) ) : ?> text-transform: <?php echo esc_attr( $attributes['descFontTransform'] ) ?>; <?php endif; ?>
				<?php if( ! empty( $attributes['descFontLineHeight'] ) ) : ?> line-height: <?php echo esc_attr( $attributes['descFontLineHeight'] ) . "px" ?>; <?php endif; ?>
				<?php if( ! empty( $attributes['descFontLetterSpacing'] ) ) : ?> letter-spacing: <?php echo esc_attr( $attributes['descFontLetterSpacing'] ) . "px" ?>; <?php endif; ?>
				<?php if( ! empty( $attributes['descFontDecoration'] ) ) : ?> text-decoration: <?php echo esc_attr( $attributes['descFontDecoration'] ) ?>; <?php endif; ?>
			}
			.wp-block-product-cat__main .wp-block-product-cat__container .wp-block-product-cat__inner .cat-img img {
				<?php if( ! empty( $attributes['heightVal'] ) ) : ?> height: <?php echo esc_attr( $image_height ) . "px" ?>; <?php endif; ?>
				<?php if( ! empty( $attributes['imageRadius'] ) ): ?> border-radius: <?php echo esc_attr( $attributes['imageRadius'] ) . "px" ?>; <?php endif; ?>
			}
			<?php if ( count($image_border) > 3 ){ ?>
				.wp-block-product-cat__main .wp-block-product-cat__container .wp-block-product-cat__inner .cat-img img {
					<?php if( ! empty( $image_border['top']['color'] ) ) : ?> border-top-color: <?php echo esc_attr( $image_border['top']['color'] ) ?>; <?php endif; ?>
					<?php if( ! empty( $image_border['right']['color'] ) ) : ?> border-right-color: <?php echo esc_attr( $image_border['right']['color'] ) ?>; <?php endif; ?>
					<?php if( ! empty( $image_border['bottom']['color'] ) ) : ?> border-bottom-color: <?php echo esc_attr( $image_border['bottom']['color'] ) ?>; <?php endif; ?>
					<?php if( ! empty( $image_border['left']['color'] ) ) : ?> border-left-color: <?php echo esc_attr( $image_border['left']['color'] ) ?>; <?php endif; ?>
					<?php if( ! empty( $image_border['top']['width'] ) ) : ?> border-top-width: <?php echo esc_attr( $image_border['top']['width'] ) ?>; <?php endif; ?>
					<?php if( ! empty( $image_border['right']['width'] ) ) : ?> border-right-width: <?php echo esc_attr( $image_border['right']['width'] ) ?>; <?php endif; ?>
					<?php if( ! empty( $image_border['bottom']['width'] ) ) : ?> border-bottom-width: <?php echo esc_attr( $image_border['bottom']['width'] ) ?>; <?php endif; ?>
					<?php if( ! empty( $image_border['left']['width'] ) ) : ?> border-left-width: <?php echo esc_attr( $image_border['left']['width'] ) ?>; <?php endif; ?>
					<?php if( ! empty( $image_border['top']['style'] ) ) : ?> border-top-style: <?php echo esc_attr( $image_border['top']['style'] ) ?>; <?php endif; ?>
					<?php if( ! empty( $image_border['right']['style'] ) ) : ?> border-right-style: <?php echo esc_attr( $image_border['right']['style'] ) ?>; <?php endif; ?>
					<?php if( ! empty( $image_border['bottom']['style'] ) ) : ?> border-bottom-style: <?php echo esc_attr( $image_border['bottom']['style'] ) ?>; <?php endif; ?>
					<?php if( ! empty( $image_border['left']['style'] ) ) : ?> border-left-style: <?php echo esc_attr( $image_border['left']['style'] ) ?>; <?php endif; ?>
				}
			<?php } else { ?>
				.wp-block-product-cat__main .wp-block-product-cat__container .wp-block-product-cat__inner .cat-img img {
					<?php if( ! empty( $image_border['width'] ) ) : ?> border-width: <?php echo esc_attr( $image_border['width'] ) ?>; <?php endif; ?>
					<?php if( ! empty( $image_border['color'] ) ) : ?> border-color: <?php echo esc_attr( $image_border['color'] ) ?>; <?php endif; ?>
					<?php if( ! empty( $image_border['style'] ) ) : ?> border-style: <?php echo esc_attr( $image_border['style'] ) ?>; <?php endif; ?>
				}
			<?php } ?>
		</style>
	<?php endif; ?>
	<?php
	global $woocommerce_loop;
	$args = array(
		'number'     => $attributes['numberOfCat'],
		'offset'     => $offset,
		'taxonomy'   => 'product_cat',
		'orderby'    => ! empty( $attributes['catOrderBy'] ) ? $attributes['catOrderBy'] : '',
		'order'      => ! empty( $attributes['catOrder'] ) ? $attributes['catOrder'] : '',
		'show_count' => 1,
		'pad_counts' => 0,
		'include'    => $categories,
		'hide_empty' => ! empty( $attributes['hideEmptyCat'] ) ? 1 : 0,
		'parent'     => '',
	);

	if ( ! empty( $attributes['parentCat'] ) ) {
		$args['parent'] = 0;
	}

	$product_categories = get_terms( 'product_cat', $args );

	if ( ! empty( $attributes['hideEmptyCat'] ) ) {
		foreach ( $product_categories as $key => $category ) {
			if ( 0 === $category->count ) {
				unset( $product_categories[ $key ] );
			}
		}
	}

	if ( ! empty( $attributes['numberOfCat'] ) ) {
		$product_categories = array_slice( $product_categories, 0, $attributes['numberOfCat'] );
	}

	$columns                     = absint( $attributes['layoutColumns'] );
	$woocommerce_loop['columns'] = $columns;

	if ( ! empty( $product_categories ) ) {
		?>
		<div class="wp-block-product-cat__container has-columns-<?php echo esc_attr( $columns ); ?> <?php echo esc_attr( ! empty( $attributes['imageEqualHeight'] ) ? 'equal-height' : '' ); ?>">
		<?php
		foreach ( $product_categories as $category ) {
			$cat_link = 'href="' . get_category_link( $category ) . '"';
			?>
			<div class="wp-block-product-cat__inner">
				<div class="cat-img">
					<a href="<?php echo esc_url( get_category_link( $category ) ); ?>">
						<?php
						$thumbnail_id           = get_term_meta( $category->term_id, 'thumbnail_id', true );
						$empty_shop_catalog_img = PCW_PLUGIN_PATH . 'admin/images/placeholder.png';
						$image                  = '';

						if ( $attributes['imageSize'] ) {
							$image = wp_get_attachment_image_src( $thumbnail_id, $attributes['imageSize'] );
						} else {
							$image = wp_get_attachment_image_src( $thumbnail_id, 'full' );
						}

						if ( $attributes['showCatImage'] ) :
							if ( $image ) {
								echo '<img src="' . esc_url( $image[0] ) . '" alt="' . esc_attr( get_the_title( $thumbnail_id ) ) . '" />';
							} else {
								echo '<img src="' . esc_url( wp_get_attachment_image_url( $placeholder_img->ID ) ) . '" alt="' . esc_attr( get_the_title( $thumbnail_id ) ) . '"/>';
							}
						endif;
						?>
					</a>
				</div>
				<div class="cat-info">

					<?php
					if ( $attributes['showCatTitle'] ) :
						echo '<a class="cat_name" ' . $cat_link . '>' . esc_attr( $category->name ) . ( ! empty( $attributes['showCatCount'] ) ? "(" . esc_attr( $category->count ) . ")" : "" ) . '</a>';
					endif;
					if ( $attributes['showCatDesc'] ) :
						echo '<div class="cat_desc">' . esc_attr( $category->description ) . '</div>';
					endif;
					?>
				</div>
			</div>
			<?php
		}
		?>
		</div>
		<?php
		if ( ! empty( $attributes['paging'] ) ) {
			?>
			<nav class="woocommerce-pagination pcb-product-cat">
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
							'total'     => ceil( $total / $pcb_per_page ),
							'current'   => max( 1, get_query_var( 'paged' ) ),
						)
					)
				);
				?>
			</nav>
			<?php
		}
		woocommerce_product_loop_end();
	} else {
		echo 'No categories Found!';
	}

	wc_reset_loop();
	?>
</div>
