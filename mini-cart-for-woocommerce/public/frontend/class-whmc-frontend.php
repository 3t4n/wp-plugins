<?php
/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://sharabindu.com
 * @since      2.0.7
 *
 * @package    mini-cart-for-woocommerce
 * @subpackage mini-cart-for-woocommerce/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    mini-cart-for-woocommerce
 * @subpackage mini-cart-for-woocommerce/public
 * @author     Sharabindu Bakshi <plugins@sharabindu.com>
 */
class MCW_fntClass
{

    public function __construct()
    {

        add_action('wp_footer', array($this,'whmc_sidebarfunc'),21);


    }

    function whmc_sidebarfunc()
    {
      global $woocommerce , $product;

        $product_id = get_the_ID($product);
        do_action('woocommerce_before_mini_cart');
        $tax_enabled  = wc_tax_enabled() && WC()->cart->get_cart_tax() !== '';
        $has_shipping = WC()->cart->needs_shipping() && WC()->cart->show_shipping();

        require WHMC_LIGHT_PATH . 'admin/partials/whmc-data.php';

        ob_start();
            WC()->cart->calculate_totals();


        ?>

<div id="pm_menu" class="whmc-body">
<?php if($wmhc_remobetippar !='checked'){ ?>     
<div class="whmc_top_part" style="background:<?php echo esc_attr($wmhcside_toppart_bg); ?>">
    <div class="cloasebtnwrap">
        <span class="cloasebtn">&times;
        </span>
    </div>
     
    <div class="whmtopcatrs">
<?php if($fcp_top_icon!='whmcNone'){ ?>
    <div class="carttxtbtnwrap"><span class="carttxtbtn"><i class="<?php echo esc_attr($fcp_top_icon); ?>" style="color:<?php echo esc_attr($wmhcside_toppart_icon);?>"></i></span></div>
<?php } ?>
        <div class="carttxtbtnwraptct">
<?php if($wmhcside_topcartcnt != 'checked'){?>
            <span id="topart_count_s"></span>
 <?php } ?> 
<div class="whmtitr"><?php echo esc_html($wmhcside_toppartycart);?>
</div>
</div>
    
   </div>     
    </div>
<?php } ?>
<div class="whmc-cart-item-wrap">
<?php if (!WC()->cart->is_empty()) { ?>
    <div class="whmc-mini-cart">
        <?php
        $items = WC()->cart->get_cart();
        foreach ($items as $itemKey => $itemVal) {
            ?>
            <div class="whmc-cart-items" data-itemId="<?php echo esc_attr($itemVal['product_id']); ?>" data-cKey="<?php echo esc_attr($itemVal['key']); ?>">
                <div class="whmc-cart-items-inner">
                    <?php
                    $product = wc_get_product($itemVal['data']->get_id());
                    $product_id = apply_filters('woocommerce_cart_item_product_id', esc_attr($itemVal['product_id']), esc_attr($itemVal), esc_attr($itemKey));
                    ?>
                    <div class="cart_image_iem">
                        <?php echo wp_kses_post($product->get_image('thumbnail')); ?>
                    </div>

                    <div class="whmc-item-desc">
<div class="whmcitemprem">
<div class="cart-item-data-field" ><a href="<?php echo esc_url($product->get_name()); ?>">
<?php echo wp_kses_post($product->get_name()); ?>
</div></a>
<div class="wc_remove_btn">
<?php echo wp_kses_post(apply_filters('woocommerce_cart_item_remove_link', sprintf('<a href="%s" class="whmc-remove"  aria-label="%s" data-cart_item_id="%s" data-cart_item_sku="%s" data-cart_item_key="%s"><span class="icon_cancel-circle"></span></a>', esc_url(wc_get_cart_remove_url($itemKey)), esc_html__('Remove this item', 'mini-cart-for-woocommerce'), esc_attr($product_id), esc_attr($product->get_sku()), esc_attr($itemKey)), esc_attr($itemKey))); ?>
</div>
</div>


                    </div> <!-- whmc-item-desc -->
    
                </div> <!-- whmc-cart-items-inner -->
            </div> <!-- whmc-car-items -->
            <?php
        } // product foreach loop ends
        ?>
    </div> <!-- whmc-mini-cart -->
 <?php } else { ?>
    <div class="whmc-empty-cart">
<div class="whmrmtycart-zero-state">
<div class="whmrmtycart-icon-cart">

    <?php if($choosetyps == 'icon') {?>
    <i class="<?php echo esc_attr($emptyicons) ?>" style="color: <?php echo esc_attr($emptyicclr);?>"></i>
    <?php }if($choosetyps == 'image'){

    $id  = attachment_url_to_postid( $wmhupimage);


    $imgalt = get_post_meta( $id, '_wp_attachment_image_alt', true );

    ?>
    <div class="wmcemptyimg">
    <img src="<?php echo esc_url($wmhupimage) ?>" alt="<?php echo esc_attr($imgalt); ?>"> 
    </div>  
    <?php } ?>
    </div>
        <div class="whmrmtycart-zero-state-title"><?php echo esc_html($whmx_no_cart_text_value);?></div>
        <div class="whmrmtycart-zero-state-text"><?php echo esc_html($whmcfillcart);?></div>
        <a href="<?php echo esc_url(wc_get_page_permalink( 'shop' )) ?>" class="whmrmtycart-button"><?php echo esc_html($whmcemptyshopbrn);?></a>
    </div>

    </div>
<?php } ?>

</div>
<!-- Coupons -->

<div class="whmc-bottom-part">

<!-- Summary -->
<div class="whmc-buy-summary">


    <?php if($wmhc_cart_subtotal_remove != 'checked' ){ ?>


    <div class='whmc-cart-subtotal-wrap'>
        <?php
        $get_totals = WC()->cart->get_totals();
        $cart_total = $get_totals['subtotal'];
        $cart_discount = $get_totals['discount_total'];
        $final_subtotal = $cart_total - $cart_discount;
        ?><span style="color: <?php echo esc_attr($wmhc_cart_side_subtotal); ?>;font-size: <?php echo esc_attr($wmhc_cart_side_subtoral_font); ?>px">
        <label class='whmc-total-label'><?php echo esc_html($sidepanels_subtototal_value); ?></label></span>

        <span class='whmc-subtotal-amount'>
            <?php echo wp_kses_post( WC()->cart->get_cart_subtotal()); ?>
        </span>
    </div>
    <?php } 
   
    if(!empty ($wmhc_subcstxt)){
    echo '<small>'.esc_html($wmhc_subcstxt).'</small>';
    }
    ?>
 

    </div>
 
    <?php if($wmhc_cart_total_remove != 'checked' ){ ?>

    <div class="whmc-cart-total-wrap" id="totalcla"><span>
        <label><?php echo esc_html($wmhcside_btm_total); ?></label></span>
        <span class="whmc-cart-total-amount"><?php echo wp_kses_post(WC()->cart->get_total()); ?></span>
    </div>
    <?php } ?>

<div class="whmc_ft-buttons-con">
    <a href="<?php echo esc_url(wc_get_checkout_url()); ?>"  class="chekouttxtvalues"> 
<div class="wmcchevkoutprocess">
        <?php if($wmhc_chkcaricon != 'checked'){ ?>   
  <div class="icons">
      <i class="fcp_icon_7"></i>
  </div>  
     <?php } ?>
  <div class="wmctitel">
 <?php echo esc_html($options_chekout_text_value); ?>
  </div>
      <?php if($wmhc_chkbtnamot != 'checked'){ ?> 
  <div class="amounts">
        <span class="whmc-cart-total-amount"><?php echo wp_kses_post(WC()->cart->get_total()); ?></span>
  </div>
   <?php } ?>
</div>
    </a>
  </div>  
    <?php if($wmhc_cart_side_hide_kshop != 'checked'){ 

if($whmclinkbehavior == 'shoplink'){ 
    $classname= '';
    $lninale = wc_get_page_permalink( 'shop' );
}else{

    $classname= 'whmckeepshooping';
    $lninale = '#';
}


        ?>
    <a href="<?php echo esc_url($lninale); ?>" class="<?php echo esc_attr($classname) ?>" id="whmckeepshooping"><?php echo esc_html($whmc_keepshop_text_value); ?></a>
    <?php } ?>

    </div>

    </div>
    </div>

    <?php


    }
}

if (class_exists('MCW_fntClass'))
{
    new MCW_fntClass;
}

