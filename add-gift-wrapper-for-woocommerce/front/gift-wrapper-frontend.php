<?php

if (!defined('ABSPATH'))
  exit;

if (!class_exists('OCGW_front')) {

    class OCGW_front {

        protected static $instance;


        function OCGW_gift_waraper_position_cart_page(){
                    global $ocgw_comman;
                
                    $wg_cat = get_option( 'gw_gift_wrapper_combo' );

                    $wg_eligiblity_btn_text    = $ocgw_comman['gw_gift_wrapper_title'];

                    $gw_gift_rule = $ocgw_comman['gw_gift_rule'];


                    if($gw_gift_rule == "productbase"){
                         
                        $product = get_option('gw_combo');

                    }else{
                        $args = array( 
                            'post_type'         => 'product',
                            'post_status'       => 'publish',
                            'posts_per_page'    => '-1',
                              'tax_query'         => array(
                                array(
                                    'taxonomy'  => 'product_cat',
                                    'field'     => 'id',
                                    'terms'     =>  $wg_cat  
                                )
                            ),
                            'meta_query'        => array(
                                array(
                                    'key'       => '_stock_status',
                                    'value'     => 'instock'
                                )
                            ),
                         );

                        $product = get_posts( $args );
                    }
                ?>
                <div class="ocgw_elgbmsg_main">
                    <div class="ocgw_gift_btn">
                        <a href="#" class="ocgw_gift_btn" style="color:<?php echo $ocgw_comman['gw_gift_wrapper_title_color']; ?>;" ><?php echo __($wg_eligiblity_btn_text,'gift-products-for-woocommerce-pro'); ?></a>
                    </div>
                </div>
                <?php 
          
            if($ocgw_comman['gw_gift_wrapper_display'] == "slider") {
                ?>
                
                <div class="gw_gift ocgw_gift_div">
                   
                    <p style="font-size: <?php echo get_option( 'wg_gift_title_font_size', '24' ); ?>px;">
                        <?php _e( get_option('wg_gift_title', 'Select Your Gift') , 'woocommerce' ); ?>
                    </p>
                    <form method="POST">
                        <div class="gw_gift_slider owl-carousel owl-theme">
                            <?php
                            if(!empty($product)){
                                foreach ( $product as $giftwrapper_product ) {

                                    if($gw_gift_rule == "productbase"){
                                        
                                            $productc = new WC_Product( $giftwrapper_product );

                                            $id =$giftwrapper_product;

                                        
                                        }else{
                                                $productc = new WC_Product( $giftwrapper_product->ID );

                                                $id=$giftwrapper_product->ID;
                                        }

                                            $productc = wc_get_product( $giftwrapper_product );

                                            $title = $productc->get_name();?>
                                       
                                        <div class="item gw_gift_product">
                                            <div class="select_wrapper">
                                                <input type="radio" name="ocgw_prod" class="ocgw_prod" id="ocgw_prod_<?php echo esc_attr($id); ?>" value="<?php echo esc_attr($id); ?>">
                                                <div><?php echo wp_kses( $productc->get_image(), true ); ?></div>
                                                  <label for="ocgw_prod_<?php echo esc_attr($id); ?>" class="gw_title"><?php echo wp_kses($productc->get_price_html(),true);?></label>
                                            </div>
                                        </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                        <?php if(  $ocgw_comman['gw_gift_wrapper_msg_enable'] == 'enable'){ ?>
                            <div class="gift_wrapper_message_main">
                                <label><?php echo __($ocgw_comman['gw_gift_wrapper_msg_text'],"add-gift-wrapper-for-woocommerce");?></label>
                                <textarea name="gift_wrapper_message" rows="5" cols="30" class="gift_wrapper_message"></textarea>
                            </div>

                        <?php } ?>
                           
                        <div class="gw_gift_atc_btn">
                            <input type="hidden" name="action" value="ocgw_giftred_wrapper">
                            <input type="hidden" name="redpage" value="cart">
                            <input type="submit" style="background-color: <?php echo esc_attr($ocgw_comman['ocgw_product_add_to_cart_clr']); ?>;color:<?php echo esc_attr($ocgw_comman['ocgw_product_add_to_cart_text_clr']); ?>;" name="submit" class="single_add_to_cart_button" value="<?php echo esc_attr($ocgw_comman['gw_add_to_cart_text']); ?>">
                        </div>
                    </form>
                </div>
             
                <?php

            } else { ?>
               
                <div id="ocgw_gifts_popup" class="ocgw_gifts_popup_main">
                    <div class="ocgw_gifts_popup_overlay"></div>
                    <div class="modal-content">
                        <div class="modal-header">
                          <span class="ocgw_gifts_popup_close">

                            <svg height="365.696pt" viewBox="0 0 365.696 365.696" width="365.696pt" xmlns="http://www.w3.org/2000/svg">
                                <path d="m243.1875 182.859375 113.132812-113.132813c12.5-12.5 12.5-32.765624 0-45.246093l-15.082031-15.082031c-12.503906-12.503907-32.769531-12.503907-45.25 0l-113.128906 113.128906-113.132813-113.152344c-12.5-12.5-32.765624-12.5-45.246093 0l-15.105469 15.082031c-12.5 12.503907-12.5 32.769531 0 45.25l113.152344 113.152344-113.128906 113.128906c-12.503907 12.503907-12.503907 32.769531 0 45.25l15.082031 15.082031c12.5 12.5 32.765625 12.5 45.246093 0l113.132813-113.132812 113.128906 113.132812c12.503907 12.5 32.769531 12.5 45.25 0l15.082031-15.082031c12.5-12.503906 12.5-32.769531 0-45.25zm0 0"/>
                            </svg>
                          </span>
                        </div>
                        <div class="modal-body">
                            <div class="wg_gift">
                                <p > <?php echo $ocgw_comman['gw_gift_wrapper_title']; ?></p>
                                <div class="wg_gift_slider_pp owl-carousel owl-theme">
                                    <?php
                                    if(!empty($product)){
                                        foreach ( $product as $giftwrapper_product ) {
                                           if($gw_gift_rule == "productbase"){
                                                    $productc = new WC_Product( $giftwrapper_product );
                                                    $id =$giftwrapper_product;
                                                }else{
                                                    $productc = new WC_Product( $giftwrapper_product->ID );
                                                    $id =$giftwrapper_product->ID;
                                                }
                                                $productc = wc_get_product( $giftwrapper_product );
                                                $title = $productc->get_name();?>
                                                <div class="item gw_gift_product">
                                                    <div class="select_wrapper">
                                                        <input type="radio" name="ocgw_prod" class="ocgw_prod" id="ocgw_prod_<?php echo esc_attr($id); ?>" value="<?php echo esc_attr($id); ?>">
                                                        <div><?php echo wp_kses( $productc->get_image(), true ); ?></div>
                                                          <label for="ocgw_prod_<?php echo esc_attr($id); ?>" class="gw_title"><?php echo wp_kses($productc->get_price_html(),true);?></label>
                                                    </div>
                                                </div>
                                        <?php } 
                                    } ?>
                                </div>
                            </div>
                            <?php if(  $ocgw_comman['gw_gift_wrapper_msg_enable'] == 'enable'){ ?>
                                <div class="gift_wrapper_message_main">
                                    <label><?php echo __($ocgw_comman['gw_gift_wrapper_msg_text'],"add-gift-wrapper-for-woocommerce");?></label>
                                    <textarea name="gift_wrapper_message" rows="5" cols="30" class="gift_wrapper_message"></textarea>
                                </div>
                            <?php } ?>
                            <div class="gw_gift_atc_btn">
                                <input type="hidden" name="action" value="ocgw_giftred_wrapper">
                                <input type="hidden" name="redpage" value="cart">
                                <input type="submit"  style="background-color: <?php echo esc_attr($ocgw_comman['ocgw_product_add_to_cart_clr']); ?>!important;color:<?php echo esc_attr($ocgw_comman['ocgw_product_add_to_cart_text_clr']); ?>;" name="submit" class="single_add_to_cart_button" value="<?php echo esc_attr($ocgw_comman['gw_add_to_cart_text']); ?>">
                            </div>
                        </div>                      
                    </div>
                </div>

            <?php 
            }    

        }
        

        function OCWG_frontdesign_checkout(){

                global $ocgw_comman;
                
                $wg_cat = get_option( 'gw_gift_wrapper_combo' );

                $wg_eligiblity_btn_text  = $ocgw_comman['gw_gift_wrapper_title'];
                $gw_ckout_enable    = $ocgw_comman['gw_ckout_enable'];
                $gw_gift_rule = $ocgw_comman['gw_gift_rule'];
                if($gw_gift_rule == "productbase"){
                     
                    $product = get_option('gw_combo');

                }else{
                    $args = array( 
                        'post_type'         => 'product',
                        'post_status'       => 'publish',
                        'posts_per_page'    => '-1',
                          'tax_query'         => array(
                            array(
                                'taxonomy'  => 'product_cat',
                                'field'     => 'id',
                                'terms'     =>  $wg_cat
                            )
                        ),
                        'meta_query'        => array(
                            array(
                                'key'       => '_stock_status',
                                'value'     => 'instock'
                            )
                        ),
                     );

                    $product = get_posts( $args );
                    
                }

                if( $gw_ckout_enable == "enable"){?>
                    <div class="ocgw_elgbmsg_main">
                        <div class="ocgw_gift_btn">
                            <a href="#" class="ocgw_gift_btn" style="color:<?php echo $ocgw_comman['gw_gift_wrapper_title_color']; ?>;"><?php echo __($wg_eligiblity_btn_text,'gift-products-for-woocommerce-pro'); ?></a>
                        </div>
                    </div>
                    <?php 
               
                    if($ocgw_comman['gw_gift_wrapper_display_ckout'] == "slider") {?>

                        <div class="gw_gift ocgw_gift_div">
                            <form method="POST">
                                <div class="gw_gift_slider owl-carousel owl-theme">
                                    <?php
                                        if(!empty($product)){
                                            foreach ( $product as $giftwrapper_product ) {
                                                if($gw_gift_rule == "productbase"){
                                                        $productc = new WC_Product( $giftwrapper_product );
                                                        $id =$giftwrapper_product;
                                                }else{
                                                        $productc = new WC_Product( $giftwrapper_product->ID );
                                                         $id =$giftwrapper_product->ID;
                                                }
                                                $productc = wc_get_product( $giftwrapper_product );
                                                $title = $productc->get_name(); ?>
                                                    <div class="item gw_gift_product">
                                                        <div class="select_wrapper">
                                                            <input type="radio" name="ocgw_prod" class="ocgw_prod" id="ocgw_prod_<?php echo esc_attr($id); ?>" value="<?php echo esc_attr($id); ?>">
                                                            <div><?php echo wp_kses( $productc->get_image(), true ); ?></div>
                                                              <label for="ocgw_prod_<?php echo esc_attr($id); ?>" class="gw_title"><?php echo wp_kses($productc->get_price_html(),true);?></label>
                                                        </div>
                                                    </div>
                                                <?php
                                            }
                                        }
                                    ?>
                                </div>
                                <?php if(  $ocgw_comman['gw_gift_wrapper_msg_enable'] == 'enable'){ ?>
                                    <div class="gift_wrapper_message_main">
                                        <label><?php echo __($ocgw_comman['gw_gift_wrapper_msg_text'],"add-gift-wrapper-for-woocommerce");?></label>
                                        <textarea name="gift_wrapper_message" rows="5" cols="30" class="gift_wrapper_message"></textarea>
                                    </div>
                                <?php } ?>
                                <div class="gw_gift_atc_btn">
                                    <input type="hidden" name="action" value="ocgw_giftred_wrapper">
                                    <input type="hidden" name="redpage" value="checkout">
                                    <input type="submit" name="submit" style="background-color: <?php echo esc_attr($ocgw_comman['ocgw_product_add_to_cart_clr']); ?>!important;color:<?php echo esc_attr($ocgw_comman['ocgw_product_add_to_cart_text_clr']); ?>;"  class="single_add_to_cart_button " value="<?php echo esc_attr($ocgw_comman['gw_add_to_cart_text']); ?>">
                                </div>
                            </form>
                        </div>
                        <?php

                    } else { ?>
                       
                        <div id="ocgw_gifts_popup" class="ocgw_gifts_popup_main">
                            <div class="ocgw_gifts_popup_overlay"></div>
                            <div class="modal-content">
                                <div class="modal-header">
                                  <span class="ocgw_gifts_popup_close">
                                    <svg height="365.696pt" viewBox="0 0 365.696 365.696" width="365.696pt" xmlns="http://www.w3.org/2000/svg">
                                        <path d="m243.1875 182.859375 113.132812-113.132813c12.5-12.5 12.5-32.765624 0-45.246093l-15.082031-15.082031c-12.503906-12.503907-32.769531-12.503907-45.25 0l-113.128906 113.128906-113.132813-113.152344c-12.5-12.5-32.765624-12.5-45.246093 0l-15.105469 15.082031c-12.5 12.503907-12.5 32.769531 0 45.25l113.152344 113.152344-113.128906 113.128906c-12.503907 12.503907-12.503907 32.769531 0 45.25l15.082031 15.082031c12.5 12.5 32.765625 12.5 45.246093 0l113.132813-113.132812 113.128906 113.132812c12.503907 12.5 32.769531 12.5 45.25 0l15.082031-15.082031c12.5-12.503906 12.5-32.769531 0-45.25zm0 0"/>
                                    </svg>
                                  </span>
                                </div>
                                <form method="POST">
                                    <div class="modal-body">
                                        <div class="wg_gift">
                                            <p > <?php echo $ocgw_comman['gw_gift_wrapper_title']; ?></p>
                                            <div class="wg_gift_slider_pp owl-carousel owl-theme">
                                                <?php
                                                if(!empty($product)){
                                                    foreach ( $product as $giftwrapper_product ) {

                                                            if($gw_gift_rule == "productbase"){
                                                        
                                                                    $productc = new WC_Product( $giftwrapper_product );

                                                                    $id =$giftwrapper_product;
                                                                
                                                            }else{

                                                                $productc = new WC_Product( $giftwrapper_product->ID );

                                                                $id =$giftwrapper_product->ID;

                                                            }

                                                            $productc = wc_get_product( $giftwrapper_product );

                                                            $title = $productc->get_name()  ?>
                                                            
                                                        <div class="item gw_gift_product">
                                                            <div class="select_wrapper">
                                                                <input type="radio" name="ocgw_prod" class="ocgw_prod" id="ocgw_prod_<?php echo esc_attr($id); ?>" value="<?php echo esc_attr($id); ?>">
                                                                <div><?php echo wp_kses( $productc->get_image(), true ); ?></div>
                                                                  <label for="ocgw_prod_<?php echo esc_attr($id); ?>" class="gw_title"><?php echo wp_kses($productc->get_price_html(),true);?></label>
                                                            </div>
                                                        </div>
                                                    <?php } 
                                                } ?>
                                            </div>
                                        </div>
                                        <div class="gift_wrapper_message_main">
                                            <label><?php echo __($ocgw_comman['gw_gift_wrapper_msg_text'],"add-gift-wrapper-for-woocommerce");?></label>
                                            <textarea name="gift_wrapper_message" rows="5" cols="30" class="gift_wrapper_message"></textarea>
                                        </div>
                                        <div class="gw_gift_atc_btn">
                                            <input type="hidden" name="action" value="ocgw_giftred_wrapper">
                                            <input type="hidden" name="redpage" value="checkout">
                                            <input type="submit" name="submit" style="background-color: <?php echo esc_attr($ocgw_comman['ocgw_product_add_to_cart_clr']); ?>!important;color:<?php echo esc_attr($ocgw_comman['ocgw_product_add_to_cart_text_clr']); ?>;" class="single_add_to_cart_button" value="<?php echo esc_attr($ocgw_comman['gw_add_to_cart_text']); ?>">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    <?php 
                    } 
                }  

        }


        function OCWG_gift_item_name( $item_name, $item ) {
            global $ocgw_comman;
            if ( isset( $item['gift_wrapper'] ) && $item['gift_wrapper'] == 'gift_wrapper'  && !empty( $item['gift_wrapper'])) {

                $wg_gift_prod_txt_in_cart = $ocgw_comman['gw_gift_wrapper_txt_in_cart'];

                $ocwg_gift_text = esc_html__( '('.$wg_gift_prod_txt_in_cart.')', 'ocwg' );
                
                if ( strpos( $item_name, '</a>' ) !== false ) {
                    $name = sprintf( $ocwg_gift_text, '<a href="' . get_permalink( $item['product_id'] ) . '">' . get_the_title( $item['product_id'] ) . '</a>' );
                } else {
                    $name = sprintf( $ocwg_gift_text, get_the_title( $item['product_id'] ) );
                }

                $item_name .= ' <span class="ocwg_item_name">' . apply_filters( 'ocwg_item_name', $name, $item ) . '</span>';
            }

            return $item_name;
        
        }


        function OCGW_init_action() {
 
        
            if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'ocgw_giftred_wrapper' && isset($_REQUEST['ocgw_prod']) && $_REQUEST['ocgw_prod'] !='') {
                
                $gift_wrapper_message = sanitize_text_field($_REQUEST['gift_wrapper_message']);
                $prod_id = sanitize_text_field($_REQUEST['ocgw_prod']);
                $redpage = sanitize_text_field($_REQUEST['redpage']);
                $product = wc_get_product( $prod_id );


                if(!empty($gift_wrapper_message)){
                    $gift_wrapper_message = sanitize_text_field($_REQUEST['gift_wrapper_message']);
                    update_post_meta($prod_id,"add_wrapper",$gift_wrapper_message);
                }
               

                $prod_type = $product->get_type();
                
                if($prod_type == 'simple') {
                   WC()->cart->add_to_cart($prod_id, 1, NULL,NULL, array('gift_wrapper' => 'gift_wrapper'));
                   
                    if($redpage == 'cart') {
                        wp_safe_redirect( wc_get_cart_url() );    
                        $gift_wrapper_added_message = __('Gift Wrapper Add Successfully In Cart.','add-gift-wrapper-for-woocommerce');
                        wc_add_notice( apply_filters( 'wc_add_to_cart_message', $gift_wrapper_added_message, $prod_id ) );
                    } elseif ($redpage == 'checkout') {
                        wp_safe_redirect( wc_get_checkout_url() );
                        $gift_wrapper_added_message = __('Gift Wrapper Add Successfully In Cart.','add-gift-wrapper-for-woocommerce');
                        wc_add_notice( apply_filters( 'wc_add_to_cart_message', $gift_wrapper_added_message, $prod_id ) );
                    }
                    exit;

                } else {

                    $url = get_permalink( $prod_id );

                    wp_redirect($url);

                    exit;
                }
            }
        
        }
        

        function OCWG_before_add_to_cart_btn(){

            global $ocgw_comman;
                
                    $wg_cat = get_option( 'gw_gift_wrapper_combo' );

                    $wg_eligiblity_btn_text    = $ocgw_comman['gw_gift_wrapper_title'];

                    $gw_gift_rule = $ocgw_comman['gw_gift_rule'];

                    if($gw_gift_rule == "productbase"){
                         
                        $product = get_option('gw_combo');

                    }else{

                        $args = array( 
                            'post_type'         => 'product',
                            'post_status'       => 'publish',
                            'posts_per_page'    => '-1',
                            'tax_query'         => array(

                                array(
                                    'taxonomy'  => 'product_cat',
                                    'field'     => 'id',
                                    'terms'     =>  $wg_cat
                                )

                            ),
                            'meta_query'        => array(

                                array(

                                    'key'       => '_stock_status',
                                    'value'     => 'instock'
                                )

                            ),
                         );

                        $product = get_posts( $args );

                        
                    }

                if($ocgw_comman['gw_gift_wrapper_single_product_page']== 'enable'){?>

                    <div class="ocgw_elgbmsg_main">
                        <div class="ocgw_gift_btn">

                            <a href="#" class="ocgw_gift_btn " style="color:<?php echo $ocgw_comman['gw_gift_wrapper_title_color']; ?>;"><?php echo __($wg_eligiblity_btn_text,'gift-products-for-woocommerce-pro'); ?></a>
                        </div>
                    </div>
                    <div class="gw_gift ocgw_gift_div <?php if($ocgw_comman['gw_gift_wrapper_open_single_product_page'] == "enable"){ echo "gift_open";}?>">
                       
                        <p style="font-size: <?php echo get_option( 'wg_gift_title_font_size', '24' ); ?>px;">
                            <?php _e( get_option('wg_gift_title', 'Select Your Gift') , 'woocommerce' ); ?>
                        </p>
                       
                            <div class="gw_gift_slider owl-carousel owl-theme">
                                <?php
                                if(!empty($product)){
                                    foreach ( $product as $giftwrapper_product ) {
                                        if($gw_gift_rule == "productbase"){
                                            
                                                $productc = new WC_Product( $giftwrapper_product );
                                                $id =$giftwrapper_product;
                                            
                                            }else{
                                                    $productc = new WC_Product( $giftwrapper_product->ID );
                                                     $id =$giftwrapper_product->ID;
                                            }

                                        $productc = wc_get_product( $giftwrapper_product );

                                        $title = $productc->get_name();

                                        ?>
                                            <div class="item gw_gift_product">
                                                <div class="select_wrapper">
                                                    <input type="radio" name="ocgw_prod_single" class="ocgw_prod" id="ocgw_prod_<?php echo esc_attr($id); ?>" value="<?php echo esc_attr($id); ?>">
                                                    <div><?php echo wp_kses( $productc->get_image(), true ); ?></div>
                                                      <label for="ocgw_prod_<?php echo esc_attr($id); ?>" class="gw_title"><?php echo wp_kses($productc->get_price_html(),true);?></label>
                                                </div>
                                            </div>
                                        <?php
                                   
                                    }
                                }
                                ?>
                            </div>

                            <?php if(  $ocgw_comman['gw_gift_wrapper_msg_enable'] == 'enable'){ ?>

                                <div class="gift_wrapper_message_main">
                                    <label><?php echo __($ocgw_comman['gw_gift_wrapper_msg_text'],"add-gift-wrapper-for-woocommerce");?></label>
                                    <textarea name="gift_wrapper_message" rows="5" cols="30" class="gift_wrapper_message"></textarea>
                                </div>

                            <?php  } ?>

                            <div class="gw_gift_atc_btn">
                                <input type="hidden" name="action" value="ocgw_giftred_wrapper">
                                <input type="hidden" name="redpage" value="cart">
                            </div>
                    </div>
             
                    <?php
                }

        }


        function custom_cart_item_name( $item_name, $cart_item, $cart_item_key ) {

            if( ! is_cart() ){

                return $item_name;

            }

            if( $value1 = $cart_item['data']->get_meta('add_wrapper') ) {

                $item_name .= '<br><span class="custom-field"><strong>' . __("Wrapper Message", "woocommerce") . ':</strong> ' . $value1 . '</span>';

            }

            return $item_name;
        
        }


        function custom_checkout_cart_item_name( $item_qty, $cart_item, $cart_item_key ) {
            if( $value1 = $cart_item['data']->get_meta('add_wrapper') ) {

                $item_qty .= '<br><span class="custom-field"><strong>' . __("Wrapper Message", "woocommerce") . ':</strong> ' . $value1 . '</span>';

            }
            return $item_qty;
        
        }


        function custom_order_item_name( $item_name, $item ) {
            $product = $item->get_product();

            if( $value1 = $product->get_meta('add_wrapper') ) {

                $item_name .= '<br><span class="custom-field"><strong>' . __("Wrapper Message", "woocommerce") . ':</strong> ' . $value1 . '</span>';

            }


            return $item_name;
        
        }


        function OCWG_order_item_meta( $item_id, $cart_item ) {
            // get product meta
            $event_time = get_post_meta( $cart_item[ 'product_id' ], 'add_wrapper', true );
            // if not empty, update order item meta
            if( ! empty( $event_time ) ) {

                wc_update_order_item_meta( $item_id, 'Wrapper Message', $event_time );

            }
            
        }


        function add_cart_item_data( $cart_item_meta, $product_id ) {

           if ( isset( $_POST ['ocgw_prod_single'] ) ) {
                       
                    $product = wc_get_product( $_POST ['ocgw_prod_single'] ); 
                    $title = $product->get_name();  
                    $custom_price = $product->get_price();
                    $custom_price_html = $product->get_price_html();
                    //$custom_data [ 'customer_name' ]    = isset( $_POST ['customer_name'] ) ?  sanitize_text_field ( $_POST ['customer_name'] ) : "" ;
                    $custom_data ['custom_price'] = $custom_price;
                    $custom_data ['gift_wrapper_message'] = isset( $_POST ['gift_wrapper_message'] ) ? sanitize_text_field ( $_POST ['gift_wrapper_message'] ): "" ;
                    $custom_data ['Gift_wrapper_title'] =  $title;
                    $custom_data ['custom_price_html'] = $custom_price_html;
                    $cart_item_meta['custom_data'] = $custom_data ;
                }
                
                return $cart_item_meta;
        
        }


        function get_item_data (  $other_data, $cart_item ) {


            if ( isset( $cart_item [ 'custom_data' ] ) && !empty($cart_item ['custom_data']) ) {

                $custom_data  = $cart_item [ 'custom_data' ];

                if(!empty($custom_data ['Gift_wrapper_title'])){
                    
                    $other_data[] = array( 'name' => '','display'  => $custom_data['Gift_wrapper_title']."(".$custom_data ['custom_price_html'].")");

                }

                if(!empty($custom_data ['gift_wrapper_message'])){
                    $other_data[] = array( 'name' => 'Message','display' => $custom_data['gift_wrapper_message'] );
                }
                            
            
            }
            
            return $other_data;
        
        }


        function add_order_item_meta ( $item_id, $values ) {



            if ( isset( $values [ 'custom_data' ] ) ) {

                $custom_data  = $values [ 'custom_data' ];
               
                wc_add_order_item_meta( $item_id, 'Message', $custom_data['customer_message'] );
                wc_add_order_item_meta( $item_id, 'Gift_wrapper_title', $custom_data['Gift_wrapper_title'] );
                wc_add_order_item_meta( $item_id, 'custom_price_html', $custom_data['custom_price_html'] );
            }

        }


        function add_custom_price( $cart ) {
            $cart_data = WC()->cart->get_cart();
            foreach($cart_data as $cart_item) {

                if(!empty($cart_item [ 'custom_data' ])){

                    $product = wc_get_product($cart_item['product_id'] );
                    $custom_data  = $cart_item [ 'custom_data' ];
                    $product_gi_price = $product->get_price();
                    $product_gift_price =  $custom_data ['custom_price'];
                }
                
                
            }
            if(!empty($product_gi_price) && !empty($product_gift_price)){
                 $hidden_total = $product_gift_price+$product_gi_price;
            }
               
            
           
            // This is necessary for WC 3.0+
            if ( is_admin() && ! defined( 'DOING_AJAX' ) )
                return;

            // Avoiding hook repetition (when using price calculations for example)
            if ( did_action( 'woocommerce_before_calculate_totals' ) >= 2 )
                return;

            // Loop through cart items
            foreach ( $cart->get_cart() as $item ) {
                if(!empty($hidden_total)){
                    $item['data']->set_price( $hidden_total );
                }
                
            }
        
        }


        function OCGW_support_and_rating_notice() {
            $screen = get_current_screen();
            // print_r($screen);
            if( 'free_gift_wrapper' == $screen->parent_base) {
                ?>
                <div class="ocgw_ratess_open">
                    <div class="ocgw_rateus_notice">
                        <div class="ocgw_rtusnoti_left">
                            <h3>Rate Us</h3>
                            <label>If you like our plugin, </label>
                            <a target="_blank" href="https://wordpress.org/support/plugin/add-gift-wrapper-for-woocommerce/reviews/?filter=5">
                                <label>Please vote us</label>
                            </a>
                            <label>, so we can contribute more features for you.</label>
                        </div>
                        <div class="ocgw_rtusnoti_right">
                            <img src="<?php echo OCGW_PLUGIN_DIR;?>/includes/images/review.png" class="ocgw_review_icon">
                        </div>
                    </div>
                    <div class="ocgw_support_notice">
                        <div class="ocgw_rtusnoti_left">
                            <h3>Having Issues?</h3>
                            <label>You can contact us at</label>
                            <a target="_blank" href="https://xthemeshop.com/contact/">
                                <label>Our Support Forum</label>
                            </a>
                        </div>
                        <div class="ocgw_rtusnoti_right">
                            <img src="<?php echo OCGW_PLUGIN_DIR;?>/includes/images/support.png" class="ocgw_review_icon">
                        </div>
                    </div>
                </div>
                <div class="ocgw_donate_main">
                   <img src="<?php echo OCGW_PLUGIN_DIR;?>/includes/images/coffee.svg">
                   <h3>Buy me a Coffee !</h3>
                   <p>If you like this plugin, buy me a coffee and help support this plugin !</p>
                   <div class="ocgw_donate_form">
                      <a class="button button-primary ocwg_donate_btn" href="https://www.paypal.com/paypalme/shayona163/" data-link="https://www.paypal.com/paypalme/shayona163/" target="_blank">Buy me a coffee !</a>
                   </div>
                </div>
                <?php
            }
        
        }


        function init(){

            global $ocgw_comman;
          
            add_filter( 'woocommerce_add_cart_item_data', array($this, 'add_cart_item_data'), 25, 2 );

            add_filter( 'woocommerce_get_item_data', array($this, 'get_item_data') , 25, 2 );

            add_action( 'woocommerce_add_order_item_meta', array($this,'add_order_item_meta' ), 10, 2);

            add_action( 'woocommerce_before_calculate_totals', array($this, 'add_custom_price'), 20, 1);

            if($ocgw_comman['gw_gift_show_wrapping'] == "beforecart"){

                add_action( 'woocommerce_before_cart',array($this,  'OCGW_gift_waraper_position_cart_page'), 10 );

            }else if ($ocgw_comman['gw_gift_show_wrapping'] == "aftercart"){

                add_action( 'woocommerce_after_cart_table', array($this, 'OCGW_gift_waraper_position_cart_page'), 10 );

            }else{

                add_action( 'woocommerce_cart_collaterals', array($this, 'OCGW_gift_waraper_position_cart_page'), 10 );
            }

            add_action( 'woocommerce_before_add_to_cart_button', array($this,'OCWG_before_add_to_cart_btn' ));
            add_action( 'wp', array($this, 'OCGW_init_action' ));
            add_filter( 'woocommerce_cart_item_name', array( $this, 'OCWG_gift_item_name' ), 10, 2 );
            add_action('woocommerce_before_checkout_form', array($this, 'OCWG_frontdesign_checkout' ));
            add_filter( 'woocommerce_cart_item_name', array($this,'custom_cart_item_name'), 10, 3 );
            add_filter( 'woocommerce_checkout_cart_item_quantity', array($this,'custom_checkout_cart_item_name'), 10, 3 );
            add_filter( 'woocommerce_order_item_name', array($this,'custom_order_item_name'), 10, 2 );
            add_action( 'woocommerce_add_order_item_meta', array($this,'OCWG_order_item_meta'), 10, 2 );
            add_action( 'admin_notices', array($this, 'OCGW_support_and_rating_notice' ));
           
        }


        public static function instance() {

            if (!isset(self::$instance)) {

                self::$instance = new self();

                self::$instance->init();

            }

            return self::$instance;

        }


    }

    OCGW_front::instance();
}