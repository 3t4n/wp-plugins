<?php

namespace GS_BOOKS;

defined( 'ABSPATH' ) || exit;

$taxonomy = $args['taxonomy'] ?? '';

if ( ! $taxonomy ) return;

$terms = get_the_terms( get_the_ID(), $taxonomy );

if ( $terms && ! is_wp_error( $terms ) ) : ?>

    <?php
    
    switch( $args['taxonomy'] ) {
        case 'bookshowcase_group':
            $icon = '<i class="fas fa-list-alt"></i>';
            break;
        case 'gsb_tag':
            $icon = '<i class="fas fa-tags"></i>';
            break;
        case 'gsb_author':
            $icon = '<i class="fas fa-users"></i>';
            break;
        case 'gsb_genre':
            $icon = '<i class="fas fa-dna"></i>';
            break;
        case 'gsb_series':
            $icon = '<i class="fas fa-swatchbook"></i>';
            break;            
        case 'gsb_languages':
            $icon = '<i class="fas fa-language"></i>';
            break;
        case 'gsb_publishers':
            $icon = '<i class="fas fa-warehouse"></i>';
            break;
        case 'gsb_countries':
            $icon = '<i class="fas fa-globe-africa"></i>';
            break;
    }
    
    ?>

    <div class="gsb-info-single">

        <div class="gsb-info-single-name">

            <span class="gsb-info-single-icon"> <?php echo wp_kses_post($icon); ?> </span>
            <?php esc_html_e( $args['title'], 'gs-books-showcase' ); ?>:

        </div>

        <div class="gsb-info-single-value">

            <ul>
                <?php $term_count = count($terms); $i = 0; ?>
                <?php foreach ( $terms as $term ) : $i++; ?>
                    <li>
                        <?php if( $taxonomy === 'gsb_languages' || $taxonomy === 'gsb_countries' ): ?>
                            <?php echo esc_html( $term->name ); ?><?php if ($i < $term_count) echo ','; ?>
                        <?php else: ?>
                            <a href="<?php echo esc_url( get_term_link( $term ) ); ?>">
                                <?php echo esc_html( $term->name ); ?><?php if ($i < $term_count) echo ','; ?>
                            </a>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>

        </div>

    </div>
<?php endif; ?>