<?php

namespace GS_BOOKS;

defined( 'ABSPATH' ) || exit;

$gsbks_st_country = Helpers::get_post_meta( '_gsbks_country' );

if ( ! empty( $gsbks_st_country ) ) : ?>

	<div class="gsb-info-single">

		<div class="gsb-info-single-name">

			<span class="gsb-info-single-icon"> <i class="fas fa-globe"></i> </span>
			<?php echo esc_html__( $localizations['gsb_country_text_modify'], 'gsbookshowcase' ); ?>: 

		</div>

		<div class="gsb-info-single-value">
            <?php echo $gsbks_st_country; ?>
		</div>

	</div>

<?php endif; ?>