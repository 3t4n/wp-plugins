<?php if ( !empty($frames)) : ?>

    <div uk-slider="center: <?php echo esc_attr($center); ?>; autoplay: <?php echo esc_attr($autoplay); ?>; autoplay-interval: <?php echo esc_attr($autoplay_interval); ?>; clsActivated: <?php echo esc_attr($transition_toggle); ?>" tabindex="-1">

        <div class="uk-position-relative uk-visible-toggle">

            <div <?php echo $lightbox; ?> class="uk-slider-container">

                <div class="uk-slider-items uk-grid <?php echo esc_attr(implode(' ', $items_class)); ?>">
                    <?php foreach ($frames as $k => $v) : ?>
                        <div>
                            <?php
                            if( function_exists( 'siteorigin_panels_render' ) ) {
                                $content_builder_id = substr( md5( json_encode( $v['content'] ) ), 0, 8 );
                                echo siteorigin_panels_render( 'w'.$content_builder_id, true, $v['content'] );
                            }
                            ?>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>

            <?php if ( !empty($show_nav) ) : ?>

                <?php if ( empty($nav_position) || $nav_position == 'uk-position-center') : ?>

                    <a class="uk-slidenav uk-position-center-left <?php echo esc_attr($nav_position_size); ?> <?php echo esc_attr($nav_hidden_hover); ?> <?php echo esc_attr($nav_hidden_touch); ?> eso-slidenav-previous" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                    <a class="uk-slidenav uk-position-center-right <?php echo esc_attr($nav_position_size); ?> <?php echo esc_attr($nav_hidden_hover); ?> <?php echo esc_attr($nav_hidden_touch); ?> uk-hidden-touch eso-slidenav-previous" href="#" uk-slidenav-next uk-slider-item="next"></a>

                <?php endif; ?>

                <?php if ( !empty($nav_position) && $nav_position != 'uk-position-center') : ?>

                    <div class="uk-slidenav-container <?php echo esc_attr(implode(' ', $nav_container_class)); ?>">
                        <a class="uk-slidenav uk-hidden-touch eso-slidenav-previous" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                        <a class="uk-slidenav uk-hidden-touch eso-slidenav-previous" href="#" uk-slidenav-next uk-slider-item="next"></a>
                    </div>

                <?php endif; ?>

            <?php endif; ?>

        </div>

        <?php if ( !empty($show_dot) ) : ?>
            <ul class="uk-slider-nav uk-dotnav uk-flex-center"></ul>
        <?php endif; ?>

    </div>

<?php endif; ?>
