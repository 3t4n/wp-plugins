<?php

namespace GS_BOOKS;

defined( 'ABSPATH' ) || exit;

if( empty( $term->term_id ) ) {
    $term = $author_term[0];
}

if ( empty( $term->term_id ) ) return;

$author_socials = get_term_meta( $term->term_id, 'author-taxonomy-repeat', true );
?>
<ul class="gsb-author-social">
    <?php if( is_array( $author_socials ) ): ?>
        <?php foreach( $author_socials as $author_social ): ?>
            <li>
                <a href="#">
                    <i class="<?php echo esc_attr($author_social['icon']); ?>"></i>
                </a>
            </li>
        <?php endforeach; ?>
    <?php endif; ?>
</ul>
