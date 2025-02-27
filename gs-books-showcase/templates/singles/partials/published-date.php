<?php

namespace GS_BOOKS;

defined( 'ABSPATH' ) || exit;

$publish = Helpers::get_post_meta( '_gsbks_publish' );

if ( ! empty( $publish ) ) : ?>

    <div class="gsb-info-single">

        <div class="gsb-info-single-name">

            <span class="gsb-info-single-icon"> <i class="fas fa-calendar-alt"></i> </span>
            <?php esc_html_e( $localizations['gsb_publish_text_modify'], 'gsbookshowcase' ); ?>:

        </div>

        <div class="gsb-info-single-value">

            <?php esc_html_e( $publish ); ?>

        </div>

    </div>

<?php endif; ?>