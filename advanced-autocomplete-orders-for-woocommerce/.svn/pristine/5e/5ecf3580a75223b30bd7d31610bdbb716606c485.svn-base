<?php
/**
 * Frontend Class
 *
 * @category Frontend
 * @package  Optemiz\AWO
 * @author   Nazrul Islam Nayan <nazrulislamnayan7@gmail.com>
 * @license  GPL3 https://www.gnu.org/licenses/gpl-3.0.en.html
 * @since    1.0.0
 */
namespace Optemiz\AWO;

defined('ABSPATH') || exit;

if (! class_exists('Frontend') ) {
    /**
     * Frontend class
     *
     * @class Frontend The class that manages all about frontend
     *
     * @category Frontend
     * @package  Optemiz\AWO
     * @author   Nazrul Islam Nayan <nazrulislamnayan7@gmail.com>
     * @license  GPL3 https://www.gnu.org/licenses/gpl-3.0.en.html
     */
    class Frontend
    {

        /**
         * Settings
         *
         * @var array|null
         */
        public $settings = null;

        /**
         * Class constructor
         *
         * Sets up all the appropriate hooks and functions
         * within our plugin.
         *
         * @return void
         */
        public function __construct()
        {
            $this->hooks();
            do_action('hawo_frontend_loaded', $this);
        }

        /**
         * Instance.
         *
         * The instance will be created if it does not exist yet.
         *
         * @return self The main instance.
         * @since  1.0.0
         */
        public static function instance(): self
        {
            static $instance = null;
            if (is_null($instance) ) {
                $instance = new self();
            }

            return $instance;
        }

        /**
         * All the executed hooks
         *
         * @return void
         */
        protected function hooks(): void
        {
            add_filter( 'woocommerce_payment_complete_order_status', array( $this, 'update_order_status_to_complete' ), -1, 2 );
            add_filter( 'woocommerce_thankyou', array( $this, 'auto_complete_order_after_checkout' ), 10 );
        }

        /**
         * After order is done, complete the order.
         *
         * @param int $order_id Order ID.
         * 
         * @return string
         */
        public function auto_complete_order_after_checkout( $order_id ) {
            if (!$order_id) {
                return;
            }
        
            $order = wc_get_order($order_id);

            // Set the order status to "completed".
            if ($order->get_status() !== 'completed') {
                $order->update_status('completed');
            }
        }
        
        /**
         * Automatically complte the orders.
         *
         * @param string  $order_status Order Status.
         * @param int $order_id Order ID.
         * 
         * @return string
         */
        public function update_order_status_to_complete( $order_status, $order_id ) {
            $order_status = 'completed';

            return $order_status;
        }
    }
}
