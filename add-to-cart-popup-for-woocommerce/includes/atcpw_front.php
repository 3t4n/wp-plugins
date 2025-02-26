<?php

if (!defined('ABSPATH'))
  exit;

if (!class_exists('ATCPW_front')) {

    class ATCPW_front {

        protected static $instance;

        public static function instance() {
            if (!isset(self::$instance)) {
                self::$instance = new self();
                self::$instance->init();
            }
             return self::$instance;
        }

        function init() {
            add_action( 'wp_head', array( $this, 'ATCPW_craete_cart' ));
            add_filter( 'woocommerce_add_to_cart_fragments', array( $this, 'ATCPW_cart_count_fragments' ), 10, 1 );
            add_action( 'wp_ajax_change_qty', array( $this, 'ATCPW_change_qty_cust') );
            add_action( 'wp_ajax_nopriv_change_qty', array( $this, 'ATCPW_change_qty_cust') );
            add_action( 'wp_ajax_product_remove', array( $this, 'ATCPW_ajax_product_remove') );
            add_action( 'wp_ajax_nopriv_product_remove', array( $this, 'ATCPW_ajax_product_remove') );
            add_action( 'wp_footer', array($this, 'ATCPW_single_added_to_cart_event'));
            add_action( 'wp_ajax_atcpw_prod_slider_ajax_atc', array( $this, 'ATCPW_prod_slider_ajax_atc') );
            add_action( 'wp_ajax_nopriv_atcpw_prod_slider_ajax_atc', array( $this, 'ATCPW_prod_slider_ajax_atc') );
            add_action( 'wp_ajax_atcpw_get_refresh_fragments', array( $this, 'ATCPW_get_refreshed_fragments' ) );
            add_action( 'wp_ajax_nopriv_atcpw_get_refresh_fragments', array( $this, 'ATCPW_get_refreshed_fragments' ) );
            add_action( 'wp_ajax_empty_cart_action', array( $this, 'ATCPW_ajax_empty_cart_action') );
            add_action( 'wp_ajax_nopriv_empty_cart_action', array( $this, 'ATCPW_ajax_empty_cart_action') );
        }
        
        function ATCPW_get_refreshed_fragments(){
            WC_AJAX::get_refreshed_fragments();
        }
        
        function ATCPW_cart_create() {
            WC()->cart->calculate_totals();
            WC()->cart->maybe_set_cart_cookies();
            global $woocommerce,$atcpw_comman;
            ?>
            <div class="atcpw_container_main" id="atcpw_container_main">
                <div class="atcpw_container" >
                    <div class="atcpw_header">
                        <div class="top_atcpw_herder">
                            <?php
                            if($atcpw_comman['atcpw_header_cart_icon']=='yes'){
                            ?>
                            <span class="atcpw_cart_icon">
                                <?php
                                if($atcpw_comman['oatcpw_shop_icon'] == "shop_icon_2"){
                                    echo '<span class="shop_icon shop_icon_2"></span>';
                                }elseif($atcpw_comman['oatcpw_shop_icon'] == "shop_icon_3"){
                                    echo '<span class="shop_icon shop_icon_3"></span>';
                                }elseif($atcpw_comman['oatcpw_shop_icon'] == "shop_icon_4"){
                                    echo '<span class="shop_icon shop_icon_4"></span>';
                                }elseif($atcpw_comman['oatcpw_shop_icon'] == "shop_icon_5"){
                                    echo '<span class="shop_icon shop_icon_5"></span>';
                                }elseif($atcpw_comman['oatcpw_shop_icon'] == "shop_icon_6"){
                                    echo '<span class="shop_icon shop_icon_6"></span>';
                                }else{
                                    echo '<span class="shop_icon shop_icon_1"></span>';
                                }
                                ?>
                            </span>
                            <?php
                            }
                            ?>
                            <h3 class="atcpw_header_title" ><?php echo esc_attr($atcpw_comman['atcpw_head_title']); ?></h3>
                            <?php
                            if($atcpw_comman['atcpw_header_close_icon']=='yes'){
                            ?>
                            <span class="atcpw_close_cart">
                               <?php
                                if($atcpw_comman['oatcpw_close_icon'] == "close_icon_1"){
                                    echo '<span class="close_icons close_icon_1"></span>';
                                }elseif($atcpw_comman['oatcpw_close_icon'] == "close_icon_2"){
                                    echo '<span class="close_icons close_icon_2"></span>';
                                }elseif($atcpw_comman['oatcpw_close_icon'] == "close_icon_3"){
                                    echo '<span class="close_icons close_icon_3"></span>';
                                }elseif($atcpw_comman['oatcpw_close_icon'] == "close_icon_4"){
                                    echo '<span class="close_icons close_icon_4"></span>';
                                }elseif($atcpw_comman['oatcpw_close_icon'] == "close_icon_5"){
                                    echo '<span class="close_icons close_icon_5"></span>';
                                }else{
                                    echo '<span class="close_icons close_icon"></span>';
                                }
                                ?>
                            </span>
                            <?php
                            }
                            ?>
                        </div>
                        <?php if ($atcpw_comman['atcpw_freeshiping_herder'] == "yes" ){ ?>
                            <div class="top_atcpw_bottom">
                                <?php 
                                    $wg_prodrule_mtvtion_msg = $atcpw_comman['atcpw_freeshiping_herder_txt'];
                                    $shiiping_total  = WC()->cart->get_shipping_total();
                                    $atcpw_subtotla    =  WC()->cart->get_subtotal();
                                    if($shiiping_total >  $atcpw_subtotla){
                                        $atcpw_shipping_total =  get_woocommerce_currency_symbol().number_format(($shiiping_total - $atcpw_subtotla ), 2 ); 
                                        $wg_prodrule_mtvtion_msg_final = str_replace("{shipping_total}", $atcpw_shipping_total, $wg_prodrule_mtvtion_msg);
                                    }else{
                                        $wg_prodrule_mtvtion_msg_final =  $atcpw_comman['atcpw_freeshiping_then_herder_txt'];
                                    }?>
                                <p style="color:<?php echo esc_attr($atcpw_comman['atcpw_header_shipping_text_color']); ?>"><?php echo esc_attr($wg_prodrule_mtvtion_msg_final); ?></p>
                            </div>
                        <?php } ?>
                    </div>
                    <?php
                    echo $this->atcpw_comman();
                    ?>
                    <div class="atcpw_trcpn">
                        <div class='atcpw_total_tr'>
                            <div class='atcpw_total_tr_inner'>
                                <div class='atcpw_total_label'>
                                    <span><?php echo esc_attr($atcpw_comman['atcpw_subtotal_txt']); ?></span>
                                </div>
                                <?php
                                $item_taxs = $woocommerce->cart->get_cart();
                                $atcpw_get_totals = WC()->cart->get_totals();
                                $atcpw_shipping_total = $woocommerce->cart->get_cart_shipping_total();
                                $atcpw_cart_total = $atcpw_get_totals['subtotal'];
                                $atcpw_cart_discount = $atcpw_get_totals['discount_total'];
                                // print_R($atcpw_cart_total);
                                 //print_r($atcpw_cart_discount);
                                $atcpw_final_subtotal = $atcpw_cart_total ;
                                ?>
                                <div class='atcpw_total_amount'>
                                    <span class='atcpw_fragtotal'><?php echo esc_attr(get_woocommerce_currency_symbol().number_format($atcpw_final_subtotal, 2)); ?></span>
                                </div>
                                <?php  
                                if ($atcpw_comman['atcpw_total_shipping_option']== "yes" ) { ?>
                                    <div class='atcpw_total_label'>
                                        <span><?php echo esc_attr($atcpw_comman['atcpw_shipping_text_trans']); ?></span>
                                    </div>
                                    <div class='atcpw_total_amountt'>
                                        <span class='atcpw_fragtotall'><?php echo esc_attr($atcpw_shipping_total); ?></span>
                                    </div>
                                    <?php 
                                } 
                                if ($atcpw_comman['atcpw_total_tax_option'] == "yes" ) { ?>
                                    <div class="atcpw_total_label">
                                         <span><?php echo esc_attr($atcpw_comman['atcpw_apply_taxt_testx']); ?></span>
                                    </div>
                                    <div class="atcpw_total_innwer">
                                        <span class='atcpw_fragtotall'> 
                                            <?php 
                                            $iteeem = WC()->cart->get_tax_totals();
                                            if(!empty($iteeem)){
                                                foreach ($iteeem as $iteeem_tac ) {
                                                    if(!empty($iteeem_tac->amount)){
                                                        echo esc_attr(get_woocommerce_currency_symbol().number_format($iteeem_tac->amount, 2)); 
                                                    } 
                                                }
                                            }else{
                                                echo esc_attr(get_woocommerce_currency_symbol().number_format(0, 2));
                                            } ?>
                                        </span>
                                    </div> 
                                <?php } ?>
                                <?php  if ($atcpw_comman['atcpw_discount_show_cart']== "yes" ) { ?>
                                    <div class="atcpw_oc_discount_oc">
                                    <?php
                                    if(($atcpw_cart_discount) != 0) {   ?>
                                        <div class="atcpw_discount_label">
                                             <span><?php echo esc_attr($atcpw_comman['atcpw_discount_text_trans']); ?></span>
                                        </div>
                                        <div class="atcpw_discount_innwer_full">
                                            <span class='atcpw_discount_full'><?php echo esc_attr(get_woocommerce_currency_symbol().number_format( $atcpw_cart_discount, 2)); ?></span>
                                        </div>
                                    <?php }  ?>
                                 </div>
                                <?php } ?>
                                <?php  if ($atcpw_comman['atcpw_total_all_option'] == "yes" ) { ?>
                                    <div class="atcpw_oc_total_oc">
                                        <div class="atcpw_total_label">
                                             <span><?php echo esc_attr($atcpw_comman['atcpw_apply_total_text']); ?></span>
                                        </div>
                                        <div class="atcpw_total_innwer_full">
                                            <span class='atcpw_fragtotall_full'><?php echo esc_attr(get_woocommerce_currency_symbol().number_format(WC()->cart->total, 2)); ?></span>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        
                    </div>
                    <div class="atcpw_empty_cart_section">
                        <div class="atcpw_empty_cart">
                            <a href="#" class="atcpw_cart_empty_cation" style="background-color: <?php echo esc_attr($atcpw_comman['atcpw_ft_btn_clr']) ?>;margin: <?php echo esc_attr($atcpw_comman['atcpw_ft_btn_mrgin']."px") ?>;color: <?php echo esc_attr($atcpw_comman['atcpw_ft_btn_txt_clr']) ?>;"><?php if($atcpw_comman['atcpw_empty_cart_button_text'] == ""){echo "Empty Cart";}else{echo esc_attr($atcpw_comman['atcpw_empty_cart_button_text']);}?></a>
                        </div>
                    </div>
                    <div class="atcpw_footer">
                        <div class="atcpw_ship_txt" style="color: <?php echo esc_attr($atcpw_comman['atcpw_ship_ft_clr']) ?>;font-size: <?php echo esc_attr($atcpw_comman[ 'atcpw_ship_ft_size']."px") ?>;"><?php echo esc_attr($atcpw_comman['atcpw_ship_txt']); ?></div>
                        <?php

                        ?>
                        <div class="atcpw_button_fort">
                        <?php  if($atcpw_comman['atcpw_cart_option']== "yes") { ?>
                            <a  class="atcpw_bn_1" href="<?php if(!empty($atcpw_comman['atcpw_orgcart_link'])){echo esc_url($atcpw_comman['atcpw_orgcart_link']); }else{  echo esc_url(wc_get_cart_url()); }?>" style="background-color: <?php echo esc_attr($atcpw_comman['atcpw_ft_btn_clr']) ?>;margin: <?php echo esc_attr($atcpw_comman['atcpw_ft_btn_mrgin']."px") ?>;color: <?php echo esc_attr($atcpw_comman['atcpw_ft_btn_txt_clr']) ?>;">
                                <?php echo esc_attr($atcpw_comman['atcpw_cart_txt']); ?>
                            </a>
                        <?php } ?>
                        <?php  if($atcpw_comman['atcpw_checkout_option'] == "yes"){ ?>
                            <a class="atcpw_bn_2" href="<?php if(!empty($atcpw_comman['atcpw_orgcheckout_link'])){echo esc_url($atcpw_comman['atcpw_orgcheckout_link']);}else{echo esc_url(wc_get_checkout_url());} ?>" style="background-color: <?php echo esc_attr($atcpw_comman['atcpw_ft_btn_clr']) ?>;margin: <?php echo esc_attr($atcpw_comman['atcpw_ft_btn_mrgin']."px") ?>;color: <?php echo esc_attr($atcpw_comman[ 'atcpw_ft_btn_txt_clr']) ?>;">
                                <?php echo esc_attr($atcpw_comman['atcpw_checkout_txt']); ?>
                            </a>
                        <?php } ?>
                        
                        <?php  if($atcpw_comman['atcpw_conshopping_option'] == "yes"){ ?>
                            <a class="atcpw_bn_3" href="<?php if(!empty($atcpw_comman['atcpw_conshipping_link'])){echo esc_url($atcpw_comman['atcpw_conshipping_link']);}else{echo esc_url(get_permalink( wc_get_page_id( 'shop' )));} ?>" style="background-color: <?php echo esc_attr($atcpw_comman[ 'atcpw_ft_btn_clr']) ?>;margin: <?php echo esc_attr($atcpw_comman['atcpw_ft_btn_mrgin']."px") ?>;color: <?php echo esc_attr($atcpw_comman['atcpw_ft_btn_txt_clr']) ?>;">
                                <?php echo esc_attr($atcpw_comman['atcpw_conshipping_txt']); ?>
                            </a>
                        <?php } ?>
                        </div>
                    </div>
                    <?php
                    if($atcpw_comman['atcpw_prodslider_mobile'] == 'yes') {
                        $hide_mobile_class = '';
                    }else{
                        $hide_mobile_class = 'hide_mobile';
                    }
                    if($atcpw_comman['atcpw_prodslider_desktop'] == 'yes') {
                        $hide_desktop_class = '';
                    }else{
                        $hide_desktop_class = 'desktop_oc';
                    }
                    $productsa = get_option('atcpw_select2');
                    if(!empty($productsa)) {
                        ?>
                        <div class="atcpw_slider <?php echo esc_attr($hide_desktop_class.' '.$hide_mobile_class);?>">
                            <span class="atcpw_slider_heading"><h2 class="atcpw_slider_heading_inner" style="border-color: <?php echo esc_attr($atcpw_comman[ 'atcpw_ft_btn_clr'])?>;"><?php if($atcpw_comman[ 'atcpw_slider_heading_text'] == ''){echo "Feature Products";}else{echo esc_attr($atcpw_comman[ 'atcpw_slider_heading_text']);}?></h2></span>
                            <div class="atcpw_slider_inn  owl-carousel owl-theme ">
                                <?php 
                                foreach ($productsa as $value) {
                                    $productc = wc_get_product( $value );
                                    $title = $productc->get_name();
                                    $price = $productc->get_price();
                                    $cart_product_ids = array();
                                    foreach( WC()->cart->get_cart() as $cart_item ){
                                        // compatibility with WC +3
                                        if( version_compare( WC_VERSION, '3.0', '<' ) ) {
                                            $cart_product_ids[] = $cart_item['data']->id; // Before version 3.0
                                        } else {
                                            $cart_product_ids[] = $cart_item['data']->get_id(); // For version 3 or more
                                        }
                                    }

                                    if (!in_array($value, $cart_product_ids)) {

                                        ?>
                                        <div class="item atcow_feature_product">
                                            <div class="inner_mainf">
                                            <a href="<?php echo esc_url(get_permalink( $productc->get_id() )); ?>">

                                                <div class="atcpw_left_div"><?php 
                                                    echo wp_kses( $productc->get_image(), [
                                                        'img' => [
                                                            'src'      => true,
                                                            'class'    => true,
                                                            'width'    => true,
                                                            'height'   => true,
                                                            'alt'      => true,
                                                        ],
                                                    ] ); ?>
                                                </div>
                                                <div class="atcpw_right_div">
                                                    <h3 style="color: <?php echo esc_attr($atcpw_comman['atcpw_sld_product_ft_clr']); ?>;font-size: <?php echo esc_attr($atcpw_comman['atcpw_sld_product_ft_size']); ?>px;"><?php echo esc_attr($title); ?></h3>
                                                    <span style="color: <?php echo esc_attr($atcpw_comman[ 'atcpw_sld_product_ft_clr']) ?>;font-size: <?php echo esc_attr($atcpw_comman[ 'atcpw_sld_product_ft_size']); ?>px;"><?php echo wc_price($price); ?></span>

                                                    <?php

                                                    if ($productc->get_type() == 'simple') {
                                                        echo "<a href='?add-to-cart=".esc_attr($value)."' data-quantity='1' class='atcpw_pslide_atc' data-product_id='".esc_attr($value)."' style='background-color: ".esc_attr($atcpw_comman[ 'atcpw_ft_btn_clr'])."; color: ".esc_attr($atcpw_comman['atcpw_ft_btn_txt_clr']).";'>".esc_attr($atcpw_comman[ 'atcpw_slider_vwoptbtn_txt'])."</a>";
                                                    } elseif ($productc->get_type() == 'variable' ) {
                                                        echo "<a href='".esc_url(get_permalink($value))."' data-quantity='1' class='atcpw_pslide_prodpage' data-product_id='".esc_attr($value)."' style='background-color: ".esc_attr($atcpw_comman[ 'atcpw_ft_btn_clr'])."; color: ".esc_attr($atcpw_comman[ 'atcpw_ft_btn_txt_clr']).";'>".esc_attr($atcpw_comman['atcpw_slider_vwoptbtn_txt'])."</a>";
                                                    } elseif ($productc->get_type() == 'variation') {
                                                        $prod_id = $productc->get_parent_id();
                                                        echo "<a href='?add-to-cart=".esc_attr(esc_attr($value))."' data-quantity='1' class='atcpw_pslide_atc' data-product_id='".esc_attr($prod_id)."' variation-id='".esc_attr($value)."' style='background-color: ".esc_attr($atcpw_comman[ 'atcpw_ft_btn_clr'])."; color: ".esc_attr($atcpw_comman[ 'atcpw_ft_btn_txt_clr']).";'>".esc_attr($atcpw_comman[ 'atcpw_slider_vwoptbtn_txt'])."</a>";
                                                    }
                                                    ?>
                                                </div>
                                            </a>
                                        </div>
                                        </div>
                                        <?php
                                    }
                                }  
                                ?>
                            </div>
                        </div>
                        <?php 
                    }
                    ?>
                </div>
            </div>

            <?php if($atcpw_comman['atcpw_show_cart_icn'] == "yes"){ ?>

                <div class="atcpw_cart_basket">
                    <div class="cart_box">
                       
                        <?php if($atcpw_comman['ocpc_atcpw_icon'] == 'ocpc_atcpw_icon_1'){ ?>

                           <?php echo '<span class="atcpw_qatcpw_icons ocpc_atcpw_icon_1"></span>'; ?>

                        <?php }else if($atcpw_comman['ocpc_atcpw_icon'] == 'ocpc_atcpw_icon_2'){ ?>

                            <?php echo '<span class="atcpw_qatcpw_icons ocpc_atcpw_icon_2"></span>'; ?>

                        <?php }else if($atcpw_comman['ocpc_atcpw_icon'] == 'ocpc_atcpw_icon_3'){ ?>

                            <?php echo '<span class="atcpw_qatcpw_icons ocpc_atcpw_icon_3"></span>'; ?>

                        <?php }else if($atcpw_comman['ocpc_atcpw_icon'] == 'ocpc_atcpw_icon_4'){ ?>

                            <?php echo '<span class="atcpw_qatcpw_icons ocpc_atcpw_icon_4"></span>'; ?>

                        <?php }else if($atcpw_comman['ocpc_atcpw_icon'] == 'ocpc_atcpw_icon_5'){ ?>

                            <?php echo '<span class="atcpw_qatcpw_icons ocpc_atcpw_icon_5"></span>'; ?>

                        <?php }else if($atcpw_comman['ocpc_atcpw_icon'] == 'ocpc_atcpw_icon_6'){ ?>

                            <?php echo '<span class="atcpw_qatcpw_icons ocpc_atcpw_icon_6"></span>'; ?>

                        <?php }else{ ?>

                              <?php echo '<span class="atcpw_qatcpw_icons atcpw_qatcpw_icon"></span>'; ?>

                        <?php } ?>
                        
                    </div>
                    <?php if($atcpw_comman['atcpw_product_cnt'] == "yes"){ ?>
                        <div class="atcpw_item_count" >
                            <?php
                            echo $this->ATCPW_counter_value();
                            ?>
                        </div>
                    <?php } ?>
                </div>
                <?php
            }
        }
     
        function ATCPW_craete_cart(){
            global $atcpw_comman;
            ?>
            <style>
                .atcpw_item_count{
                    background-color: <?php echo esc_attr($atcpw_comman[ 'atcpw_cnt_bg_clr']); ?>;
                    color: <?php echo esc_attr($atcpw_comman['atcpw_cnt_txt_clr']); ?>;
                    font-size: <?php echo esc_attr($atcpw_comman['atcpw_cnt_txt_size']."px"); ?>;
                    <?php if($atcpw_comman['atcpw_basket_count_position'] == "top-right"){?>
                        top: -10px;
                        right: -12px;
                    <?php }elseif($atcpw_comman['atcpw_basket_count_position'] == "bottom-left"){ ?>
                        bottom: -10px;
                        left: -12px;
                    <?php }elseif($atcpw_comman['atcpw_basket_count_position'] == "bottom-right"){ ?>
                        bottom: -10px;
                        right: -12px;
                    <?php }else{ ?>
                        top: -10px;
                        left: -12px;
                    <?php } ?>
                }
                .atcpw_cart_basket{
                    <?php if($atcpw_comman['atcpw_basket_position'] == "top-left"){ ?>
                    top: 15px;
                    left: 15px;
                    <?php }elseif($atcpw_comman['atcpw_basket_position']== "top-right") { ?>
                    top: 15px;
                    right: 15px;
                    <?php }elseif($atcpw_comman['atcpw_basket_position']== "bottom-left") { ?>
                    bottom: 15px;
                    left: 15px;
                    <?php }elseif($atcpw_comman['atcpw_basket_position']== "bottom-right") { ?>
                    bottom: 15px;
                    right: 15px;
                    <?php } if($atcpw_comman['atcpw_basket_shape'] == "round"){ ?>
                        border-radius: 100%;
                    <?php }else { ?>
                        border-radius: 10px;
                    <?php } if($atcpw_comman['atcpw_cart_show_hide'] == "atcpw_cart_hide"){ ?>
                        display: none;
                    <?php }else { ?>
                        display:block;
                    <?php } ?>
                    max-height: <?php echo esc_attr($atcpw_comman[ 'atcpw_basket_icn_size']."px"); ?>;
                    max-width: <?php echo esc_attr($atcpw_comman[ 'atcpw_basket_icn_size']."px"); ?>;
                    background-color: <?php echo esc_attr($atcpw_comman['atcpw_basket_bg_clr']); ?>;
                    margin-bottom: <?php echo esc_attr($atcpw_comman['atcpw_basket_off_vertical']);?>px;
                    margin-right: <?php echo esc_attr($atcpw_comman['atcpw_basket_off_horizontal']);?>px;
                }
                .atcpw_container .atcpw_header_title{
                    color: <?php echo esc_attr($atcpw_comman['atcpw_head_ft_clr']); ?>;
                    font-size: <?php echo esc_attr($atcpw_comman['atcpw_head_ft_size']."px"); ?>;
                }
                
                .atcpw_prodline_title_inner ,.atcpw_prodline_title_inner a, .atcpw_qupdiv{
                    color: <?php echo esc_attr($atcpw_comman['atcpw_product_ft_clr']);?>;
                    font-size: <?php echo esc_attr($atcpw_comman['atcpw_product_ft_size']);?>px;
                }

                .atcpw_container_main .shop_icon {
                    background-color: <?php echo esc_attr($atcpw_comman[ 'atcpw_header_cart_icon_clr']); ?> ;
                }
                .atcpw_container_main .ocpc_trashs{
                    background-color: <?php echo esc_attr($atcpw_comman[ 'atcpw_delect_icon_clr']); ?> ;
                }
                .atcpw_container_main .close_icons{
                    background-color: <?php echo esc_attr($atcpw_comman[ 'atcpw_header_close_icon_clr']); ?> ;
                }
                .atcpw_cart_basket .atcpw_qatcpw_icons {
                    background-color: <?php echo esc_attr($atcpw_comman[ 'atcpw_basket_clr']); ?> ;
                }
                .shop_icon, .close_icons, .ocpc_trashs, .atcpw_qatcpw_icons {
                    background-color: #000000;
                    width: 30px;
                    height: 30px;
                    display: inline-block;
                }
                .shop_icon_1 {
                    mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/shop_icon_1.svg');?>) no-repeat center / contain;
                    -webkit-mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/shop_icon_1.svg');?>) no-repeat center / contain;
                }
                .shop_icon_2 {
                    mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/shop_icon_2.svg');?>) no-repeat center / contain;
                    -webkit-mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/shop_icon_2.svg');?>) no-repeat center / contain;
                }
                .shop_icon_3 {
                    mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/shop_icon_3.svg');?>) no-repeat center / contain;
                    -webkit-mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/shop_icon_3.svg');?>) no-repeat center / contain;
                }
                .shop_icon_4 {
                    mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/shop_icon_4.svg');?>) no-repeat center / contain;
                    -webkit-mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/shop_icon_4.svg');?>) no-repeat center / contain;
                }
                .shop_icon_5 {
                    mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/shop_icon_5.svg');?>) no-repeat center / contain;
                    -webkit-mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/shop_icon_5.svg');?>) no-repeat center / contain;
                }
                .shop_icon_6 {
                    mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/shop_icon_6.svg');?>) no-repeat center / contain;
                    -webkit-mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/shop_icon_6.svg');?>) no-repeat center / contain;
                }

                .close_icon {
                    mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/close_icon.svg');?>) no-repeat center / contain;
                    -webkit-mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/close_icon.svg');?>) no-repeat center / contain;
                }
                .close_icon_1 {
                    mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/close_icon_1.svg');?>) no-repeat center / contain;
                    -webkit-mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/close_icon_1.svg');?>) no-repeat center / contain;
                }
                .close_icon_2 {
                    mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/close_icon_2.svg');?>) no-repeat center / contain;
                    -webkit-mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/close_icon_2.svg');?>) no-repeat center / contain;
                }
                .close_icon_3 {
                    mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/close_icon_3.svg');?>) no-repeat center / contain;
                    -webkit-mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/close_icon_3.svg');?>) no-repeat center / contain;
                }
                .close_icon_4 {
                    mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/close_icon_4.svg');?>) no-repeat center / contain;
                    -webkit-mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/close_icon_4.svg');?>) no-repeat center / contain;
                }
                .close_icon_5 {
                    mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/close_icon_5.svg');?>) no-repeat center / contain;
                    -webkit-mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/close_icon_5.svg');?>) no-repeat center / contain;
                }

                .ocpc_trash {
                    mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/ocpc_trash.svg');?>) no-repeat center / contain;
                    -webkit-mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/ocpc_trash.svg');?>) no-repeat center / contain;
                }
                .trash_1 {
                    mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/trash_1.svg');?>) no-repeat center / contain;
                    -webkit-mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/trash_1.svg');?>) no-repeat center / contain;
                }
                .trash_2 {
                    mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/trash_2.svg');?>) no-repeat center / contain;
                    -webkit-mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/trash_2.svg');?>) no-repeat center / contain;
                }
                .trash_3 {
                    mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/trash_3.svg');?>) no-repeat center / contain;
                    -webkit-mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/trash_3.svg');?>) no-repeat center / contain;
                }
                .trash_4 {
                    mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/trash_4.svg');?>) no-repeat center / contain;
                    -webkit-mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/trash_4.svg');?>) no-repeat center / contain;
                }
                .trash_5 {
                    mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/trash_5.svg');?>) no-repeat center / contain;
                    -webkit-mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/trash_5.svg');?>) no-repeat center / contain;
                }
                .trash_6 {
                    mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/trash_6.svg');?>) no-repeat center / contain;
                    -webkit-mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/trash_6.svg');?>) no-repeat center / contain;
                }

                .atcpw_qatcpw_icon {
                    mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/atcpw_qatcpw_icon.svg');?>) no-repeat center / contain;
                    -webkit-mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/atcpw_qatcpw_icon.svg');?>) no-repeat center / contain;
                }
                .ocpc_atcpw_icon_1 {
                    mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/ocpc_atcpw_icon_1.svg');?>) no-repeat center / contain;
                    -webkit-mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/ocpc_atcpw_icon_1.svg');?>) no-repeat center / contain;
                }
                .ocpc_atcpw_icon_2 {
                    mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/ocpc_atcpw_icon_2.svg');?>) no-repeat center / contain;
                    -webkit-mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/ocpc_atcpw_icon_2.svg');?>) no-repeat center / contain;
                }
                .ocpc_atcpw_icon_3 {
                    mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/ocpc_atcpw_icon_3.svg');?>) no-repeat center / contain;
                    -webkit-mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/ocpc_atcpw_icon_3.svg');?>) no-repeat center / contain;
                }
                .ocpc_atcpw_icon_4 {
                    mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/ocpc_atcpw_icon_4.svg');?>) no-repeat center / contain;
                    -webkit-mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/ocpc_atcpw_icon_4.svg');?>) no-repeat center / contain;
                }
                .ocpc_atcpw_icon_5 {
                    mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/ocpc_atcpw_icon_5.svg');?>) no-repeat center / contain;
                    -webkit-mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/ocpc_atcpw_icon_5.svg');?>) no-repeat center / contain;
                }
                .ocpc_atcpw_icon_6 {
                    mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/ocpc_atcpw_icon_6.svg');?>) no-repeat center / contain;
                    -webkit-mask: url(<?php echo esc_url(ATCPW_PLUGIN_DIR.'/assets/images/ocpc_atcpw_icon_6.svg');?>) no-repeat center / contain;
                }
            </style>
            <?php
            $wcf_page_ids = explode(",",$atcpw_comman[ 'atcpw_on_pages']);
            $wcf_crnt_page = get_the_ID();
            if (!in_array($wcf_crnt_page, $wcf_page_ids)) {
                if(wp_is_mobile() ){
                    if($atcpw_comman[ 'atcpw_mobile'] == "yes") {
                        if(is_checkout() || is_cart()){
                            if($atcpw_comman[ 'atcpw_cart_check_page'] == "yes") {
                                add_filter( 'wp_footer', array($this, 'ATCPW_cart_create'));
                            }
                        } else {
                            add_filter( 'wp_footer', array($this, 'ATCPW_cart_create'));
                        }
                    }
                } else {
                    if(is_checkout() || is_cart()){
                        if($atcpw_comman[ 'atcpw_cart_check_page']== "yes") {
                            add_filter( 'wp_footer', array($this, 'ATCPW_cart_create'));
                        }
                    } else {
                        add_filter( 'wp_footer', array($this, 'ATCPW_cart_create'));
                    }
                }
            }
        }
        
        function atcpw_comman(){
            global $atcpw_comman;

            $html = '<div class="atcpw_body">';
            if ( ! WC()->cart->is_empty() ) {

                $html .= "<div class='atcpw_cust_mini_cart'>";
                global $woocommerce;
                if($atcpw_comman['atcpw_cart_ordering']=='asc'){
                    $items = WC()->cart->get_cart(); 
                }else{
                    $items = array_reverse(WC()->cart->get_cart()); 
                }
                
                    foreach($items as $item => $values) { 
                       $_product = apply_filters( 'woocommerce_cart_item_product', $values['data'], $values, $item );

                        $html .= "<div class='atcpw_cart_prods' product_id='".esc_attr($values['product_id'])."' c_key='".esc_attr($values['key'])."'>";
                        $html .= "<div class='atcpw_cart_prods_inner'>";
                        
                        $product_id   = apply_filters( 'woocommerce_cart_item_product_id', $values['product_id'], $values, $item );
                        $getProductDetail = wc_get_product( $values['product_id'] );
                        if($atcpw_comman['atcpw_loop_img']=='yes'){
                            $html .= "<div class='image_div'>";
                            $html .= $getProductDetail->get_image('thumbnail');
                            $html .= '</div>';  
                        }
                       
                        $html .= "<div class='description_div'>";
                     
                 
                        if($atcpw_comman['oatcpw_delete_icon'] == 'trash_1'){
                            $atcpw_delete_icon =  '<span class="ocpc_trashs trash_1"></span>';
                        }elseif($atcpw_comman['oatcpw_delete_icon'] == 'trash_2'){
                            $atcpw_delete_icon =  '<span class="ocpc_trashs trash_2"></span>';
                        }elseif($atcpw_comman['oatcpw_delete_icon'] == 'trash_3'){
                            $atcpw_delete_icon =  '<span class="ocpc_trashs trash_3"></span>';
                        }elseif($atcpw_comman['oatcpw_delete_icon'] == 'trash_4'){
                            $atcpw_delete_icon =  '<span class="ocpc_trashs trash_4"></span>';
                        }elseif($atcpw_comman['oatcpw_delete_icon'] == 'trash_5'){
                            $atcpw_delete_icon =  '<span class="ocpc_trashs trash_5"></span>';
                        }elseif($atcpw_comman['oatcpw_delete_icon'] == 'trash_6'){
                            $atcpw_delete_icon =  '<span class="ocpc_trashs trash_6"></span>';
                        }else{
                            $atcpw_delete_icon = '<span class="ocpc_trashs ocpc_trash"></span>';
                        }
                        

                        if($atcpw_comman['atcpw_loop_delete']=='yes'){
                            $html .= "<div class='atcpw_prcdel_div'>";
                            $html .= apply_filters('woocommerce_cart_item_remove_link', sprintf('<a href="%s" class="atcpw_remove"  aria-label="%s" data-product_id="%s" data-product_sku="%s" data-cart_item_key="%s">'.$atcpw_delete_icon.'</a>', 
                                    esc_url(wc_get_cart_remove_url($item)), 
                                    esc_html__('Remove this item', 'evolve'),
                                    esc_attr( $product_id ),
                                    esc_attr( $_product->get_sku() ),
                                    esc_attr( $item )
                                    ), $item);
                            $html .= "</div>";
                        }

                        
                        $html .= "<div class='atcpw_prodline_title' >";
                        
                        $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $values ) : '', $values, $item );
                                if ( $_product && $_product->exists() && $values['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $values, $item ) ) {
                                    $html .= "<div class='atcpw_prodline_title_inner' >";
                                    if($atcpw_comman['atcpw_loop_product_name']=='yes'){
                                        if($atcpw_comman['atcpw_loop_link']=='yes'){
                                            $html .= apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $values, $item )  . '&nbsp;'; 
                                        }else{
                                            $html .= apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $values, $item ) . '&nbsp;'; 
                                        }
                                       
                                    }
                                    $html .= "</div>";
                                    $html .= "<div class='oc_metadata'>"; 

                                    $html .= wc_get_formatted_cart_item_data( $values ); 
                                        
                                    $html .= "</div>";
                                    if($atcpw_comman['atcpw_loop_product_price']=='yes'){
                                        $html .= "<div class='atcpw_price_single'>".wc_price($_product->get_price())."</div>"; 
                                    }   
                                }

                        $html .= "</div>";

                        $html .= "<div class='atcpw_prodline_qty'>";
                        $html .= '<div class="atcpw_qupdiv">';
                        if ($atcpw_comman['atcpw_qty_box'] == "yes" ) {
                           /* $html .= $values['quantity'];*/
                            $html .= '<button type="button" class="atcpw_minus" >-</button>';
                            $html .= '<input type="text" class="atcpw_update_qty" name="update_qty" value="'.esc_attr($values['quantity']).'">';
                            $html .= '<button type="button" class="atcpw_plus" >+</button>';
                            
                        }else {
                            $html .= esc_attr($atcpw_comman['atcpw_qty_text'])." : ".esc_attr($values['quantity']);
                        }
                        $html .= '</div>';
                        if ($atcpw_comman['atcpw_loop_total'] == "yes" ) {
                            $html .= "<div class='atcpw_prodline_price'>";

                            $atcpw_product = $values['data'];
                            $atcpw_product_subtotal = WC()->cart->get_product_subtotal( $atcpw_product, $values['quantity'] );

                            $html .= $atcpw_product_subtotal;

                            $html .= "</div>";
                        }

                        $html .= "</div>";
                        $html .= "</div>";
                        $html .= "</div>";
                        $html .= "</div>";
                    }

                $html .= "</div>";

            }else{
                if($atcpw_comman['atcpw_conshipping_link']!=''){
                    $html .= "<h3 class='empty_cart_text'><span>".esc_attr($atcpw_comman[ 'atcpw_cart_is_empty'])."</span><a href='".esc_url($atcpw_comman['atcpw_conshipping_link'])."' style='background-color: ".esc_attr($atcpw_comman['atcpw_ft_btn_clr']).";margin: ".esc_attr($atcpw_comman['atcpw_ft_btn_mrgin'])."px;color: ".esc_attr($atcpw_comman['atcpw_ft_btn_txt_clr']).";'>Continue Shopping</a></h3>";
                }else{
                    $html .= "<h3 class='empty_cart_text'><span>".esc_attr($atcpw_comman[ 'atcpw_cart_is_empty'])."</span><a href='".esc_url(get_permalink( wc_get_page_id( 'shop' )))."' style='background-color: ".esc_attr($atcpw_comman['atcpw_ft_btn_clr']).";margin: ".esc_attr($atcpw_comman['atcpw_ft_btn_mrgin'])."px;color: ".esc_attr($atcpw_comman['atcpw_ft_btn_txt_clr']).";'>Continue Shopping</a></h3>";
                }
                $html .= '<style type="text/css">.atcpw_container .atcpw_footer, .atcpw_trcpn, .atcpw_empty_cart_section{display: none;}</style>';
            }

            $html .= '</div>';
            return $html;
        }

        function ATCPW_counter_value(){
            global $atcpw_comman;
            if( $atcpw_comman['atcpw_product_cnt_type']=='sum_qty'){
                return '<span class="float_countc">'.esc_attr(WC()->cart->get_cart_contents_count()).'</span>';
            }else{
                return '<span class="float_countc">'.esc_attr(count(WC()->cart->get_cart())).'</span>';
            }
        }

        function ATCPW_cart_count_fragments( $fragments ) {
            global $atcpw_comman;
            WC()->cart->calculate_totals();
            WC()->cart->maybe_set_cart_cookies();

            $fragments['div.atcpw_body'] = $this->atcpw_comman();

            if ($atcpw_comman['atcpw_freeshiping_herder'] == "yes" ){ 
                       $atcpw_shiping = '<div class="top_atcpw_bottom">';

                                $wg_prodrule_mtvtion_msg = $atcpw_comman['atcpw_freeshiping_herder_txt'];
                                                               // 
                                   $shiiping_total  = WC()->cart->get_shipping_total();
                                  $atcpw_subtotla       =  WC()->cart->get_subtotal();

                                if($shiiping_total >  $atcpw_subtotla){
                                       $atcpw_shipping_total =  get_woocommerce_currency_symbol().number_format(($shiiping_total - $atcpw_subtotla ), 2 );
                                       $wg_prodrule_mtvtion_msg_final = str_replace("{shipping_total}", $atcpw_shipping_total, $wg_prodrule_mtvtion_msg);
                                }else{
                                     $wg_prodrule_mtvtion_msg_final =  $atcpw_comman['atcpw_freeshiping_then_herder_txt'];
                                }
                                
                             $atcpw_shiping .='<p style="color:'.esc_attr($atcpw_comman['atcpw_header_shipping_text_color']).'">'.esc_attr($wg_prodrule_mtvtion_msg_final).'</p>' ;
                           
                        $atcpw_shiping .= '</div>';
             } 

            $fragments['.top_atcpw_bottom p'] = $atcpw_shiping;
            $fragments['span.float_countc'] = $this->ATCPW_counter_value();
            $item_taxs =WC()->cart->get_cart();
            $iteeem = WC()->cart->get_tax_totals();
            $atcpw_get_totals = WC()->cart->get_totals();
            $atcpw_shipping_total =  WC()->cart->get_cart_shipping_total();
            $atcpw_cart_total = $atcpw_get_totals['subtotal'];
            $atcpw_cart_discount = $atcpw_get_totals['discount_total'];
            $atcpw_final_subtotal = $atcpw_cart_total ;
            
            $atcpw_fragtotal = "<div class='atcpw_total_amount'>".esc_attr(get_woocommerce_currency_symbol().number_format($atcpw_final_subtotal, 2))."</div>";
            $atcpw_fulltotal = "<div class='atcpw_total_innwer_full'>".esc_attr(get_woocommerce_currency_symbol().number_format(WC()->cart->total, 2))."</div>";
            
            // print_R($atcpw_cart_discount);
            $atcpw_fulldicount = "<div class='atcpw_oc_discount_oc'>";
                if ( $atcpw_cart_discount != 0 ){

                    $atcpw_fulldicount .= "<div class='atcpw_discount_label'><span>".esc_attr($atcpw_comman['atcpw_discount_text_trans'])."</span></div><div class='atcpw_discount_innwer_full'> <span class='atcpw_discount_full'>".esc_attr(get_woocommerce_currency_symbol().number_format( $atcpw_cart_discount, 2))."</span></div>";   

                }
            $atcpw_fulldicount .= "</div>";

            $atcpw_total_amountt = "<div class='atcpw_total_amountt'>".esc_attr($atcpw_shipping_total)."</div>";



            $atcpw_total_innwer = "<span class='atcpw_fragtotall'>";  
             if(!empty($iteeem)){             
                foreach ($iteeem as $iteeem_tac ) {
                    if(!empty($iteeem_tac->amount)){
                           $atcpw_total_innwer .= get_woocommerce_currency_symbol().number_format($iteeem_tac->amount, 2); 
                    }
                }
            }else{     
                   $atcpw_total_innwer .=  get_woocommerce_currency_symbol().number_format(0, 2);                         
            }
            $atcpw_total_innwer .= "</span>";
             ob_start();
            if($atcpw_comman['atcpw_cart_empty_hide_show'] == "hide" && WC()->cart->is_empty() ){ ?>
                <script type="text/javascript">
                    jQuery( ".atcpw_container" ).addClass( "atcpw_cart_empty" );
                </script>

            <?php }else{ ?>
                 <script type="text/javascript">
                    jQuery( ".atcpw_container" ).removeClass( "atcpw_cart_empty" );
                </script>
                
            <?php }
            $atcpw_total_innwerscript = ob_get_clean();
            $atcpw_total_innwer .= $atcpw_total_innwerscript;
            $fragments['div.atcpw_total_innwer_full'] = $atcpw_fulltotal;
            $fragments['div.atcpw_total_amount'] = $atcpw_fragtotal;
            $fragments['div.atcpw_total_amountt'] = $atcpw_total_amountt;
            $fragments['span.atcpw_fragtotall'] = $atcpw_total_innwer;
            $fragments['div.atcpw_oc_discount_oc'] = $atcpw_fulldicount;
            ob_start();
            ?>
            <div class="atcpw_slider_inn owl-carousel owl-theme">
                <?php 
                    $productsa = get_option('atcpw_select2');
                    
                    if(!empty($productsa)) {

                        foreach ($productsa as $value) {
                            $productc = wc_get_product( $value );
                            $title = $productc->get_name();
                            $price = $productc->get_price();

                            $cart_product_ids = array();

                            foreach( WC()->cart->get_cart() as $cart_item ){
							    // compatibility with WC +3
							    if( version_compare( WC_VERSION, '3.0', '<' ) ){
							        $cart_product_ids[] = $cart_item['data']->id; // Before version 3.0
							    } else {
							        $cart_product_ids[] = $cart_item['data']->get_id(); // For version 3 or more
							    }
							}

							if (!in_array($value, $cart_product_ids)) {

                            ?>
                                <div class="item atcow_feature_product">
                                    <div class="inner_mainf">
                                    <a href="<?php echo esc_url(get_permalink( $productc->get_id() )); ?>">
                                        
                                            <div class="atcpw_left_div"><?php 
                                                echo wp_kses( $productc->get_image(), [
                                                    'img' => [
                                                        'src'      => true,
                                                        'class'    => true,
                                                        'width'    => true,
                                                        'height'   => true,
                                                        'alt'      => true,
                                                    ],
                                                ] ); ?>
                                            </div>
                                            <div class="atcpw_right_div">
                                                <h3 style="color: <?php echo esc_attr($atcpw_comman[ 'atcpw_sld_product_ft_clr']); ?>;font-size: <?php echo esc_attr($atcpw_comman[ 'atcpw_sld_product_ft_size']); ?>px;"><?php echo esc_attr($title); ?></h3>
                                                <span style="color: <?php echo esc_attr($atcpw_comman['atcpw_sld_product_ft_clr']); ?>;font-size: <?php echo esc_attr($atcpw_comman['atcpw_sld_product_ft_size']); ?>px;"><?php echo wc_price($price); ?></span>

                                                <?php

                                               	if ($productc->get_type() == 'simple') {
                                               		echo "<a href='?add-to-cart=".esc_attr($value)."' data-quantity='1' class='atcpw_pslide_atc' data-product_id='".esc_attr($value)."' style='background-color: ".esc_attr($atcpw_comman['atcpw_ft_btn_clr'])."; color: ".esc_attr($atcpw_comman[ 'atcpw_ft_btn_txt_clr']).";'>".esc_attr($atcpw_comman['atcpw_slider_atcbtn_txt'])."</a>";
                                               	} elseif ($productc->get_type() == 'variable' ) {
                                               		echo "<a href='".esc_url(get_permalink($value))."' data-quantity='1' class='atcpw_pslide_prodpage' data-product_id='".esc_attr($value)."' style='background-color: ".esc_attr($atcpw_comman[ 'atcpw_ft_btn_clr'])."; color: ".esc_attr($atcpw_comman[ 'atcpw_ft_btn_txt_clr']).";'>".esc_attr($atcpw_comman['atcpw_slider_vwoptbtn_txt'])."</a>";
                                               	} elseif ($productc->get_type() == 'variation') {
                                               		$prod_id = $productc->get_parent_id();
                                               		echo "<a href='?add-to-cart=".esc_attr($value)."' data-quantity='1' class='atcpw_pslide_atc' data-product_id='".esc_attr($prod_id)."' variation-id='".esc_attr($value)."' style='background-color: ".esc_attr($atcpw_comman[ 'atcpw_ft_btn_clr'])."; color: ".esc_attr($atcpw_comman[ 'atcpw_ft_btn_txt_clr']).";'>".esc_attr($atcpw_comman[ 'atcpw_slider_atcbtn_txt'])."</a>";
                                                    
                                               	}
                                                ?>
                                            </div>
                                    </a>
                                     </div>
                                </div>
                            <?php
                            }
                        }

                    }
                ?>
            </div>

            <script type="text/javascript">
            	var leftArrow = '<?php echo ATCPW_PLUGIN_DIR; ?>' + '/assets/images/left-arrow.svg';
    			var rightArrow = '<?php echo ATCPW_PLUGIN_DIR; ?>' + '/assets/images/right-arrow.svg';

            	jQuery('.atcpw_slider_inn').owlCarousel({
			        loop:true,
			        margin:10,
			        nav:true,
			        navText:["<img src='"+leftArrow+"'>", "<img src='"+rightArrow+"'>"],
			        navClass:['owl-prev', 'owl-next'],
			        dots: false,
			        autoplay:true,
			        autoplayTimeout:3000,
			        autoplayHoverPause:true,
			        responsive:{
			            0:{
			                items:1
			            },
			            600:{
			                items:1
			            },
			            1000:{
			                items:1
			            }
			        }
			    })
            </script>
            <?php

            $atcpw_fragslider = ob_get_clean();
            $fragments['div.atcpw_slider_inn'] = $atcpw_fragslider;
            return $fragments;
        }

        function ATCPW_ajax_empty_cart_action(){
            ob_start();
            WC()->cart->empty_cart();
            die();
        }

        function ATCPW_ajax_product_remove() {
            ob_start();
            foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
                if($cart_item['product_id'] == $_POST['product_id'] && $cart_item_key == $_POST['cart_item_key'] )
                {
                    WC()->cart->remove_cart_item($cart_item_key);
                }
            }

            WC()->cart->calculate_totals();
            WC()->cart->maybe_set_cart_cookies();

            woocommerce_mini_cart();

            $mini_cart = ob_get_clean();

            // Fragments and mini cart are returned
            $data = array(
                'fragments' => apply_filters( 'woocommerce_add_to_cart_fragments', array(
                        'div.widget_shopping_cart_content' => '<div class="widget_shopping_cart_content">' . $mini_cart . '</div>'
                    )
                ),
                'cart_hash' => apply_filters( 'woocommerce_add_to_cart_hash', WC()->cart->get_cart_for_session() ? md5( json_encode( WC()->cart->get_cart_for_session() ) ) : '', WC()->cart->get_cart_for_session() )
            );

            wp_send_json( $data );

            die();
        }
        
        function ATCPW_change_qty_cust() {

            $c_key = sanitize_text_field($_REQUEST['c_key']);
            $qty = sanitize_text_field($_REQUEST['qty']);
            WC()->cart->set_quantity($c_key, $qty, true);
            WC()->cart->set_session();
            exit();
        }

        function ATCPW_single_added_to_cart_event(){
            global $atcpw_comman;
            if( isset($_POST['add-to-cart']) && isset($_POST['quantity']) ) {?>
                <script>

                    jQuery(function($){

                        jQuery('.atcpw_cart_basket').click();

                    });

                </script>
                <?php
            }
        }

        function ATCPW_prod_slider_ajax_atc() {

            $product_id = apply_filters('woocommerce_add_to_cart_product_id', absint($_POST['product_id']));
            $quantity = empty($_POST['quantity']) ? 1 : wc_stock_amount($_POST['quantity']);
            $variation_id = absint($_POST['variation_id']);
            $passed_validation = apply_filters('woocommerce_add_to_cart_validation', true, $product_id, $quantity);
            $product_status = get_post_status($product_id);

            if ($passed_validation && WC()->cart->add_to_cart($product_id, $quantity, $variation_id) && 'publish' === $product_status) {

                do_action('woocommerce_ajax_added_to_cart', $product_id);

                if ('yes' === $atcpw_comman['woocommerce_cart_redirect_after_add']) {
                    wc_add_to_cart_message(array($product_id => $quantity), true);
                }

                WC_AJAX::get_refreshed_fragments();
            } else {

                $data = array(
                    'error' => true,
                    'product_url' => apply_filters('woocommerce_cart_redirect_after_error', get_permalink($product_id), $product_id));

                echo wp_send_json($data);
            }

            wp_die();
        }
    }
    ATCPW_front::instance();
}