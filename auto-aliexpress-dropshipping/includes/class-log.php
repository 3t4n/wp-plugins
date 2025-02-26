<?php
/**
 * Auto Aliexpress Log Class
 *
 * @since  1.0.0
 * @package Auto Aliexpress
 */

defined( 'ABSPATH' ) or exit;

if ( ! class_exists( 'Auto_Aliexpress_Log' ) ) :

	/**
	 * Auto Aliexpress Log
	 */
	class Auto_Aliexpress_Log {

        /**
		 * Instance
		 *
		 * @since 1.1.0
		 * @var (Object) Class object
		 */
		private static $_instance = null;

        /**
         * Campaign ID
         *
         * @int
         */
        public $campaign_id;

        /**
		 * Set Instance
		 *
		 * @since 1.1.0
		 *
		 * @return object Class object.
		 */
		public static function get_instance() {
			if ( ! isset( self::$_instance ) ) {
				self::$_instance = new self;
			}

			return self::$_instance;
		}

		/**
		 * Constructor.
		 *
		 * @since 1.1.0
		 */
		public function __construct($campaign_id = 0) {
            $this->campaign_id = $campaign_id;
            $this->start();
        }

        /**
         * Campaign Job Start
         *
         * @since 1.0.0
         * @return void
         */
        public function start() {
            $level = 'info';
            $this->add( 'Started Campaign Job Process', $level );
        }

        /**
         * Write content to a log table.
         *
         * @since 1.1.0
         * @param string $content content to be saved to the file.
         */
        public function add( $content, $level = 'info' ) {

            global $wpdb;
            $wpdb->insert(
				"{$wpdb->prefix}auto_aliexpress_logs",
				array(
					'camp_id'    =>  $this->campaign_id,
                    'message'    =>  $content,
                    'level'      =>  $level,
					'created' =>  microtime( true ),
				)
			);
        }

    }

endif;