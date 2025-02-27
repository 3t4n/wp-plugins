<?php

namespace GS_BOOKS;

defined( 'ABSPATH' ) || exit;

$gsbks_st_dimension = Helpers::get_post_meta( '_gsbks_dimension' );

if ( ! empty( $gsbks_st_dimension ) ) : ?>

	<div class="gsb-info-single">

		<div class="gsb-info-single-name">

			<span class="gsb-info-single-icon"> <i class="fas fa-arrows-alt"></i> </span>
			<?php echo esc_html__( $localizations['gsb_dimension_text_modify'], 'gsbookshowcase' ); ?>: 

		</div>

		<div class="gsb-info-single-value">
            <?php echo $gsbks_st_dimension; ?>
		</div>

	</div>

<?php endif; ?>