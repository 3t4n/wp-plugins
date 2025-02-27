<?php

if (!defined('ABSPATH')){
  exit;
}

function FGW_frontdesign() {
    global $post, $woocommerce,$fgw_comman;
    if(isset($fgw_comman['fgw_rulepassed']) && $fgw_comman['fgw_rulepassed'] == TRUE) {
        echo FGW_free_item_slider( $post->ID );
    }
}

function FGW_frontdesign_checkout() {
    global $post, $woocommerce,$fgw_comman;
    if(isset($fgw_comman['fgw_rulepassed']) && $fgw_comman['fgw_rulepassed']== TRUE) {
        echo FGW_free_item_slider_checkout( $post->ID );
    }
}

/* Block Wise Free Gift Shortcode */
function FGW_cart_frontdesign_shortcode() {
    global $post, $woocommerce,$fgw_comman;
    ob_start();
    
    FGW_gift_eligibility_message();
    FGW_frontdesign();

    $output = ob_get_clean();

    return $output;
}
add_shortcode('fgfw_block_gift', 'FGW_cart_frontdesign_shortcode');

function FGW_implement_shortcode_frontend( $block_content, $block ) {
    global $fgw_comman;

    if ( $block['blockName'] === 'woocommerce/cart') {
        return "<div class='oc5_shortcode_gift'>". do_shortcode('[fgfw_block_gift]')."</div>".$block_content;
    }

    return $block_content;
}
add_filter( 'render_block', 'FGW_implement_shortcode_frontend', 10, 2 );

function FGW_gift_eligibility_message() {
    global $post, $woocommerce, $fgw_comman;
    
    if($fgw_comman['fgw_mtvtion_msg_enable'] == 'enable') {
        if(isset($fgw_comman['fgw_rulepassed']) && $fgw_comman['fgw_rulepassed'] == FALSE && !empty($fgw_comman['fgw_rulepassed_motivation_message'])) {

            $fgw_gift_rule = $fgw_comman['fgw_gift_rule'];
            if($fgw_gift_rule == 'custom') { 
            ?>
            <div class="woocommerce-notices-wrapper">
                <div class="woocommerce-message fgw_mwssagw_main" role="alert">
                    <p class="fgw_notice_msg"><?php echo  esc_attr($fgw_comman['fgw_rulepassed_motivation_message']);?></p>
                </div>
            </div>
            <?php
                if (is_array($fgw_comman['fgw_rulepassed_motivation_products'])) {
                    echo do_shortcode('[products ids="'.esc_attr(implode(',',$fgw_comman['fgw_rulepassed_motivation_products'])).'" columns="4"]');
                }
            } elseif($fgw_gift_rule == 'category') {
               ?>
                <div class="woocommerce-notices-wrapper">
                    <div class="woocommerce-message fgw_mwssagw_main" role="alert">
                        <p class="fgw_notice_msg"><?php echo wp_kses_post( $fgw_comman['fgw_rulepassed_motivation_message'] );?></p>
                    </div>
                </div>
                <?php
            } elseif($fgw_gift_rule == 'price') {
                ?>
                <div class="woocommerce-notices-wrapper">
                    <div class="woocommerce-message fgw_mwssagw_main" role="alert">
                        <p class="fgw_notice_msg"><?php echo esc_attr( $fgw_comman['fgw_rulepassed_motivation_message'] );?></p>
                    </div>
                </div>
                <?php
            }
        }
    }

    if(isset($fgw_comman['fgw_rulepassed']) && $fgw_comman['fgw_rulepassed'] == TRUE && !empty($fgw_comman['fgw_eligiblity_message_final'])) {

        if($fgw_comman['fgw_mtvtion_msg_enable'] == 'disable'){ ?>
            <div class="woocommerce-notices-wrapper">
                <div class="woocommerce-message" role="alert">
                    <p class="fgw_notice_msg"> <?php echo esc_attr($fgw_comman['fgw_eligiblity_message_final'] );?><a href="#" class="fgw_gift_btn button btn alt" style="font-weight: bold;"><?php echo esc_attr($fgw_comman['fgw_eligiblity_btn_text'] );?></a></p>
                </div>
            </div>
            <?php
        }else{
            if($fgw_comman['fgw_gift_disable'] == false && $fgw_comman['fgw_mtvtion_msg_enable'] == 'enable'){ ?>
                <div class="woocommerce-notices-wrapper">
                    <div class="woocommerce-message" role="alert">
                        <p class="fgw_notice_msg"><?php echo esc_attr( $fgw_comman['fgw_eligiblity_message_final'] );?><a href="#" class="fgw_gift_btn button btn alt" style="font-weight: bold;"><?php echo esc_attr($fgw_comman['fgw_eligiblity_btn_text'] );?></a></p>
                    </div>
                </div>
            <?php
            }
        }
    }
}


function FGW_free_item_slider($post_id) {
    echo FGW_common_function();
}

function FGW_free_item_slider_checkout($post_id) {
    echo FGW_common_function(true);
}

function FGW_common_function($ischeckout=false){
    global $fgw_comman;
   //maximum gift Quntity allow then disable product 
    $cart_products = array();
    foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
        $product_id = $cart_item['product_id'];
        $variation_id = $cart_item['variation_id'];
        $cart_products[] = $product_id;
        $cart_products[] .= $variation_id;
    }
    //print_r($final_gift_array);
    ob_start();
   // print_r($quantity_gift);
    ?>
    <div class="fgw_gift fgw_gift_div">
        <p style="font-size: <?php echo esc_attr($fgw_comman['fgw_gift_title_font_size']); ?>px;">
            <?php _e( $fgw_comman['fgw_gift_title'] , 'woocommerce' ); ?>
        </p>
        <div class="fgw_gift_slider">
            <?php
            if(!empty($fgw_comman['final_gift_array'])){
                foreach ($fgw_comman['final_gift_array'] as $value) {
                                            $productc = wc_get_product( $value );
                        if(!empty($productc)){
                            $title = $productc->get_name();?>
                            
                                <div class="item fgw_gift_product <?php if($fgw_comman['fgw_gift_disable'] == true) { echo ' fgw_disable'; } ?>" >
                                    <a href="<?php echo get_permalink( $productc->get_id() ); ?>">
                                        <div><?php echo $productc->get_image();// phpcs:ignore WordPress.Security.EscapeOutput  ?></div>
                                        <div class="fgw_title"><?php echo esc_attr($title); ?></div>
                                       </a>
                                        <div class="fgw_gift_atc_btn">
                                            <?php if(is_cart()) {?>
                                                <a href="javascript:void(0);" data-href="<?php echo home_url(); ?>?action=fgw_giftred&redpage=cart&fgw_prod=<?php echo esc_attr($value); ?>" class="wp-block-button__link button alt">
                                                    <?php _e( $fgw_comman['fgw_add_to_cart_text'] , 'woocommerce' ); ?>
                                                </a>
                                            <?php }else{ ?>
                                                 <a href="javascript:void(0);" data-href="<?php echo home_url(); ?>?action=fgw_giftred&redpage=checkout&fgw_prod=<?php echo esc_attr($value); ?>" class="wp-block-button__link button alt"><?php _e( $fgw_comman['fgw_add_to_cart_text'] , 'woocommerce' ); ?></a>
                                            <?php  } ?>
                                        </div>
                                   
                                </div>
                            <?php
                        }
                    // }
                }
            }
            ?>
        </div>
    </div>
    <?php
    $slider = ob_get_clean();
    ob_start();
    ?>
    <div id="fgw_gifts_popup" class="fgw_gifts_popup_main">
        <div class="fgw_gifts_popup_overlay"></div>
        <div class="modal-content">
            <div class="modal-header">
                <span class="fgw_gifts_popup_close">
                    <svg height="365.696pt" viewBox="0 0 365.696 365.696" width="365.696pt" xmlns="http://www.w3.org/2000/svg">
                        <path d="m243.1875 182.859375 113.132812-113.132813c12.5-12.5 12.5-32.765624 0-45.246093l-15.082031-15.082031c-12.503906-12.503907-32.769531-12.503907-45.25 0l-113.128906 113.128906-113.132813-113.152344c-12.5-12.5-32.765624-12.5-45.246093 0l-15.105469 15.082031c-12.5 12.503907-12.5 32.769531 0 45.25l113.152344 113.152344-113.128906 113.128906c-12.503907 12.503907-12.503907 32.769531 0 45.25l15.082031 15.082031c12.5 12.5 32.765625 12.5 45.246093 0l113.132813-113.132812 113.128906 113.132812c12.503907 12.5 32.769531 12.5 45.25 0l15.082031-15.082031c12.5-12.503906 12.5-32.769531 0-45.25zm0 0"/>
                    </svg>
                </span>
            </div>
            <div class="modal-body">
                <div class="fgw_gift">
                    <p style="font-size: <?php echo esc_attr($fgw_comman['fgw_gift_title_font_size']); ?>px;"> <?php _e( $fgw_comman['fgw_gift_title'] , 'woocommerce' ); ?></p>
                    <div class="fgw_gift_slider_pp">
                        <?php
                        if(!empty($fgw_comman['final_gift_array'])){
                            foreach ($fgw_comman['final_gift_array'] as $value) {
                                $productc = wc_get_product( $value );
                                if(!empty($productc)){
                                    $title = $productc->get_name(); ?>
                                    <div class="item fgw_gift_product <?php if($fgw_comman['fgw_gift_disable'] == true) { echo ' fgw_disable'; } ?>">
                                        <a href="<?php echo get_permalink( $productc->get_id() ); ?>">
                                            <div><?php echo $productc->get_image();// phpcs:ignore WordPress.Security.EscapeOutput  ?></div>
                                            <div class="fgw_title"><?php echo esc_attr($title); ?></div>
                                              </a>
                                            <div class="fgw_gift_atc_btn">
                                                <?php if(is_cart()) {?>
                                                    <a href="javascript:void(0);" data-href="<?php echo home_url(); ?>?action=fgw_giftred&redpage=cart&fgw_prod=<?php echo esc_attr($value); ?>" class="wp-block-button__link button alt">
                                                        <?php _e( $fgw_comman['fgw_add_to_cart_text'] , 'woocommerce' ); ?>
                                                    </a>
                                                <?php }else{ ?>
                                                     <a href="javascript:void(0);" data-href="<?php echo home_url(); ?>?action=fgw_giftred&redpage=checkout&fgw_prod=<?php echo esc_attr($value); ?>" class="wp-block-button__link button alt"><?php _e( $fgw_comman['fgw_add_to_cart_text'] , 'woocommerce' ); ?></a>

                                                <?php  } ?>
                                            </div>
                                    
                                    </div>
                                    <?php
                                }
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    $popup = ob_get_clean();

    if (is_checkout()) {      
        if ($fgw_comman['fgw_gift_prod_display_ckout'] == 'slider') {
            return $slider;
        }else{
            return $popup;
        }
    }else{
        if($fgw_comman['fgw_gift_prod_display'] == 'after_cart_table') { 
            return $slider;
        } else {
            return $popup;
        }
    }
}

function FGFW_grid_view_style() {
    global $fgw_comman;

    $showslider_item_desktop = $fgw_comman['showslider_item_desktop'];
    $showslider_item_tablet = $fgw_comman['showslider_item_tablet'];
    $showslider_item_mobile = $fgw_comman['showslider_item_mobile'];
    ?>
    <style type="text/css">
        .fgw_gift_slider {
            grid-template-columns: repeat(<?php echo esc_attr($showslider_item_desktop); ?>, 1fr);
        }
        @media only screen and (max-width: 991px) {
            .fgw_gift_slider {
                grid-template-columns: repeat(<?php echo esc_attr($showslider_item_tablet); ?>, 1fr);
            }
        }
        @media only screen and (max-width: 600px) {
            .fgw_gift_slider {
                grid-template-columns: repeat(<?php echo esc_attr($showslider_item_mobile); ?>, 1fr);
            }
        }
    </style>
    <?php
}
add_action( 'wp_footer', 'FGFW_grid_view_style' );

add_action('init','FGW_gift_item_load_actions_front');
function FGW_gift_item_load_actions_front(){
    global $fgw_comman;
    if($fgw_comman['fgw_gift_enable'] == 'enable' ) {
        if($fgw_comman['fgw_allow_only_logged_in'] == 'enable') {
            if(is_user_logged_in()) {
                add_action( 'woocommerce_before_cart_table',  'FGW_frontdesign' );
                add_action( 'woocommerce_before_cart_table',  'FGW_gift_eligibility_message', 5 );
                if($fgw_comman['fgw_ckout_enable'] == 'enable') {
                    add_action('woocommerce_before_checkout_form',  'FGW_gift_eligibility_message' );
                    add_action('woocommerce_before_checkout_form',  'FGW_frontdesign_checkout' );
                }                   
            }
        } else {
            add_action( 'woocommerce_before_cart_table',  'FGW_frontdesign' );
            add_action('woocommerce_before_cart_table', 'FGW_gift_eligibility_message', 5 );
            if($fgw_comman['fgw_ckout_enable'] == 'enable') {
                add_action('woocommerce_before_checkout_form',  'FGW_gift_eligibility_message' );
                add_action('woocommerce_before_checkout_form',  'FGW_frontdesign_checkout' );
            }
        }
    }
}

function FGFW_get_item_data( $item_data, $cart_item_data ) {
    if(isset($cart_item_data['isgift'])){
        $item_data[] = array(
          'key'     => 'Free',
          'value'   => "Yes"
        );
    }
    return $item_data;
}
add_filter( 'woocommerce_get_item_data', 'FGFW_get_item_data', 10, 2 );
