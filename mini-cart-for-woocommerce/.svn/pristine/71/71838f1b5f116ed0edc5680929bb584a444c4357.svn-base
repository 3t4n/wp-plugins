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

class MCFWC_cartFrontend
{
    function __construct()
    { 
        add_filter('woocommerce_add_to_cart_fragments', array(
            $this,'add_to_cart_fragments'), 10, 1);


        add_filter('woocommerce_update_order_review_fragments', array($this,'add_to_cart_fragments'), 10, 1);       

        add_action('wp_ajax_remove_item', array(
            $this,'cart_remove_item'));
        add_action('wp_ajax_nopriv_remove_item', array(
            $this,'cart_remove_item'));

        add_action('wp_ajax_whmc_sal_add_to_cart',array($this, 'add_to_cart'));  

        add_action('wp_ajax_nopriv_whmc_sal_add_to_cart', array($this, 'add_to_cart')); 




        add_action('wp_ajax_get_refresh_fragments', array(
            $this,
            'get_refreshed_fragments'
        ));
        add_action('wp_ajax_nopriv_get_refresh_fragments', array(
            $this,
            'get_refreshed_fragments'
        ));
        
  

 
        
    }
 
    /* Add to cart is performed by woocommerce as 'add-to-cart' is passed */
    public function add_to_cart()
    {
        $nonce = wp_create_nonce( 'whmc-nonce' );
      if ( ! wp_verify_nonce( $nonce, 'whmc-nonce' ) ) return;
        if (!isset($_POST['add-to-cart'])) {
            return;
        }

        if (empty(wc_get_notices('error'))) {
            // trigger action for added to cart in ajax
            do_action('woocommerce_ajax_added_to_cart', intval($_POST['add-to-cart']));
        }

        $this->get_refreshed_fragments();
    }

    public function add_to_cart_fragments($fragments)
    {
    require WHMC_LIGHT_PATH . 'admin/partials/whmc-data.php';
        WC()->cart->calculate_totals();
        WC()->cart->maybe_set_cart_cookies();
        global $woocommerce;
        ob_start();?>
    <div class="whmc-cart-item-wrap">
     <?php
        if (!WC()->cart->is_empty()) {?>
    <div class="whmc-mini-cart">
      <?php $items = WC()->cart->get_cart();
            foreach ($items as $itemKey => $itemVal) {?>
        <div class="whmc-cart-items" data-itemId="<?php echo esc_attr($itemVal['product_id']);?>" data-cKey="<?php
                echo esc_attr($itemVal['key']);?>">
                    <div class="whmc-cart-items-inner">
                        <?php
    $product = apply_filters("woocommerce_cart_item_product", $itemVal["data"], $itemVal, $itemKey);
    $product_id = apply_filters("woocommerce_cart_item_product_id", $itemVal["product_id"], $itemVal, $itemKey);
    $product_permalink = apply_filters("woocommerce_cart_item_permalink", $product->is_visible() ? $product->get_permalink($itemVal) : "", $itemVal, $itemKey);
    $product_name = $product->get_name();
    if ($product->get_type() === "variation") {
        $productname = $product->get_title();
        $itemVal["data"]->set_name($product->get_title());
    } else {
        $productname = apply_filters("woocommerce_cart_item_name", $product_name, $itemVal, $itemKey);
    }
    $product_meta = wc_get_formatted_cart_item_data($itemVal);


                ?>
    <div class="whmimagewrapper">
    <div class="whmcremovesd">
    <div class="wc_remove_btn">
    <?php echo wp_kses_post(apply_filters('woocommerce_cart_item_remove_link', sprintf('<a href="%s" class="whmc-remove"  aria-label="%s" data-cart_item_id="%s" data-cart_item_sku="%s" data-cart_item_key="%s"><span class="icon_cancel-circle"></span></a>', esc_url(wc_get_cart_remove_url($itemKey)), esc_html__('Remove this item', 'mini-cart-for-woocommerce'), esc_attr($product_id), esc_attr($product->get_sku()), esc_attr($itemKey)), esc_attr($itemKey))); ?>
    </div></div>

         <div class="cart_image_iem"><?php echo wp_kses_post($product->get_image('thumbnail'));
            ?></div>
    </div>
        <div class="whmc-item-desc">
    <div class="whmcitemprem">
        <div class="cart-item-data-field" ><a href="<?php echo esc_url($product_permalink); ?>"><?php echo wp_kses_post($productname) . wp_kses_post($product_meta); ?></a>
    </div>


    <div class="whmc-item-price">
    <?php
    $wc_product = $itemVal["data"];
    $product_price = apply_filters("woocommerce_cart_item_price", WC()->cart->get_product_price($product), $itemVal, $itemKey);
    if ($whmcpricesty == "price") {
        echo wp_kses_post($product_price);
    }
    if ($whmcpricesty == "deprice") {
        $slashed_price = $itemVal["data"]->get_price_html();
        $is_on_sale = $itemVal["data"]->is_on_sale();
        if ($is_on_sale) {
            echo wp_kses_post($slashed_price);
        } else {
            echo wp_kses_post($product_price);
        }
    }
    if ($whmcpricesty == "qty") {
        echo wp_kses_post(apply_filters("woocommerce_widget_cart_item_quantity", '<span class="quantity">' . sprintf("%s &times; %s", $itemVal["quantity"], $product_price) . "</span>", $itemVal, $itemKey));
    }
    if ($whmcpricesty == "subtotal") {
        echo wp_kses_post(WC()->cart->get_product_subtotal($wc_product, $itemVal["quantity"]));
    }
    ?>
    </div>
    </div>

        </div>

        </div> <!-- whmc-cart-items-inner -->
        </div> <!-- whmc-cart-items -->
      <?php
            }?>
                    </div> 
                    <?php
        } else {

            ?>
    <div class="whmc-empty-cart">
    <style>.whmtopcatrs{opacity:0}</style>
    <div class="whmrmtycart-zero-state">
    <div class="whmrmtycart-icon-cart">

    <?php if($choosetyps == 'icon') {?>
    <i class="<?php echo esc_attr($emptyicons); ?>" style="color: <?php echo esc_attr($emptyicclr);?>"></i>
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
        <a href="<?php echo esc_url(wc_get_page_permalink( 'shop' )) ?>" class="whmrmtycart-button" style="background:<?php echo esc_attr($whmcemptyspbtbg)?>;
    color:<?php echo esc_attr($whmcemptyspbtclr)?>;border-radius:<?php echo esc_attr($whmcemptyspbris)?>px;"><?php echo esc_html($whmcemptyshopbrn);?></a>
    </div>

    </div>
      <?php
        }
        ?>
            </div>

    <?php
        
        $cart_body_contents                   = ob_get_clean();
        $fragments['div.whmc-cart-item-wrap'] = $cart_body_contents;

       $fragments['span.cart_count_total'] = '<span class="cart_count_total">' .wc_price(WC()->cart->cart_contents_total) . '</span>';
        
        
        // Update subtotal Amount
        $get_totals                             = WC()->cart->get_totals();
        $cart_total                             = $get_totals['subtotal'];
        $cart_discount                          = $get_totals['discount_total'];
        $final_subtotal                         = $cart_total - $cart_discount;
        $subtotal                               = "<span class='whmc-subtotal-amount'>" . WC()->cart->get_cart_subtotal() . "</span>";
        $fragments['span.whmc-subtotal-amount'] = $subtotal;
        
        // Update Total Amount
        $cartTotal                                = '<span class="whmc-cart-total-amount">' . WC()->cart->get_total() . '</span>';
        $fragments['span.whmc-cart-total-amount'] = $cartTotal;


        // Update the Items Count In the Cart
        $fragments['.whmc-cart-qty-count']   = '<span class="whmc-cart-qty-count">' . esc_html__('Quantity: ', 'mini-cart-for-woocommerce') . WC()->cart->get_cart_contents_count() . '</span>';

        $fragments['span#topart_count_s'] = '<span id="topart_count_s">' . count(WC()->cart->get_cart()) . '</span>';
        
        
$whmc_menu = get_option("whmc_menu");
$whmc_option = get_option("whmc_option");
$fcpcountmenu = isset($whmc_menu['fcp_countbegavior']) ? $whmc_menu['fcp_countbegavior'] : 'cartqty';

$fcp_countbegavior = isset($whmc_option['fcp_countbegavior']) ? $whmc_option['fcp_countbegavior'] : 'cartqty';


if($fcp_countbegavior == 'cartqty'){

$footercartqty =  count(WC()->cart->get_cart());
}else{
$footercartqty = WC()->cart->get_cart_contents_count();
}
if($fcpcountmenu == 'cartqty'){

$emucartqty =  count(WC()->cart->get_cart());
}else{
$emucartqty = WC()->cart->get_cart_contents_count();
}


    $fragments["span#mini-cart-count_footer"] = '<span id="mini-cart-count_footer">' . $footercartqty . "</span>";
    $fragments["span.mini-cart-count"] = '<span class="mini-cart-count"><span class="cart_count_header">' . $emucartqty . "</span></span>";

        //$fragments['span.whmcartcount'] = '<span class="whmcartcount">' . count(WC()->cart->get_cart()) . '</span>';
     
        // Cart Basket Items Count
        $fragments['.whmc-item-count-wrap .whmc-cart-item-count'] = '<span class="whmc-cart-item-count">' . WC()->cart->get_cart_contents_count() . '</span>';
        
        if (WC()->cart->get_cart_contents_count() == 1) {
            $itemsname = esc_html__('item', 'mini-cart-for-woocommerce');
        } else {
            $itemsname = esc_html__('items', 'mini-cart-for-woocommerce');
        }
        
        $fragments['.mini-cart-item-number'] = '<span class="mini-cart-item-number">' . $itemsname . '</span>';

        return $fragments;
    }
    
    
    public function get_refreshed_fragments()
    {
        WC_AJAX::get_refreshed_fragments();
    }
    
    public function cart_remove_item()
    {
    $nonce = wp_create_nonce( 'whmc-nonce' );
      if ( ! wp_verify_nonce( $nonce, 'whmc-nonce' ) ) return;
        $cart_item_key = isset($_POST['cart_item_key']) ? sanitize_text_field(wp_unslash($_POST['cart_item_key'])) : null;

        if ( $cart_item_key ){

        WC()->cart->remove_cart_item( $cart_item_key );
        }

        $this->get_refreshed_fragments();
        
        die();
    }
    
}

new MCFWC_cartFrontend();