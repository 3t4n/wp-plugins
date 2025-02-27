<?php

namespace GS_BOOKS;

use function GS_BOOKS_PRO\is_pro_valid;

defined( 'ABSPATH' ) || exit;

if ( $query->have_posts() ) :

	while ( $query->have_posts() ) :

		$query->the_post();
		$description        = wp_kses_post( get_the_content() );
		$description        = ( strlen( $description ) > 50 ) ? substr( $description, 0, absint( $desc_limit ) ) . '...<a href="' . esc_url( get_the_permalink() ) . '">' . __( 'Book Details', 'gsbookshowcase' ) . '</a>' : $description;
		$authors            = Helpers::post_authors( true );
		$publish            = Helpers::get_post_meta( '_gsbks_publish' );
		$publisher          = Helpers::book_publisher();
		$gsbks_st_isbn      = Helpers::get_post_meta( '_gsbks_isbn_ten' );
		$gsbks_st_isbn_13   = Helpers::get_post_meta( '_gsbks_isbn_thirteen' );
		$gsbks_st_asin      = Helpers::get_post_meta('_gsbks_asin');
		$url                = Helpers::get_post_meta( '_gsbks_url' );
		$classes            = (array) Helpers::get_col_classes( $columns, $columns_tablet, $columns_mobile_portrait, $columns_mobile );

		if ( is_pro_active() && is_pro_valid() ) {
			$all_terms = Helpers::get_all_terms( get_the_ID() );
			if ( $view_type === 'filter' ) {
				$classes[] = 'gs-term-single-item';
				$classes[] = $all_terms;
			}
		}

		?>
	
	<div class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">

		<div class="single-bookshowcase">

			<div class="bookshowcase-top">

				<div class="bookshowcase-front">

					<!-- Post Image / Thumbnail -->
					<div class="gsb-cover-wrapper">
						<?php echo Helpers::gs_book_thumbnail_with_link( $gs_book_thumbnail_sizes, $link_type, '', $popup_style ); ?>
					</div>

				</div>

				<div class="bookshowcase-back gs-book--scrollbar">

					<div class="gsb-book-info-wrapper">

						<?php  if( $gs_book_details ):	?>
							<div class="gsb-desc">
								<p><?php Helpers::post_content( $desc_limit, true, true, $link_type, $popup_style ); ?></p>
							</div>
						<?php endif; ?>

						<div class="gsb-book-info">
							<?php if ( ! empty( $publish ) &&  $gs_book_publish ) : ?>
								<p>
									<span class="gsb-info-lavel"><?php esc_html_e( 'Publish:', 'gsbookshowcase' ); ?> </span>
									<span class="gsb-info-value"><?php esc_html_e( $publish ); ?></span> </p>
								<?php
							endif;

							if ( ! empty( $publisher ) &&  $gs_book_publisher ) :
								?>
								<p>
									<span class="gsb-info-lavel"><?php echo esc_html__( 'Publisher: ', 'gsbookshowcase' ); ?></span>
									<span class="gsb-info-value"><?php echo esc_html( Helpers::wp_kses( $publisher ) ); ?> </span>
								</p>
								<?php
								
							endif;


							$store_links = Helpers::get_store_links(
								array(
									'show_url_field' => ( $gs_book_url  ),
								)
							);

							if ( ! empty( $store_links )  && $gs_book_store ) :
								?>
								<p>
									<span class="gsb-info-lavel">Store: </span>
									<span class="gsb-info-value"><?php echo Helpers::wp_kses( $store_links ); ?> </span>
								</p>
							<?php  endif; ?>
							
						</div>
					</div>
				</div>
			</div>

			<div class="bookshowcase-buttom">

					<?php
					if (  $gs_book_title ) :
						?>
						<div class="gsb-title">
							<h3><?php Helpers::post_title( $link_type, $popup_style ); ?></h3>
						</div>
						<?php
					endif;

					?>
			</div>
		</div>
		<?php include TemplateLoader::locate_template( 'popups/gsb-layout-popup.php' ); ?>
	</div>

		<?php

	endwhile;

	echo paginate_links(
		array(
			'total'     => $query->max_num_pages,
			'current'   => $paged,
			'format'    => '?gs_book=%#%',
			'prev_text' => __( '« Previous' ),
			'next_text' => __( 'Next »' ),
		)
	);

else :

	include TemplateLoader::locate_template( 'partials/gsb-no-book.php' );

endif;

wp_reset_postdata();
