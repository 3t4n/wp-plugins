<?php

namespace GS_BOOKS;

defined( 'ABSPATH' ) || exit;

$gsbks_st_fsize = Helpers::get_post_meta( '_gsbks_fsize' );

if ( ! empty( $gsbks_st_fsize ) ) : ?>

	<div class="gsb-info-single">

		<div class="gsb-info-single-name">

			<span class="gsb-info-single-icon"> <i class="fas fa-file-archive"></i> </span>
			<?php echo esc_html__( $localizations['gsb_filesize_text_modify'], 'gsbookshowcase' ); ?>: 

		</div>

		<div class="gsb-info-single-value">
            <?php echo $gsbks_st_fsize; ?>
		</div>

	</div>

<?php endif; ?>