<?php
defined( 'ABSPATH' ) || exit;
global $post;

include_once SPC_DIR . 'includes/builder/woo-builder-init.php';

$page_id = \ShopCred\Woo_Builder_Init::template_routing('return');

$post = get_post( $page_id, OBJECT );
setup_postdata( $post );
    if ( defined('GENERATEBLOCKS_DIR' ) ) { // Generate block css support
        generateblocks_get_dynamic_css();
    }
wp_reset_postdata();

if ( wp_is_block_theme() ) {
    wp_site_icon();
    //wp_head();
    
        block_template_part('header');
        wp_head();
    
} else {
    get_header();
}
echo '<div class="spc-content-wrapper" style="width: 100%;">';
do_action( 'spc_before_content' );


$width = '1200';
$sidebar = '400';
$widget_area = $page_id ? get_post_meta($page_id, 'spc-builder-widget-area', true) : '';
$has_widget = ($sidebar && $widget_area != '') ? true : false;

if( is_product() ) {
    do_action( 'woocommerce_before_single_product' );
}
if ($width) {
    echo '<div class="spc-builder-container product '.(($has_widget?' spc-widget-'.esc_attr($sidebar):'')).'" style="max-width: '.esc_attr($width).'px; margin: 0 auto; width: 100%;">';
    if(is_product()) {
        wc_print_notices();
    }
}
if ($has_widget && $sidebar == 'left') {
   echo '<div class="spc-sidebar-left">';
       if (is_active_sidebar($widget_area)) {
           dynamic_sidebar($widget_area);
       }
   echo '</div>';
}
if ($page_id && $has_widget) {
    echo '<div class="spc-builder-wrap">';
}
if( is_checkout() && !(is_wc_endpoint_url() || is_wc_endpoint_url( 'order-pay' ) || is_wc_endpoint_url( 'order-received' ))) {
    $checkout = WC()->checkout();

    remove_action('woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10);
    remove_action('woocommerce_before_checkout_form', 'woocommerce_checkout_login_form', 10);
    do_action( 'woocommerce_before_checkout_form', $checkout );

    // If checkout registration is disabled and not logged in, the user cannot checkout.
    if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
        echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'product-blocks' ) ) );
        return;
    }
    echo '<form name="checkout" method="post" class="checkout woocommerce-checkout spc-checkout-form" action="'. esc_url( wc_get_checkout_url() ).'" enctype="multipart/form-data" style="display:block">';
}

    if ($page_id) {
        // condition for archive page
        if(is_archive() && !is_shop()) {

            $term = get_queried_object();

            if($term && !is_wp_error($term)) {
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => -1,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'product_cat',
                            'field'    => 'slug',
                            'terms'    => $term->slug,
                        ),
                    ),
                );

                $archive_query = new WP_Query($args);
                $content_post = get_post($page_id);
                $content = $content_post->post_content;
                /*
                if (has_blocks($content)) {
                    $blocks = parse_blocks( $content );
                    $embed = new WP_Embed();
                    foreach ( $blocks as $block ) {
                        // set the selected category id.
                        $block['attrs']['categories'] = (string)$term->term_id;
                        echo $embed->autoembed(do_shortcode(render_block( $block ))); //phpcs:disable WordPress.Security.EscapeOutput.OutputNotEscaped
                    }
                }
                */
                if (has_blocks($content)) {
                    $blocks = parse_blocks( $content );
                    $embed = new WP_Embed();
                    $result = [];
                    \ShopCred\Woo_Builder_Init::extract_block_name_attrs($blocks, $result);
                    $result[0]['attrs']['categories'] = (string)$term->term_id;
                    echo $embed->autoembed(do_shortcode(render_block( $result[0] ))); //phpcs:disable WordPress.Security.EscapeOutput.OutputNotEscaped
                }

            } else {
                echo 'Invalid category.';
            }

        } else {
            // all other page
            $content_post = get_post($page_id);
            $content = $content_post->post_content;
            if (has_blocks($content)) {
                $blocks = parse_blocks( $content );
                $embed = new WP_Embed();
                foreach ( $blocks as $block ) {
                    echo $embed->autoembed(do_shortcode(render_block( $block ))); //phpcs:disable WordPress.Security.EscapeOutput.OutputNotEscaped
                }
            }
        }
    } else {
        the_content();
    }
if( is_checkout() && !(is_wc_endpoint_url() || is_wc_endpoint_url( 'order-pay' ) || is_wc_endpoint_url( 'order-received' ))) {
    echo '</form>';
    do_action( 'woocommerce_after_checkout_form', $checkout ); 
}

if ($page_id) {
    echo '</div>';
}


if ($width) {
    echo '</div>';
}
if( is_product() ) {
    do_action( 'woocommerce_after_single_product' );
}

do_action( 'spc_after_content' );
echo '</div>';
if ( wp_is_block_theme() ) {
    block_template_part('footer');
    wp_footer();
    
} else {
    get_footer();
}