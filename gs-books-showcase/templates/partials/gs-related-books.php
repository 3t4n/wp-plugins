<?php

namespace GS_BOOKS;

defined( 'ABSPATH' ) || exit;

$query = Helpers::get_related_books_query();

if ( $query->have_posts() ) :

	$desc_limit              = 110;
	$columns                 = 3;
	$columns_tablet          = 4;
	$columns_mobile_portrait = 6;
	$columns_mobile          = 12;
	$gs_book_thumbnail_sizes = 'full';
	$link_type               = 'single_page';
	
	$classes = (array) Helpers::get_col_classes( $columns, $columns_tablet, $columns_mobile_portrait, $columns_mobile );
	
	$settings = ''; 

	?>

	<div class="swiper gs-books-related-books-slider">

		<?php while ( $query->have_posts() ) : $query->the_post(); ?>
	
			<div class="<?php echo esc_attr( implode( ' ', $classes ) ); ?> gsb-related-book">
				<div class="gs-related-books">                
					<div class="gsb-cover-wrapper">
						<?php echo Helpers::gs_book_thumbnail_with_link( $gs_book_thumbnail_sizes, $link_type ); ?>
					</div>                
					<div class="gsb-title">
						<h3><?php Helpers::post_title( $link_type ); ?></h3>
					</div>               
				</div>
			</div>	

		<?php endwhile; wp_reset_query(); ?>

		<div class="swiper-nav-buttons">
			<div class="swiper-button-prev"><svg viewBox="0 0 9.91 17"><path d="M1511,5458.51l-1.41,1.42,8.48,8.48,1.42-1.41Zm-1.41,15.56,1.41,1.42,8.49-8.49-1.42-1.41Z" transform="translate(-1509.59 -5458.5)"/></svg></div>
			<div class="swiper-button-next"><svg viewBox="0 0 9.91 17"><path d="M1511,5458.51l-1.41,1.42,8.48,8.48,1.42-1.41Zm-1.41,15.56,1.41,1.42,8.49-8.49-1.42-1.41Z" transform="translate(-1509.59 -5458.5)"/></svg></div>
		</div>

	</div>
<?php

endif;