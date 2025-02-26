<?php

namespace Custom_WP_Framework\Admin\Models\Custom_Post_Types;

// Exit if accessed directly.
if ( ! defined ( 'ABSPATH' ) ) { 
	exit(); 
} 

// Load required classes.
use Custom_WP_Framework\Admin\Views\Partials\CWF_CPT_List_Table;

/**
 * Viewmodel for CPT admin page. 
 * 
 * @since   1.0.0
 */
class CWF_CPT_ViewModel {

    /**
     * The collection of custom post types registered by the plugin.
     * 
     * @since   1.0.0
     * @var     array       $cpt_collection
     */
    public $cpt_collection;
    
    /**
     * The list table for the custom post types. 
     * 
     * @since   1.0.0
     * @var     CWF_CPT_List_Table      $cpt_list_table
     */
    public $cpt_list_table;

    /**
     * The current page number of the table data.
     * 
     * @since   1.0.0
     * @var     int 
     */
    public $cpt_page;

    /**
     * The id of the current logged-in user.
     * 
     * @since   1.0.0
     * @var     bigint 
     */
    private $current_wp_user;

    /**
     * The notification message to display.
     * 
     * @since   1.0.0
     * @var     bool
     */
    public $notification_message;

    /**
     * Default constructor method.
     * 
     * @since   1.0.0
     * @param   void
     * @return  void
     */
    public function __construct() {
        
        /**
         * Set default rows per page to 10.
         */
        $this->cpt_limit = 10;

        /**
         * Set default page to 1.
         */
        $this->cpt_page = 1;

        /**
         * Initialise cpt collection to empty array.
         */
        $this->cpt_collection = array();

        /**
         * Create new instance of Custom_WP_Framework_CPT_List_Table.
         */
        $this->cpt_list_table = new CWF_CPT_List_Table();

        /**
         * Initialise request status to null.
         */
        $this->notification_message = null;
    }

}