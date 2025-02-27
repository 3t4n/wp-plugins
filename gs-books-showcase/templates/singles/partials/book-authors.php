<?php

namespace GS_BOOKS;

defined( 'ABSPATH' ) || exit;

$authors = Helpers::post_authors( true );

?>

<!-- Book Author -->
<?php if ( ! empty( $authors ) ) : ?>
    <div class="gsb-author">
        <h4>by <?php echo Helpers::wp_kses( $authors ); ?></h4>
    </div>
<?php endif; ?>