<?php

namespace Custom_WP_Framework\Admin\Views\Partials;

// Exit if accessed directly.
if ( ! defined ( 'ABSPATH' ) ) { 
	exit(); 
} 

// Load required classes.
use Custom_WP_Framework\Admin\Models;
use Custom_WP_Framework\Includes;

/**
 * Table to list the custom post types registered by the plugin.
 * 
 * @since   1.0.0
 */
class CWF_CPT_List_Table extends \WP_List_Table {

    /**
     * The page number of the returned results.
     * 
     * @since   1.0.0
     * @var     int         $page
     */
    public $page;

    /**
     * The max number of returned results for the page.
     * 
     * @since   1.0.0
     * @var     int         $limit
     */
    public $limit; 

    /**
     * The starting point for the result set.
     * 
     * @since   1.0.0
     * @var     bigint         $offset
     */
    public $offset;

    /**
     * The table data loaded from the database.
     * 
     * @since   1.0.0
     * @var     array           $table_data
     */
    public $table_data;

    /**
     * Default constructor.
     * 
     * @since   1.0.0
     * @param   int     $page               Page number
     * @param   int     $rows_page_page     Rows to display for each page
     * @return  void
     */
    public function __construct( $page = 1, $rows_per_page = 10 ) {

        /**
         * Inherited constructor of parent class.
         * 
         * @since   1.0.0
         * @param   void 
         * @return  void
         */
        parent::__construct( [
            'singular'  => __( 'Custom Post Type', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ),
            'plural'    => __( 'Custom Post Types', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ),
            'ajax'      => true
        ] );

        /**
         * Assign page number to class $page propery. 
         */
        $this->page = $this->get_pagenum();

        /**
         * Assign rows per page to class $limit property.
         */
        $this->limit = $rows_per_page;

        /**
         * Assign offset based on page and number of rows per page.
         */
        $this->offset = ( (int) $this->page - 1 ) * $this->limit;

        /**
         * Initialise table data and set to empty array.
         */
        $this->table_data = array();

    }

    /**
     * Prepare the items for the table to process
     * 
     * @since   1.0.0
     * @param   void
     * @return  void
     */
    public function prepare_items(){

        /**
         * Get table columns.
         */
        $columns = $this->get_columns();

        /**
         * Get hidden table columns.
         */
        $hidden = $this->get_hidden_columns();

        /**
         * Get sortable table columns.
         */
        $sortable = $this->get_sortable_columns();

        /**
         * Set column headers.
         */
        $this->_column_headers = array( $columns, $hidden, $sortable );
        
        /**
         * Process any bulk actions.
         */
        $this->process_bulk_action();

        /**
         * Set pagination arguments.
         */
        $this->set_pagination_args(
            array(
                'total_items'   => self::record_count(),
                'per_page'      => $this->limit,
            )
        );

        /**
         * Get table data.
         */
        $this->get_table_data();

        /**
         * Sort table data.
         */
        usort( $this->table_data, array( &$this, 'usort_reorder' ) );

        /**
         * Return items for table.
         */
        $this->items = $this->table_data;
    }

    /**
     * Retrieve custom post types from database.
     * 
     * @since   1.0.0
     * @param   void
     * @return  void
     */
    private function get_table_data() {

        /**
         * Create new instance of cpt data model.
         * 
         * @since   1.0.0
         * @var     CWF_CPT_DataModel   $cpt_model
         */
        $model_cpt = new Models\Custom_Post_Types\CWF_CPT_DataModel();
        
        /**
         * Get current table view.
         */
        $current = ( ! empty( $_REQUEST['cat'] ) ? sanitize_key( $_REQUEST['cat'] ) : 'cwf' );

        /**
         * Determine data source for table.
         */
        if( 'other' === strval( $current ) ) {

            /**
             * Get registered post types from other sources.
             * 
             * @since   1.0.0
             * @param   array   $post_types
             */
            $post_types = get_post_types( [], 'objects' );

            /**
             * Retrieve registered cwf custom post type names.
             */
            $model_cpt->get_all_cwf_custom_post_types( null, true );

            /**
             * Add retrieved names to cwf post types array.
             * 
             * @since   1.0.0
             * @var     array   $cwf_post_types 
             */
            $cwf_post_types = array();
            foreach( $model_cpt->results as $result ) {
                $cwf_post_types[] = $result->cpt_key;
            }

            /**
             * Retrieve list of in-built core WP post types.
             */
            $wp_post_types = Includes\CWF_Config::get_setting_value( 'reserved_post_types' ); 

            /**
             * Remove non-applicable post types from 'other sources' array.
             */
            foreach( $post_types as $post_type ) {

                /**
                 * Remove post types registered by the plugin.
                 */
                if( in_array( $post_type->name, $cwf_post_types ) ) {
                    unset( $post_types[$post_type->name] );
                    continue;
                }

                /**
                 * Remove in-built core WP post types.
                 */
                if( in_array( $post_type->name, $wp_post_types ) ) {
                    unset( $post_types[$post_type->name] );
                    continue;
                }
            }

            /**
             * Refine retrieved post types to specified range. 
             */
            $post_types = array_slice( $post_types, $this->offset, $this->limit );

            if( ! empty( $post_types ) || sizeof( $post_types ) == 0 ) {

                /**
                * Format custom post type data for WP_List_Table.
                */
                $model_cpt->tabulate_object_data( $post_types );
                
            }
        }
        else {

            /**
             * Get active status of requested view.
             */
            $active = isset( $_GET['status'] ) ? filter_var( sanitize_key( $_GET['status'] ), FILTER_VALIDATE_BOOLEAN) : true; 

            /**
             * Get custom post types from database.
             */
            $model_cpt->get_cwf_custom_post_types( $this->offset, $this->limit, $active );

            if ( ! empty( $model_cpt->results ) ) {

                /**
                 * Format custom post type data for WP_List_Table.
                 */
                $model_cpt->tabulate_cwf_data();
            }
         }

         if ( ! empty( $model_cpt->cpt_collection ) ) {
                    
            if ( is_array( $model_cpt->cpt_collection ) ) {

                /**
                 * Iterate through each custom post type to be displayed in table.
                 */
                foreach( $model_cpt->cpt_collection as $cpt ) {
                    
                    /**
                     * Add row to table data.
                     */
                    $this->table_data[] = $cpt;
                }
            }
        }
    }
    
    /**
     * Retrieve table views.
     * 
     * @since   1.0.0
     * @param   void
     * @return  void 
     */
    protected function get_views() {

        /**
         * Initialise views array.
         */
        $views = array();

        /**
         * Retrieve current view category. 
         */
        $current = ( ! empty( $_REQUEST['cat'] ) ? sanitize_key( $_REQUEST['cat'] ) : 'cwf' );

        /**
         * Create new instance of cpt data model.
         * 
         * @since   1.0.0
         * @var     CWF_CPT_DataModel   $cpt_model
         */
        $model_cpt = new Models\Custom_Post_Types\CWF_CPT_DataModel();

        /**
         * Custom post types registered by this plugin.
         */
        $class = ( 'cwf' == $current ? ' class="current"' : '' );
        $cwf_url = remove_query_arg( 'cat' );
        $views['cwf'] = sprintf( '<a href="%s" %s>Custom WP Framework (%d)</a>', $cwf_url, $class, $model_cpt->get_cwf_cpt_count() );

        /**
         * Custom post types registered through other sources.
         */
        $class = ( 'other' == $current ? ' class="current"' : '' );
        $other_url = add_query_arg( 'cat', 'other' );
        $views['other'] = sprintf( '<a href="%s" %s>Other sources (%d)</a>', $other_url, $class, $model_cpt->get_non_cwf_cpt_count() );

        return $views;
    }

    /**
     * Define bulk actions.
     * 
     * @since   1.0.0
     * @param   void
     * @return  array   $actions
     */
    function get_bulk_actions() {
        
        /**
         * Associative array of bulk actions.
         * 
         * @since   1.0.0
         * @var     array   $actions
         */
        $actions = array();

        if( 'other' === $_GET['cat'] ) {
            return $actions;
        }

        /**
         * Add disable bulk action if current filter is enabled.
         */
        if( 'true' === $_GET['status'] || ! isset ( $_GET['status'] ) ){
            $actions['disable'] = __( 'Disable', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN );
        }

        /**
         * Add enable bulk action if current filter is disabled. 
         */
        if( 'false' === $_GET['status'] ) {
            $actions['enable'] = __( 'Enable', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN );
        }

        /**
         * Add delete bulk action.
         */
        $actions['delete'] = __( 'Delete', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN );

        /**
         * Return array with possible bulk actions for current view.
         */
        return $actions;
    }

    /**
     * Define row-level links and actions for first column.
     * 
     * @since   1.0.0
     * @param   array   $item
     * @return  string
     */
    function column_post_type_key( $item )
    {
        /**
         * Return column name for non-cwf post types.
         */
        if( 'other' === $_GET['cat'] ) {
            return sprintf( '<strong>%s</strong>', $item['post_type_key'] );
        }
        
        /**
         * Define URL for delete cpt admin page.
         * 
         * @since   1.0.0
         * @var     string      $cpt_delete_url
         */
        $cpt_delete_url = admin_url() . '?page=custom-wp-framework-admin-cpt-delete&id='. $item['id'];
        
        /**
         * Define URL for edit cpt admin page.
         * 
         * @since   1.0.0
         * @var     string      $cpt_edit_url
         */
        $cpt_edit_url = admin_url() . '?page=custom-wp-framework-admin-cpt-edit&id='. $item['id'];

        /**
         * Define URL for cpt posts.
         * 
         * @since   1.0.0
         * @var     string      $cpt_posts_url
         */
        $cpt_posts_url = admin_url() . 'edit.php?post_type=' . $item['post_type_key'];

        /**
         * Define URL for disabling cpt posts.
         * 
         * @since   1.0.0
         * @var     string      $cpt_disable_url
         */
        $cpt_disable_url = admin_url() . '?page=custom-wp-framework-admin-cpt-disable&id='. $item['id'];

        /**
         * Define URL for enabling cpt posts.
         * 
         * @since   1.0.0
         * @var     string      $cpt_enable_url
         */
        $cpt_enable_url = admin_url() . '?page=custom-wp-framework-admin-cpt-enable&id='. $item['id'];

        /**
         * Define URL for showing PHP code for cpt post.
         * 
         * @since   1.0.0
         * @var     string      $cpt_code_url
         */
        $cpt_code_url = admin_url();

        /**
         * Define URL for exporting cpt post.
         * 
         * @since   1.0.0
         * @var     string      $cpt_export_url
         */
        $cpt_export_url = admin_url();

        /**
         * Array of row level actions.
         * 
         * @since   1.0.0
         * @var     array       $actions
         */
        $actions = array(
            'edit' => sprintf( '<a href="%s">%s</a>', $cpt_edit_url, __( 'Edit', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ) ),     
        );

        /**
         * Add view posts link if 'enabled' is current view filter.
         */
        if( 'true' === $_GET['status'] || ! isset( $_GET['status'] ) ) {
            $actions['view-posts'] = sprintf( '<a href="%s">%s</a>', $cpt_posts_url, __( 'View Posts', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ) ); 
        }

        /**
         * Add disable action if 'enabled' is current view filter.
         */
        if( 'true' === $_GET['status'] || ! isset( $_GET['status'] ) ) {
            $actions['disable'] = sprintf( '<a href="%s">%s</a>', $cpt_disable_url, __( 'Disable', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ) );
        }

        /**
         * Add enable action if 'disabled' is current view filter.
         */
        if( 'false' === $_GET['status'] ){
            $actions['enable'] = sprintf( '<a href="%s">%s</a>', $cpt_enable_url, __( 'Enable', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ) );
        }
        
        /**
         * Add delete cpt as last row action. 
         */
        $actions['delete'] = sprintf( '<a href="%s">%s</a>', $cpt_delete_url, __( 'Delete', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ) );

        /**
         * Return formatted action string.
         */
        return sprintf( '<a href="%s">%s</a> %s', $cpt_edit_url, $item['post_type_key'], $this->row_actions( $actions ) );
    }  

    /** 
    * Render the bulk edit checkbox. 
    *
    * @since    1.0.0
    * @param    array   $item 
    * @return   string 
    */
    function column_cb( $item )
    {
        return sprintf( '<input type="checkbox" name="custom-post-type[]" value="%s" />', $item['id'] );
    }

    function extra_tablenav( $which ) {
        
        if ( 'other' !== $_GET['cat'] ) {

            /**
             * Get status of custom post type.
             * 
             * @since   1.0.0
             * @var     string      $status
             */
            $status = isset( $_GET['status'] ) ? sanitize_key( $_GET['status'] ) : '';

            ?>
            <div class="alignleft actions bulkactions">
                <select id="cpt-filter-status" name="cpt-filter-status" class="cwf-filter">
                    <option value="true" <?php echo esc_html( 'true' === $status ? 'selected' : '' ); ?>>Enabled</option>
                    <option value="false" <?php echo esc_html( 'false' === $status ? 'selected' : '' ); ?>>Disabled</options>
                </select>
                <input id="cpt-filter-submit" class="button cwf-wlt-filter" type="submit" value="<?php esc_html_e('Filter', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ); ?>" />
            </div>
            
        <?php

        }
    }

    /**
     * Get columns of data table.
     * 
     * @since   1.0.0
     * @param   void
     * @return  array   $columns
     */
    function get_columns() {
        
        /**
         * Define columns of table.
         */
        $columns = array(
            'cb'            => '<input type="checkbox" />',
            'post_type_key' => esc_html( __( 'Post Type Key', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ) ),
            'id'            => esc_html( __( 'ID', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ) ),
            'description'   => esc_html( __( 'Description', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ) ),
            'labels'        => esc_html( __( 'Labels', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ) ),
            'settings'      => esc_html( __( 'Settings', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ) ),
            'taxonomies'    => esc_html( __( 'Taxonomies', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ) ),
        );

        /**
         * Return columns array.
         */
        return $columns;
    }

    /**
     * Get the hidden columns of the table.
     * 
     * @since   1.0.0
     * @param   void
     * @return  array
     */
    public function get_hidden_columns() {

        /**
         * Define hidden columns of table.
         */
        $hidden_columns = array(
            'id' => __( 'id', true ),
        );

        /**
         * Return hidden columns array.
         */
        return $hidden_columns;

    }

    /**
     * Get the sortable columns of the table.
     * 
     * @since   1.0.0
     * @param   void
     * @return  array
     */
    public function get_sortable_columns() {

        /**
         * Define sortable columns.
         */
        $sortable_columns = array(
            'post_type_key' => array( 'post_type_key', true ),
        );

        /**
         * Return sortable columns array.
         */
        return $sortable_columns;

    }

    /**
     * Define what data to show in each column of the table.
     * 
     * @since   1.0.0
     * @param   string  $item
     * @param   string  $column_name
     * @return  void
     */
    public function column_default ( $item, $column_name ) {

        /**
         * Define column values.
         */
        switch( $column_name ) {
            case 'post_type_key':
            case 'id':
            case 'labels':
            case 'description':
            case 'settings':
            case 'taxonomies':
                return $item[ $column_name ];

            default:
                return print_r( $item, true ) ;
        }

    }

    /** 
    * Get the number of custom post types registered by the plugin. 
    * 
    * @since    1.0.0
    * @param    void
    * @return   bigint
    */
    public static function record_count() {
        
        /**
         * Create new instance of cpt data model.
         * 
         * @since   1.0.0
         * @var     CWF_CPT_DataModel   $cpt_model
         */
        $model_cpt = new Models\Custom_Post_Types\CWF_CPT_DataModel();
    
        if( 'other' === $_GET['cat'] ) {

            /**
             * Get number of records not registered by plugin.
             */
            return $model_cpt->get_non_cwf_cpt_count();

        }
        else {
            
            /**
             * Get active status of requested view.
             */
            $active = isset( $_GET['status'] ) ? filter_var( sanitize_key( $_GET['status'] ), FILTER_VALIDATE_BOOLEAN) : true; 

            /**
             * Get number of records in custom post type database table.
             */
            return $model_cpt->get_cwf_cpt_count( $active );
        }
    }

    /**
     * Sort data according to GET variables.
     * 
     * @since   1.0.0
     * @return  $mixed
     */
    public function usort_reorder( $a, $b ) {

        /**
         * If no orderby parameter, default to post_type_key.
         */
        $orderby = ( ! empty( $_GET['orderby'] ) ) ? sanitize_text_field( $_GET['orderby'] ) : 'post_type_key';

        /**
         * If no order parameter, default to asc.
         */
        $order = ( ! empty( $_GET['order'] ) ) ? sanitize_text_field( $_GET['order'] ) : 'asc';

        /**
         * Determine sort order.
         */
        $result = strcmp( $a[$orderby], $b[$orderby] );

        /**
         * Send final sort direction to usort.
         */
        return ( $order === 'asc' ) ? $result : -$result;
    }


    /**
     * Text displayed when no custom post types available.
     * 
     * @since   1.0.0
     * @param   void
     * @return  void
     */
    public function no_items() {

        /**
         * Display text to user.
         */
        esc_html_e( 'No custom post types registered.', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN );

    }
}