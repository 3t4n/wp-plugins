<?php

namespace GS_BOOKS;

defined( 'ABSPATH' ) || exit;

$gsbks_st_language = Helpers::get_post_meta( '_gsbks_language' );

if ( ! empty( $gsbks_st_language ) ) : ?>

	<div class="gsb-info-single">

		<div class="gsb-info-single-name">

			<span class="gsb-info-single-icon"> <i class="fas fa-globe-asia"></i> </span>
			<?php echo esc_html__( $localizations['gsb_language_text_modify'], 'gsbookshowcase' ); ?>: 

		</div>

		<div class="gsb-info-single-value">
            <?php echo $gsbks_st_language; ?>
		</div>

	</div>

<?php endif; ?>