

<div class="wrap">

    <div id="icon-options-general" class="icon32"></div>
    <h2><?php esc_attr_e( 'Heading String', 'wp_admin_style' ); ?></h2>

    <div id="poststuff">

        <div id="post-body" class="metabox-holder columns-2">

            <!-- main content -->
            <div id="post-body-content">

                <div class="meta-box-sortables ui-sortable">

                    <div class="postbox">

                        <div class="inside">

                            <?php

                                $args = array(
                                    'post_type' => 'post'
                                );

                                $the_query = new WP_Query( $args );

                                if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();

                            ?>

                                <h2><?php the_title(); ?></h2>
                                <p><?php the_content(); ?></p>
                                <p><?php the_post_thumbnail(); ?></p>

                            <?php endwhile; endif; ?>

                        </div>
                        <!-- .inside -->

                    </div>
                    <!-- .postbox -->

                </div>
                <!-- .meta-box-sortables .ui-sortable -->

            </div>
            <!-- post-body-content -->

        </div>
        <!-- #post-body .metabox-holder .columns-2 -->

        <br class="clear">
    </div>
    <!-- #poststuff -->

</div> <!-- .wrap -->
