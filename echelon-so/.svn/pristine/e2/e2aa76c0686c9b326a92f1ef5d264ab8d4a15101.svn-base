<?php if ( !empty($frames)) : ?>

    <div uk-slider="center: <?php echo esc_attr($center); ?>; autoplay: <?php echo esc_attr($autoplay); ?>; autoplay-interval: <?php echo esc_attr($autoplay_interval); ?>; clsActivated: <?php echo esc_attr($transition_toggle); ?>" tabindex="-1">

        <div class="uk-position-relative <?php echo esc_attr(implode(' ', $nav_wrap_class)); ?>">

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

        </div>

    </div>

<?php endif; ?>
