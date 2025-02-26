<?php

class Pi_Cdrw_Menu{

    public $plugin_name;
    public $menu;
    
    function __construct($plugin_name , $version){
        $this->plugin_name = $plugin_name;
        $this->version = $version;
        add_action( 'admin_menu', array($this,'plugin_menu') );
        add_action($this->plugin_name.'_promotion', array($this,'promotion'));

        add_action( 'admin_enqueue_scripts', array($this,'removeConflictCausingScripts'), 1000 );

        add_action( 'woocommerce_admin_order_items_after_shipping', [__CLASS__, 'listCoupons'] );
    }

    function plugin_menu(){
        
        $this->menu = add_menu_page(
            __( 'Conditional Discount'),
            __( 'Conditional Discount'),
            'manage_options',
            'pisol-cdrw',
            array($this, 'menu_option_page'),
            plugin_dir_url( __FILE__ ).'img/pi.svg',
            6
        );

        add_action("load-".$this->menu, array($this,"bootstrap_style"));
        
 
    }

    static function  getCapability(){
        $access_control = get_option('pi_cdrw_allow_shop_manager', '0');
        if(empty($access_control)){
            $capability = 'manage_options';
        }else{
            $capability = 'manage_woocommerce';
        }

        return (string)apply_filters('pisol_cdrw_settings_cap', $capability);
    }

    public function bootstrap_style() {
        
        wp_enqueue_style( $this->plugin_name."_bootstrap", plugin_dir_url( __FILE__ ) . 'css/bootstrap.css', array(), $this->version, 'all' );

        wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/conditional-discount-rule-woocommerce-admin.css', array(), $this->version, 'all' );
        wp_enqueue_script( 'jquery-ui-datepicker' );
        wp_enqueue_style( 'jquery-ui',  plugins_url('css/jquery-ui.css', __FILE__));

        wp_enqueue_script( $this->plugin_name."_toast", plugin_dir_url( __FILE__ ) . 'js/jquery-confirm.min.js', array('jquery'), $this->version);

        wp_enqueue_style( $this->plugin_name."_toast", plugin_dir_url( __FILE__ ) . 'css/jquery-confirm.min.css', array(), $this->version, 'all' );

        wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/conditional-discount-rule-woocommerce-admin.js', array( 'jquery', 'wc-enhanced-select' ), $this->version, false );

        wp_localize_script( $this->plugin_name, 'cdrw_variables',
            array( 
                '_wpnonce' => wp_create_nonce( 'cdrw-actions' )
            )
	    );
		
	}

    function menu_option_page(){
        ?>
        <div class="bootstrap-wrapper">
        <div class="pisol-container-fluid mt-2">
            <div class="pisol-row">
                    <div class="col-12">
                        <div class='bg-dark'>
                        <div class="pisol-row">
                            <div class="col-12 col-sm-2 py-2">
                                    <a href="https://www.piwebsolution.com/" target="_blank"><img class="img-fluid ml-2" src="<?php echo plugin_dir_url( __FILE__ ); ?>img/pi-web-solution.png"></a>
                            </div>
                            <div class="col-12 col-sm-10 d-flex text-center small">
                                <?php do_action($this->plugin_name.'_tab'); ?>
                                
                            </div>
                        </div>
                        </div>
                    </div>
            </div>
            <div class="pisol-row">
                <div class="col-12">
                <div class="bg-light border pl-3 pr-3 pb-3 pt-0">
                    <div class="pisol-row">
                        <div class="col">
                        <?php do_action($this->plugin_name.'_tab_content'); ?>
                        </div>
                        <?php do_action($this->plugin_name.'_promotion'); ?>
                    </div>
                </div>
                </div>
            </div>
        </div>
        </div>
        <?php
    }

    function promotion(){
        if(isset($_GET['tab']) && $_GET['tab'] === 'pi_cdrw_add_rule') return;
        ?>
        <div class="col-12 col-md-4 mt-3">

            <div class="bg-dark text-light text-center mb-3">
                <a href="<?php echo PI_CDRW_BUY_URL; ?>&utm_ref=discount_banner" target="_blank">
                <?php  new pisol_promotion("pi_efrs_installation_date"); ?>
                </a>
            </div>

            <div class="pi-shadow">
            <div class="pisol-row justify-content-center">
                <div class="col-md-6">
                    <div class="p-2  text-center">
                        <img class="img-fluid" style="margin:auto;" src="<?php echo esc_url(plugin_dir_url( __FILE__ )); ?>img/bg.svg">
                    </div>
                </div>
            </div>
            <div class="text-center py-2">
                <a class="btn btn-success btn-sm text-uppercase mb-2 " href="<?php echo esc_url(PI_CDRW_BUY_URL); ?>&utm_ref=top_link" target="_blank">Buy Now !!</a>
                <a class="btn btn-sm mb-2 btn-secondary text-uppercase" href="https://websitemaintenanceservice.in/con_discount_demo/" target="_blank">Try Demo</a>
            </div>
            <h2 id="pi-banner-tagline" class="mb-0">Get Pro for <?php echo esc_html(PI_CDRW_PRICE); ?> Only</h2>

       <div>
                    <ul class="text-left pisol-pro-feature-list">
                    <li class="border-top font-weight-light h6"><strong class="text-primary">Generate coupon for customer for future use</strong> based on there present purchase <a href="https://www.youtube.com/watch?v=SJGS0666rv0&cc_load_policy=1" target="_blank">Check video</a></li>
                    <li class="border-top font-weight-light h6"><strong class="text-primary">Only apply one discount at a time</strong> even when user qualifies for more then one offer</li>
                    <li class="border-top font-weight-light h6">Option to  <strong class="text-primary">disallow user from applying WooCommerce coupon</strong>, when this plugin discount is applied for customer</li>
                    <li class="border-top font-weight-light h6">Limit the <strong class="text-primary">number of times</strong> a discount can be applied</li>
                    <li class="border-top font-weight-light h6">Control how many times a same discount can be applied to an <strong  class="text-primary">individual user</strong>. Uses billing email for guests, and user ID for logged in users.</li>
                    <li class="border-top font-weight-light h6">Offer discount when user is opting for <strong class="text-primary">Local pickup</strong></li>
                        <li class="border-top font-weight-light h6">When the user is from specific <strong class="text-primary">Postcode</strong></li>
                        <li class="border-top font-weight-light h6">Allows you to specify <strong class="text-primary">Range of postal code</strong> E.g: 9001...9050</li>
                        <li class="border-top font-weight-light h6">If customer is buying a specific <strong class="text-primary">Product (Support Variable Product)</strong></li>
                        <li class="border-top font-weight-light h6">Based on <strong class="text-primary">User Role</strong></li>
                        <li class="border-top font-weight-light h6">When a specific <strong class="text-primary">Payment Method</strong> is selected by the customer</li>
                        <li class="border-top font-weight-light h6">Create <strong class="text-primary">Discount Conditions</strong> based on various combinations of the above rules</li>
                        <li class="border-top font-weight-light h6">Run discount on specific <strong class="text-primary">days of the week</strong></li>
                        <li class="border-top font-weight-light h6">Offer discount based on the <strong class="text-primary">shipping method</strong> selected by the customer</li>
                        <li class="border-top font-weight-light h6">Set a message to <strong class="text-primary">describe the offer</strong> like what customer has to do to get the discount</li>
                        <li class="border-top font-weight-light h6">Set a <strong class="text-primary">different offer message</strong> for each offer</li>
                        <li class="border-top font-weight-light h6">Select <strong class="text-primary">location</strong> to show the offer message</li>
                        <li class="border-top font-weight-light h6">You can set <strong class="text-primary">condition</strong> who will be shown the offer message</li>
                        </ul>
                        <div class="text-center pb-3 pt-2">
                        <a class="btn btn-primary btn-lg" href="<?php echo PI_CDRW_BUY_URL; ?>&utm_ref=bottom_link" target="_blank">BUY PRO VERSION</a>
                    </div>
                </div>
            </div>
            </div>
        <?php
    }

    function isWeekend() {
        return (date('N', strtotime(date('Y/m/d'))) >= 6);
    }

    function removeConflictCausingScripts(){
        if(isset($_GET['page']) && $_GET['page'] == 'pisol-cdrw'){
            /* fixes css conflict with Nasa Core */
            wp_dequeue_style( 'nasa_back_end-css' );
        }
    }

    static function listCoupons($order_id){
        $order = wc_get_order($order_id);

        if(!is_object($order)){
            return;
        }

        $items = $order->get_items( 'coupon' );

        if(empty($items)){
            return;
        }

        $html = '';
        foreach($items as $item){
           $coupon = $item->get_code();
           $amount = wc_price( $item->get_discount(), array( 'currency' => $order->get_currency() ) );
           $html .= self::couponBadge($coupon, $amount); 
        }

        echo !empty($html) ? sprintf('<tr class="wc-coupon-list"><td colspan="9" class="code">%s : %s</td></tr>',__('Coupons applied', 'conditional-discount-rule-woocommerce'), $html) : $html;
    }

    static function couponBadge($coupon, $amount){
        if(strpos($coupon, 'pisol-cdrw-discount') === false){
            return sprintf('<span class="tip" style="border:1px solid #ccc; padding:4px 6px; border-radius:4px; margin-right:10px;">%s: %s</span>',$coupon, $amount);
        }else{
            $parts = explode(':', $coupon);
            if(isset($parts[1]) && is_numeric($parts[1])){
                $link = admin_url( '/admin.php?page=pisol-cdrw&tab=pi_cdrw_add_rule&action=edit&id='.$parts[1] );
                $title = get_the_title($parts[1]);

                $title = !empty($title) ? $title : $coupon;
                
                return sprintf('<a target="_blank" href="%s" class="tip" title="%s" style="border:1px solid #ccc; padding:4px 6px; border-radius:4px; margin-right:10px;">%s: %s</a>',$link, $coupon, $title, $amount); 
            }
            return sprintf('<span class="tip" style="border:1px solid #ccc; padding:4px 6px; border-radius:4px; margin-right:10px;">%s: %s</span>',$coupon, $amount);
        }
    }
}