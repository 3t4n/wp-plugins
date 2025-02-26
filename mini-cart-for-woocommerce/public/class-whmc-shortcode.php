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


    class whmcLightShortcode{
    /**
     * summary
     */
    public function __construct()
    {
      
      add_action( 'init', array( $this, 'whmc_register_shortcodes')); 
    }

        public function whmc_register_shortcodes()
        {

            add_shortcode('whmc_mini_cart', array(
                $this,
                'whmc_mini_cart_func'
            ));

        }
       
        public function whmc_mini_cart_func($menu)
        {
            $whmc_option = get_option('whmc_menu');

            $fcp_icon_option = isset($whmc_option['fcp_icon_option']) ? $whmc_option['fcp_icon_option'] : 'fcp_icon_2';

            $fcp_menu_style = isset($whmc_option['fcp_menu_cart_style']) ? $whmc_option['fcp_menu_cart_style'] : 'fcp_menu_0';
           $wmhc_hide_text_color =  (isset($whmc_option['wmhc_hide_text_color']) && $whmc_option['wmhc_hide_text_color'] === 'wmhc_hide_text_color') ? 'checked' : '';
       $whmc_meiconbeha = isset($whmc_option['whmc_meiconbeha']) ? $whmc_option['whmc_meiconbeha'] : 'sidebar';
        if($whmc_meiconbeha == 'cartpage'){
            $class = "";
             $cartis = "a";
            $cartpage = 'href="'.wc_get_page_permalink( 'cart' ).'"';
        }else{
        $class = "cart_menu_li";
        $cartpage = "";  
        $cartis = "div";  
        }

            if ($wmhc_hide_text_color)
            {
                $wmhc_hide_text_color = '';
            }
            elseif($wmhc_hide_text_color != 'checked' && ($fcp_menu_style == 'fcp_menu_2')){

             $wmhc_hide_text_color = '<span class="icon_minus"></span><span class="cart_count_total "></span>';   
            }
            else{
                $wmhc_hide_text_color = '<span class="cart_count_total"></span>';
            } 


            if ($fcp_menu_style == 'fcp_menu_3')
            {

                $fcp_menu_style_wrap = '<li class="menu-item"><'.$cartis.'  ' .$cartpage.' class="'.$class.' li_three"><div id="menuiconwrap">
                <span class="'.$fcp_icon_option.'" id="menuiconid"></span></div>'. $wmhc_hide_text_color . '</'.$cartis.'></li>';
            }

            elseif ($fcp_menu_style == 'fcp_menu_2')
            {
                $fcp_menu_style_wrap = '<li class="menu-item"><'.$cartis.'  ' .$cartpage.'   class="'.$class.'  li_two"><div id="menuiconwrap">
                    <span class="'.$fcp_icon_option.'" id="menuiconid"></span>
        <span class="mini-cart-count" style=""><span class="cart_count_header"></span></span>
        </div> ' . $wmhc_hide_text_color . '</'.$cartis.'></li>';
            }
            elseif ($fcp_menu_style == 'fcp_menu_1')
            {

                $fcp_menu_style_wrap = '<li class="menu-item"><'.$cartis.'  ' .$cartpage.'    class="'.$class.'"><div id="menuiconwrap">
                    <span class="'.$fcp_icon_option.'" id="menuiconid"></span><span class="mini-cart-count">
                    </span></div>' . $wmhc_hide_text_color . '</'.$cartis.'></li>';
            }
            else{

                $fcp_menu_style_wrap = '<li class="menu-item"><'.$cartis.'  ' .$cartpage.'  class="'.$class.'  menu-link"><div id="menuiconwrap" class="icons02">
                    <span class="'.$fcp_icon_option.'" id="menuiconid"></span><span class="mini-cart-count">
                    </span></div>'.'</'.$cartis.'></li>';
            }

            $menu = $fcp_menu_style_wrap;
        
            return $menu;

        }
}
if (class_exists('whmcLightShortcode'))
{
    new whmcLightShortcode;
};

