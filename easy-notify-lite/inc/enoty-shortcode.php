<?php

function easynotify_shortcode( $attsn )
{

    if ( enoty_get_option( 'easynotify_disen_plug' ) != '1' ) {
        return false;
    }

    ob_start();

    // Enqueue necessary scripts and styles
    wp_enqueue_script( 'enoty-enotybox-js' );
    wp_enqueue_script( 'enoty-cookie-front' );
    wp_enqueue_style( 'enoty-enotybox-style' );
    wp_enqueue_style( 'enoty-frontend-style' );

    // Use shortcode_atts() to process and sanitize input attributes
    $atts = shortcode_atts( [
        'id' => '',
    ], $attsn );

    // Sanitize the 'id' parameter: Ensure it only contains numbers and commas
    $id = sanitize_text_field( $atts[ 'id' ] );

    // Sanitize and validate the comma-separated IDs to ensure they are valid integers
    $fnlid = array_filter( explode( ',', $id ), 'is_numeric' );

    // If the IDs array is empty after filtering, return early to avoid an invalid query
    if ( empty( $fnlid ) ) {
        return '<div>No Notify!</div>';
    }

    // Set up query arguments
    $args = [
        'post_type' => 'easynotify',
        'post__in'  => $fnlid,
    ];

    $noty_query = new WP_Query( $args );

    if ( $noty_query->have_posts() ):

        echo '<div style="display: none !important;" id="inline-container-'.esc_attr( $id ).'">';

        while ( $noty_query->have_posts() ): $noty_query->the_post();

            // Escape the post ID for use in the href and id attributes
            $post_id = get_the_ID();
            echo '<a style="display: none !important;" href="#noty-'.esc_attr( $post_id ).'" id="launcher-'.esc_attr( $post_id ).'"></a>';
            echo '<div style="display: none !important;"><div class="enoty-inline" id="noty-'.esc_attr( $post_id ).'"></div></div>';

            // Generate the Notify Script
            easynotify_ajax_script( $post_id, $val = '' );

        endwhile;

    else:
        echo '<div>No Notify!</div>';
    endif;

    wp_reset_postdata();

    echo '</div>';

    // Apply Individual Layout
    $lyot   = get_post_meta( $id, 'enoty_cp_layoutmode', true );
    $layout = preg_replace( '/\\.[^.\\s]{3,4}$/', '', $lyot );

    add_action( 'enoty_wp_print_layout', 'easynotify_apply_layout_style' );
    add_action( 'wp_print_styles', 'easynotify_dynamic_styles' );
    do_action( 'enoty_wp_print_layout', str_replace( '_', '-', $layout ) );
    do_action( 'wp_print_styles', $id );
    easynotify_render_custom_css();

    $content = ob_get_clean();

    return $content;
}

add_shortcode( 'easy-notify', 'easynotify_shortcode' );
