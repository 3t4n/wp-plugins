<?php

namespace GS_BOOKS;

use function GS_BOOKS_PRO\is_pro_valid;

defined( 'ABSPATH' ) || exit;

/**
 * GS Team - Single Template
 *
 * @author GS Plugins <hello@gsplugins.com>
 *
 * This template can be overridden by copying it to yourtheme/gs-team/gs-team-layout-single.php
 *
 * @package GS_Team/Templates
 * @version 1.0.2
 */

$single_page_style  = Helpers::gs_book_getoption( 'single_page', 'default' );

if ( ! is_pro_active() || ! is_pro_valid() ) $single_page_style = 'default';

$single_page_style  = apply_filters( 'gs_book_single_page_style', $single_page_style );
$localizations      = plugin()->builder->_get_localization( false );
$gallery_images 	= get_post_meta( get_the_ID(), 'gsb_gallery', true );

get_header();

?>

<div class="gs-containeer gs-single-container <?php echo 'gs-single--' . esc_attr( $single_page_style ); ?>">	
	<div class="gs_book" id="gs_book_single">

		<?php

		while ( have_posts() ) : the_post();
			include TemplateLoader::locate_template( 'singles/gs-book-single-default.php' );
		endwhile;
		
		?>

	</div>	
</div>

<?php
get_footer();