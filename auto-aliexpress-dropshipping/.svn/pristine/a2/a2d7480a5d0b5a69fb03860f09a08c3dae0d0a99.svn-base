<?php
/**
 * Auto_Aliexpress_Schedule Class
 *
 * @since  1.0.0
 * @package Auto Aliexpress
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly

if ( ! class_exists( 'Auto_Aliexpress_Schedule' ) ) :

   class Auto_Aliexpress_Schedule {

       /**
        * Plugin instance
        *
        * @var null
        */
       private static $instance = null;

       /**
        * Return the plugin instance
        *
        * @since 1.0.0
        * @return Auto_Aliexpress_Schedule
        */
       public static function get_instance() {
           if ( is_null( self::$instance ) ) {
               self::$instance = new self();
           }

           return self::$instance;
       }

       /**
       * Auto_Aliexpress_Schedule constructor.
       *
       * @since 1.0.0
       */
       public function __construct() {
           // Add a custom interval
           add_filter( 'cron_schedules', array( $this, 'aliexpress_add_cron_interval' ) );
           // Setup Cron Job
           $this->cron_setup();
       }

       /**
        * Add a custom interval
        *
        * @since 1.0.0
        */
       public function aliexpress_add_cron_interval( $schedules ) {
           $schedules['once_aliexpress_a_minute'] = array(
               'interval' => 60,
               'display'  => esc_html__( 'Once Aliexpress Job a Minute' )
           );
           return $schedules;
       }

       /**
        * Setup Cron Job
        *
        * @since 1.0.0
        */
       public function cron_setup(){
         //wp_clear_scheduled_hook('aliexpress_cron_hook_131');

         if ( ! wp_next_scheduled( 'aliexpress_cron_hook' ) ) {
            wp_schedule_event( time(), 'once_aliexpress_a_minute', 'aliexpress_cron_hook' );
         }

         // Add Cron Job Hook Function
         add_action( 'aliexpress_cron_hook', array( $this, 'aliexpress_cron_exec' )  );

       }

       /**
        * Cron Job Execute
        *
        * @since 1.0.0
        */
       public function aliexpress_cron_exec(){
           // Run campaigns job here
           $models = Auto_Aliexpress_Custom_Form_Model::model()->get_all_models();

           $campaigns = $models['models'];

           foreach($campaigns as $key=>$model){
               $settings = $model->settings;
               $current_time = time();
               // Run this campaign when time on schedule time
               if($current_time >= $settings['next_run_time']){
                   $model->run_campaign();
               }
           }
       }

       /**
        * Print Current Cron Jobs
        *
        * @since 1.0.0
        */
       public function aliexpress_print_tasks() {
           echo '<pre>'; print_r( _get_cron_array() ); echo '</pre>';
       }

   }

endif;
