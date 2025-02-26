<?php

/*

Aimtell +WooCommerce
Automate WooCommerce website events to drive customers back to your site using website push notifications. This plugin requires the <a href="/wp-admin/plugin-install.php?s=aimtell&tab=search&type=term">Aimtell Push Notifications</a> and <a href="/wp-admin/plugin-install.php?s=aimtell&tab=search&type=term">WooCommerce</a> plugins to increase WooCommerce sales with intelligently targeted notifications.
Version: 1.0.1

Copyright 2024 Aimtell, Inc.

*/



if (!defined('ABSPATH')) exit;

// Create a class "AimtellWooCommerce" to integrtate with the WooCommerce platform

if (!defined('ATWC_CREATED')) {

    #[\AllowDynamicProperties]
    class AimtellWooCommerce {

        public function __construct() {

            $this->init();

        }

        /**
         * Initialize the plugin. Should only be called once.
         */
        private function init() {

            // Prevent multiple instances
            if (defined('ATWC_CREATED')) return;
            // Define a constant to prevent multiple instances
            define('ATWC_CREATED', time());

            if (!defined('ATWC_DO_LOG')) define('ATWC_DO_LOG', true);

            // Start session
            if (!session_id()) {
                session_start();
            }

            // Add handlers
            $this->add_handlers();

            // Add scripts, necessary for some client side Aimtell data colelction
            $this->add_scripts();

        }

        /**
         * Get the cart ID from the session or generate a new one if necessary.
         * @param $force_update - force an update of the cart ID. This prevents returning a potentially-cached cart ID.
         * @return string - the cart ID.
         */
        private function get_cart_id($force_update=false) {

            // force update the cart id
            if ($force_update) {
                $this->clear_cart_id();
            }
            // if we already have a cart ID, return it
            if (!empty($_SESSION['aimtell_cart_id'])) {
                return $_SESSION['aimtell_cart_id'];
            }
            // generate and return new cart id
            return $this->generate_cart_id();

        }

        /**
         * Generate a new cart ID.
         * @param $store_id - store the cart ID in the session.
         * @return string - the new cart ID.
         */
        private function generate_cart_id($store_id=true) {

            // generate a new cartid
            $cart_id = md5($this->get_subscriber_uid().uniqid());
            if ($store_id) $_SESSION['aimtell_cart_id'] = $cart_id;
            return $cart_id;

        }

        /**
         * Clear the cart ID from the session. Necessary to allow for multiple carts after empty or purchase events.
         */
        private function clear_cart_id() {

            if (isset($_SESSION['aimtell_cart_id'])) {
                $this->atlog("Cart is empty! Clearing cart id ".$_SESSION['aimtell_cart_id']."...",4);
            }
            unset($_SESSION['aimtell_cart_id']);

        }

        /**
         * Add WooCommerce handlers via WordPress actions.
         */
        private function add_handlers() {
            
            // any time the cart is changed
            add_action('woocommerce_cart_updated', array($this, 'woocommerce_cart_updated'), 11, 0);

            // when items are added to cart
            add_action('woocommerce_add_cart_item_data', array($this, 'woocommerce_add_cart_item_data'), 10, 4);

        }

        /**
         * Add scripts to the header or footer via WordPress actions.
         */
        private function add_scripts() {
            
            add_action('wp_footer', [$this, 'footer_js'], 11, 0);

        }

        /**
         * Add the necessary Aimtell JS to the footer.
         */
        public function footer_js() {
            ?>
            <script type="text/javascript" data-src="atwc">
                console.log('[Aimtell] WooCommerce cart engagement boost enabled.');
                window.atTries = 0;
                window.atDur = 1000;
                function check_at_timer(){
                    setTimeout(check_at, atDur);
                }
                function check_at(){
                    // console.log('checking for aimtell ...');
                    window.atTries++;
                    window.atDur += 250;
                    if (typeof _at=='undefined' || typeof _at.idSite=='undefined' || typeof _at.subscriber=='undefined' || typeof _at.owner=='undefined') {
                        if (atTries < 10) {
                            check_at_timer();
                        }
                        return;
                    }
                    // console.log('Aimtell found!');
                    // console.log(_at);
                    // check if cookie _aimtellOwnerID is set, and if it is equal to _at.owner, if not, update it
                    // ownerId
                    var ownerId = getAtOwnerId();
                    var idSite = getIdSite();
                    var cOwnerId = getCookiedAtOwnerId();
                    // console.log(`at ownerId: `+ownerId);
                    // console.log(`at idSite: `+idSite);
                    // console.log(`ck ownerId: `+cOwnerId);
                    if (ownerId) {
                        document.cookie = '_aimtellOwnerID='+ownerId+'; path=/';
                    }
                    if (idSite) {
                        document.cookie = '_aimtellIdSite='+idSite+'; path=/';
                    }
                    if (typeof _aimtellCheckPermissions=='function') {
                        // console.log(`_aimtellCheckPermissions: `+_aimtellCheckPermissions());
                        document.cookie = '_aimtellCheckPermissions='+_aimtellCheckPermissions()+'; path=/';
                    }
                }
                function getAtOwnerId() {
                    var ownerId = '';
                    if (typeof _at.owner != 'undefined' && _at.owner) ownerId = _at.owner;
                    return ownerId;
                }
                function getIdSite() {
                    var idSite = '';
                    if (typeof _at.idSite != 'undefined' && _at.idSite) idSite = _at.idSite;
                    return idSite;
                }
                function getCookiedAtOwnerId() {
                    var ownerId = '';
                    if (document.cookie) {
                        var cookies = document.cookie.split(';');
                        for (var i=0; i<cookies.length; i++) {
                            var cookie = cookies[i].trim();
                            if (cookie.indexOf('_aimtellOwnerID=') == 0) {
                                ownerId = cookie.replace('_aimtellOwnerID=', '');
                                break;
                            }
                        }
                    }
                    return ownerId;
                }
                check_at_timer();
            </script>
            <?php
        }

        /**
         * Handle cart item data event. Occurs any time an item is added to the cart.
         * @param $cart_item_data - the cart item data.
         * @param $product_id - the product ID of the item added to the cart.
         * @param $variation_id - the variation ID of the item added to the cart.
         * @param $quantity - the quantity of the item added to the cart.
         */
        public function woocommerce_add_cart_item_data($cart_item_data='', $product_id='', $variation_id='', $quantity='') {

            $this->atlog("woocommerce_add_cart_item_data handler...",4);
            $this->handle_cart_add($product_id);

        }

        /**
         * Handle cart updated event. Occurs any time the cart is updated.
         */
        public function woocommerce_cart_updated() {

            if (defined('ATWC_CART_UPDATED')) {
                return;
            }

            define('ATWC_CART_UPDATED',time());
            $this->did_woocommerce_cart_updated = true;
            // Update cart, providing an opportunity to empty the cart id if we have nothing in the cart
            $this->handle_cart_update();

        }

        /**
         * Get the end user Aimtell subscriber ID from the session or cookie.
         * @return string - the subscriber ID.
         */
        private function get_subscriber_uid() {

            $subscriber_uid = '';
            if (!$subscriber_uid && isset($_SESSION) && isset($_SESSION["_aimtellSubscriberID"])) $subscriber_uid = $_SESSION["_aimtellSubscriberID"];
            if (!$subscriber_uid && isset($_COOKIE) && isset($_COOKIE["_aimtellSubscriberID"])) $subscriber_uid = $_COOKIE["_aimtellSubscriberID"];
            return $subscriber_uid;

        }

        /**
         * Get the Aimtell owner ID from the session or cookie.
         * @return string - the owner ID.
         */
        private function get_owner_uid() {

            $owner_uid = '';
            if (!$owner_uid && isset($_SESSION) && isset($_SESSION["_aimtellOwnerID"])) $owner_uid = $_SESSION["_aimtellOwnerID"];
            if (!$owner_uid && isset($_COOKIE) && isset($_COOKIE["_aimtellOwnerID"])) $owner_uid = $_COOKIE["_aimtellOwnerID"];
            return $owner_uid;

        }

        /**
         * Get the Aimtell site ID from the session or cookie.
         * @return string - the site ID.
         */
        private function get_idsite() {

            $idsite = '';
            if (!$idsite && isset($_SESSION) && isset($_SESSION["_aimtellIdSite"])) $idsite = $_SESSION["_aimtellIdSite"];
            if (!$idsite && isset($_COOKIE) && isset($_COOKIE["_aimtellIdSite"])) $idsite = $_COOKIE["_aimtellIdSite"];
            return $idsite;

        }

        /**
         * Get the Aimtell auth token from the session or cookie.
         * @return string - the auth token.
         */
        private function get_auth_token() {

            $auth_token = '';
            if (!$auth_token && isset($_SESSION) && isset($_SESSION["aimtell_auth_token"])) $auth_token = $_SESSION["aimtell_auth_token"];
            if (!$auth_token && isset($_COOKIE) && isset($_COOKIE["aimtell_auth_token"])) $auth_token = $_COOKIE["aimtell_auth_token"];
            return $auth_token;

        }

        /**
         * Handle cart add event. Occurs any time an item is added to the cart.
         * @param $product_id - the product ID of the item added to the cart.
         * @return StdClass - the response object from the tracking API event { success:bool, error:string, response:string }
         */
        private function handle_cart_add($product_id='') {

            if (!empty($product_id)) {
                $this->atlog("Product added to cart: $product_id",4);
                $this->last_item_added = wc_get_product($product_id);
            }
            $data = $this->generate_atcart_payload();

            // Perform Aimtell cart tracking via external API call
            $ret = $this->cart_tracking($data);
            $this->atlog("Aimtell->cart_tracking response: ".json_encode($ret),4);

            return $ret;
            
        }

        /**
         * Perform cart tracking via external API call.
         * @param $data - the data to send to the API { cart:string, subscriber:string, owner_uid:string, idSite:string }
         * @return StdClass - the response object { success:bool, error:string, response:string }
         */
        private function cart_tracking($data) {

            $ret = new StdClass();

            // validation
            if (empty($data)) {
                $ret->success = false; $ret->error = "Missing/invalid cart_tracking: data"; return $ret; 
            } else {
                if (empty($data->cart)) {
                    $ret->success = false; $ret->error = "Missing/invalid cart_tracking: data.cart"; return $ret; 
                }
                if (empty($data->subscriber)) {
                    $ret->success = false; $ret->error = "Missing/invalid cart_tracking: data.subscriber"; return $ret; 
                }
                if (empty($data->owner_uid)) {
                    $ret->success = false; $ret->error = "Missing/invalid cart_tracking: data.owner_uid"; return $ret; 
                }
                if (empty($data->idSite)) {
                    $ret->success = false; $ret->error = "Missing/invalid cart_tracking: data.idSite"; return $ret; 
                }
            }

            $this->atlog("Sending cart tracking data to Aimtell: ".json_encode($data),4);

            $curl = curl_init();
            curl_setopt_array(
                $curl, 
                array(
                    CURLOPT_URL => 'https://api.aimtell.com/prod/shopify/cookie',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS =>json_encode($data),
                    CURLOPT_HTTPHEADER => array(
                        'Content-Type: text/plain;charset=UTF-8'
                    ),
                )
            );

            $response = curl_exec($curl);
            // capture the response
            curl_close($curl);
            $ret->response = $response;
            $ret->success = true;

            return $ret;

        }

        /**
         * Handle cart update event. Occurs any time the cart contents are changed.
         */
        private function handle_cart_update() {
            
            // Get the last item added to the cart
            $item = $this->get_last_item_added();
            $cart_items = $this->get_cart_items();

            // If we have nothing in the cart, then we're done here
            if (empty($item) && empty($cart_items)) {
                // $this->atlog("nothing in the cart",4);
                $this->clear_cart_id();
                return;
            }

        }

        /**
         * Handle webhooks. Webhooks can occur when a cart is updated, or when items are added.
         */
        private function handle_webhooks() {

            $cart_id = $this->get_cart_id();
            $this->handle_cart_add();

        }

        /**
         * Get the cart items from the WooCommerce cart.
         * @param $force_update - force an update of the cart items. This prevents returning potentially-cached cart items.
         * @return array - Array of cart items.
         */
        private function get_cart_items($force_update=false) {

            if (isset($this->cart_items) && !$force_update) {
                return $this->cart_items;
            }

            $items = array();
            $cart = WC()->cart->get_cart();
            foreach($cart as $cart_item_key => $item) {
                $has_items = true;
                // Process each cart item
                $product_id = $item['product_id'];
                $quantity = $item['quantity'];
                // $this->atlog("product_id: $product_id",4);
                // $this->atlog("quantity: $quantity",4);
                $items[] = $item;
            }

            return $items;

        }

        /**
         * Convenience method for retrieving the last item added to the cart.
         * @return WC_Product - the last item added to the cart.
         */
        private function get_last_item_added() {

            if (isset($this->last_item_added)) return $this->last_item_added;
            return null;

        }

        /**
         * Convenience method for generating a payload for cart tracking API calls.
         * @return StdClass - the payload object { cart:string, subscriber:string, owner_uid:string, idSite:string, variables:StdClass }
         */
        private function generate_atcart_payload() {

            $data = new StdClass();

            $last_item = $this->get_last_item_added();

            $data->cart = $this->get_cart_id();
            $data->subscriber = $this->get_subscriber_uid();
            $data->owner_uid = $this->get_owner_uid();
            $data->idSite = $this->get_idsite();

            $data->variables = $this->generate_atcart_variables();

            $item_count = 1;
            if (isset($data->variables) && isset($data->variables->item_count)) {
                $data->item_count = $data->variables->item_count;
            }

            // response object should contain: {result:success,abandoned_cart:true}

            return $data;

        }
        
        /**
         * Convenience method for generating properly-formed cart data for atcart_payload.
         * @return StdClass - the variables object [ { price:string, url:string, icon:string, title:string, item_count:int }, ... ]
         */
        private function generate_atcart_variables() {
            
            $price = '';
            $url = '';
            $icon = '';
            $title = '';
            $item_count = 0;

            $data = new StdClass();
            
            $last_item = $this->get_last_item_added();

            if (!empty($last_item)) {
                $last_item_id = $last_item->get_id();
                // get the product
                $product = wc_get_product($last_item_id);
                if (!empty($product)) {
                    $price = $product->get_price();
                    $url = get_permalink( $product->get_id() );
                    $icon = wp_get_attachment_image_url($product->get_image_id());
                    $title = $product->get_name();
                    $item_count = 1;
                }
            }

            $data->price = $price;
            $data->url = $url;
            $data->icon = $icon;
            $data->title = $title;
            $data->item_count = $item_count;

            return $data;

        }

        /**
         * Log a message to the /wp-content/plugins/aimtell-web-push-notifications/includes/at.log file.
         * @param $msg - the message to log.
         * @param $level - indicates logging Error [1], Warning [2], Info [3], Debug [4].
         */
        private function atlog($msg, $level = 1) {

            if (function_exists('atlog')) atlog($msg, $level);

        }

    }

    new AimtellWooCommerce();

}
