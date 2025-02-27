<?php

namespace GS_BOOKS;

defined( 'ABSPATH' ) || exit;

$gsbks_st_url = Helpers::get_post_meta( '_gsbks_url' );

if ( ! empty( $gsbks_st_url ) ) : ?>

	<div class="gsb-info-single">

		<div class="gsb-info-single-name">

			<span class="gsb-info-single-icon"> <i class="fas fa-download"></i> </span>
			<?php echo esc_html__( 'Download URL', 'gsbookshowcase' ); ?>: 

		</div>

		<div class="gsb-info-single-value">
			<?php printf( '<a href="%s" target="_blank" class="gsb-download-link" rel="noopener noreferrer">%s</a>', esc_url( $gsbks_st_url ), esc_html__( $localizations['gsb_download_text_modify'], 'gsbookshowcase' ) ); ?>
		</div>

	</div>

<?php endif; ?>