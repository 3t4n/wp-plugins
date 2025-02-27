<?php

namespace GS_BOOKS;

defined( 'ABSPATH' ) || exit;

$gsbks_st_isbn = Helpers::get_post_meta( '_gsbks_isbn_ten' );

if ( ! empty( $gsbks_st_isbn ) ) : ?>

    <div class="gsb-info-single">

        <div class="gsb-info-single-name">

            <span class="gsb-info-single-icon"> <i class="fas fa-barcode"></i> </span>
            <?php echo esc_html__( $localizations['gsb_isbn_text_modify'], 'gsbookshowcase' ); ?>:

        </div>


        <div class="gsb-info-single-value gsb-isbn-ten">
            <?php echo esc_html( $gsbks_st_isbn ); ?>
        </div>

    </div>

<?php endif; ?>


