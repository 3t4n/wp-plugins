<?php
/**
 * Auto_Aliexpress_Base_Form_Model Class
 *
 * @since  1.0.0
 * @package Auto Aliexpress
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

if ( ! class_exists( 'Auto_Aliexpress_Custom_Form_Model' ) ) :

    class Auto_Aliexpress_Custom_Form_Model extends Auto_Aliexpress_Base_Form_Model {

        protected $post_type = 'auto_aliexpress';

        /**
         * @param int|string $class_name
         *
         * @since 1.0
         * @return Auto_Aliexpress_Custom_Form_Model
         */
        public static function model( $class_name = __CLASS__ ) { // phpcs:ignore
            return parent::model( $class_name );
        }

        /**
         * Run Campaign
         *
         * @since 1.0.0
         *
         */
        public function run_campaign() {

            $settings = $this->get_settings();

			$id = $this->id;

            // Get Random Keyword
            $keyword = '';
            if(isset($settings['aliexpress_selected_keywords'])){
                $keywords = $settings['aliexpress_selected_keywords'];
                $keyword = auto_aliexpress_get_random($keywords);
            }

            if(isset($settings['rss_selected_keywords'])){
                $keywords = $settings['rss_selected_keywords'];
                $keyword = auto_aliexpress_get_random($keywords);
            }

            // Start System Log Start
            $logger = new Auto_Aliexpress_Log($id);

            // Update Campaign Last and Next Run Time
            if ( !is_null( $id ) || $id > 0 ) {
                $form_model = Auto_Aliexpress_Custom_Form_Model::model()->load( $id );
                $settings = $form_model->settings;

                // Update next run time
                $time_length = auto_aliexpress_calculate_next_time($settings['update_frequency'], $settings['update_frequency_unit']);
                $settings['next_run_time'] = time() + $time_length;

                // Update last run time
                $settings['last_run_time'] = time();

                // Save Settings to model
                $form_model->settings = $settings;
                // Save data
                $id = $form_model->save();

                $logger->add( "Update Campaign Next Run Time \t\t: " . $settings['next_run_time']. "for campaign id ". $id  );
            }


            $result = array();
            $job = new Auto_Aliexpress_Job( $id, $keyword, $settings);
            $result = $job->run();

            // Return this job running result
            return $result;
        }
    }

endif;
