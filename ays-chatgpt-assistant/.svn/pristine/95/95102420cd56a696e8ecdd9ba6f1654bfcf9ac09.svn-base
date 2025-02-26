<?php

if( !class_exists( 'Chatgpt_Assistant_DB_Actions' ) ){
    ob_start();

	/**
	 * Chatgpt_Assistant_DB_Actions
	 * Class contains functions to interact with database
	 *
	 * Main functionality belong to inserting, updating and deleting of data
     *
     * Database tables without prefixes
     * @tables          data
	 *
	 * @param           $plugin_name
     *
	 * @since           1.0.0
	 * @package         Ays_Chatgpt_Assistant
	 * @subpackage      Ays_Chatgpt_Assistant/includes
	 * @author          Ays_ChatGPT Assistant Team <info@ays-pro.com>
	 */
    class Chatgpt_Assistant_DB_Actions {

        /**
         * The ID of this plugin.
         *
         * @since       1.0.0
         * @access      private
         * @var         string    $plugin_name    The ID of this plugin.
         */
        private $plugin_name;

        /**
         * The name of table in the database.
         *
         * @since       1.0.0
         * @access      private
         * @var         string    $db_table    The name of database table.
         */
        private $db_table;

	    /**
	     * The constructor of the class
	     *
	     * @since       1.0.0
	     * @access      public
         *
	     * @param       $plugin_name
	     */
        public function __construct( $plugin_name ) {

	        global $wpdb;

	        /**
	         * Assigning $plugin_name to the @plugin_name property
	         */
            $this->plugin_name = $plugin_name;

	        /**
	         * Assigning database @data table full name to the @db_table property
	         */
            $this->db_table = $wpdb->prefix . CHATGPT_ASSISTANT_DB_PREFIX . "data";

        }

	    /**
	     * Get instance of this class
	     *
	     * @since       1.0.0
	     * @access      public
	     *
	     * @param       $plugin_name
	     *
	     * @return      Chatgpt_Assistant_DB_Actions
	     */
        public static function get_instance( $plugin_name ){
            return new self( $plugin_name );
        }

	    /**
         * Get records form database
         * Applying filters like per page and ordering
         *
         * @since       1.0.0
	     * @access      public
         *
	     * @return      array
	     */
        public function get_data() {
            global $wpdb;

            // if ( !isset($id) || $id > 1) {
            //     return;
            // }

            $sql = "SELECT * FROM ". $this->db_table;
            $result = $wpdb->get_row( $sql, ARRAY_A );

            // if ( ! $result ) {
            //     return;
            // }
            
            $data = array();

            $data['id'] = isset( $result['id'] ) && $result['id'] != '' ? intval( $result['id'] ) : 0;
            $data['api_key'] = isset( $result['api_key'] ) && $result['api_key'] != '' ? sanitize_text_field( $result['api_key'] ) : '';

            $options = isset( $result['options'] ) && $result['options'] != '' ? json_decode(sanitize_text_field( $result['options'] )) : '';
            
            $data['options'] = json_encode($options);
            
            if ( $data ) {
                return $data;
            }
        }

	    /**
	     * Insert or update record by id
         *
	     * @since       1.0.0
	     * @access      public
         *
         * @redirect    to specific page based on clicked button
	     * @param       $data
         *
	     * @return      false|void
	     */
        public function add_or_edit_item ( $data ) {
            global $wpdb;

            if( is_null( $data ) || empty($data) ){
                return false;
            }

            $success = 0;
            $name_prefix = 'ays_chatgpt_assistant_';

            $id = isset( $data[ $name_prefix . 'id' ] ) && $data[ $name_prefix . 'id' ] != '' ? sanitize_text_field( $data[ $name_prefix . 'id' ] ) : 0;
            $api_key = isset( $data[ $name_prefix . 'api_key' ] ) && $data[ $name_prefix . 'api_key' ] != '' ? sanitize_text_field( $data[ $name_prefix . 'api_key' ] ) : '';

            $options = array();

            $message = '';
            if( $id == 0 ) {
                $result = $wpdb->insert(
                    $this->db_table,
                    array(
                        'api_key'           => $api_key,
                        'options'           => json_encode( $options ),
                    ),
                    array(
                        '%s', // api_key
                        '%s', // options
                    )
                );

                $inserted_id = $wpdb->insert_id;

                $message = 'saved';
            } else {
                $result = $wpdb->update(
                    $this->db_table,
                    array(
                        'api_key'           => $api_key,
                        'options'           => json_encode( $options ),
                    ),
                    array( 'id' => $id ),
                    array(
                        '%s', // api_key
                        '%s', // options
                    ),
                    array( '%d' )
                );

                $inserted_id = $id;

                $message = 'updated';
            }

            if ( $result >= 0  ) {
                $url = esc_url_raw( add_query_arg( array(
                    // "id"        => $inserted_id,
                    "status"    => $message
                ) ) );

                wp_redirect( $url );
                exit;
            }
        }
    }
}