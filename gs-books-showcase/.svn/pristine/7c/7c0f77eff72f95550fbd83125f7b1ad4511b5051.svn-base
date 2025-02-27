<?php

namespace GS_BOOKS;

defined( 'ABSPATH' ) || exit;

$gsbks_st_isbn_13 = Helpers::get_post_meta( '_gsbks_isbn_thirteen' );

if ( ! empty( $gsbks_st_isbn_13 ) ) : ?>

    <div class="gsb-info-single">

        <div class="gsb-info-single-name">

            <span class="gsb-info-single-icon"> <i class="fas fa-barcode"></i> </span>
            <?php echo esc_html__( $localizations['gsb_isbn_text_modify'], 'gsbookshowcase' ); ?>:

        </div>

        <div class="gsb-info-single-value gsb-isbn-thirteen">
            <?php echo esc_html( $gsbks_st_isbn_13 ); ?>
        </div>

    </div>
    
<?php endif; ?>