<?php
 if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

 /**
 * The template for displaying the shortcode [lexilink_display]
 * @since      1.0.0
 */
?>

<div class="lexilink-display">

    <div class="lexilink-display__header">

        <div class="lexilink-display__header__filter">
            <ul class="lexilink-display__header__filter__list">
				<li class="lexilink-display__header__filter__list__item active" data-id="all"><?php esc_html_e( 'All', 'lexilink' ); ?></li>
				<?php foreach ( self::ALPHABIT as $letter ) : ?>
					<li class="lexilink-display__header__filter__list__item" data-id="<?php echo esc_attr( $letter ); ?>"><?php echo esc_html( $letter ); ?></li>
				<?php endforeach; ?>
			</ul>
        </div>

        <?php if ( $settings['search_bar'] === '1' ): ?>
            <div class="lexilink-display__header__search-bar">
                <input type="text" placeholder="<?php echo esc_attr( 'Search...', 'lexilink' ); ?>">
                <div class="lexilink-display__header__search-bar__icon"></div>
            </div>
        <?php endif; ?>

    </div>

    <div class="lexilink-display__body">
        <?php foreach ( self::ALPHABIT as $letter ) :
			$is_empty = ! isset( $glossary_arrays[ $letter ] ) || empty( $glossary_arrays[ $letter ] ); ?>

        <div class="lexilink-display__body__letter <?php echo esc_attr( $is_empty ? 'empty' : '' ); ?> <?php echo esc_attr( $settings['accordion'] === '1' ? 'accordion' : '' ); ?>" data-id="<?php echo esc_attr( $letter ); ?>">
			<h2 class="lexilink-display__body__letter__title"><?php echo esc_html( $letter ); ?></h2>
            <ul class="lexilink-display__body__letter__list">
				<?php if ( ! $is_empty ) : ?>
                    <?php foreach ( $glossary_arrays[ $letter ] as $glossary ) : ?>
                        <li class="lexilink-display__body__letter__list__item" data-title="<?php echo esc_attr( strtolower( $glossary['title'] ) ); ?>">
                            <?php if ( $settings['dedicated_page'] === '1' ) : ?>
                                <div class="lexilink-display__body__letter__list__item__title">
                                    <a class="lexilink-display__body__letter__list__item__title__link link" href="<?php echo esc_url( $glossary['link'] ); ?>"><?php echo esc_html( $glossary['title'] ); ?></a>
                                    <span class="lexilink-display__body__letter__list__item__title__icon"></span>
                                </div>
                            <?php else:
                                $custom_link = get_post_meta( $glossary['id'], Lexilink_CPT::CUSTOM_LINK_ID, true );
                                if ( empty( $custom_link ) ) : ?>
                                    <div class="lexilink-display__body__letter__list__item__title">
                                        <span class="lexilink-display__body__letter__list__item__title__link"><?php echo esc_html( $glossary['title'] ); ?></span>
                                        <span class="lexilink-display__body__letter__list__item__title__icon"></span>
                                    </div>
                                <?php else: ?>
                                    <div class="lexilink-display__body__letter__list__item__title">
                                        <a class="lexilink-display__body__letter__list__item__title__link link" href="<?php echo esc_url( $custom_link ); ?>"><?php echo esc_html( $glossary['title'] ); ?></a>
                                        <span class="lexilink-display__body__letter__list__item__title__icon"></span>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                            <p class="lexilink-display__body__letter__list__item__excerpt">
                                <?php echo esc_html( $glossary['excerpt'] ); ?>
                            </p>
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        </div>

        <?php endforeach; ?>
    </div>

</div>
