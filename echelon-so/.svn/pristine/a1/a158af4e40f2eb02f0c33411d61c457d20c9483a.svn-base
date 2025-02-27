<?php if ( !empty($frames)) : ?>

    <div uk-slider="center: <?php echo esc_attr($center); ?>; autoplay: <?php echo esc_attr($autoplay); ?>; autoplay-interval: <?php echo esc_attr($autoplay_interval); ?>; clsActivated: <?php echo esc_attr($transition_toggle); ?>" tabindex="-1">

        <div class="uk-position-relative">

            <div <?php echo esc_attr($lightbox); ?> class="uk-slider-container">

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

            <?php if ( $slide_nav_settings['nav_arrangement'] == 'left') : ?>

                <div class="uk-flex uk-flex-between uk-flex-middle uk-margin-small-top">

                    <div>

                        <div class="uk-slidenav-container uk-flex uk-flex-left <?php echo esc_attr($nav_class); ?>">
                            <a class="uk-slidenav" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                            <a class="uk-slidenav" href="#" uk-slidenav-next uk-slider-item="next"></a>
                        </div>

                    </div>

                    <div>

                        <div class="<?php echo esc_attr($dot_class); ?>">

                            <ul class="uk-slider-nav uk-dotnav uk-flex-right"></ul>

                        </div>

                    </div>

                </div>

            <?php endif; ?>

            <?php if ( $slide_nav_settings['nav_arrangement'] == 'right') : ?>

                <div class="uk-flex uk-flex-between uk-flex-middle uk-margin-small-top">

                    <div>

                        <div class="<?php echo esc_attr($dot_class); ?>">

                            <ul class="uk-slider-nav uk-dotnav uk-flex-left"></ul>

                        </div>

                    </div>

                    <div>

                        <div class="uk-slidenav-container uk-flex uk-flex-right <?php echo esc_attr($nav_class); ?>">
                            <a class="uk-slidenav" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                            <a class="uk-slidenav" href="#" uk-slidenav-next uk-slider-item="next"></a>
                        </div>

                    </div>

                </div>

            <?php endif; ?>

        </div>

    </div>

<?php endif; ?>
