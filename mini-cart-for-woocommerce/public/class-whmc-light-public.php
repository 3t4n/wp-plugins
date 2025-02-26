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
class WHMC_Public_Light
{

    /**
     * The ID of this plugin.
     *
     * @since    2.0.7
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    2.0.7
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    2.0.7
     * @param      string    $plugin_name       The name of the plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version)
    {

        $this->plugin_name = $plugin_name;
        $this->version = $version;

    }

    /**
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since    2.0.7
     */
    public function enqueue_styles()
    {

        wp_enqueue_style($this->plugin_name, WHMC_LIGHT_URL . '/assets/public/css/style.css', array() , $this->version, 'all');

    }

    /**
     * Register the JavaScript for the public-facing side of the site.
     *
     * @since    2.0.7
     */
    public function enqueue_scripts()
    {


        wp_enqueue_script($this->plugin_name, WHMC_LIGHT_URL . '/assets/public/js/mcfwc-public.js', array(
            'jquery',
        ) , $this->version, true);
        $sidepanels = get_option('whmc_sidepanel');

        $wmhc_cart_side_autup = (isset($sidepanels['wmhc_cart_side_autup']) && $sidepanels['wmhc_cart_side_autup'] === 'wmhc_cart_side_autup') ? 'checked' : '';
             if($wmhc_cart_side_autup == 'checked'){
            $whmcpmopen = '';
            $whmcpmshoe = '';
            $whmcpmhide = '';               
        }else{
            $whmcpmopen = 'pm_open';
            $whmcpmshoe = 'pm_show';
            $whmcpmhide = 'pm_hide';            
        }
        $notifications = get_option('whmc_notification');
        $notification_enabes_whmc = isset($notifications['notification_enabes_whmc']) ? $notifications['notification_enabes_whmc'] : 'no';
        $notifications_rang_value = isset($notifications['wmhc_notification_added_text']) ? $notifications['wmhc_notification_added_text'] : 'added successfully';
        $notification_designs = isset($notifications['notification_designs']) ? $notifications['notification_designs'] : 'minimals';


        wp_localize_script($this->plugin_name,'whmc_frontend_js_obj',array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'addedText'  => $notifications_rang_value,
            'enablenotify' => $notification_enabes_whmc,
            'nofidesign' => $notification_designs,
            'whmcpmopen'  => $whmcpmopen,
            'whmcpmshoe'  => $whmcpmshoe,
            'whmcpmhide'  => $whmcpmhide


            )
        );
   
        include_once WP_PLUGIN_DIR .'/woocommerce/woocommerce.php';

        if (!wp_script_is('wc-add-to-cart', 'enqueued' )) {
            wp_enqueue_script( 'wc-add-to-cart',WC()->plugin_url().'/assets/js/frontend/add-to-cart.min.js', array('jquery'), WC_VERSION,true );
         }
        

    }

        public function enqueue_cart_fragment_script(){
        if( !wp_script_is( 'wc-cart-fragments', 'enqueued' ) ){
            wp_enqueue_script( 'wc-cart-fragments',WC()->plugin_url().'/assets/js/frontend/cart-fragments.min.js', array('jquery','js-cookie'), WC_VERSION,true );
        }
    }
    
    public function whmc_fotter_content()
    {
        $whmc_option = get_option('whmc_option');

        $singlular_exclude = is_singular($whmc_option);
        $wmhc_hide_footer_cart_shop = isset($whmc_option['wmhc_hide_footer_cart_shop']) && $whmc_option['wmhc_hide_footer_cart_shop'] === 'wmhc_hide_footer_cart_shop' ? 'checked' : '';
        
        $wmhc_hide_footer_cart_blog = isset($whmc_option['wmhc_hide_footer_cart_blog']) && $whmc_option['wmhc_hide_footer_cart_blog'] === 'wmhc_hide_footer_cart_blog' ? 'checked' : '';
        
        $wmhc_hide_footer_cart_home = isset($whmc_option['wmhc_hide_footer_cart_home']) && $whmc_option['wmhc_hide_footer_cart_home'] === 'wmhc_hide_footer_cart_home' ? 'checked' : '';

        $wmhc_hide_footer_cart = isset($whmc_option['wmhc_hide_footer_cart']) && $whmc_option['wmhc_hide_footer_cart'] === 'wmhc_hide_footer_cart' ? 'checked' : '';

       

        if (!empty($whmc_option))
        {
            $singlular_exclude = is_singular($whmc_option);
            $single_exclude = is_page($whmc_option);
        }
        else
        {
            $singlular_exclude = '';
            $single_exclude = '';
        }
    if($wmhc_hide_footer_cart_shop == 'checked'){

        $wmhc_hide_shop = is_shop(); 

    }else{
        $wmhc_hide_shop = ''; 
    }
    if($wmhc_hide_footer_cart_home == 'checked'){

        $frontpage = is_front_page();
    }else{
       $frontpage = ''; 
    }
    if($wmhc_hide_footer_cart_blog == 'checked'){

        $postpage = is_home();
    }else{
        $postpage = '';
    }


        $postion_range = isset($whmc_option['fcp_option_range']) ? $whmc_option['fcp_option_range'] : '4';

        $postion_range_bottom = isset($whmc_option['fcp_option_range_bottom']) ? $whmc_option['fcp_option_range_bottom'] : '11';

        $whmc_cart_color = isset($whmc_option['fcp_cart_color']) ? $whmc_option['fcp_cart_color'] : '#474747';

        $whmc_cart_bubble_color = isset($whmc_option['fcp_cart_bubble_color']) ? $whmc_option['fcp_cart_bubble_color'] : '#fff';

        $fcp_cart_bubble_bg_color = isset($whmc_option['fcp_cart_bubble_bg_color']) ? $whmc_option['fcp_cart_bubble_bg_color'] : '#fd0000';

        $fcp_cart_size = isset($whmc_option['fcp_fotter_cart_size']) ? $whmc_option['fcp_fotter_cart_size'] : '40';

        $wmhc_footer_bag_ficon = isset($whmc_option['wmhc_footer_bag_ficon']) ? $whmc_option['wmhc_footer_bag_ficon'] : 'fcp_icon_11';

        if (empty($fcp_cart_bubble_bg_color))
        {
            $fcp_cart_bubble_bg_color == '#fd0000';
        }

        if ($wmhc_hide_footer_cart or $single_exclude or $singlular_exclude or $wmhc_hide_shop or $frontpage or $postpage){
             echo '';
        }else{

         echo '<div class="shopping-cart" id="open"><span class="'.esc_attr($wmhc_footer_bag_ficon).'" style="font-size:'.esc_attr($fcp_cart_size).'px;color:'.esc_attr($whmc_cart_color).';"></span><span id="mini-cart-count_footer" class="whmc-count-loader"><span class="whmcartcount"></span></span></div>';
           } 

    $notify = get_option('whmc_notification');
    $notification_enabes_whmc = isset($notify["notification_enabes_whmc"]) ? $notify["notification_enabes_whmc"] : "no";


    if($notification_enabes_whmc == 'no'){
    echo '<div class="whmc_btm_notification"></div>';         
    }     


    }

    public function add_admin_link($items, $args){
            $options = get_option('whmc_menu');;
            $value = isset($options['whmc_menu_choose']) ? $options['whmc_menu_choose'] : '';
        if( $args->menu->term_id == ($value) ){
            $items .= '<li class="menu-item">' .do_shortcode('[whmc_mini_cart]').'</li>';
            
        }

        return $items;
    }

}