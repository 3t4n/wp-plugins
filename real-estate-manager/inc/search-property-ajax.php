<?php
    $args = array('post_type' =>  'rem_property');

    if (isset($keywords) && $keywords != '') {
        $args['s'] = $keywords;
    }

    if (isset($purpose) && $purpose != '') {
        $args['meta_query'][] = array(
            array(
                'key'     => 'rem_property_purpose',
                'value'   => $purpose,
                'compare' => 'IN',
            ),
        );
    }

    if (isset($status) && $status != '') {
        $args['meta_query'][] = array(
            array(
                'key'     => 'rem_property_status',
                'value'   => $status,
                'compare' => 'IN',
            ),
        );
    }

    if (isset($type) && $type != '') {
        $args['meta_query'][] = array(
            array(
                'key'     => 'rem_property_type',
                'value'   => $type,
                'compare' => 'IN',
            ),
        );
    }

    if (isset($area) && $area != '') {
        $args['meta_query'][] = array(
            array(
                'key'     => 'rem_property_area',
                'value'   => $area,
                'compare' => 'IN',
            ),
        );
    }

    if (isset($city) && $city != '') {
        $args['meta_query'][] = array(
            array(
                'key'     => 'rem_property_city',
                'value'   => $city,
                'compare' => 'IN',
            ),
        );
    }

    if (isset($country) && $country != '') {
        $args['meta_query'][] = array(
            array(
                'key'     => 'rem_property_country',
                'value'   => $country,
                'compare' => 'IN',
            ),
        );
    }

    if (isset($bedrooms) && $bedrooms != '') {
        $args['meta_query'][] = array(
            array(
                'key'     => 'rem_property_bedrooms',
                'value'   => $bedrooms,
                'compare' => 'IN',
            ),
        );
    }

    if (isset($bathrooms) && $bathrooms != '') {
        $args['meta_query'][] = array(
            array(
                'key'     => 'rem_property_bathrooms',
                'value'   => $bathrooms,
                'compare' => 'IN',
            ),
        );
    }

    if (isset($price_min) && $price_min != '') {
        $args['meta_query'][] = array(
            array(
                'key'     => 'rem_property_price',
                'value'   => array( $price_min, $price_max ),
                'type'    => 'numeric',
                'compare' => 'BETWEEN',
            ),
        );
    }

    if (isset($detail_cbs) && $detail_cbs != '') {

        foreach ($detail_cbs as $cbname => $value) {
            $args['meta_query'][] = array(
                array(
                    'key'     => 'rem_property_detail_cbs',
                    'value'   => $cbname,
                    'compare' => 'LIKE',
                ),
            );
        }
    }

    // the query
    $the_query = new WP_Query( $args );
    $rem_all_settings = get_option( 'rem_all_settings' );
    ?>

    <?php if ( $the_query->have_posts() ) : ?>

        <div class="filter-title">
            <h2><?php _e( 'Search Results', 'wcp-rem' ); ?> </h2>
        </div>
        <!-- the loop -->
        <?php while ( $the_query->have_posts() ) : $the_query->the_post();
            global $rem_ob;
            $price = $rem_ob->get_price(get_the_id());
            $area = get_post_meta(get_the_id(), 'rem_property_area', true);
            $property_type = get_post_meta(get_the_id(), 'rem_property_type', true);
            $address = get_post_meta(get_the_id(), 'rem_property_address', true);
            $city = get_post_meta(get_the_id(), 'rem_property_city', true);
            $country = get_post_meta(get_the_id(), 'rem_property_country', true);
            $purpose = get_post_meta(get_the_id(), 'rem_property_purpose', true);
            $status = get_post_meta(get_the_id(), 'rem_property_status', true);
            $bedrooms = get_post_meta(get_the_id(), 'rem_property_bedrooms', true);
            $bathrooms = get_post_meta(get_the_id(), 'rem_property_bathrooms', true);
        ?>
            
        <div class="landz-box-property box-list">
            <a href="<?php the_permalink(); ?>" class="hover-effect image image-fill">
                <span class="cover"></span>
                <?php do_action( 'rem_property_picture' ); ?>
                <h3 class="title"><?php the_title(); ?></h3>
            </a>
            <span class="price"><?php echo $price; ?></span>
            <span class="address"><i class="fa fa-map-marker"></i> <?php echo $address; ?></span>
            <span class="description"><?php the_excerpt(); ?></span>
            
            <?php do_action( 'rem_display_property_details_icons', get_the_id() ); ?>

            <div class="footer">
                <?php
                        $terms = wp_get_post_terms( get_the_id() ,'rem_property_tag' );
                         
                        echo '<div id="filter-box" class="hidden-xs">';
                         
                        foreach ( $terms as $term ) {
                            // The $term is an object, so we don't need to specify the $taxonomy.
                            $term_link = get_term_link( $term );
                            
                            // If there was an error, continue to the next term.
                            if ( is_wp_error( $term_link ) ) {
                                continue;
                            }
                            // We successfully got a link. Print it out.
                            echo '<a style="margin-left:10px;position:relative !important;margin-top:10px;" class="filter" href="' . esc_url( $term_link ) . '">' . $term->name . ' <i class="fa fa-tag"></i></a>';
                        }
                         
                        echo '</div>';
                    ?>                    
                <a href="<?php the_permalink(); ?>" class="btn btn-default"><?php _e( 'Details', 'wcp-rem' ); ?></a>
            </div>
        </div>

        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>

    <?php else : ?>
        <br>
        <div class="alert with-icon alert-info" role="alert">
            <i class="icon fa fa-info"></i>
            <span style="margin-top: 12px;margin-left: 10px;"><?php _e( 'Sorry! No Properties Found. Try Searching Again.', 'wcp-rem' ); ?></span>
        </div>
    <?php endif;
?>