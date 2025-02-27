<?php

namespace GS_BOOKS;

defined( 'ABSPATH' ) || exit;

$gsbks_st_pages = Helpers::get_post_meta( '_gsbks_pages' );

if ( ! empty( $gsbks_st_pages ) ) : ?>

	<div class="gsb-info-single">

		<div class="gsb-info-single-name">

			<span class="gsb-info-single-icon"> <i class="fas fa-file-alt"></i> </span>
			<?php echo esc_html__( $localizations['gsb_pages_text_modify'], 'gsbookshowcase' ); ?>:

		</div>

		<div class="gsb-info-single-value">
            <?php echo $gsbks_st_pages; ?>
		</div>

	</div>
    
<?php endif; ?>