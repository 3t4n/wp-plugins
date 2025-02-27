<?php 
namespace PSSG_Sync_Sheet\Framework;

use CA_Framework\App\Notice as Notice;

include_once __DIR__ . '/ca-framework/framework.php';

if( ! class_exists( 'Plugin_Required' ) ){

    class Plugin_Required
    {
        public static $coupon_code = 'INTROSALE';
        public static $last_date = '31 Mar 2024';
        public static $PRO_DEV_VERSION ;

        public static $css_file_url;
        public static $css_version = '1.0.0';

        public static $stop_next = 0;

        public static function initialize()
        {

            self::$PRO_DEV_VERSION = defined( 'PSSGP_DEV_VERSION' );
            self::$css_file_url = trailingslashit( PSSG_BASE_URL ) . 'assets/css/notice.css';
        }

        public static function check()
        {

            self::display_notice();
        }

        /**
         * Normal Notice for Only Free version
         *
         * @return void
         */
        public static function display_notice()
        {
            if( ! is_admin() ) return;

            $return_true = apply_filters( 'pssg_offer_show_all', true );
            if( !$return_true ) return;

            self::initialize();


            $last_date = self::$last_date; //Last date string to show offer
            $last_date_timestamp = strtotime( $last_date );
            
            if( time() > $last_date_timestamp ) return;

            $temp_numb = 5;// rand(4,5);
            //eta sudhu matro amader selected plugin er kkhetre always ba all time show korbe add
            //Only when in product table page, So it will show always
            $s_id = $_SERVER['REQUEST_URI'] ?? '';
            if( strpos( $s_id, 'pssg') !== false ){
                if( self::$PRO_DEV_VERSION ){
                    self::OtherOffer($temp_numb, $s_id);
                    return;
                }else{
                    self::AllOfferWithOwnOffer($temp_numb, $s_id);
                }

                return;
            }
            

            $return_true = apply_filters( 'pssg_offer_show', true );
            if( !$return_true ) return;

            /**
             * eTa muloto seisob kustomer er jonno
             * jara oofer message dekhe khub birokto hoyeche, eTa tader jonno. 
             * 
             * add_filter('pssg_offer_show', '__return_false'); 
             * taholei offer showing off hoye jabe.
             */

            $temp_numb = 5;// rand(1,14);
            if( self::$PRO_DEV_VERSION ){
                self::OtherOffer( $temp_numb);
                return;
            }
            self::AllOfferWithOwnOffer( $temp_numb );
            
        }

        /**
         * It will show other plugin offer also this plugin's offer
         *
         * @param integer $probability
         * @return void
         */
        protected static function AllOfferWithOwnOffer( $probability = 5 )
        {
            self::Notice( $probability);
            $this_rand = rand(1,9);
            if( $this_rand <= 3 ){
                self::Notice( $probability);
            }else{
                self::OtherOffer( $probability);
            }
        }
        protected static function OtherOffer( $probability = 5 )
        {
            
            if( $probability !== 5 ) return;
            $fullArgs = [
                [
                    'plugin_id' => 'woo-product-table/woo-product-table.php',
                    'title' => 'Woo Product Table - Product Table for WooCommerce by CodeAstrology',
                    'coupon_code' => self::$coupon_code,
                    'target_url' => 'https://wordpress.org/plugins/woo-product-table/',
                    'img_url' => 'https://ps.w.org/woo-product-table/assets/icon-256x256.png',
                    'message' => 'Helps you to display your products in a searchable table layout with filters.', 
                    'button_text' => 'Free Download Now',
                    'coupon_show_bool' => false,
                ],
                [
                    'plugin_id' => 'woo-product-table-pro/woo-product-table-pro.php',
                    'title' => 'Woo Product Table Pro - Product Table for WooCommerce by CodeAstrology',
                    'coupon_code' => self::$coupon_code,
                    'target_url' => 'https://wooproducttable.com/?discount=' . self::$coupon_code . '&campaign=' . self::$coupon_code . '&ref=1&utm_source=Default_Offer_LINK',
                    'img_url' => 'https://ps.w.org/woo-product-table/assets/icon-256x256.png',
                    'message' => 'Table for Variable Product, Table on Taxonomy/Category/Tag page, Custom Query, Query on any type taxonomy.', 
                    'button_text' => 'Get with Exclusive Features',
                    'coupon_show_bool' => true,
                ],


                [
                    'plugin_id' => 'product-sync-master-sheet-premium/init.php',
                    'title' => self::$coupon_code . ' - Sync master sheet Premium (Sync via Google Sheet)',
                    'coupon_code' => self::$coupon_code,
                    'target_url' => 'https://codeastrology.com/downloads/product-sync-master-sheet-premium/?discount=' . self::$coupon_code . '&campaign=' . self::$coupon_code . '&ref=1&utm_source=Default_Offer_LINK',
                    'img_url' => 'https://ps.w.org/product-sync-master-sheet/assets/icon-256x256.png',
                    'message' => 'Sync with Google Sheets,Sync with multiple website, Unlimited products sync, Custom Query, Show Hide any column, Product Variation, Product Category, Product Tag, Product Custom Taxonomy special query based.', 
                    'button_text' => 'Start to Sync with Google Sheets',
                ],
                
                [
                    'plugin_id' => 'product-sync-master-sheet/product-sync-master-sheet.php',
                    'title' => 'Sync master sheet - Edit,Update, Stock Sync from Google Sheet also from another Website',
                    'coupon_code' => self::$coupon_code,
                    'target_url' => 'https://wordpress.org/plugins/product-sync-master-sheet/',
                    'img_url' => 'https://ps.w.org/product-sync-master-sheet/assets/icon-256x256.png',
                    'message' => 'Seamlessly connect your WooCommerce store with Google Sheets via the Google Sheets API. Also sync with multiple website.', 
                    'button_text' => 'Free Download Now',
                    'coupon_show_bool' => false,
                ],
                

                [
                    'plugin_id' => 'WC_Min_Max_Quantity/wcmmq.php',
                    'title' => self::$coupon_code . ' Offer - Min Max Control (PRO)',
                    'coupon_code' => self::$coupon_code,
                    'target_url' => 'https://codeastrology.com/min-max-quantity/?discount=' . self::$coupon_code . '&campaign=' . self::$coupon_code . '&ref=1&utm_source=Default_Offer_LINK',
                    'img_url' => 'https://ps.w.org/woo-min-max-quantity-step-control-single/assets/icon-256x256.png',
                    'message' => 'Offers to display specific products with minimum, maximum quantity.', 
                    'button_text' => 'Ok, Test It',
                ],
                [
                    'plugin_id' => 'woo-min-max-quantity-step-control-single/wcmmq.php',
                    'title' => 'Min Max Control - Min Max Quantity & Step Control for WooCommerce',
                    'coupon_code' => self::$coupon_code,
                    'target_url' => 'https://wordpress.org/plugins/wc-quantity-plus-minus-button/',
                    'img_url' => 'https://ps.w.org/woo-min-max-quantity-step-control-single/assets/icon-256x256.png',
                    'message' => 'Min Max Control - offers to set product minimum & maximum quantity and step.', 
                    'button_text' => 'Free Download Now',
                ],


                [
                    'plugin_id' => 'ultraaddons-elementor-lite/init.php',
                    'title' => self::$coupon_code . ' Offer - UltraAddons Elementor PRO',
                    'coupon_code' => self::$coupon_code,
                    'target_url' => 'https://ultraaddons.com/pricing/?discount=' . self::$coupon_code . '&campaign=' . self::$coupon_code . '&ref=1&utm_source=Default_Offer_LINK',
                    'img_url' => 'https://ps.w.org/ultraaddons-elementor-lite/assets/icon-128x128.png',
                    'message' => 'Give Floating Effects For Animations. Now you can create stunning floating animation using UltraAddons exclusive floating feature', 
                    'button_text' => 'Get it Now',
                ],
                [
                    'plugin_id' => 'sheet-to-wp-table-for-google-sheet/sheet-to-wp-table-for-google-sheet.php',
                    'title' => 'Sheet to Table Live Sync for Google Sheet',
                    'coupon_code' => self::$coupon_code,
                    'target_url' => 'https://wordpress.org/plugins/sheet-to-wp-table-for-google-sheet/',
                    'img_url' => 'https://s.w.org/plugins/geopattern-icon/sheet-to-wp-table-for-google-sheet.svg',
                    'message' => 'Show your Google Sheet by Shortcode, Anywhere of your site. Live Sync Google Sheet, Smart Caching for Instant Loading.', 
                    'button_text' => 'Free Download Now',
                ],
                [
                    'plugin_id' => 'wc-quantity-plus-minus-button/init.php',
                    'title' => 'Quantity Plus Minus Button for WooCommerce by CodeAstrology',
                    'coupon_code' => self::$coupon_code,
                    'target_url' => 'https://wordpress.org/plugins/wc-quantity-plus-minus-button/',
                    'img_url' => 'https://ps.w.org/wc-quantity-plus-minus-button/assets/icon-128x128.png',
                    'message' => 'Add Quantity Plus Minus Button to your Product page and Shop Page for WooCommerce.', 
                    'button_text' => 'Free Download Now',
                ],
                
                [
                    'plugin_id' => 'codeastrology/all-plugins-premium',
                    'title' => self::$coupon_code . ' - CodeAstrology all plugins',
                    'coupon_code' => self::$coupon_code,
                    'target_url' => 'https://codeastrology.com/downloads/category/premium/?discount=' . self::$coupon_code . '&campaign=' . self::$coupon_code . '&ref=1&utm_source=Default_Offer_LINK',
                    'img_url' => 'https://i0.wp.com/codeastrology.com/wp-content/uploads/2022/02/Code-Astrology-animated-logo-1.gif',
                    'message' => 'Control WooCommerce products to Show as Table, To Sync with Google Sheet, to control quantity with minimum, maximum quantity.', 
                    'button_text' => 'Checkout our Plugins',
                ],
                [
                    'plugin_id' => 'codeastrology/all-plugins-free',
                    'title' => 'Get all Free Plugins for WooCommrce',
                    'coupon_code' => self::$coupon_code,
                    'target_url' => 'https://codeastrology.com/downloads/category/free-products/?discount=' . self::$coupon_code . '&campaign=' . self::$coupon_code . '&ref=1&utm_source=Default_Offer_LINK',
                    'img_url' => 'https://i0.wp.com/codeastrology.com/wp-content/uploads/2022/02/Code-Astrology-animated-logo-1.gif',
                    'message' => 'Control WooCommerce products to Show as Table, To Sync with Google Sheet, to control quantity with minimum, maximum quantity.', 
                    'button_text' => 'Get it Free',
                ],

            ];

            //Now I would like to filter $fullArgs array with active plugins actually
            $active_plugins = apply_filters( 'active_plugins', get_option( 'active_plugins', array() ) );
            //Now I would like to filter $fullArgs array with active plugins actually if found $fullArgs['plugin_id'] then remove it from $fullArgs array.
            $fullArgs = array_filter($fullArgs, function($item) use ($active_plugins) {
                if(! isset($item['plugin_id'])) return true;

                $plugin_id = $item['plugin_id'];
                return !in_array($plugin_id, $active_plugins);
            });



            //Finally rearrange with new index 0,1,2,3,4,5,6,7,8,9 and so on | Specially for reindexing
            $fullArgs = array_values($fullArgs);
            
            //sob check korar por jodi empty hoy, taile null return kore dibo
            if(empty($fullArgs)) return;

            $count = count($fullArgs);
            $arr_index = rand(0, $count - 1);
            
            $rand_args = $fullArgs[$arr_index];
            self::GetCustomOffer( $rand_args, $arr_index );

        }

        protected static function GetCustomOffer( $args = ['title' => '', 'coupon_code' => '', 'target_url' => '', 'img_url' => '', 'message' => '', 'button_text' => '', 'coupon_show_bool' => true  ], $arr_index = false )
        {

            // $this->plugin_slug_pure = strtok( $this->plugin_slug, '/' );
            // $url = wp_nonce_url( self_admin_url( 'update.php?action=' . $this->status . '-plugin&plugin=' . $this->plugin_slug_pure ), $this->status . '-plugin_' . $this->plugin_slug_pure );
            //Activate
            //$url = wp_nonce_url( 'plugins.php?action=activate&amp;plugin=' . $this->plugin_slug . '&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_' . $this->plugin_slug );

            $btn_args = [];
            $button_text = $args['button_text'] ?? 'Claim Discount';
            $coupon_show_bool = $args['coupon_show_bool'] ?? true;
            if( $button_text === 'Free Download Now' ){
                $coupon_show_bool = false;
            }
            $plugin_id = $args['plugin_id'] ?? '';
            

            if(! $coupon_show_bool && ! empty( $plugin_id )){

                $plugin_slug = $plugin_id;
                $plugin_slug_pure = strtok( $plugin_id, '/' );

                $all_plugins = get_plugins();
                if( ! in_array( $plugin_id, array_keys( $all_plugins ) ) && ! is_plugin_active( $plugin_id ) ){
                    $btn_args = [
                        'text' => 'Install Now',
                        'type' => 'offer',
                        'link' => wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=' . $plugin_slug_pure ), 'install-plugin_' . $plugin_slug_pure ),
                    ];
                }elseif( in_array( $plugin_id, array_keys( $all_plugins ) ) && ! is_plugin_active( $plugin_id ) ){
                    $btn_args = [
                        'text' => 'Activate',
                        'type' => 'offer',
                        'link' => wp_nonce_url( 'plugins.php?action=activate&amp;plugin=' . $plugin_slug . '&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_' . $plugin_slug ),
                    ];
                }

                if(is_plugin_active( $plugin_id )){
                    $btn_args = [
                    ];
                }
                

                
            }
            
            /**
             * proti index er jonno alada alada id generate hobe.
             * jeno alada alada dissmiss korte hoy 
             * ebong amader plugin bade jeno alada alada dismiss korte hoy.
             * sejonno notun id generate korar jonno extra_for_id use korte hobe.
             * sei bebostha korechi. 
             */
            $coupon_code = $args['coupon_code'] ?? self::$coupon_code;
            $target = $args['target_url'] ?? 'https://wooproducttable.com/pricing/?discount=' . $coupon_code . '&campaign=' . $coupon_code . '&ref=1&utm_source=Default_Offer_LINK';
            $img_url = $args['img_url'] ?? '';
            $button_text = $args['button_text'] ?? 'Claim Discount';
            $coupon_show_bool = $args['coupon_show_bool'] ?? true;
            if( $button_text === 'Free Download Now' ){
                $coupon_show_bool = false;
            }
            $message = $args['message'] ?? ''; 
            if( $coupon_show_bool === true){
                $message .= '<h4 class="notice-coupon-code">Coupon Code: ' . $coupon_code . '</h4>';
            }
            
            $title = $args['title'] ?? self::$coupon_code . ' OFFER for Woo Product Table';
            $plugin_id = $args['plugin_id'] ?? '';
            // Remove '/' and '.php'
        

            $notice_id = $coupon_code . '_' . $coupon_code;


            $main_btn = [
                'text' => $button_text,
                'type' => 'primary',
                'link' => $target,
            ];

            if( ! empty( $btn_args ) ){
                // $main_btn = $btn_args;
            }

            $offerNc = new Notice($notice_id);
            $offerNc->set_title( $title )
            ->set_diff_limit(5)
            ->set_type('offer')
            ->set_img( $img_url)
            ->set_img_target( $target )
            ->set_message( $message );

            if( ! empty( $btn_args ) ){
                $offerNc->add_button($btn_args);
                $main_btn['text'] = 'View Details';
                $main_btn['type'] = 'primary';
                $offerNc->add_button($main_btn);
            }else{
                $offerNc->add_button($main_btn);
            }

            $offerNc->add_button([
                'text' => 'WordPress.org All Plugin',
                'type' => 'warning',
                'link' => 'https://profiles.wordpress.org/codersaiful/#content-plugins',
            ]);

            $offerNc->show();
            add_action( 'admin_enqueue_scripts', [self::class, 'admin_enqueue'] );
        }
        protected static function Notice( $temp_numb)
        {


            $coupon_Code = self::$coupon_code;
            $target = 'https://codeastrology.com/downloads/product-sync-master-sheet-premium/?discount=' . $coupon_Code . '&campaign=' . $coupon_Code . '&ref=1&utm_source=Default_Offer_LINK';
            $my_message = 'Sync with multiple website, Unlimited products sync, Custom Query, Show Hide any column, Product Variation, Product Category, Product Tag, Product Custom Taxonomy special query based.'; 
            $offerNc = new Notice('pssg_'.$coupon_Code.'_offer');
            $offerNc->set_title( self::$coupon_code . ' Offer - Sync Master Sheet (Premium)' )
            ->set_diff_limit(5)
            ->set_type('offer')
            ->set_img( 'https://ps.w.org/product-sync-master-sheet/assets/icon-256x256.png')
            ->set_img_target( $target )
            ->set_message( $my_message )
            ->add_button([
                'text' => 'Claim Discount',
                'type' => 'offer',
                'link' => 'https://codeastrology.com/min-max-quantity/?discount=' . $coupon_Code,
            ]);
            
            $offerNc->add_button([
                'text'  => 'Exclusive WooCommerce Plugins',
                'type' => 'default',
                'link'  => 'https://codeastrology.com/downloads/category/premium/?discount=' . $coupon_Code,
            ]);

            $offerNc->add_button([
                'text' => 'WordPress.org All Plugin',
                'type' => 'warning',
                'link' => 'https://profiles.wordpress.org/codersaiful/#content-plugins',
            ]);

            if($temp_numb == 5) $offerNc->show();
            add_action( 'admin_enqueue_scripts', [self::class, 'admin_enqueue'] );
        }

        public static function admin_enqueue()
        {
            wp_register_style( 'pssg-notice', self::$css_file_url, false, self::$css_version, 'all' );
            wp_enqueue_style( 'pssg-notice' );
        }
    }
}

