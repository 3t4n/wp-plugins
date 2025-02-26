<?php
/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://sharabindu.com
 * @since      2.0.7
 *
 * @package    mini-cart-for-woocommerce
 * @subpackage mini-cart-for-woocommerce/inc
 * @author     Sharabindu Bakshi <plugins@sharabindu.com>
 */
class whmc_lightCart {
	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    2.0.7
	 */

	 function __construct(){


		add_action( 'wp_head', array( $this ,'ace_product_page_head' ));

	 	add_filter( "woocommerce_loop_add_to_cart_args", array( $this ,'filter_wc_loop_add_to_cart_args'), 20, 2 );		
	}
	function filter_wc_loop_add_to_cart_args( $args, $product ) {
	    if ( $product->supports( 'ajax_add_to_cart' ) && $product->is_purchasable() && $product->is_in_stock() ) 
	    {
	        $args['attributes']['data-product_name'] = $product->get_name();
	        $args['attributes']['data-product_image'] = wp_get_attachment_image_url( $product->get_image_id(), 'thumbnail');   
	    }
	    return $args;
	}


	function ace_product_page_head(){
	    require WHMC_LIGHT_PATH . 'admin/partials/whmc-data.php';
    if($notification_imageremovet =='checked'){
        $display = 'none';
    }else{
    $display = 'inline-block';
    }
	 ?>

		<style type="text/css">
    span.whmc-confetti-container img {
        display: <?php echo esc_attr($display) ?>;
    }
    .whmc_btm_notification {
        background: <?php echo esc_attr($notifications_bg_color);?>;
        color: <?php echo esc_attr($notifications_title_color);?>;
    }

    .shopping-cart{
    left: <?php echo esc_attr($left);
     ?>;
    right: <?php echo esc_attr($right);
     ?>;
    bottom: <?php echo esc_attr($bottom);?>;
    margin: <?php echo esc_attr($postion_range_bottom);?>% <?php echo esc_attr($postion_range);?>%;
    background: <?php echo esc_attr($fcp_cart_bgs);?>;
}
#menuiconid{
    color: <?php echo esc_attr($wmhc_header_bubble_color);?>;
    font-size: <?php echo esc_attr($fcp_menu_cart_size);?>px;
}
 #pm_menu.pm_open {
    <?php echo esc_attr($cart_position);
     ?>
}
 #pm_menu {
    <?php echo esc_attr($cart_positionanimat);
     ?>
}
.cloasebtnwrap {
    <?php echo esc_attr($whmcrelaright);?>: 13px;
}
 #mini-cart-count_footer{
     color:<?php echo esc_attr($whmc_cart_bubble_color);
     ?>;
     background:<?php echo esc_attr($fcp_cart_bubble_bg_color);
     ?>;
}
 .whmc-coupon,.whmc-modal {
     <?php echo esc_attr($whmcmodel_position);
     ?>
}
 .whmc-coupon.sidecartright,.whmc-modal.sidecartright{
    <?php echo esc_attr($whmcmodel_r_position);
     ?>
}
 span#topart_count_s {
     color:<?php echo esc_attr($wmhcside_topbtxbclr) ?>;
     background:<?php echo esc_attr($wmhcside_toppartbbclr) ?>;
}
 #pm_menu,.whmc-empty-cart{
     height: <?php echo esc_attr($height) ?>;
     background: <?php echo esc_attr($wmhc_cart_side_top_background) ?> 
}
 .whmc-cart-total-wrap {
     border-top-style:<?php echo esc_attr($wmhc_cartttlborder);
     ?>;
     border-top-color:<?php echo esc_attr($wmhc_cartttlborclr);
     ?>;
}
 .whmc-cart-item-wrap{
     border-bottom: 1px <?php echo esc_attr($wmhc_bottomborder);
     ?> <?php echo esc_attr($wmhc_bottmborderclr);?> 
}
 .cart-item-data-field a{
     color: <?php echo esc_attr($wmhc_cart_side_text_color)?>;
     font-size: <?php echo esc_attr($wmhc_cart_side_text_size);
    ?>px;
}
 .whmc-item-price span{
     color: <?php echo esc_attr($wmhc_cart_side_price_color)?> !important;
     font-size: <?php echo esc_attr($wmhc_cart_side_price_size);
    ?>px!important;
}
.whmc-cart-subtotal-wrap, .whmc-subtotal-amount span{
     color: <?php echo esc_attr($wmhc_cart_side_subtotal);
     ?>!important;
     font-size: <?php echo esc_attr($wmhc_cart_side_subtoral_font);
    ?>px!important;
}
 .taxrates,span.taxtgfree span{
     color: <?php echo esc_attr($wmhc_shipping_Color);
     ?> !important ;

     font-size: <?php echo esc_attr($wmhc_cart_shipping_font);
    ?>px!important;
}
 .whmc-cart-discount-wrap span{
     color: <?php echo esc_attr($wmhc_discount_color);
     ?>!important;
     font-size: <?php echo esc_attr($wmhc_cart_discount_font);
    ?>px!important;
}
 #totalcla span{
     color: <?php echo esc_attr($wmhc_total_color);
     ?>!important;
     font-size: <?php echo esc_attr($wmhc_cart_total_font);
    ?>px!important;
}
.whmc_ft-buttons-con a{
     background: <?php echo esc_attr($wmhc_cart_side_button_color);
     ?>!important;
         border:2px solid <?php echo esc_attr($whmc_cartborderclr);
     ?>!important;
     border-radius: <?php echo esc_attr($whmc_cartborderrdis);
     ?>px;
}
 .cart_image_iem img {
     border-radius: <?php echo esc_attr($whmc_side_img_brious);
     ?>px;
}
 .whmc_ft-buttons-con a .wmcchevkoutprocess .icons i,.whmc_ft-buttons-con a .wmcchevkoutprocess .wmctitel,.whmc_ft-buttons-con a .wmcchevkoutprocess .amounts span{
     color: <?php echo esc_attr($wmhc_cart_side_button_text_color);
    ?>!important;
}
 .whmc-body.whmc-loader:after, .whmc-carts-content.whmc-processing:after{
     content: '\<?php echo esc_attr($loadeclass);?>';
     color: <?php echo esc_attr($loadclr);?>;
}
.whmc-spinner:after {
     content: '\<?php echo esc_attr($cellloader);?>';
     color: <?php echo esc_attr($cellmoaderclr);?>;
}

<?php if($enabeloadstore == 'checked'){ ?>
    a.button.product_type_simple.add_to_cart_button.ajax_add_to_cart.loading:after {
     content: '\<?php echo esc_attr($cellloader);?>';
     color: <?php echo esc_attr($cellmoaderclr);?>;
     right: 9px;
    top:auto;
    position: absolute;
    font-family: whmcicon;
    font-size: 19px;
    -webkit-animation: 2s linear infinite whmc-spin;
    animation: 2s linear infinite whmc-spin;
    z-index: 9;
    transform: translate(-50%.-50%);
    background-color: transparent;
    width: auto;
    height:auto;
}
<?php } ?>
.shippinfrescla, span#shipcion, .shippingfree span{
    color: <?php echo esc_attr($wmhc_cart_shipping); ?> !important;
    font-size: <?php echo esc_attr($wmhc_cart_side_shipping_font) ?>px !important;
}
.whmcsavevalus, .whmcsavevalus span {
    font-size:  <?php echo esc_attr($whmc_svaevluft);?>px !important;
    color:  <?php echo esc_attr($whmc_svaecolor);?> !important;
}

span.cart_count_header,span.icon_minus,span.cart_count_total .amount{
      color: <?php echo esc_attr($wmhc_header_text_color);?>;
          }
span.cart_count_header{
background: <?php echo esc_attr($wmhch_bubbles_color);?>;
color:  <?php echo esc_attr($wmhch_bubbles_txt);?>;
}
.cart_menu_li.li_two #menuiconid,.cart_menu_li.li_three #menuiconid,.cart_menu_li #menuiconid{
color: <?php echo esc_attr($wmhc_header_bubble_color);?>;
font-size:<?php echo esc_attr($fcp_menu_cart_size);?>px;
}
span.cart_count_total .amount{
font-size: <?php echo esc_attr($fcp_menu_txt_size);?>px;
}
                </style>
	<?php

	}

}


if(class_exists("whmc_lightCart")){

	new whmc_lightCart;
}