<?php
namespace p123on;

/**
 * Frontend Pages Handler
 */
class Frontend {

    public function __construct() {
        add_shortcode( 'video_123on', [ $this, 'p123on_render_frontend' ] );
    }

    /**
     * Render frontend app
     *
     * @param  array $atts
     * @param  string $content
     *
     * @return string
     */
    public function p123on_render_frontend( $atts, $content = '' ) {
        wp_enqueue_style( 'p123on-frontend' );
        wp_enqueue_script( 'p123on-frontend' );
        wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
        $video = get_post($atts['id']);
        $video_content_id = get_post($video->post_content);
        $video_content = $video_content_id->guid;
        $meta = get_post_meta($video->ID, 'hot_spots');
        $controls = get_post_meta($video->ID, 'controls');
        $tooltips_closed = get_post_meta($video->ID, 'tooltips_closed');
        $font = get_post_meta($video->ID, 'font');
        $weight = get_post_meta($video->ID, 'weight');
        $showcontrols = '';
        $tooltips_closed_classes = ['', '', '', '', '', ''];
        $hotspots = json_decode($meta[0], true);

        if($controls[0] == 'true') {
          $showcontrols = 'controls';
        }

        if($tooltips_closed[0] == 'true'){
          $tooltips_closed_classes[0] = 'product__popup--minimized';
          $tooltips_closed_classes[1] = 'product__info-container--minimized';
          $tooltips_closed_classes[2] = 'product-data__container--minimized';
          $tooltips_closed_classes[3] = 'product__thumbnail--minimized';
          $tooltips_closed_classes[4] = 'minimize__popup-arrow-left--minimized';
          $tooltips_closed_classes[5] = 'minimize__popup-arrow-right--minimized';
        }

        $hotspot_image_1 = plugin_dir_url( __FILE__ ) . '../assets/img/hotspot-white-new.png';
        $hotspot_image_2 = plugin_dir_url( __FILE__ ) . '../assets/img/transparent-hotspot.png';
        $hotspot_image_3 = plugin_dir_url( __FILE__ ) . '../assets/img/hotspot-white.png';
        $popup_arrow_left = plugin_dir_url( __FILE__ ) . '../assets/img/popup-arrow-left.png';
        $popup_arrow_right = plugin_dir_url( __FILE__ ) . '../assets/img/popup-arrow-right.png';
        
        $content .=
              "<div class='container'>
                    <video autoplay loop muted width='720px' height='480px' controlsList='nofullscreen' class='video' data-video=". $video->ID ." data-hotspot1=". $hotspot_image_1 ." data-hotspot2=". $hotspot_image_2 ." data-hotspot3=". $hotspot_image_3 ." ". $showcontrols ." playsinline>
                        <source src='". $video_content ."'>
                    </video>";
                    foreach($hotspots as $hotspot)
                    {
                        if ( class_exists( 'WooCommerce' ) ) {
                            $product = wc_get_product( $hotspot['product_id'] );
                            $content .= 
                            "<div id='overlay' class='overlay'>
                                <a class='overlay__hyperlink' target='_blank'><img id='overlay__img' alt='button image'></a>
                            </div>";

                            if(is_a($product, 'WC_Product') && $hotspot['option'] == 'product')
                            {
                                $content .="
                                
                                <div class='product__popup ". $tooltips_closed_classes[0] ."'>
                                    <div class='product__info-container ". $tooltips_closed_classes[1] ."'>
                                        <div><img class='product__thumbnail ". $tooltips_closed_classes[3] ."' src='". wp_get_attachment_url( $product->get_image_id() ) ."'></div>
                                        <div class='product-data__container ". $tooltips_closed_classes[2] ."'>
                                            <span class='product__name' style='font-family: ". $font[0] ."; font-weight: ". $weight[0] ."'>". $product->get_name() ."</span>
                                            <span class='product__price' style='font-family: ". $font[0] .";'>".get_woocommerce_currency_symbol() . ' ' . $product->get_price() ."</span>
                                            <a href='' class='product__button' style='font-family: ". $font[0] .";' target='_blank'>SHOP NOW</a>
                                        </div>
                                        <div class='minimize__popup-btn'><div class='minimize__popup-arrow-left ". $tooltips_closed_classes[4] ."'><img src=". $popup_arrow_left ."></div><div class='minimize__popup-arrow-right ". $tooltips_closed_classes[5] ."'><img src=". $popup_arrow_right ."></div></div>
                                    </div>
                                </div>";
                            }
                        }
                        if($hotspot['option'] == 'custom-product')
                        {
                            $content .="
                            
                            <div class='product__popup ". $tooltips_closed_classes[0] ."''>
                                <div class='product__info-container ". $tooltips_closed_classes[1] ."'>
                                    <div><img class='product__thumbnail ". $tooltips_closed_classes[3] ."' src=''></div>
                                    <div class='product-data__container ". $tooltips_closed_classes[2] ."'>
                                        <span class='product__name' style='font-family: ". $font[0] ."; font-weight: ". $weight[0] ."'>></span>
                                        <span class='product__price' style='font-family: ". $font[0] .";'></span>
                                        <a href='' class='product__button' style='font-family: ". $font[0] .";' target='_blank'>SHOP NOW</a>
                                    </div>
                                    <div class='minimize__popup-btn'><div class='minimize__popup-arrow-left ". $tooltips_closed_classes[4] ."'><img src=". $popup_arrow_left ."></div><div class='minimize__popup-arrow-right ". $tooltips_closed_classes[5] ."'><img src=". $popup_arrow_right ."></div></div>
                                </div>
                            </div>";
                        }
                    }

              $content .= " </div>
           ";
        return $content;
    }
}
